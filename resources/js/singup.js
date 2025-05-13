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

    const form = document.getElementById('signup-form');
    if (form) {
        form.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                if (input.value.trim().length > 1) {
                    input.classList.add('border-green-500');
                    input.classList.remove('border-red-500');
                } else {
                    input.classList.remove('border-green-500');
                    input.classList.add('border-red-500');
                }
            });
        });
    }
});