import { gsap } from "gsap";

document.addEventListener("DOMContentLoaded", () => {
    const categoriaTitulo = document.getElementById("categoria-titulo");
    const container = document.getElementById("productos-container");

    document.querySelectorAll(".category-btn").forEach(button => {
        button.addEventListener("click", async () => {
            const categoryId = button.dataset.id;
            const categoryName = button.dataset.name;

            // Cambiar título con efecto
            gsap.to(categoriaTitulo, {
                opacity: 0,
                y: -10,
                duration: 0.2,
                onComplete: () => {
                    categoriaTitulo.textContent = categoryName;
                    gsap.to(categoriaTitulo, {
                        opacity: 1,
                        y: 0,
                        duration: 0.3
                    });
                }
            });

            // Obtener productos de la categoría
            try {
                const response = await fetch(`/api/products-by-category/${categoryId}`);
                const productos = await response.json();

                // Animación de salida
                gsap.to(container, {
                    opacity: 0,
                    x: -50,
                    duration: 0.3,
                    onComplete: () => {
                        // Limpiar y agregar nuevos productos
                        container.innerHTML = "";

                        productos.forEach(producto => {
                            container.innerHTML += `
                                <div class="bg-blue-600 p-4 rounded-lg shadow relative transition-transform duration-500 hover:scale-105">
                                    <img src="${producto.image}" alt="${producto.name}" class="w-20 h-20 rounded-full mx-auto">
                                    <h4 class="mt-4 text-lg text-white font-bold text-center font-techno">${producto.name}</h4>
                                    <p class="text-sm text-black text-center">${producto.description ?? ''}</p>
                                    <div class="text-center mt-2 text-red-600 font-bold">${producto.price}€</div>
                                    <div class="flex justify-center mt-2">
                                        <button class="bg-rose-600 text-white py-1 px-3 rounded-full text-sm hover:bg-rose-700 transition">PEDIR AHORA</button>
                                    </div>
                                    <div class="text-center mt-3 text-yellow-500">
                                        ★★★★☆ <span class="text-sm text-gray-600">(${producto.rating ?? 0} valoraciones)</span>
                                    </div>
                                </div>
                            `;
                        });

                        // Animación de entrada
                        gsap.fromTo(container,
                            { opacity: 0, x: 50 },
                            { opacity: 1, x: 0, duration: 0.4, ease: "power2.out" }
                        );
                    }
                });
            } catch (error) {
                console.error("Error cargando productos:", error);
            }
        });
    });
    //Con el ?.click aparece automaticamente la primera categoria
    document.querySelector(".category-btn")?.click();
});
