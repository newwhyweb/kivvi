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
