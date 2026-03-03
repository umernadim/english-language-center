// // code for carousel
function carouselHandler() {
  let images;
  if (window.innerWidth >= 768) {
    images = document.querySelectorAll(".desktop-img");
  } else {
    images = document.querySelectorAll(".mobile-img");
  }

  let current = 0;
  setInterval(() => {
    images[current].style.opacity = 0;
    current = (current + 1) % images.length;
    images[current].style.opacity = 1;
  }, 3000);
}

window.addEventListener("load", carouselHandler);

// Data for Learning Cards section
function learningCardsHandler() {
  const cardsData = [
    {
      no: 1,
      title: "Beginner Friendly",
      descp:
        "Begin learning with small but progressive steps. The best part? No prior knowledge required!",
      icon: "ri-seedling-fill",
      p1: "Step-by-step learning path",
      p2: "Interactive exercises for basics",
      p3: "Patient, supportive instructors",
      tag: "Start from zero, finish as a hero",
    },
    {
      no: 2,
      title: "Speaking Confidence",
      descp:
        "Afraid of crowds? Can’t deliver that presentation? A single solution for all!",
      icon: "ri-megaphone-fill",
      p1: "Daily speaking practice",
      p2: "Pronunciation correction",
      p3: "Public speaking simulations",
      tag: "Speak with confidence in any situation",
    },
    {
      no: 3,
      title: "Grammar + Vocabulary",
      descp:
        "Build a strong foundation with vital grammar and over 2000 situation-specific vocabulary.",
      icon: "ri-book-open-fill",
      p1: "Contextual grammar lessons",
      p2: "Themed vocabulary sets",
      p3: "Memory techniques for retention",
      tag: "Solid foundation for fluency",
    },
    {
      no: 4,
      title: "Real-life Conversations",
      descp:
        "Practice real-life conversations for everyday situations, travel, work, and social interactions",
      icon: "ri-discuss-fill",
      p1: "Role-play scenarios",
      p2: "Cultural context integration",
      p3: "Native speaker interactions",
      tag: "Ready for real-world communication",
    },
  ];

  const learnCards = document.querySelector(".learn-cards");
  cardsData.forEach((card) => {
    learnCards.innerHTML += `
            <div class="learn-card card-${card.no}">
          <div class="card-icon">
            <i class=${card.icon}></i>
          </div>
          <h3>${card.title}</h3>
          <p>
            ${card.descp}
          </p>
          <ul class="features-list">
            <li><span class="checkmark">✓</span>${card.p1}</li>
            <li>
              <span class="checkmark">✓</span>${card.p2}
            </li>
            <li>
              <span class="checkmark">✓</span>${card.p3}
            </li>
          </ul>
          <div class="highlight">${card.tag}</div>
        </div>
    `;
  });

  // Add click effect to cards
  const cards = document.querySelectorAll(".learn-card");
  cards.forEach((card) => {
    card.addEventListener("click", function () {
      this.style.transform = "scale(0.98)";
      setTimeout(() => {
        this.style.transform = "";
      }, 150);
    });
  });
}

learningCardsHandler();

// Data for Course Cards
function courseCardsData() {
  const courseContainer = document.querySelector(".course-container");
  const courseData = [
    {
      title: "Spoken English",
      descp:
        "Boost your fluency, pronunciation, and confidence with fun, interactive speaking sessions.",
      p1: "Practice real conversations every day",
      p2: "Work on your accent naturally",
      p3: "Real-world scenario training",
    },
    {
      title: "Grammar Mastery",
      descp:
        "Build a strong foundation in English grammar with easy-to-understand examples and fun, practical exercises.",
      p1: "Practice with interactive activities",
      p2: "Learn from common mistakes",
      p3: "Use grammar naturally in real-life situations",
    },
    {
      title: "Advanced English",
      descp:
        "Take your English to the next level with our advanced course—perfect for professionals who want to sharpen their communication and grow vocabulary.",
      p1: "Improve your business communication",
      p2: "Learn effective academic writing",
      p3: "Build confident presentation skills",
    },
  ];

  courseData.forEach((card) => {
    courseContainer.innerHTML += `
            <div class="course-card">
          <h3>${card.title}</h3>
          <p>
            ${card.descp}
          </p>
          <ul class="course-features">
            <li>
              <i class="ri-checkbox-circle-fill"></i>${card.p1}
            </li>
            <li>
              <i class="ri-checkbox-circle-fill"></i>${card.p2}
            </li>
            <li>
              <i class="ri-checkbox-circle-fill"></i> ${card.p3}
            </li>
          </ul>
        </div>
    `;
  });
}

courseCardsData();

// Data for Why choose our Institute
function featureshandler() {
  const featuresData = [
    {
      no: "01",
      title: "Expert Instructors",
      descp: "Learn from native speakers and certified language experts who have years of teaching experience and a proven track record of success.",
      icon: "ri-presentation-fill"
    },
    {
      no: "02",
      title: "Flexible Learning",
      descp: "Choose in-person classes, online sessions, or a hybrid approach to suit your convenience and learning style.",
      icon: "ri-macbook-line"
    },
    {
      no: "03",
      title: "Interactive Learning",
      descp: "Participate in real conversations, interactive games, and practical activities that make learning English fun and effective.",
      icon: "ri-chat-smile-2-line"
    },
    {
      no: "04",
      title: "Cultural Immersion",
      descp: "Experience an international English learning environment while living in your own country. Learn not just English, but also cultural contexts from the perspective of native speakers.",
      icon: "ri-earth-line"
    }

  ];

const featureContainer = document.querySelector(".features-container");
featuresData.forEach((card)=>{
  featureContainer.innerHTML += `
            <div class="feature-card">
            <div class="feature-number">${card.no}</div>
            <div class="icon-container">
              <i class=${card.icon}></i>
            </div>
            <h3>${card.title}</h3>
            <p>
             ${card.descp}
            </p>
          </div>`
});

}

featureshandler();

// Animated counters for statistics
function statshandler() {
  document.addEventListener("DOMContentLoaded", function () {
    const statNumbers = document.querySelectorAll(".stat-number");

    const animateCounter = (element) => {
      const target = parseInt(element.getAttribute("data-count"));
      const duration = 2000; // 2 seconds
      const step = Math.max(1, Math.floor(target / 60)); // Ensure at least 1
      let current = 0;

      const timer = setInterval(() => {
        current += step;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        element.textContent = current;
      }, duration / (target / step));
    };

    // Trigger counters when in viewport
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );

    statNumbers.forEach((stat) => {
      observer.observe(stat);
    });
  });
}

statshandler();

// testimonial handler
function testimonialhandler() {
  const scrollWrapper = document.querySelector(".tm-scroll-wrapper");
  let isDown = false;
  let startX;
  let scrollLeft;

  scrollWrapper.addEventListener("mousedown", (e) => {
    isDown = true;
    scrollWrapper.classList.add("grabbing");
    startX = e.pageX - scrollWrapper.offsetLeft;
    scrollLeft = scrollWrapper.scrollLeft;
  });

  scrollWrapper.addEventListener("mouseleave", () => {
    isDown = false;
    scrollWrapper.classList.remove("grabbing");
  });

  scrollWrapper.addEventListener("mouseup", () => {
    isDown = false;
    scrollWrapper.classList.remove("grabbing");
  });

  scrollWrapper.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - scrollWrapper.offsetLeft;
    const walk = (x - startX) * 2; // scroll speed
    scrollWrapper.scrollLeft = scrollLeft - walk;
  });
}

window.addEventListener("load", testimonialhandler);
