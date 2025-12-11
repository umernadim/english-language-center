// code for activities video data
function videosCardDataHandler() {
    const videosData = [
  {
    title: "Group Discussion",
    posterPath: "assets/images/carousel/img11.jpg",
    videoPath: "assets/videos/activity-vdo.mp4",
  },
  {
    title: "Debate Session",
    posterPath: "assets/images/carousel/img11.jpg",
    videoPath: "assets/videos/activity-vdo.mp4",
  },
  {
    title: "Powerpoint Presentation",
    posterPath: "assets/images/carousel/img11.jpg",
    videoPath: "assets/videos/activity-vdo.mp4",
  },
  {
    title: "Public Speaking",
    posterPath: "assets/images/carousel/img11.jpg",
    videoPath: "assets/videos/activity-vdo.mp4",
  },
  {
    title: "News Paper Discussion",
    posterPath: "assets/images/carousel/img11.jpg",
    videoPath: "assets/videos/activity-vdo.mp4",
  },
  {
    title: "Role Play Session",
    posterPath: "assets/images/carousel/img11.jpg",
    videoPath: "assets/videos/activity-vdo.mp4",
  },
];

const videoGrid = document.querySelector(".video-grid");
videosData.forEach((card) => {
  videoGrid.innerHTML += `
         <div class="video-card">
              <div class="video-container">
                <video poster=${card.posterPath} playsinline>
                  <source src=${card.videoPath} type="video/mp4"/>
                </video>
                <div class="play-overlay">
                  <div class="play-icon">
                    <i class="ri-play-fill"></i>
                  </div>
                </div>
              </div>
              <h3>${card.title}</h3>
            </div>
    `;
});

}

videosCardDataHandler();

// code for Video Handler
function videohandler(params) {
  document.addEventListener("DOMContentLoaded", () => {
    const containers = document.querySelectorAll(".video-container");

    containers.forEach((container) => {
      const video = container.querySelector("video");
      const overlay = container.querySelector(".play-overlay");

      // Click only on overlay or its icon
      overlay.addEventListener("click", () => {
        if (video.paused) {
          video.play();
        } else {
          video.pause();
        }
      });

      // Hide overlay when playing
      video.addEventListener("play", () => {
        overlay.style.opacity = "0";
      });

      // Show overlay when paused or ended
      video.addEventListener("pause", () => {
        overlay.style.opacity = "1";
      });

      video.addEventListener("ended", () => {
        overlay.style.opacity = "1";
      });
    });
  });
}

videohandler();
