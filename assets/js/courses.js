// Data for Course section
function CourseDataHandler() {
  const courseData = [
    {
      title: "Spoken English",
      descp:
        "Enhance your communication skills with interactive speaking sessions, role plays, and real-life conversations. Designed for learners who want to speak English naturally and confidently in any situation",
      p1: "Daily conversation practice",
      p2: "Pronunciation correction",
      p3: "Real-world scenario training",
      icon: "ri-chat-3-line",
      duration: "3 Months",
      level: "Beginner to Advanced",
      badge: `<div class="course-badge">Most Popular</div>`,
    },
    {
      title: "Grammar Mastery",
      descp:
        "Strengthen your foundation with our in-depth grammar program. Learn essential structures, sentence formation, and advanced rules through practical examples and exercises.",
      p1: "Interactive grammar exercises",
      p2: "Common error correction",
      p3: "Contextual grammar application",
      icon: "ri-book-mark-line",
      duration: "2 Months",
      level: "All Levels",
      badge: "",
    },
    {
      title: "Youth Leadership Program",
      descp:
        "A dynamic course crafted for young learners to build confidence, improve communication, and develop leadership qualities through debates, public speaking, and teamwork.",
      p1: "Public speaking training",
      p2: "Team collaboration exercises",
      p3: "Critical thinking development",
      icon: "ri-team-line",
      duration: "20 hours",
      level: "Intermediate",
      badge: `<div class="course-badge">Youth Favorite</div>`,
    },
    {
      title: "Advanced English",
      descp:
        "  Perfect for professionals and academics, this course refines your language, presentation, and writing skills to match international communication standards.",
      p1: "Business communication skills",
      p2: "Academic writing techniques",
      p3: "Professional presentation skills",
      icon: "ri-graduation-cap-line",
      duration: "3 Months",
      level: "Advanced",
      badge: `<div class="course-badge">Advanced</div>`,
    },
    {
      title: "Public Speaking & Confidence Building",
      descp:
        "Overcome stage fear and learn to express your thoughts effectively. This course includes speaking drills, mock sessions, and feedback to build a strong public presence.",
      p1: "Stage presence training",
      p2: "Voice modulation exercises",
      p3: "Audience engagement techniques",
      icon: "ri-mic-line",
      duration: "2 Months",
      level: "All Levels",
      badge: "",
    },
    {
      title: "Creative Writing",
      descp:
        "  Improve your storytelling and writing style with creative exercises. Learn to write essays, articles, and stories with structure, clarity, and expression.",
      p1: "Creative writing exercises",
      p2: "Story structure techniques",
      p3: "Editing and proofreading skills",
      icon: "ri-edit-box-line",
      duration: "2 Months",
      level: "Intermediate",
      badge: "",
    },
  ];

  const courseList = document.querySelector(".course-list");
  courseData.forEach((card) => {
    courseList.innerHTML += `
   <div class="course-item">
            <div class="course-icon">
              <i class=${card.icon}></i>
            </div>
                ${card.badge}
            <h3>${card.title}</h3>
            <p>
              <i class="ri-double-quotes-l quotes"></i>
              ${card.descp}
              <i class="ri-double-quotes-r quotes"></i>
            </p>

            <ul class="course-features">
              <li><i class="ri-checkbox-circle-fill"></i> ${card.p1}</li>
              <li><i class="ri-checkbox-circle-fill"></i> ${card.p2}</li>
              <li><i class="ri-checkbox-circle-fill"></i> ${card.p3}</li>
            </ul>

            <div class="course-footer">
              <div class="course-info">
                <div class="course-duration">
                  <i class="ri-time-line"></i> ${card.duration}
                </div>
                <div class="course-level">
                  <i class="ri-bar-chart-line"></i> ${card.level}
                </div>
              </div>
            </div>
          </div>
  `;
  });
}
CourseDataHandler();

// Data for Activities video data
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
// function videohandler() {
//   document.addEventListener("DOMContentLoaded", () => {
//     const containers = document.querySelectorAll(".video-container");

//     containers.forEach((container) => {
//       const video = container.querySelector("video");
//       const overlay = container.querySelector(".play-overlay");

//       // Click only on overlay or its icon
//       overlay.addEventListener("click", () => {
//         if (video.paused) {
//           video.play();
//         } else {
//           video.pause();
//         }
//       });

//       // Hide overlay when playing
//       video.addEventListener("play", () => {
//         overlay.style.opacity = "0";
//       });

//       // Show overlay when paused or ended
//       video.addEventListener("pause", () => {
//         overlay.style.opacity = "1";
//       });

//       video.addEventListener("ended", () => {
//         overlay.style.opacity = "1";
//       });
//     });
//   });
// }

// videohandler();

function videohandler() {
  document.addEventListener("DOMContentLoaded", () => {
    const containers = document.querySelectorAll(".video-container");

    containers.forEach((container) => {
      const video = container.querySelector("video");
      const overlay = container.querySelector(".play-overlay");
      const icon = overlay.querySelector(".play-icon i");

      overlay.addEventListener("click", () => {
        if (video.paused) {
          video.play();
        } else {
          video.pause();
        }
      });

      // Change icon when playing
      video.addEventListener("play", () => {
        icon.className = "ri-pause-fill"; 
      });

      // Change icon when paused or ended
      video.addEventListener("pause", () => {
        icon.className = "ri-play-fill"; 
      });

      video.addEventListener("ended", () => {
        icon.className = "ri-play-fill"; 
      });
    });
  });
}
videohandler();

// function to handle FAQ section
function faqHandler() {
  // Data for FAQ section
  const faqData = [
    {
      question: "Who can join these courses?",
      answer:
        "Anyone who wants to improve their English skills is welcome — from school students to professionals seeking better communication and confidence.",
    },
    {
      question: "Are the classes online or on-campus?",
      answer:
        "All our classes are conducted on-campus at our center. We believe in interactive, face-to-face learning that builds confidence, real communication, and stronger connections among students.",
    },
    {
      question: "What is the duration of each course?",
      answer:
        "Each course runs between 8 to 10 weeks, depending on the level and program type. Flexible timings are also available.",
    },
    {
      question: "Do you provide certificates?",
      answer:
        "Yes, all participants receive a certificate of completion upon successfully finishing their course or program.",
    },
  ];

  const faqContainer = document.querySelector(".faq");
  faqData.forEach((faq) => {
    faqContainer.innerHTML += `
        <div class="faq-item">
            <button class="faq-question">${faq.question}</button>
            <div class="faq-answer">
              <p>
                ${faq.answer}
              </p>
            </div>
          </div>
  `;
  });

  const faqItems = document.querySelectorAll(".faq-item");

  faqItems.forEach((item) => {
    const question = item.querySelector(".faq-question");
    question.addEventListener("click", () => {
      item.classList.toggle("active");
    });
  });
}

window.addEventListener("load", faqHandler);
