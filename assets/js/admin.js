// code for sidebar handler
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


// code for add modal functionality
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector(".card-actions .btn");
  const modal = document.getElementById("add-modal");
  const closeModalBtn = document.getElementById("closeModal");
  const cancelBtn = document.getElementById("cancelBtn");

  // Add Teacher button click - Modal open
  if (addBtn) {
    addBtn.addEventListener("click", function (e) {
      e.preventDefault();
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    });
  }

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

});
// code for update modal functionality
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("update-modal");
  const closeModalBtn = document.getElementById("closeModal");
  const cancelBtn = document.getElementById("cancelBtn");
  const updateBtn = document.querySelector(".actions-buttons #update-btn");

  // Add Teacher button click - Modal open
  if (updateBtn) {
    updateBtn.addEventListener("click", function (e) {
      e.preventDefault();
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    });
  }

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

});



document.addEventListener("DOMContentLoaded", function () {
  const photoInput = document.getElementById("photo");
  const photoPreview = document.getElementById("photoPreview");

  // Preview selected image
  photoInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        photoPreview.innerHTML = `<img src="${e.target.result}" alt="Preview" />`;
        photoPreview.style.display = "block"; 
      };
      reader.readAsDataURL(file);
    } else {
      photoPreview.innerHTML = "";
      photoPreview.style.display = "none";
    }
  });
});
