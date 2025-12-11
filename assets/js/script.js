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
      ".nav-links a, .mobile-nav-links a"
    );

    navLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        // Remove active class from all links
        navLinks.forEach((l) => l.classList.remove("active"));

        // Add active class to clicked link
        this.classList.add("active");

        // For desktop links, prevent default only for demo
        if (!this.getAttribute("href") || this.getAttribute("href") === "#") {
          e.preventDefault();
        }
      });
    });

    // Initialize active link
    const currentPath = window.location.pathname;
    navLinks.forEach((link) => {
      if (link.getAttribute("href") === currentPath) {
        link.classList.add("active");
      }
    });

    // Demo: Add some scrolling animation for the demo content
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

window.addEventListener("load", searchFilterHandler);


