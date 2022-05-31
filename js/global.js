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
