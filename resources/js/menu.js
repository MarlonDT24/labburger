import gsap from "gsap";

// Variables
let productsContainer = document.querySelector("#productos-container"); // Contenedor de productos

function setEventClickCategory(buttonCategory, callback) {
    buttonCategory.addEventListener("click", (event) => callback(event));
}

/**
 *
 * @param string event
 */
async function handleClickCategory(event) {
    //console.log("Click en categoría:", event.currentTarget.dataset.name);
    const categoriaTitulo = document.getElementById("categoria-titulo");
    const categoryId = event.currentTarget.dataset.id;
    const categoryName = event.currentTarget.dataset.name;

    // Animación de cambio de categoría
    gsap.to(categoriaTitulo, {
        opacity: 0,
        y: -10,
        duration: 0.2,
        onComplete: () => {
            categoriaTitulo.textContent = categoryName;
            gsap.to(categoriaTitulo, {
                opacity: 1,
                y: 0,
                duration: 0.3,
            });
        },
    });

    await renderProducts(categoryId);
}

function handleClickEdit(event) {
    const cardId = event.currentTarget.dataset.id; // card_{product.id}
    const cardProduct = document.getElementById(cardId);
    if (!cardProduct) return;

    // Obtener el índice del hijo en el grid
    const index = Array.from(productsContainer.children).indexOf(cardProduct);
    // Obtener el id real del producto
    const productId = cardId.replace("card_", "");

    // Buscar el producto en la última lista renderizada Suponiendo que guardamos la última lista en window.lastProducts
    const product = (window.lastProducts || []).find((product) => String(product.id) === String(productId));
    if (!product) return;

    const originalHTML = cardProduct.outerHTML;
    // Eliminar la carta original
    productsContainer.removeChild(cardProduct);

    // Crear el nodo de edición
    const editCard = document.createElement("div");
    editCard.className = "bg-blue-800 p-4 rounded-lg shadow relative flex flex-col transition-transform duration-500 hover:scale-105";
    editCard.innerHTML = `
         <div class="flex flex-row gap-2">
            <button type="button" id="cancel-${product.id}" class="bg-red-600 text-white py-1 px-3 rounded-md text-sm cursor-pointer font-semibold hover:bg-red-700 transition">
                CANCELAR
            </button>
            <button type="submit" form="editForm" data-id=${`card_${product.id}`} class="edit-btn bg-green-600 text-white py-1 px-3 rounded-md text-sm cursor-pointer font-semibold hover:bg-green-700 transition">
                GUARDAR
            </button>
        </div>

        <form id="editForm" class="w-full flex flex-col" action="/products/${product.id}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="${document.querySelector('meta[name=csrf-token]').content}">

            <img src="${product.image}" alt="${product.name}" class="w-30 h-30 rounded-full mx-auto">

            <input name="name" value="${product.name}" class="mt-4 px-4 text-lg bg-neutral-800/40 rounded-md text-white font-bold font-techno glow-text text-center focus-visible:outline-none focus-visible:outline-1" />

            <input name="description" value="${product.description}" class="mt-4 px-4 text-md bg-neutral-800/40 rounded-md text-white font-bold text-center focus-visible:outline-none focus-visible:outline-1" />

            <input name="price" value="${product.price}" class="mt-4 px-4 text-md bg-neutral-800/40 rounded-md text-white font-bold text-center focus-visible:outline-none focus-visible:outline-1" />

            <input type="hidden" name="rating" value="${product.rating}">
        </form>
        <div class="bg-white px-2 rounded-lg absolute top-2 right-2 flex space-x-1 text-yellow-500">
            ${"★".repeat(product.rating)}${"☆".repeat(5 - product.rating)} ${product.rating}
        </div>
    `;

    // Se guarda la copia del producto original por si se cancela
    const cancelBtn = editCard.querySelector(`#cancel-${product.id}`);
    cancelBtn.addEventListener("click", () => {
        editCard.remove();
        const tempDiv = document.createElement("div");
        tempDiv.innerHTML = originalHTML;
        const restoredCard = tempDiv.firstElementChild;
        if (index >= productsContainer.children.length) {
            productsContainer.appendChild(restoredCard);
        } else {
            productsContainer.insertBefore(restoredCard, productsContainer.children[index]);
        }
        restoredCard.querySelector(".edit-btn")?.addEventListener("click", handleClickEdit);
    });

    // Insertar la carta de edición en la misma posición
    if (index >= productsContainer.children.length) {
        productsContainer.appendChild(editCard);
    } else {
        productsContainer.insertBefore(editCard, productsContainer.children[index]);
    }
}

