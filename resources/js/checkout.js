document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById('payment-fields');
    const radios = document.querySelectorAll('input[name="payment_method"]');

    const renderFields = (method) => {
        container.innerHTML = ''; // limpiar campos

        if (method === 'credit_card') {
            container.innerHTML = `
                <input type="text" name="card_number" placeholder="Número de tarjeta (16 dígitos)" class="input-style" maxlength="16" required>
                <div class="grid md:grid-cols-2 gap-4">
                    <input type="text" name="card_name" placeholder="Nombre del titular" class="input-style" required>
                    <input type="text" name="card_expiration" placeholder="Fecha de caducidad (MM/AA)" class="input-style" required>
                </div>
                <input type="text" name="card_cvc" placeholder="Código CVC (3 dígitos)" class="input-style" maxlength="3" required>
            `;
        } else if (method === 'paypal') {
            container.innerHTML = `
                <input type="email" name="paypal_email" placeholder="Correo de PayPal" class="input-style" required>
            `;
        } else if (method === 'bank') {
            container.innerHTML = `
                <input type="text" name="bank_owner" placeholder="Titular de la cuenta" class="input-style" required>
                <input type="text" name="bank_iban" placeholder="IBAN (ESxx xxxx xxxx xxxx xxxx xxxx)" class="input-style" maxlength="22" required>
            `;
        }
    };

    // Por defecto
    renderFields('credit_card');

    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            renderFields(radio.value);
        });
    });

    // Errores para el metodo de pago
    if (typeof serverErrors !== "undefined") {
        for (const [field, messages] of Object.entries(serverErrors)) {
            const input = document.querySelector(`[name="${field}"]`);
            if (input) {
                input.classList.add('border-red-500');
            }
        }
    }
});
