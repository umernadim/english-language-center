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

// code for modal functionality

document.addEventListener("DOMContentLoaded", function () {
  const addTeacherBtn = document.querySelector(".card-actions .btn");
  const modal = document.getElementById("teacherModal");
  const closeModalBtn = document.getElementById("closeModal");
  const cancelBtn = document.getElementById("cancelBtn");
  const updateBtn = document.getElementById("update-btn");

  // Add Teacher button click - Modal open
  addTeacherBtn.addEventListener("click", function (e) {
    e.preventDefault();
    modal.style.display = "flex";
    document.body.style.overflow = "hidden";
  });

  updateBtn.addEventListener("click", function (e) {
    e.preventDefault();
    modal.style.display = "flex";
    document.body.style.overflow = "hidden";
  });

  // Close modal buttons
  function closeModal() {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
    resetForm();
  }

  closeModalBtn.addEventListener("click", closeModal);
  cancelBtn.addEventListener("click", closeModal);

  // Close modal when clicking outside
  modal.addEventListener("click", function (e) {
    if (e.target === modal) {
      closeModal();
    }
  });


  // Reset form function
  function resetForm() {
    document.getElementById("teacherForm").reset();
    document.getElementById("photoPreview").innerHTML = "";
    document.getElementById("modalTitle").textContent = "Add New Teacher";
  }

  // File preview functionality
  document
    .getElementById("teacherPhoto")
    .addEventListener("change", function (e) {
      const file = e.target.files[0];
      const preview = document.getElementById("photoPreview");

      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.innerHTML = `
                    <img src="${e.target.result}" alt="Preview" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 2px solid #e2e8f0;">
                `;
        };
        reader.readAsDataURL(file);
      }
    });
});
