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
