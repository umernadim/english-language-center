// code for sidebar handler
function sidebarHandler() {
  const sidebar = document.querySelector(".sidebar");
  const mainContent = document.querySelector(".main-content");
  const toggleButton = document.querySelector(".menu-toggle");
  let menuOpen = false;

  if (toggleButton) {
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
}

sidebarHandler();

// Code for add modal
document.addEventListener("DOMContentLoaded", function () {
  const addTeacherBtn = document.querySelector(".card-actions .btn");
  const modal = document.getElementById("modal");
  const closeModalBtn = document.getElementById("closeModal");
  const cancelBtn = document.getElementById("cancelBtn");

  // Add Teacher button click - Modal open
  if (addTeacherBtn) {
    addTeacherBtn.addEventListener("click", function (e) {
      e.preventDefault();
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    });
  }

  // Close modal buttons
  function closeModal() {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
    document.getElementById("addForm").reset();
    document.getElementById("addPhotoPreview").innerHTML = "";
  }

  if (closeModalBtn) closeModalBtn.addEventListener("click", closeModal);
  if (cancelBtn) cancelBtn.addEventListener("click", closeModal);

  // Close modal when clicking outside
  if (modal) {
    modal.addEventListener("click", function (e) {
      if (e.target === modal) {
        closeModal();
      }
    });
  }

  // PHOTO PREVIEW
  const photoInput = document.getElementById("addPhoto");
  const photoPreview = document.getElementById("addPhotoPreview");

  if (photoInput && photoPreview) {
    photoInput.addEventListener("change", function (e) {
      const file = e.target.files[0];

      if (file) {
        // Check file type
        if (!file.type.startsWith("image/")) {
          alert("Please select an image file!");
          return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
          photoPreview.innerHTML = `
                        <img src="${e.target.result}" 
                             alt="Preview" 
                             style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 2px solid #e2e8f0;">
                    `;
        };
        reader.readAsDataURL(file);
      } else {
        photoPreview.innerHTML = "";
      }
    });
  }
});

// Code for update modal
document.addEventListener("DOMContentLoaded", function () {
  const photoInput = document.getElementById("updatePhoto");
  const photoPreview = document.getElementById("updatePhotoPreview");

  if (photoInput && photoPreview) {
    photoInput.addEventListener("change", function (e) {
      const file = e.target.files[0];

      console.log("File selected:", file);

      if (file) {
        // Check image type
        if (!file.type.startsWith("image/")) {
          alert("Please select an image file!");
          this.value = "";
          return;
        }

        // Create preview
        const reader = new FileReader();
        reader.onload = function (e) {
          photoPreview.innerHTML = `
                        <img src="${e.target.result}" 
                             alt="New Preview" 
                             style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; border: 2px solid #10b981;">
                        <small>New photo preview</small>
                    `;
        };
        reader.readAsDataURL(file);
      }
    });
  } else {
    console.error("❌ Photo input or preview not found!");
  }

});

