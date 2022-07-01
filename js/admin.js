let icons = document.querySelectorAll(".acf-icon");
icons.forEach(function (icon) {
    let parent = icon.closest(".acf-field-repeater").dataset.name;
    if (parent) {
        let newTitle = "row";
        switch (parent) {
            case "kivvi_flex_sections":
                newTitle = "Section";
                break;
            case "kivvi_accordion_items":
            case "kivvi_cardset_items":
            case "kivvi_tabs_items":
            case "kivvi_timeline_items":
                newTitle = "Item";
                break;
            default:
                break;
        }
        icon.title = icon.title.replace(/row/, newTitle);
    }
});

var observerset = false;

let flexPageBuilder = document.getElementById("acf-kivvi_pagebuilder_flex");
if (flexPageBuilder) {
    let loader = document.createElement("div");
    loader.id = "kivvi-flex-loader";
    loader.innerHTML = "<div class='loader'></div>";
    flexPageBuilder.append(loader);
}

addExistingLabelListeners();
setMainObserver();
setAllCollapsed();

jQuery(async function () {
    let loader = document.getElementById("kivvi-flex-loader");
    loader.classList.add("closed");
    setTimeout(() => {
        let flexPageChildren = flexPageBuilder.querySelectorAll(":scope > *");
        flexPageChildren.forEach((item) => {
            item.style.display = "block";
        });
        loader.remove();
    }, 1000);
});

let repeaterButtons = document.querySelectorAll("a[data-event=add-row]");

repeaterButtons.forEach((button) => {
    if (button.innerHTML == "Add New Section") {
        button.addEventListener("click", () => {
            setAllSectionLabels();
        });
    }
});

let sectionIcons = document.querySelectorAll(
    ".acf-icon[title='Add Section'], .acf-icon[title='Duplicate Section'], .acf-icon[title='Remove Section']"
);

sectionIcons.forEach((icon) => {
    icon.addEventListener("click", () => {
        setAllSectionLabels();
    });
});

// INTERCEPT AJAX, DON'T LET ACF RESET THE LAYOUT TITLE
// USES SEND FROM THIS https://jonlabelle.com/snippets/view/javascript/listen-for-ajax-calls

send = window.XMLHttpRequest.prototype.send;
function KHSendReplacement(data) {
    let url = new URL("https://example.com/?" + data);
    if (url.searchParams.get("action")) {
        if (
            url.searchParams.get("action") ==
            "acf/fields/flexible_content/layout_title"
        ) {
            return;
        }
    }
    return send.apply(this, arguments);
}
window.XMLHttpRequest.prototype.send = KHSendReplacement;

// check for admin ajax
jQuery(document).ajaxComplete(function (event, request, settings) {
    if (!observerset) {
        let url = new URL("http://example.com/?" + settings.data);
        let action = url.searchParams.get("action");
        let template = url.searchParams.get("page_template");
        if (
            action == "acf/ajax/check_screen" &&
            template == "templates/page-flex.php"
        ) {
            setMainObserver();
        }
    }
});

function setAllCollapsed() {
    let layouts = document.querySelectorAll(".acf-postbox .values .layout");
    layouts.forEach((item) => {
        item.classList.add("-collapsed");
    });
    console.log("all collapsed");
}

function setMainObserver() {
    // GET THE CONTAINER AND LISTEN FOR CHANGES
    // let acfparent = document.querySelector(".acf-field-flexible-content");
    let acfparent = document.querySelector(".acf-field-kivvi-flex-sections");
    //acf-field-kivvi-flex-sections
    if (acfparent && !observerset) {
        // let acfwrapper = acfparent.querySelector(
        //     ".acf-flexible-content .values"
        // );
        let acfwrapper = acfparent.querySelector(".acf-table tbody");

        if (acfwrapper) {
            var observer = new MutationObserver(function (mutations) {
                mutations.forEach(function (mutation) {
                    let newitem = handleMutation(mutation);
                });
            });
            observer.observe(acfwrapper, {
                childList: true,
                attributes: true,
            });
            observerset = true;
        }
    }
    console.log("observed");
}

function setComponentObserver(newitem) {
    let acfwrapper = newitem.querySelector(
        ":scope > .acf-fields > .acf-field-kivvi-flex-components > .acf-input > .acf-flexible-content > .values"
    );
    if (acfwrapper) {
        let componentObserver = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                let newitem = handleMutation(mutation);
            });
        });
        componentObserver.observe(acfwrapper, {
            childList: true,
            attributes: true,
        });
    }
}

function addExistingLabelListeners() {
    let labels = document.querySelectorAll(
        "[data-name='kivvi_admin_name'] input[type='text'], [data-name='kivvi_section_admin_name'] input[type='text']"
    );

    labels.forEach((label) => {
        setLabelValue(label);
        addLabelListener(label);
    });
    console.log("labels added");
}

