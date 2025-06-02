import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener("DOMContentLoaded", () => {
    // Inicializa Swiper para el slider de colaboradores
    const swiper = new Swiper('#collaborator-slider', {
        slidesPerView: 3,
        spaceBetween: 50,
        loop: true,
        autoplay: {
            delay: 0,  // sin pausa
            disableOnInteraction: false,
        },
        speed: 5000,  // velocidad de desplazamiento continuo
        freeMode: true,  // para scroll continuo y fluido
        freeModeMomentum: false,
        grabCursor: true,
    });

    // Aplica el blur-in cuando entra la sección
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelectorAll('.collab-card').forEach(card => {
                    card.classList.add('blur-in');
                });
            }
        });
    });

    observer.observe(document.getElementById("collaborator-slider"));
});
