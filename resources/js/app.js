import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    // Seccion Slider
    const toggleBtn = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');

    toggleBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });

    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let index = 0;

    function showSlide(i) {
        slides.forEach((slide, idx) => {
            slide.classList.toggle('opacity-100', idx === i);
            slide.classList.toggle('opacity-0', idx !== i);
            slide.classList.toggle('active', idx === i);
        });
        index = i;
    }

    function nextSlide() {
        showSlide((index + 1) % slides.length);
    }

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            const i = parseInt(dot.dataset.go);
            showSlide(i);
        });
    });

    setInterval(nextSlide, 4000);

    // Seccion Populares
    const burgers = [
        {
            img: "/images/popular1.png",
            price: "8,50 €",
            info: "Pan brioche, doble carne, cheddar y salsa secreta",
            tags: ["frescura.png", "delicioso.png", "precio.png"],
            reviews: [
                "Marta: \"La combinación de la carne con el queso pesto y la miel es brutal\"",
                "Carlos: \"La más jugosa que he probado en años, simplemente deliciosa.\"",
                "Lucía: \"Me encantó la mezcla dulce-salada, repetí dos veces.\""
            ]
        },
        {
            img: "/images/popular2.png",
            price: "9,20 €",
            info: "Pan de ajo, triple queso, cebolla crujiente y barbacoa",
            tags: ["sabrosa.png", "crujiente.png", "picante.png"],
            reviews: [
                "Pedro: \"Barbacoa intensa y pan de ajo espectacular\"",
                "Ana: \"El crujido de la cebolla me encantó\"",
                "Luis: \"Perfecta para los amantes del queso\""
            ]
        }
    ];

    let burgerIndex = 0;
    let reviewIndex = 0;

    const burgerImage = document.getElementById('burgerImage');
    const burgerPrice = document.getElementById('burgerPrice');
    const burgerInfo = document.getElementById('burgerInfo');
    const burgerTags = document.getElementById('burgerTags');
    const reviewSlider = document.getElementById('reviewSlider');
    const nextReview = document.getElementById('nextReview');

    function loadBurger(index) {
        const burger = burgers[index];
        burgerImage.classList.remove('fade-scale-in');
        burgerImage.classList.add('fade-scale-out');

        setTimeout(() => {
            burgerImage.src = burger.img;
            burgerPrice.textContent = burger.price;
            burgerInfo.textContent = burger.info;
            burgerTags.innerHTML = burger.tags.map(tag => `<img src="/images/${tag}" class="h-10">`).join('');
            reviewSlider.innerHTML = burger.reviews.map(text => `<div class='review block p-4 bg-gray-700 rounded mb-4'>${text}</div>`).join('');
            reviewIndex = 0;

            burgerImage.classList.remove('fade-scale-out');
            burgerImage.classList.add('fade-scale-in');
        }, 200);
    }

    document.getElementById('nextBurger').addEventListener('click', () => {
        burgerIndex = (burgerIndex + 1) % burgers.length;
        loadBurger(burgerIndex);
    });

    document.getElementById('prevBurger').addEventListener('click', () => {
        burgerIndex = (burgerIndex - 1 + burgers.length) % burgers.length;
        loadBurger(burgerIndex);
    });

    nextReview.addEventListener('click', () => {
        const reviews = document.querySelectorAll('.review');
        if (reviewIndex < reviews.length - 1) {
            reviewIndex++;
            reviewSlider.style.marginTop = `-${reviewIndex * 9}rem`;
        } else {
            reviewIndex = 0;
            reviewSlider.style.marginTop = `0`;
        }
    });

    setInterval(() => {
        burgerIndex = (burgerIndex + 1) % burgers.length;
        loadBurger(burgerIndex);
    }, 10000);

    loadBurger(0);
});
