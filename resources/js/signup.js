document.addEventListener('DOMContentLoaded', () => {

    const card = document.getElementById('signup-card');
    if (card) {
        card.classList.remove('opacity-0', 'translate-y-10');
    }

    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
        });
    }

    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    if (togglePasswordConfirm && passwordConfirmInput) {
        togglePasswordConfirm.addEventListener('click', () => {
            const type = passwordConfirmInput.type === 'password' ? 'text' : 'password';
            passwordConfirmInput.type = type;
            togglePasswordConfirm.textContent = type === 'password' ? '👁️' : '🙈';
        });
    }



    // Activar VANTA
    if (typeof VANTA !== "undefined") {
    VANTA.WAVES({
        el: "#vanta-bg",
        mouseControls: true,
        touchControls: true,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00,
        color: 0x0a199f,
        shininess: 50.00,
        waveHeight: 20.00,
        waveSpeed: 1.5,
        zoom: 0.75
    });
    }
});
