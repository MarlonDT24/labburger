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
                },
            });
        });
    }

    //Animaciones boton Realizar Pedido y Reservar Mesa
    const pedidoBtn = document.getElementById("btnPedido");
    if (pedidoBtn) {
        // Hover con sombreado alrrededor al pasar por encima
        pedidoBtn.addEventListener("mouseenter", () => {
            gsap.to(pedidoBtn, {
                boxShadow: "0 0 12px #0A199F",
                color: "#fff",
                duration: 0.1,
            });
        });

        // Hover con sombreado alrrededor al dejar de pasar por encima
        pedidoBtn.addEventListener("mouseleave", () => {
            gsap.to(pedidoBtn, {
                boxShadow: "0 0 0 transparent",
                color: "#D1D5DB",
                duration: 0.1,
            });
        });

        // Pulsación al hacer click
        pedidoBtn.addEventListener("click", () => {
            gsap.fromTo(
                pedidoBtn,
                { scale: 1 },
                {
                    scale: 0.92,
                    duration: 0.1,
                    yoyo: true,
                    repeat: 1,
                    ease: "power2.inOut",
                }
            );
        });
    }
    //Animaciones boton Reservar Mesa
    const reservaBtn = document.getElementById("btnReserva");
    if (reservaBtn) {
        reservaBtn.addEventListener("mouseenter", () => {
            gsap.to(reservaBtn, {
                color: "#fff",
                duration: 0.05,
            });
        });
        reservaBtn.addEventListener("mouseleave", () => {
            gsap.to(reservaBtn, {
                color: "#000",
                duration: 0.05,
            });
        });

        // Pulsación
        reservaBtn.addEventListener("click", () => {
            gsap.fromTo(
                reservaBtn,
                { scale: 1 },
                {
                    scale: 0.92,
                    duration: 0.1,
                    yoyo: true,
                    repeat: 1,
                    ease: "power2.inOut",
                }
            );
        });
    }

    // Efectos para Iniciar Sesión y Registrarse
    const loginLinks = document.querySelectorAll(".login-link");

    loginLinks.forEach(link => {
        // Hover de aumento de visibilidad
        link.addEventListener("mouseenter", () => {
            gsap.to(link, { color: "#1D4ED8", fontWeight: "bold", duration: 0.2 }); // azul fuerte
        });
        link.addEventListener("mouseleave", () => {
            gsap.to(link, { color: "#2563EB", fontWeight: "normal", duration: 0.2 }); // azul claro
        });

        // Efecto de onda al hacer clic
        link.addEventListener("click", e => {
            const ripple = document.createElement("span");
            const rect = link.getBoundingClientRect();
            const size = Math.max(link.offsetWidth, link.offsetHeight);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.className = "ripple-effect";
            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;

            link.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

});