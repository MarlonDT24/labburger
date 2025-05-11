import { gsap } from "gsap";

// Efecto de entrada para los enlaces del navbar
document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll("#nav-menu a");

    // Animación de entrada para las secciones
    gsap.from(navLinks, {
        opacity: 0,
        y: -20,
        stagger: 0.1,
        duration: 0.8,
        ease: "power3.out",
    });
    // Hover de aumento de tamaño de letras de las secciones
    navLinks.forEach((link) => {
        link.addEventListener("mouseenter", () => {
            gsap.to(link, { scale: 1.1, duration: 0.2 });
        });
        link.addEventListener("mouseleave", () => {
            gsap.to(link, { scale: 1.0, duration: 0.2 });
        });
    });

    // Animación de logo flotante
    gsap.to("#logoContainer", {
        y: -9,
        repeat: -1,
        yoyo: true,
        duration: 2.0,
        ease: "sine.inOut",
    });

    // Animación de teletransporte para el logo
    const logo = document.getElementById("logoContainer");
    if (logo) {
        logo.addEventListener("click", () => {
            gsap.to(logo, {
                boxShadow: "0 0 50px #0ff",
                scale: 1.4,
                opacity: 0,
                duration: 0.6,
                ease: "expo.in",
                onComplete: () => {
                    window.location.href = "/";
                }
            });
        });
    }


});
