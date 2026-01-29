// code for responsive navbar
function navbarHandler() {
  document.addEventListener("DOMContentLoaded", function () {
    // Get DOM elements
    const hamburger = document.getElementById("hamburger");
    const mobileNav = document.getElementById("mobileNav");
    const overlay = document.getElementById("overlay");
    const navbar = document.querySelector(".navbar");
    const logo = document.querySelector(".logo");
    const scrollProgress = document.getElementById("scrollProgress");

    // Toggle mobile menu
    function toggleMobileMenu() {
      hamburger.classList.toggle("active");
      mobileNav.classList.toggle("active");
      overlay.classList.toggle("active");
      navbar.classList.toggle("active");
      logo.classList.toggle("active");
      document.body.style.overflow = mobileNav.classList.contains("active")
      ? "hidden"
        : "";
    }

    // Close mobile menu
    function closeMobileMenu() {
      navbar.classList.toggle("active");
      logo.classList.toggle("active");
      hamburger.classList.remove("active");
      mobileNav.classList.remove("active");
      overlay.classList.remove("active");
      document.body.style.overflow = "";
    }

    // Event listeners
    hamburger.addEventListener("click", toggleMobileMenu);
    overlay.addEventListener("click", closeMobileMenu);

    // Close mobile menu when clicking on a link
    const mobileLinks = document.querySelectorAll(".mobile-nav-links a");
    mobileLinks.forEach((link) => {
      link.addEventListener("click", closeMobileMenu);
    });

    // Navbar scroll effect
    window.addEventListener("scroll", function () {
      // Add/remove scrolled class
      if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }

      // Update scroll progress
      const windowHeight =
        document.documentElement.scrollHeight -
        document.documentElement.clientHeight;
      const scrolled = (window.scrollY / windowHeight) * 100;
      scrollProgress.style.width = scrolled + "%";
    });

    // Active link management
    const navLinks = document.querySelectorAll(
      ".navbar .nav-links a, .navbar .mobile-nav-links a"
    );

    const currentPage =
      window.location.pathname.split("/").pop() || "index.html";

    navLinks.forEach((link) => {
      const linkPage = link.getAttribute("href");

      if (linkPage === currentPage) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });

    // Initialize active link
    const currentPath = window.location.pathname;
    navLinks.forEach((link) => {
      if (link.getAttribute("href") === currentPath) {
        link.classList.add("active");
      }
    });

    // Code for scrolling animation 
    const wrapper = document.querySelector(".wrapper");
    window.addEventListener("scroll", function () {
      const scrolled = window.scrollY;
      const rate = scrolled * -0.2;

      if (wrapper) {
        wrapper.style.transform = `translateY(${rate}px)`;
      }
    });
  });
}

navbarHandler();

// function to handle test search bar
function quizSearchHandler() {
  document.addEventListener("DOMContentLoaded", function () {
    // Search functionality
    const searchInput = document.getElementById("searchInput");
    const testCards = document.querySelectorAll(".test-card");

    searchInput.addEventListener("input", function () {
      const searchTerm = this.value.toLowerCase().trim();

      testCards.forEach((card) => {
        const title = card.querySelector("h3").textContent.toLowerCase();
        const description = card.querySelector("p").textContent.toLowerCase();

        if (
          searchTerm === "" ||
          title.includes(searchTerm) ||
          description.includes(searchTerm)
        ) {
          card.style.display = "flex";
        } else {
          card.style.display = "none";
        }
      });
    });

    // Test button click effects
    const testButtons = document.querySelectorAll(".test-btn");

    testButtons.forEach((button) => {
      button.addEventListener("click", function (e) {
        e.preventDefault();

        // Get test title
        const testTitle =
          this.closest(".test-card").querySelector("h3").textContent;

        // Button animation
        const originalText = this.innerHTML;
        this.innerHTML = "Starting...";
        this.style.pointerEvents = "none";

        const card = this.closest(".test-card");
        card.style.transform = "translateY(-3px) scale(0.99)";

        setTimeout(() => {
          this.innerHTML = originalText;
          this.style.pointerEvents = "auto";
          card.style.transform = "translateY(-5px)";

          console.log(`Starting test: ${testTitle}`);
          alert(`Starting "${testTitle}" - Good luck!`);
        }, 800);
      });
    });

    // Keyboard shortcut for search
    document.addEventListener("keydown", function (e) {
      // Escape clears search
      if (e.key === "Escape" && document.activeElement === searchInput) {
        searchInput.value = "";
        searchInput.dispatchEvent(new Event("input"));
      }
    });
  });
}

quizSearchHandler();
