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