// Evento para eliminar un producto
function handleClickDelete(event) {
    const productId = event.currentTarget.dataset.id;

    if (!confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        return;
    }

    fetch(`/products/${productId}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ _method: "DELETE" }),
    })
        .then((res) => {
            if (!res.ok) throw new Error("Error al eliminar producto");
            return res.json().catch(() => ({})); // Maneja respuesta vacía
        })
        .then(() => {
            // Recarga productos
            const activeCategoryId = document.querySelector(".category-btn.active")?.dataset.id || 6;
            renderProducts(activeCategoryId);
        })
        .catch((err) => {
            console.error(err);
            alert("Hubo un problema al eliminar el producto.");
        });
}

/**
 * Renderiza los productos de una categoría específica
 * @param Number categoryId
 */
async function renderProducts(categoryId) {
    const products = await getDataProducts(categoryId);
    window.lastProducts = products;

    if (products.length === 0) {
        renderNotFoundProducts();
        return;
    }

    productsContainer.innerHTML = ""; // Limpiar el contenedor de productos

    products.forEach((product) => {
        // Esta vista es para los clientes
        if (!window.isAdmin) {
            productsContainer.innerHTML += `
                <div class="bg-blue-800 p-4 rounded-lg shadow relative flex flex-col transition-transform duration-500 hover:scale-105">
                    <img src="${product.image}" alt="${product.name}" class="w-30 h-30 rounded-full mx-auto">
                    <h4 class="mt-4 text-lg text-white font-bold text-center font-techno glow-text">
                        ${product.name}
                    </h4>
                    <p class="text-sm text-gray-400 font-bold text-center">
                        ${product.description ?? ""}
                    </p>
                    <div class="text-center mt-2 text-white font-bold">
                        ${product.price}€
                    </div>
                    <div class="flex justify-center mt-2">
                        <button class="bg-white text-blue-700 py-3 px-5 rounded-full text-sm font-bold hover:bg-gray-400 transition">
                            PEDIR AHORA
                        </button>
                    </div>
                    <div class="bg-white px-2 rounded-lg absolute top-2 right-2 flex space-x-1 text-yellow-500">
                        ${"★".repeat(product.rating)}${"☆".repeat(5 - product.rating)}
                        ${product.rating}
                    </div>
                </div>
            `;

            return;
        }
        //  Esta vista es para los administradores
        productsContainer.innerHTML += `
            <div id=${`card_${product.id}`} class="bg-blue-800 p-4 rounded-lg shadow relative flex flex-col transition-transform duration-500 hover:scale-105">
                <div class="flex flex-row gap-2">
                    <button type="button" data-id="${product.id}" class="delete-btn bg-red-600 text-white py-1 px-3 rounded-md text-sm cursor-pointer font-semibold hover:bg-red-700 transition">
                        ✕
                    </button>
                    <button type="button" data-id=${`card_${product.id}`} class="edit-btn bg-yellow-600 text-white py-1 px-3 rounded-md text-sm cursor-pointer font-semibold hover:bg-yellow-700 transition">
                        EDITAR
                    </button>
                </div>

                <img src="${product.image}" alt="${product.name}" class="w-30 h-30 rounded-full mx-auto">
                <h4 class="mt-4 text-lg text-white font-bold text-center font-techno glow-text">
                    ${product.name}
                </h4>
                <p class="text-sm text-gray-400 font-bold text-center">
                    ${product.description ?? ""}
                </p>
                <div class="text-center mt-2 text-white font-bold">
                    ${product.price}€
                </div>

                <div class="flex justify-center mt-2">
                    <button class="bg-white text-blue-700 py-3 px-5 rounded-full text-sm font-bold hover:bg-gray-400 transition">
                    PEDIR AHORA
                    </button>
                </div>

                <div class="bg-white px-2 rounded-lg absolute top-2 right-2 flex space-x-1 text-yellow-500">
                    ${"★".repeat(product.rating)}${"☆".repeat(5 - product.rating)} ${product.rating}
                </div>
            </div>
        `;
    });

    // Establece un evento a los botones de editar si es admin
    if (window.isAdmin) {
        const editButtons = productsContainer.querySelectorAll(".edit-btn");
        const deleteButtons = productsContainer.querySelectorAll(".delete-btn");
        editButtons.forEach((btn) => {
            btn.addEventListener("click", handleClickEdit);
        });
        deleteButtons.forEach((btn) => {
            btn.addEventListener("click", handleClickDelete);
        });
    }
}

/**
 * Renderiza un mensaje de error si no se encuentran productos
 */
function renderNotFoundProducts() {
    productsContainer.classList.remove("grid");
    productsContainer.innerHTML = `
        <div class="text-center w-full flex flex-col items-center justify-center">
            <h2 class="text-2xl font-bold">No se encontraron productos</h2>
            <p class="text-gray-500">Intenta con otra categoría.</p>
        </div>
    `;
}

/**
 * Obtiene los productos de una categoría específica de la API
 * @returns Number categoriaId
 */
async function getDataProducts(categoryId) {
    return await fetch(`/api/products-by-category/${categoryId}`)
        .then((response) => response.json())
        .then((data) => {
            return data;
        })
        .catch((error) => {
            console.error("Error fetching products:", error);
            return null;
        });
}

function render() {
    const categoriesButtons = document.querySelectorAll(`.category-btn`);

    categoriesButtons.forEach((button) => {
        setEventClickCategory(button, handleClickCategory);
    });

    const toggleBtn = document.getElementById("toggle-form-btn");
    toggleBtn?.addEventListener("click", () => {
        const form = document.getElementById("product-form");
        form.classList.toggle("hidden");
    });

    renderProducts(6); // Renderizar productos de la primera categoría al cargar
}

document.addEventListener("DOMContentLoaded", render);
