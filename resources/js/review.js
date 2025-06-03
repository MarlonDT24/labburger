import { gsap } from "gsap";

document.addEventListener("DOMContentLoaded", () => {
    // Animación normal del bloque de reviews general (homeSections.reviews)
    const container = document.getElementById("carousel-inner");
    if (container) {
        const cards = container.querySelectorAll(".review-card");
        if (cards.length > 0) {
            const cardHeight = cards[0].offsetHeight + 24;
            const total = cards.length;
            let current = 0;

            function moveNext() {
                current = (current + 1) % total;
                gsap.to(container, {
                    y: -current * cardHeight,
                    duration: 1.2,
                    ease: "power2.inOut"
                });
            }

            setInterval(moveNext, 4000);
        }
    }

    // Animación avanzada solo cuando el Slide 4 es visible (homeSections.slider)
    const slider4Wrapper = document.getElementById("slider4-reviews-wrapper");
    const slider4 = document.getElementById("slider4-reviews");

    if (slider4 && slider4Wrapper) {
        const cards4 = slider4.querySelectorAll(".review-card");
        if (cards4.length > 0) {
            const cardHeight4 = cards4[0].offsetHeight + 24;
            const total4 = cards4.length;
            let current4 = 0;
            let intervalId = null;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (!intervalId) {
                            intervalId = setInterval(() => {
                                if (current4 < total4 - 1) {
                                    current4++;
                                } else {
                                    current4 = 0;
                                }
                                gsap.to(slider4, {
                                    y: -current4 * cardHeight4,
                                    duration: 1.2,
                                    ease: "power2.inOut"
                                });
                            }, 4000);
                        }
                    } else {
                        clearInterval(intervalId);
                        intervalId = null;
                        gsap.to(slider4, { y: 0, duration: 0.5 });
                        current4 = 0;
                    }
                });
            }, { threshold: 0.5 });

            observer.observe(slider4Wrapper);
        }
    }
});
