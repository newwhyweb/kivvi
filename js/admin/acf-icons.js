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
