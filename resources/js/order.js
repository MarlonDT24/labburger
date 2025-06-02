document.addEventListener("DOMContentLoaded", function () {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");
    const searchInput = document.getElementById("product-search");

    //Evento para el botón de "Realizar Pedido" si hay productos en el carrito
    document.querySelector('a[href$="checkout"]')?.addEventListener('click', function (e) {
    if (cart.length === 0) return; // no hagas nada si no hay productos

    e.preventDefault(); // evita que navegue aún

    // Envía el carrito al servidor
    fetch('/api/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ cart })
        }).then(res => {
            if (res.ok) {
                window.location.href = this.href;
            }
        });
    });

    // Carrito de productos
    function renderCart() {
        cartItemsContainer.innerHTML = "";
        let total = 0;
        //Renderiza la información del carrito
        cart.forEach((item) => {
            const li = document.createElement("li");
            li.className = "flex justify-between items-center bg-white px-4 py-2 rounded shadow";
            li.innerHTML = `
                        <div class="w-full">
                            <div class="flex justify-between">
                                <span class="font-semibold">${item.name}</span>
                                <button class="remove-item text-red-600" data-id="${item.id}" title="Eliminar">🗑️</button>
                            </div>
                            <div class="flex justify-between text-sm text-gray-700 mt-1">
                                <span>Cantidad: ${item.quantity}</span>
                                <span>${(item.price * item.quantity).toFixed(2)} €</span>
                            </div>
                        </div>
                `;
            cartItemsContainer.appendChild(li);
            total += item.price * item.quantity;
        });
        cartTotal.textContent = total.toFixed(2) + " €";
    }

    // Añadir productos al carrito
    function addToCart(productId, name, price, image) {
        const existingItem = cart.find((p) => p.id === productId);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ id: productId, name, price, quantity: 1, image });
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        renderCart();
    }

    // Borra el producto del carrito
    function removeFromCart(productId) {
        const index = cart.findIndex((item) => item.id === productId);
        if (index !== -1) {
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            renderCart();
        }
    }

    document.querySelectorAll(".add-to-cart-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
        const productId = parseInt(btn.dataset.id);
        const card = btn.closest(".bg-white");
        const name = card.querySelector("h3").textContent;
        const price = parseFloat(card.querySelector(".text-blue-700").textContent.replace("€", ""));
        const image = card.querySelector("img").getAttribute("src");

        addToCart(productId, name, price, image);

        // Animación: clonar imagen y mover al carrito
        const img = card.querySelector("img").cloneNode(true);
        const rect = card.querySelector("img").getBoundingClientRect();
        img.style.position = "fixed";
        img.style.top = rect.top + "px";
        img.style.left = rect.left + "px";
        img.style.width = "80px";
        img.style.height = "80px";
        img.style.zIndex = 9999;
        img.style.transition = "transform 0.7s ease-in-out, opacity 0.7s";

        document.body.appendChild(img);

        // destino: top-right del carrito (ajusta si es necesario)
        const target = document.querySelector("#cart-items")?.getBoundingClientRect();
        const x = target?.left ?? 0;
        const y = target?.top ?? 0;

        setTimeout(() => {
            img.style.transform = `translate(${x - rect.left}px, ${y - rect.top}px) scale(0.1)`;
            img.style.opacity = "0";
        }, 20);

        setTimeout(() => {
            img.remove();
        }, 800);
    });
});

    // Eliminar del carrito al pulsar la basurita
    cartItemsContainer.addEventListener("click", (e) => {
        if (e.target.classList.contains("remove-item")) {
            const id = parseInt(e.target.dataset.id);
            removeFromCart(id);
        }
    });

    // Busca el producto en especifico
    searchInput?.addEventListener("input", function () {
        const query = this.value.toLowerCase();
        const products = document.querySelectorAll("#products-grid h3");

        for (const product of products) {
            if (product.textContent.toLowerCase().includes(query)) {
                const container = product.closest("div[id^='cat-']");
                container?.scrollIntoView({ behavior: "smooth", block: "start" });

                product.classList.add("bg-yellow-100");
                setTimeout(() => product.classList.remove("bg-yellow-100"), 1000);
                break;
            }
        }
    });
    // Resaltar categoría activa mientras se hace scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id')?.replace('cat-', '');
                const link = document.querySelector(`#category-index a[data-id="${id}"]`);
                if (link) {
                    document.querySelectorAll('#category-index a').forEach(a => {
                        a.classList.remove('bg-blue-700', 'text-white', 'rounded');
                        a.classList.add('text-blue-700');
                    });
                    link.classList.add('bg-blue-700', 'text-white', 'rounded');
                    link.classList.remove('text-blue-700');
                }
            }
        });
    }, {
    threshold: 0.4
    });

    document.querySelectorAll("[id^='cat-']").forEach(section => observer.observe(section));

    renderCart();
});
