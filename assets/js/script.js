// code for responsive navbar
function navbarHandler() {
  const menuBtn = document.getElementById("menuBtn");
  const nsContainer = document.getElementById("ns-container");
  const logo = document.getElementById("logo");
  let menuOpen = false;

  menuBtn.addEventListener("click", () => {
    nsContainer.classList.toggle("active");
    menuOpen = !menuOpen;

    // toggle icon between menu and cross
    if (menuOpen) {
      menuBtn.innerHTML = `<i class="ri-close-line"></i>`;
      logo.style.color = "#333";
    } else {
      menuBtn.innerHTML = `<i class="ri-menu-3-line"></i>`;
      logo.style.color = "#fff";
    }
  });
}

navbarHandler();

// code for carousel
function carouselHandler() {
  const cards = document.querySelectorAll(".card");
  const leftArrow = document.querySelector(".nav-arrow.left");
  const rightArrow = document.querySelector(".nav-arrow.right");
  let currentIndex = 0;
  let isAnimating = false;

  function updateCarousel(newIndex) {
    if (isAnimating) return;
    isAnimating = true;

    currentIndex = (newIndex + cards.length) % cards.length;

    cards.forEach((card, i) => {
      const offset = (i - currentIndex + cards.length) % cards.length;
      card.classList.remove(
        "center",
        "left-1",
        "left-2",
        "right-1",
        "right-2",
        "hidden"
      );

      if (offset === 0) card.classList.add("center");
      else if (offset === 1) card.classList.add("right-1");
      else if (offset === 2) card.classList.add("right-2");
      else if (offset === cards.length - 1) card.classList.add("left-1");
      else if (offset === cards.length - 2) card.classList.add("left-2");
      else card.classList.add("hidden");
    });

    setTimeout(() => {
      isAnimating = false;
    }, 800);
  }

  leftArrow.addEventListener("click", () => updateCarousel(currentIndex - 1));
  rightArrow.addEventListener("click", () => updateCarousel(currentIndex + 1));

  cards.forEach((card, i) =>
    card.addEventListener("click", () => updateCarousel(i))
  );

  updateCarousel(0);

  setInterval(() => {
    updateCarousel(currentIndex + 1);
  }, 3000);
}

carouselHandler();
