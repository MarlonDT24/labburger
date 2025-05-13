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

// Enumeración: formar hamburguesa
const dots = document.querySelectorAll(".dot");
const slides = document.querySelectorAll(".slide");
let currentIndex = 0;

function showSlide(index) {
  slides.forEach((slide, i) => {
    gsap.to(slide, {
      opacity: i === index ? 1 : 0,
      duration: 0.8,
      ease: "power2.out",
      pointerEvents: i === index ? "auto" : "none"
    });
  });
  currentIndex = index;
  animateStep(index);
}

// Animación tipo "hamburguesa que se arma"
function animateStep(index) {
  const dot = dots[index];
  if (dot) {
    gsap.fromTo(dot, {
      scale: 0.5,
      opacity: 0.2
    }, {
      scale: 1.2,
      opacity: 1,
      duration: 0.4,
      ease: "back.out(1.7)"
    });
  }
}

// Dot click handler
dots.forEach((dot) => {
  dot.addEventListener("click", () => {
    const targetIndex = parseInt(dot.getAttribute("data-go"));
    if (!isNaN(targetIndex)) {
      showSlide(targetIndex);
    }
  });
});

// Auto inicial
showSlide(0);
