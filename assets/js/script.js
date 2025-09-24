// Code for carousel 
let currentImageIndex = 0;
const images = document.querySelectorAll('.carousel img');
const imageCount = images.length;

function showNextImage() {
    images[currentImageIndex].style.display = 'none';
    currentImageIndex = (currentImageIndex + 1) % imageCount;
    images[currentImageIndex].style.display = 'block';
}

setInterval(showNextImage, 3000);
