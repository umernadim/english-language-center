function sidebarHandler() {
  const sidebar = document.querySelector(".sidebar");
  const mainContent = document.querySelector(".main-content");
  const toggleButton = document.querySelector(".menu-toggle");
  let menuOpen = false;

  toggleButton.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
    mainContent.classList.toggle("expanded");
    menuOpen = !menuOpen;
    if (menuOpen) {
      toggleButton.innerHTML = `<i class="ri-close-line"></i>`;
      toggleButton.style.fontSize = "2rem";
    } else {
      toggleButton.innerHTML = `<i class="ri-menu-3-line"></i>`;
      toggleButton.style.fontSize = "1.5rem";
    }
  });
}

sidebarHandler();
