import { gsap } from "gsap";

// Efecto de entrada para los enlaces del navbar
document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll("#nav-menu a");

    gsap.from(navLinks, {
        opacity: 0,
        y: -20,
        stagger: 0.1,
        duration: 0.8,
        ease: "power3.out"
    });

    // Hover individual con animación de escala
    navLinks.forEach(link => {
        link.addEventListener("mouseenter", () => {
            gsap.to(link, { scale: 1.1, duration: 0.2 });
        });
        link.addEventListener("mouseleave", () => {
            gsap.to(link, { scale: 1.0, duration: 0.2 });
        });
    });
});
