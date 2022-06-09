let modalVideos = document.querySelectorAll(".kivvi-modal-video-overlay");

modalVideos.forEach((modalVideo) => {
    modalVideo.addEventListener("click", (e) => {
        e.preventDefault();
        let parent = modalVideo.closest(".kivvi-modal-video");
        if (!parent) {
            return;
        }
        let sib = parent.nextElementSibling;

        if (sib.classList.contains("kivvi-modal-video-embed")) {
            sib.classList.add("active");
            setTimeout(() => {
                sib.classList.add("show");
            }, 100);
        }
    });
});
