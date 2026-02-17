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




document.addEventListener('DOMContentLoaded', function() {
    const addTeacherBtn = document.querySelector('.card-actions .btn');
    const modal = document.getElementById('modal');
    const closeModalBtn = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelBtn');
    
    // Add Teacher button click - Modal open
    if(addTeacherBtn) {
        addTeacherBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden'; 
        });
    }
    
    // Close modal buttons
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
       // document.getElementById('addPhotoPreview').innerHTML = '';
    }
    
    if(closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
    if(cancelBtn) cancelBtn.addEventListener('click', closeModal);
    
    // Close modal when clicking outside
    if(modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }
    
    
    // ✅ FIXED PHOTO PREVIEW - Correct IDs
    const photoInput = document.getElementById('addPhoto');  // ← Correct ID
    const photoPreview = document.getElementById('addPhotoPreview');  // ← Correct ID
    
    if(photoInput && photoPreview) {
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Check file type
                if (!file.type.startsWith('image/')) {
                    alert('Please select an image file!');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    photoPreview.innerHTML = `
                        <img src="${e.target.result}" 
                             alt="Preview" 
                             style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 2px solid #e2e8f0;">
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                photoPreview.innerHTML = '';
            }
        });
    }
});
