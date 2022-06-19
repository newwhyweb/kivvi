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
