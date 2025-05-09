// Mostrar/ocultar alérgenos
document.querySelectorAll('.allergen-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const info = btn.nextElementSibling;
        info.classList.toggle('hidden');
    });
});

// Auto slider
let offset = 0;
const slider = document.querySelector('.slider-track');
setInterval(() => {
    offset -= 300;
    if (Math.abs(offset) > slider.scrollWidth - slider.clientWidth) offset = 0;
    slider.style.transform = `translateX(${offset}px)`;
}, 4000);

// Cambiar categoría (solo estructura, lo conectarás con PHP después)
document.querySelectorAll('.category-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const categoria = btn.dataset.category;
        document.getElementById('categoria-titulo').textContent = categoria.charAt(0).toUpperCase() + categoria.slice(1);
        // Aquí puedes luego cargar vía AJAX o cambiar datos PHP
    });
});