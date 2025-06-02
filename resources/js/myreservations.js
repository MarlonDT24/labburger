document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".toggle-reservation-btn");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const id = button.dataset.id;
            const details = document.getElementById(`res-details-${id}`);

            if (details.classList.contains("hidden")) {
                details.classList.remove("hidden");
                setTimeout(() => {
                    details.classList.remove("opacity-0", "scale-y-75");
                    details.classList.add("opacity-100", "scale-y-100");
                }, 10);
                button.textContent = "Ocultar Detalles";
            } else {
                details.classList.remove("opacity-100", "scale-y-100");
                details.classList.add("opacity-0", "scale-y-75");
                setTimeout(() => {
                    details.classList.add("hidden");
                }, 300);
                button.textContent = "Ver Detalles";
            }
        });
    });
});
