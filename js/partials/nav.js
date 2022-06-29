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

let navLinks = document.querySelectorAll("#site-navigation a");
navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
        let mainNav = document.getElementById("site-navigation");
        let navIcon = document.querySelector("#nav-icon");
        if (mainNav.classList.contains("active")) {
            navIcon.classList.remove("open");
            mainNav.classList.toggle("active");
        }
    });
});
