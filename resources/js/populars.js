import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    let burgers = document.querySelectorAll(".burger-slide");
    let reviewsGroups = document.querySelectorAll(".review-group");
    let currentBurger = 0;
    let burgerInterval;
    let reviewIntervals = [];

    function showBurger(index) {
        burgers.forEach((slide, i) => {
            slide.style.opacity = (i === index) ? "1" : "0";
            slide.style.zIndex = (i === index) ? "10" : "0";
        });

        reviewsGroups.forEach((group, i) => {
            group.style.opacity = (i === index) ? "1" : "0";
            group.style.zIndex = (i === index) ? "10" : "0";
        });

        // Detener todos los intervalos de reviews anteriores
        reviewIntervals.forEach(clearInterval);
        reviewIntervals = [];

        startReviewSlider(index);
    }

    function nextBurger() {
        currentBurger = (currentBurger + 1) % burgers.length;
        showBurger(currentBurger);
    }

    document.getElementById("nextBurger").addEventListener("click", () => {
        nextBurger();
        resetInterval();
    });

    document.getElementById("prevBurger").addEventListener("click", () => {
        currentBurger = (currentBurger - 1 + burgers.length) % burgers.length;
        showBurger(currentBurger);
        resetInterval();
    });

    function startInterval() {
        burgerInterval = setInterval(nextBurger, 7000);
    }

    function resetInterval() {
        clearInterval(burgerInterval);
        startInterval();
    }

    // MINI SLIDER de Reviews por cada hamburguesa
    function startReviewSlider(index) {
        const group = reviewsGroups[index];
        const reviewSlides = group.querySelectorAll(".review-slide");
        let currentReview = 0;

        function showReview(idx) {
            reviewSlides.forEach((s, i) => {
                s.style.opacity = (i === idx) ? "1" : "0";
                s.style.zIndex = (i === idx) ? "10" : "0";
            });
        }

        showReview(0);

        // Intervalo automático de reviews
        let reviewInterval = setInterval(() => {
            currentReview = (currentReview + 1) % reviewSlides.length;
            showReview(currentReview);
        }, 4000);
        reviewIntervals.push(reviewInterval);

        // Botón manual para cambiar review
        const nextReviewBtn = group.querySelector(".next-review");
        if (nextReviewBtn) {
            nextReviewBtn.addEventListener("click", () => {
                currentReview = (currentReview + 1) % reviewSlides.length;
                showReview(currentReview);
                // Reiniciar el intervalo automático para evitar que avance justo después de hacer click
                clearInterval(reviewInterval);
                reviewInterval = setInterval(() => {
                    currentReview = (currentReview + 1) % reviewSlides.length;
                    showReview(currentReview);
                }, 4000);
            });
        }
    }

    showBurger(0);
    startInterval();
});
