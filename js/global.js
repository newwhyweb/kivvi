class Accordion {
    // The default constructor for each accordion
    constructor(el) {
        this.el = el;
        // Store the <summary> element
        this.summary = el.querySelector("summary");
        // Store the <div class="content"> element
        this.content = el.querySelector(".kivvi-accordion-content");

        // Store the animation object (so we can cancel it, if needed)
        this.animation = null;
        // Store if the element is closing
        this.isClosing = false;
        // Store if the element is expanding
        this.isExpanding = false;
        // Detect user clicks on the summary element
        this.summary.addEventListener("click", (e) => this.onClick(e));
    }

    // Function called when user clicks on the summary
    onClick(e) {
        // Stop default behaviour from the browser
        e.preventDefault();
        // Add an overflow on the <details> to avoid content overflowing
        this.el.style.overflow = "hidden";
        // Check if the element is being closed or is already closed
        console.log(this);
        if (this.isClosing || !this.el.open) {
            this.open();
            // Check if the element is being openned or is already open
        } else if (this.isExpanding || this.el.open) {
            this.shrink();
        }
    }

    // Function called to close the content with an animation
    shrink() {
        // Set the element as "being closed"
        this.isClosing = true;

        // Store the current height of the element
        const startHeight = `${this.el.offsetHeight}px`;
        // Calculate the height of the summary
        const endHeight = `${this.summary.offsetHeight}px`;

        // If there is already an animation running
        if (this.animation) {
            // Cancel the current animation
            this.animation.cancel();
        }

        // Start a WAAPI animation
        this.animation = this.el.animate(
            {
                // Set the keyframes from the startHeight to endHeight
                height: [startHeight, endHeight],
            },
            {
                // If the duration is too slow or fast, you can change it here
                duration: 400,
                // You can also change the ease of the animation
                easing: "ease-out",
            }
        );

        // When the animation is complete, call onAnimationFinish()
        this.animation.onfinish = () => this.onAnimationFinish(false);
        // If the animation is cancelled, isClosing variable is set to false
        this.animation.oncancel = () => (this.isClosing = false);
    }

    // Function called to open the element after click
    open() {
        // Apply a fixed height on the element
        this.el.style.height = `${this.el.offsetHeight}px`;
        // Force the [open] attribute on the details element
        this.el.open = true;
        // Wait for the next frame to call the expand function
        window.requestAnimationFrame(() => this.expand());
    }

    // Function called to expand the content with an animation
    expand() {
        // Set the element as "being expanding"
        this.isExpanding = true;
        // Get the current fixed height of the element
        const startHeight = `${this.el.offsetHeight}px`;
        // Calculate the open height of the element (summary height + content height)
        const endHeight = `${
            this.summary.offsetHeight + this.content.offsetHeight
        }px`;

        // If there is already an animation running
        if (this.animation) {
            // Cancel the current animation
            this.animation.cancel();
        }

        // Start a WAAPI animation
        this.animation = this.el.animate(
            {
                // Set the keyframes from the startHeight to endHeight
                height: [startHeight, endHeight],
            },
            {
                // If the duration is too slow of fast, you can change it here
                duration: 400,
                // You can also change the ease of the animation
                easing: "ease-out",
            }
        );
        // When the animation is complete, call onAnimationFinish()
        this.animation.onfinish = () => this.onAnimationFinish(true);
        // If the animation is cancelled, isExpanding variable is set to false
        this.animation.oncancel = () => (this.isExpanding = false);
    }

    // Callback when the shrink or expand animations are done
    onAnimationFinish(open) {
        // Set the open attribute based on the parameter
        this.el.open = open;
        // Clear the stored animation
        this.animation = null;
        // Reset isClosing & isExpanding
        this.isClosing = false;
        this.isExpanding = false;
        // Remove the overflow hidden and the fixed height
        this.el.style.height = this.el.style.overflow = "";
    }
}

document.querySelectorAll("details").forEach((el) => {
    new Accordion(el);
});

/* ANIMATIONS */
const prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
).matches;

let queuedActives = [];

const inViewport = (entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            if (pageTransitioning) {
                queuedActives.push(entry.target);
            } else {
                entry.target.classList.add("active");
            }
            Obs.unobserve(entry.target);
        }
        // USE THIS IF WE WANT TO RESET THE ACTIVE - CURRENTLY IT'S SET TO ACTIVE BUT NOT UNDONE (SO NOT FADED BACK OUT, UNROTATED, ETC)
        // entry.target.classList.toggle("active", entry.isIntersecting);
    });
};

const Obs = new IntersectionObserver(inViewport);
const obsOptions = {}; //See: https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API#Intersection_observer_options

