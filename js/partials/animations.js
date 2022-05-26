/* ANIMATIONS */

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
                    typingSpans[activeSpan].classList.add("activestop");
                    clearInterval(headerTimer);
                    return;
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
