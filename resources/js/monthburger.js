document.addEventListener("DOMContentLoaded", () => {
    const preview = document.getElementById("burger-preview");

    const ingredientMap = {
        // Panes
        'Clásico de hamburguesa': 'pan_clasico.png',
        'Brioche': 'pan_brioche.png',
        'Integral': 'pan_integral.png',
        'Centeno': 'pan_centeno.png',
        'Semillas': 'pan_semillas.png',
        'Pan inferior': 'pan_inferior.png',

        // Carnes
        'Ternera': 'carne_ternera.png',
        'Vaca madurada': 'carne_vacamadurada.png',
        'Wagyu': 'carne_wagyu.png',
        'Pollo crispy': 'carne_pollo.png',

        // Quesos
        'Cheddar': 'queso_cheddar.png',
        'Emmental': 'queso_emmental.png',
        'Gouda': 'queso_gouda.png',
        'Mozzarella': 'queso_mozzarella.png',
        'Roquefort': 'queso_roquefort.png',

        // Verduras
        'Lechuga': 'lechuga.png',
        'Tomate Frito': 'tomate_frito.png',
        'Cebolla Caramelizada': 'cebolla_caramelizada.png',
        'Cebolla Crispy': 'cebolla_crispy.png',
        'Cebolla Morada': 'cebolla_morada.png',
        'Cebolla Encurtida': 'cebolla_encurtida.png',
        'Pepinillo': 'pepinillo.png',
        'Espinaca': 'espinaca.png',
        'Aguacate': 'aguacate.png',
        'Jalapeños': 'jalapenos.png',
        'Coleslaw': 'coleslaw.png',

        // Salsas
        'Salsa Labb': 'salsa_labb.png',
        'Salsa Korean': 'salsa_korean.png',
        'Salsa Mayolab': 'salsa_mayolab.png',
        'Salsa Mayolab Romero': 'salsa_mayolab_romero.png',
        'Salsa BBQ': 'salsa_bbq.png',
        'Salsa Trufada': 'salsa_trufada.png',
        'Salsa al Whisky': 'salsa_whisky.png',

        // Condimentos
        'Albahaca': 'albahaca.png',
        'Limón': 'limon.png',
        'Pimienta Negra': 'pimienta_negra.png',
        'Miel': 'miel.png',
    };

    const checkboxes = document.querySelectorAll('.ingredient-checkbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            updatePreview();
        });
    });

    function updatePreview() {
        preview.innerHTML = ''; // Limpiamos el div de la preview

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const ingredient = checkbox.dataset.ingredient;
                const filename = ingredientMap[ingredient];
                if (filename) {
                    const img = document.createElement('img');
                    img.src = `/img/ingredients/${filename}`;
                    img.classList.add('absolute', 'w-full');
                    preview.appendChild(img);
                }
            }
        });
    }
});