// Attach observer to every [data-inviewport] element:
const ELs_inViewport = document.querySelectorAll("[data-inviewport]");
ELs_inViewport.forEach((EL) => {
    Obs.observe(EL, obsOptions);
});

function setPendingActives() {
    if (queuedActives.length > 0) {
        queuedActives.forEach((el) => {
            el.classList.add("active");
        });
    }
    queuedActives = [];
    startTyping();
}

setTimeout(function () {
    let inviewport = document.querySelectorAll("[data-inviewport]");
    inviewport.forEach(function (el) {
        if (!el.classList.contains("active")) {
            el.classList.add("active");
            Obs.unobserve(el);
        }
    });
}, 20000);

/* HEADER TEXT */

let isTyping = false;
async function startTyping() {
    if (prefersReducedMotion) {
        return;
    }
    if (!isTyping) {
        if ((typingHeader = document.querySelector("h1.typing"))) {
            let typingSpans = typingHeader.querySelectorAll("span");
            let activeSpan = 0;
            // SET HEIGHT SO IT DOESN'T GO AWAY
            typingHeader.style.height =
                typingHeader.getBoundingClientRect().height + "px";

            let headerTimer = setInterval(async function () {
                typingSpans[activeSpan].classList.remove("active");
                typingSpans[activeSpan].classList.remove("starting");
                typingSpans[activeSpan].classList.remove("start");
                if (typingSpans[activeSpan + 1]) {
                    activeSpan++;
                } else {
                    activeSpan = 0;
                    // typingSpans[activeSpan].classList.add("activestop");
                    // clearInterval(headerTimer);
                    // return;
                }
                typingSpans[activeSpan].classList.add("active");
            }, 4500);
            await kh_sleep(1000);
            typingSpans[0].classList.add("starting");
            isTyping = true;
        }
    }
}

// SLIDE UP TEXT
let slideUps = document.querySelectorAll(".slideuptext");
slideUps.forEach(function (slideUp) {
    if (prefersReducedMotion) {
        return;
    }
    let slideUpText = slideUp.innerHTML.trim();
    let newText = "";
    for (var i = 0; i < slideUpText.length; i++) {
        let addText = slideUpText[i];
        if (i == 0) {
            newText += '<span class="slideupWord">';
        }
        if (addText == " ") {
            addText = "&nbsp;";
            newText += "</span>";
            newText += '<span class="slideupWord">';
        }
        newText +=
            '<span class="inner inner-' +
            i +
            '" style="transition-delay: ' +
            (i * 0.1 + 0.5) +
            's">' +
            addText +
            "</span>";
    }
    newText += "</span>";
    slideUp.innerHTML = newText;
});

/* END ANIMATIONS */

if ((cardsets = document.querySelectorAll(".kivvi-cardset"))) {
    cardsets.forEach((cardset) => {
        window.addEventListener("load", function () {
            let cardsetItems = cardset.querySelectorAll(".kivvi-card");
            minimgheight = false;
            cardsetItems.forEach((item) => {
                let img = item.querySelector(".imgwrapper img");

                if (
                    img.getBoundingClientRect().height > 0 &&
                    (!minimgheight ||
                        img.getBoundingClientRect().height < minimgheight)
                ) {
                    minimgheight = img.getBoundingClientRect().height;
                }
            });
            cardsetItems.forEach((item) => {
                let img = item.querySelector(".imgwrapper img");
                img.style.maxHeight = minimgheight + "px";
            });
        });
    });
}

let modalVideos = document.querySelectorAll(".kivvi-modal-video-overlay");

modalVideos.forEach((modalVideo) => {
    modalVideo.addEventListener("click", (e) => {
        e.preventDefault();
        let parent = modalVideo.closest(".kivvi-modal-video");
        if (!parent) {
            return;
        }
        launchVideo(parent);
    });
});

function launchVideo(parent) {
    let sib = parent.nextElementSibling;

    if (sib.classList.contains("kivvi-modal-video-embed")) {
        sib.classList.add("active");
        setTimeout(() => {
            sib.classList.add("show");
        }, 100);
        // CLOSE WHEN CLICKING OUTSIDE VIDEO
        sib.addEventListener("click", (e) => {
            closeModalVideo();
        });
    }
}

// LAUNCH FROM BUTTON
let videoButtons = document.querySelectorAll(".kivvi-video-button-wrapper");
videoButtons.forEach((videoButton) => {
    videoButton.addEventListener("click", (e) => {
        e.preventDefault();
        let button = videoButton.querySelector(".button");
        let videoID = videoButton.dataset.video;
        let videoContainer = document.querySelector(
            '.kivvi-twoup-video-container[data-video="' + videoID + '"]'
        );
        if (videoContainer) {
            let parent = videoContainer.querySelector(".kivvi-modal-video");
            launchVideo(parent);
        }
    });
});

