document.addEventListener("DOMContentLoaded", () => {
    const preview = document.getElementById("burger-preview");
    //Estas variables controlan la posición vertical y el orden de apilado
    let botton = 0;
    let zIndex = 0;
    //Se definen las imagenes correspondientes a cada ingrediente
    const ingredientMap = {
        //El pan inferior sera siempre fijo
        panInferior: "pan_inferior.png",
        panSuperior: {
            "Clásico de hamburguesa": "pan_clasico.png",
            Brioche: "pan_brioche.png",
            Integral: "pan_integral.png",
            Centeno: "pan_centeno.png",
            Semillas: "pan_semillas.png",
        },
        Carne: {
            Ternera: "carne_ternera.png",
            "Vaca madurada": "carne_vacamadurada.png",
            Wagyu: "carne_wagyu.png",
            "Pollo crispy": "carne_pollo.png",
        },
        Quesos: {
            Cheddar: "queso_cheddar.png",
            Emmental: "queso_emmental.png",
            Gouda: "queso_gouda.png",
            Mozzarella: "queso_mozzarella.png",
            Roquefort: "queso_roquefort.png",
        },
        Verduras: {
            Lechuga: "lechuga.png",
            "Cebolla Caramelizada": "cebolla_caramelizada.png",
            "Cebolla Crispy": "cebolla_crispy.png",
            "Cebolla Morada": "cebolla_morada.png",
            "Tomate Frito": "tomate_frito.png"
        },
    };
    //Se seleccionan todos los ingredientes en checkboxes
    const checkboxes = document.querySelectorAll(".ingredient-checkbox");
    //Evento de cada checkbox para gestionar la selección y deselección
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", () => {
            //Si se selecciona un ingrediente, deseleccionamos los otros de la misma categoría
            if (checkbox.checked) {
                const category = checkbox.dataset.category;
                checkboxes.forEach((other) => {
                    if (other !== checkbox && other.dataset.category === category) {
                        other.checked = false;
                        //Se restaura el estilo visual de los no seleccionados
                        other.parentElement.querySelector('div').classList.remove('bg-blue-600', 'text-white', 'shadow-lg');
                        other.parentElement.querySelector('div').classList.add('bg-white', 'text-blue-800');
                    }
                });
            }
            //Actualiza el aspecto visual de la selección
            updateSelectionVisual();
            // Genera la nueva previsualización de la hamburguesa
            updatePreview();
        });
    });
    //Es función carga la hamburguesa en el área de previsualización
    function updatePreview() {
        //Se limpia el contenido anterior
        preview.innerHTML = "";
        let botton = 0;
        let zIndex = 1;

        // Pan inferior fijo
        const imgBase = document.createElement("img");
        imgBase.src = `/img/ingredients/${ingredientMap.panInferior}`;
        imgBase.style.position = "absolute";
        imgBase.style.left = "0";
        imgBase.style.right = "0";
        imgBase.style.margin = "auto";
        imgBase.style.bottom = `${botton}px`;
        imgBase.style.zIndex = zIndex;
        preview.appendChild(imgBase);
        //Ajusta la posición vertical para el siguiente ingrediente
        botton += 45;
        zIndex++;
        //Se obtienen los ingredientes seleccionados
        const selected = Array.from(checkboxes)
            .filter(c => c.checked)
            .map(c => ({ ingredient: c.dataset.ingredient, category: c.dataset.category }));
        //Se carga la imagen de los ingredientes intermedios
        selected.filter(i => i.category !== "Pan").forEach(({ ingredient, category }) => {
            const filename = ingredientMap[category]?.[ingredient];
            if (filename) {
                const img = document.createElement("img");
                img.src = `/img/ingredients/${filename}`;
                img.style.position = "absolute";
                img.style.left = "0";
                img.style.right = "0";
                img.style.margin = "auto";
                img.style.bottom = `${botton}px`;
                img.style.zIndex = zIndex;
                preview.appendChild(img);
                botton += 45;
                zIndex++;
            }
        });
        //Coloca el pan superior
        selected.filter(i => i.category === "Pan").forEach(({ ingredient }) => {
            const filename = ingredientMap.panSuperior[ingredient];
            if (filename) {
                const img = document.createElement("img");
                img.src = `/img/ingredients/${filename}`;
                img.style.position = "absolute";
                img.style.left = "0";
                img.style.right = "0";
                img.style.margin = "auto";
                img.style.bottom = `${botton}px`;
                img.style.zIndex = zIndex;
                preview.appendChild(img);
            }
        });
    }
    //Actualiza el aspecto de los botones seleccionados
    function updateSelectionVisual() {
        checkboxes.forEach((checkbox) => {
            const labelDiv = checkbox.parentElement.querySelector('div');
            if (checkbox.checked) {
                labelDiv.classList.remove('bg-white', 'text-blue-800');
                labelDiv.classList.add('bg-blue-600', 'text-white', 'shadow-lg');
            } else {
                labelDiv.classList.remove('bg-blue-600', 'text-white', 'shadow-lg');
                labelDiv.classList.add('bg-white', 'text-blue-800');
            }
        });
    }

});