function addLabelListener(label) {
    label.addEventListener("keyup", () => {
        setLabelValue(label);
    });
}

function setLabelValue(label) {
    let labelType = "component";
    if (label.closest('[data-name="kivvi_section_admin_name"]')) {
        labelType = "section";
    }
    let v = label.value;

    let container, handle;
    switch (labelType) {
        case "component":
            container = label.closest(".layout");
            break;
        case "section":
            container = label.closest("td.acf-fields");
            break;
    }

    if (!container) {
        return;
    }

    switch (labelType) {
        case "component":
            handle = container.querySelector(".acf-fc-layout-handle");

            if (!handle) {
                return;
            }
            let handleOrder = handle.querySelector(".acf-fc-layout-order");

            let queryType = handle.querySelector(".kivvi_content_type");

            if (!queryType) {
                let contentType = handle.innerHTML.replace(
                    handleOrder.outerHTML,
                    ""
                );
                queryType = document.createElement("span");
                queryType.classList.add("kivvi_content_type");
                queryType.innerHTML = contentType;
            }
            handle.innerHTML =
                handleOrder.outerHTML +
                queryType.outerHTML +
                "<span class='kivvi-admin-title'>" +
                v +
                "</span>";
            break;
        case "section":
            if (
                v == "" &&
                container.closest("tr").dataset.id != "acfcloneindex"
            ) {
                let currSection = "";
                let parentTR = container.closest("tr");
                let span = parentTR.querySelector(".acf-row-handle span");
                if (span) {
                    currSection = span.innerHTML;
                }

                v =
                    "Section " +
                    currSection +
                    "<span class='editor-help dashicons dashicons-editor-help' title='To add a custom title, use the Section Admin Name field in Section Settings below' ></span>";
            }
            handle = container.querySelector(".kivvi-section-admin-title");
            if (!handle) {
                handle = document.createElement("div");
                handle.classList.add("kivvi-section-admin-title");
                container.insertBefore(handle, container.firstChild);
            }
            handle.innerHTML = v;

            break;
    }
}

function handleMutation(mutation) {
    let newitem = mutation.addedNodes[0];

    if (isNodeItem(newitem)) {
        // SECTIONS
        let label = newitem.querySelector(
            "[data-name='kivvi_section_admin_name'] input[type='text']"
        );

        if (label && isNodeItem(newitem)) {
            addLabelListener(label);
            setComponentObserver(newitem);
            return;
        }

        // COMPONENTS
        label = newitem.querySelector(
            "[data-name='kivvi_admin_name'] input[type='text']"
        );
        if (
            label &&
            isNodeItem(newitem) &&
            newitem.classList.contains("layout")
        ) {
            addLabelListener(label);
        }
    }
}

function isNodeItem(item) {
    if (item && typeof item === "object" && item.nodeType === 1) {
        return true;
    }
    return false;
}

function setAllSectionLabels() {
    setTimeout(function () {
        let labels = document.querySelectorAll(".kivvi-section-admin-name");
        let activeLabel;
        labels.forEach((label) => {
            if (label.id.indexOf("acfcloneindex") == -1) {
                setLabelValue(label);
            }
        });
    }, 0);
}

/* Redisplay labels */

let acfLabels = document.querySelectorAll(".acf-label");

// IF THE SIBLING .acf-input has .acf-fields, don't do
let acfInputs = document.querySelectorAll(":not(.clones) .acf-input");

acfInputs.forEach(function (inp) {
    // GENERALLY, IF THEY DON'T HAVE SUB FIELDS, THEY SHOULD DISPLAY THE LABEL
    if (!inp.querySelector(".acf-field") && inp.childNodes.length > 1) {
        if (inp.previousElementSibling) {
            // inp.previousElementSibling.style.display = "block";
            inp.previousElementSibling.classList.add(
                "kivvi-acf-header-display"
            );
            inp.previousElementSibling.classList.add("kivvi-no-field");
            inp.previousElementSibling.classList.add(
                "length-" + inp.childNodes.length
            );
        }
    }
    if (
        inp.firstElementChild &&
        inp.firstElementChild.classList.contains("acf-repeater")
    ) {
        // inp.previousElementSibling.style.display = "block";
        inp.previousElementSibling.classList.add("kivvi-acf-header-display");
        inp.previousElementSibling.classList.add("kivvi-repeater");
    }

    // ADD HEADERS FOR TWO COLUMN COLUMNS
    if (
        inp
            .closest(".acf-field")
            .classList.contains("acf-field-kivvi-two-column-column-1") ||
        inp
            .closest(".acf-field")
            .classList.contains("acf-field-kivvi-two-column-column-2")
    ) {
        inp.previousElementSibling.classList.add("kivvi-acf-header-display");
    }
});
