document.addEventListener("DOMContentLoaded", function () {
    const sliderContainer = document.querySelector(".slider-container");
    const prevButton = document.querySelector("#prev-button");
    const nextButton = document.querySelector("#next-button");
  
    let currentIndex = 0;
    const interval = 4000;
    let autoSlideInterval;
  
    prevButton.addEventListener("click", () => {
      if (currentIndex > 0) {
        currentIndex--;
        updateSlider();
      }
    });
  
    nextButton.addEventListener("click", () => {
      const totalImages = document.querySelectorAll(".slider-image").length;
      if (currentIndex < totalImages - 1) {
        currentIndex++;
        updateSlider();
      } else {
        currentIndex = 0;
        updateSlider();
      }
    });
  
    function updateSlider() {
      const translateXValue = `translateX(-${currentIndex * 100}%)`;
      sliderContainer.style.transform = translateXValue;
    }
  
    function autoSlide() {
      autoSlideInterval = setInterval(() => {
        const totalImages = document.querySelectorAll(".slider-image").length;
        currentIndex = (currentIndex + 1) % totalImages;
        updateSlider();
      }, interval);
    }
  
    autoSlide();
  
    sliderContainer.addEventListener("mouseenter", () => {
      clearInterval(autoSlideInterval);
    });
  
    sliderContainer.addEventListener("mouseleave", () => {
      autoSlide();
    });
  });
  
  

function toggleMenu() {
    const menu = document.querySelector('.menu');
    const menuIcon = document.querySelector('.menu-icon');

    menu.classList.toggle('active');
    menuIcon.classList.toggle('active');
}


document.getElementById('menu-toggle').addEventListener('click', function() {
    var nav = document.querySelector('nav ul');
    nav.classList.toggle('active');
});
