import { gsap } from "gsap";

const carousel = document.getElementById("carousel-inner");
const cards = carousel.querySelectorAll(".review-card");
const total = cards.length;
const radius = 360 / total;
let currentIndex = 0;

// Posicionar cada card en círculo
cards.forEach((card, i) => {
    const angle = i * radius;
    gsap.set(card, {
        rotateY: angle,
        transformOrigin: "50% 50% " + -400 + "px",
        transformPerspective: 1000,
    });
});

// Función para rotar el carrusel
function updateCarousel(index) {
    const angle = -index * radius;
    gsap.to(carousel, {
        rotateY: angle,
        duration: 1.2,
        ease: "power2.inOut",
        transformPerspective: 1000
    });
}

// Auto-giro cada 6 segundos
setInterval(() => {
    currentIndex = (currentIndex + 1) % total;
    updateCarousel(currentIndex);
}, 6000);

// Iniciar en la posición 0
updateCarousel(0);