// CLOSE WHEN CLICKING LINK
let modalVideosClose = document.querySelectorAll(
    ".kivvi-modal-video-embed .close-video"
);
modalVideosClose.forEach((modalVideoClose) => {
    modalVideoClose.addEventListener("click", (e) => {
        closeModalVideo();
    });
});

// CLOSE ON ESC
document.addEventListener("keydown", function (e) {
    if (e.key == "Escape") {
        closeModalVideo();
    }
});
function closeModalVideo() {
    let modalVideos = document.querySelectorAll(
        ".kivvi-modal-video-embed.show"
    );
    modalVideos.forEach((modalVideo) => {
        modalVideo.classList.remove("show");
        setTimeout(() => {
            modalVideo.classList.remove("active");
        }, 1000);
    });
}

/* Mobile nav */
let navLink = document.querySelector("#mobile-toggle");
navLink.addEventListener("click", function (e) {
    e.preventDefault();
    navLink.classList.toggle("open");
    let navIcon = document.querySelector("#nav-icon");
    let mainNav = document.getElementById("site-navigation");
    mainNav.classList.toggle("active");
    navIcon.classList.toggle("open");
});

function initTabs() {
    // Get relevant elements and collections
    const tabbedList = document.querySelectorAll(".kivvi-tabs");

    if (!tabbedList || !tabbedList.length) {
        return;
    }

    tabbedList.forEach((tabbed) => {
        const tablist = tabbed.querySelector("ul");
        const tabs = tablist.querySelectorAll("a");
        const panels = tabbed.querySelectorAll('[id^="section"]');

        // The tab switching function
        const switchTab = (oldTab, newTab) => {
            newTab.focus();
            // Make the active tab focusable by the user (Tab key)
            newTab.removeAttribute("tabindex");
            // Set the selected state
            newTab.setAttribute("aria-selected", "true");
            oldTab.removeAttribute("aria-selected");
            oldTab.setAttribute("tabindex", "-1");
            // Get the indices of the new and old tabs to find the correct
            // tab panels to show and hide
            let index = Array.prototype.indexOf.call(tabs, newTab);
            let oldIndex = Array.prototype.indexOf.call(tabs, oldTab);
            panels[oldIndex].hidden = true;
            panels[index].hidden = false;
        };

        // Add the tablist role to the first <ul> in the .tabbed container
        tablist.setAttribute("role", "tablist");

        // Add semantics are remove user focusability for each tab
        Array.prototype.forEach.call(tabs, (tab, i) => {
            tab.setAttribute("role", "tab");
            tab.setAttribute("id", "tab" + (i + 1));
            tab.setAttribute("tabindex", "-1");
            tab.parentNode.setAttribute("role", "presentation");

            // Handle clicking of tabs for mouse users
            tab.addEventListener("click", (e) => {
                e.preventDefault();
                let currentTab = tablist.querySelector("[aria-selected]");
                if (e.currentTarget !== currentTab) {
                    switchTab(currentTab, e.currentTarget);
                }
            });

            // Handle keydown events for keyboard users
            tab.addEventListener("keydown", (e) => {
                // Get the index of the current tab in the tabs node list
                let index = Array.prototype.indexOf.call(tabs, e.currentTarget);
                // Work out which key the user is pressing and
                // Calculate the new tab's index where appropriate
                let dir =
                    e.which === 37
                        ? index - 1
                        : e.which === 39
                        ? index + 1
                        : e.which === 40
                        ? "down"
                        : null;
                if (dir !== null) {
                    e.preventDefault();
                    // If the down key is pressed, move focus to the open panel,
                    // otherwise switch to the adjacent tab
                    dir === "down"
                        ? panels[i].focus()
                        : tabs[dir]
                        ? switchTab(e.currentTarget, tabs[dir])
                        : void 0;
                }
            });
        });

        // Add tab panel semantics and hide them all
        Array.prototype.forEach.call(panels, (panel, i) => {
            panel.setAttribute("role", "tabpanel");
            panel.setAttribute("tabindex", "-1");
            let id = panel.getAttribute("id");
            panel.setAttribute("aria-labelledby", tabs[i].id);
            panel.hidden = true;
        });

        // Initially activate the first tab and reveal the first tab panel
        tabs[0].removeAttribute("tabindex");
        tabs[0].setAttribute("aria-selected", "true");
        panels[0].hidden = false;
    });
}
initTabs();
