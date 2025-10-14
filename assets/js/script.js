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

navbarHandler();

// code for carousel
function carouselHandler() {
  const images = document.querySelectorAll(".background-img");
  let current = 0;

  setInterval(() => {
    images[current].style.opacity = 0;
    current = (current + 1) % images.length;
    images[current].style.opacity = 1;
  }, 5000);
}

// carouselHandler();

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
faqHandler();

function searchFilterHandler() {
  const searchInput = document.getElementById("searchInput");
  const testGrid = document.getElementById("testGrid");
  const cards = testGrid.getElementsByClassName("test-card");

  searchInput.addEventListener("keyup", function () {
    const filter = this.value.toLowerCase();
    for (let card of cards) {
      const title = card.querySelector("h3").textContent.toLowerCase();
      card.style.display = title.includes(filter) ? "block" : "none";
    }
  });
}

searchFilterHandler();
