document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider-wrapper");
    const prevButton = document.querySelector("#prev-button");
    const nextButton = document.querySelector("#next-button");

    let currentIndex = 0;
    const interval = 4000; // Cambia esto para ajustar la velocidad de cambio de imagen (en milisegundos)
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
            // Si estamos en la última imagen, regresa a la primera
            currentIndex = 0;
            updateSlider();
        }
    });

    function updateSlider() {
        const translateXValue = `translateX(-${currentIndex * 100}%)`;
        slider.style.transform = translateXValue;
    }

    // Función para mover automáticamente las imágenes
    function autoSlide() {
        autoSlideInterval = setInterval(() => {
            const totalImages = document.querySelectorAll(".slider-image").length;
            currentIndex = (currentIndex + 1) % totalImages;
            updateSlider();
        }, interval);
    }

    // Inicia el movimiento automático al cargar la página
    autoSlide();

    // Detiene el movimiento automático al pasar el ratón sobre el slider
    slider.addEventListener("mouseenter", () => {
        clearInterval(autoSlideInterval);
    });

    // Reanuda el movimiento automático al retirar el ratón del slider
    slider.addEventListener("mouseleave", () => {
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
