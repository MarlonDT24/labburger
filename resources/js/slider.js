// slider.js
import { gsap } from "gsap";

// Los ingredientes flotantes siguen el movimiento del cursor
const slider = document.getElementById("slider");
const ingredients = document.querySelectorAll(".ingredient");

if (slider && ingredients.length > 0) {
    slider.addEventListener("mousemove", (e) => {
        const { width, height, left, top } = slider.getBoundingClientRect();
        const x = e.clientX - left;
        const y = e.clientY - top;

        ingredients.forEach((el, i) => {
            gsap.to(el, {
                x: (x - width / 2) * (0.03 + i * 0.01),
                y: (y - height / 2) * (0.03 + i * 0.01),
                ease: "power1.out",
                duration: 0.3,
            });
        });
    });
}


const slides = document.querySelectorAll(".slide");
const burgerButtons = document.querySelectorAll("#burger-steps .burger-btn");
const stepParts = document.querySelectorAll(".step-part");
let currentIndex = 0;
let autoInterval;

//Genera la enumeración del slider
function showSlide(index) {
    slides.forEach((slide, i) => {
        gsap.to(slide, {
            opacity: i === index ? 1 : 0,
            duration: 0.2,
            ease: "power2.out",
            onStart: () => {
                slide.style.pointerEvents = i === index ? "auto" : "none";
            }
        });
    });
    currentIndex = index;
    animateStep(index);
}

// Animación en la enumeración del slider
function animateStep(index) {
    stepParts.forEach((img, i) => {
        const active = i <= index;
        const isCurrent = i === index;

        if (active) {
            gsap.fromTo(img, {
                y: -40,
                scale: 0.8,
                rotation: -15,
                opacity: 0.1
            }, {
                y: 0,
                scale: isCurrent ? 1.3 : 1,
                rotation: 0,
                opacity: 1,
                duration: 0.3,
                ease: "back.out(1.7)"
            });
        } else {
            gsap.to(img, {
                opacity: 0.2,
                scale: 1,
                y: 0,
                duration: 0.3,
                ease: "power1.out"
            });
        }
    });
}

//Contado para que vaya pasando de sección cada 5 seg
function startAutoSlide() {
    clearInterval(autoInterval);
    autoInterval = setInterval(() => {
        const nextIndex = (currentIndex + 1) % slides.length;
        showSlide(nextIndex);
    }, 5000);
}

// Si el usuario hace click en alguna seccion del slider se reinicia el contador
burgerButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
        const targetIndex = parseInt(btn.getAttribute("data-go"));
        if (!isNaN(targetIndex)) {
            showSlide(targetIndex);
            startAutoSlide(); // Reiniciar el intervalo tras clic
        }
    });
});

showSlide(0);
startAutoSlide();
