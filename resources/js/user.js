document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.getElementById("editBtn");
    const saveBtnContainer = document.getElementById("saveBtnContainer");
    const inputs = document.querySelectorAll("#profileForm input");
    const avatarEditIcon = document.getElementById("avatarEditIcon");

    editBtn.addEventListener("click", () => {
        inputs.forEach(input => {
            input.removeAttribute("disabled");
            input.classList.add("bg-white", "ring", "ring-blue-200", "focus:ring-4");
        });
        saveBtnContainer.classList.remove("hidden");
        editBtn.classList.add("hidden");

        // Se muestra el icono de edición del avatar al hacer clic en editar
        avatarEditIcon.classList.remove("hidden");
        avatarEditIcon.classList.add("animate-fade-in");
    });
});
