// code for responsive navbar
function navbarHandler() {
  const menuBtn = document.getElementById("menuBtn");
  const nsContainer = document.getElementById("ns-container");
  const logo = document.getElementById("logo");
  const nav = document.getElementById("navBar");
  let menuOpen = false;

  menuBtn.addEventListener("click", () => {
    nsContainer.classList.toggle("active");
    nav.classList.toggle("active");
    menuOpen = !menuOpen;

    if (menuOpen) {
      menuBtn.innerHTML = `<i class="ri-close-line"></i>`;
      menuBtn.style.color = "#fff";
    } else {
      menuBtn.innerHTML = `<i class="ri-menu-3-line"></i>`;
      menuBtn.style.color = "#003366";
    }
  });
}

// navbarHandler();
window.addEventListener("load", navbarHandler);

// // code for carousel
// function carouselHandler() {
//   const images = document.querySelectorAll(".background-img");
//   let current = 0;

//   setInterval(() => {
//     images[current].style.opacity = 0;
//     current = (current + 1) % images.length;
//     images[current].style.opacity = 1;
//   }, 3000);
// }

// window.addEventListener("load", carouselHandler);

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

// Learning Cards
// Add click effect to cards
function learningCardsHandler() {
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

// testimonialhandler();
window.addEventListener("load", testimonialhandler);

// function to handle FAQ section
function faqHandler() {
  const faqItems = document.querySelectorAll(".faq-item");

  faqItems.forEach((item) => {
    const question = item.querySelector(".faq-question");
    question.addEventListener("click", () => {
      item.classList.toggle("active");
    });
  });
}
// faqHandler();
window.addEventListener("load", faqHandler);

// function to handle test search bar
function searchFilterHandler() {
  const searchInput = document.getElementById("searchInput");
  const testGrid = document.getElementById("testGrid");
  const cards = testGrid.querySelectorAll(".test-card");

  searchInput.addEventListener("keyup", function () {
    const filter = this.value.toLowerCase();
    for (let card of cards) {
      const title = card.querySelector("h3").textContent.toLowerCase();
      card.style.display = title.includes(filter) ? "block" : "none";
    }
  });
}

// searchFilterHandler();
window.addEventListener("load", searchFilterHandler);
