document.addEventListener("DOMContentLoaded", () => {
    const toggleButtons = document.querySelectorAll(".toggle-details-btn");

    toggleButtons.forEach(button => {
        button.addEventListener("click", () => {
            const orderId = button.dataset.id;
            const details = document.getElementById(`details-${orderId}`);

            if (details.classList.contains("hidden")) {
                details.classList.remove("hidden");
                details.classList.add("opacity-0", "scale-y-75");
                void details.offsetHeight;
                details.classList.remove("opacity-0", "scale-y-75");
                details.classList.add("opacity-100", "scale-y-100");
                button.textContent = "Menos detalles";
            } else {
                details.classList.remove("opacity-100", "scale-y-100");
                details.classList.add("opacity-0", "scale-y-75");
                setTimeout(() => {
                    details.classList.add("hidden");
                }, 300);
                button.textContent = "Ver detalles";
            }
        });
    });
});
