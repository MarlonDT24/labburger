// Animación al cargar
window.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('login-card');
    card.classList.remove('opacity-0', 'translate-y-10');
});

// Mostrar/Ocultar contraseña
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');

togglePassword.addEventListener('click', () => {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
});
