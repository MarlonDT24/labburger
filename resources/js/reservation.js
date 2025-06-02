document.addEventListener("DOMContentLoaded", () => {
    const calendarContainer = document.getElementById("calendar");
    const selectedDateInput = document.getElementById("reservation-date");
    const selectedHourInput = document.getElementById("reservation-time");
    const calendarData = JSON.parse(document.getElementById("calendar-data").textContent);
    const reservedSlots = JSON.parse(document.getElementById("reserved-slots").textContent);

    const hourSelectionContainer = document.createElement("div");
    hourSelectionContainer.className = "grid grid-cols-4 gap-2 mt-4 text-sm";
    calendarContainer.parentElement.appendChild(hourSelectionContainer);

    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    const monthTitle = document.createElement("div");
    monthTitle.className = "flex justify-between items-center mb-4 text-blue-800 font-bold";
    calendarContainer.parentElement.insertBefore(monthTitle, calendarContainer);

    const headerDays = ["D", "L", "M", "X", "J", "V", "S"];
    const headerRow = document.createElement("div");
    headerRow.className = "grid grid-cols-7 gap-2 text-center font-semibold text-sm mb-2";
    headerDays.forEach(d => {
        const day = document.createElement("div");
        day.textContent = d;
        headerRow.appendChild(day);
    });
    calendarContainer.parentElement.insertBefore(headerRow, calendarContainer);

    function renderCalendar(month, year) {
        const dateString = new Intl.DateTimeFormat('es-ES', {
            month: 'long',
            year: 'numeric'
        }).format(new Date(year, month));

        //Capitaliza la primera letra del mes
        const capitalizedDate = dateString.charAt(0).toUpperCase() + dateString.slice(1);
        monthTitle.innerHTML = `
            <button id="prevMonth" class="text-2xl w-10 h-10 bg-gray-300 hover:bg-gray-400 text-blue-800 font-bold rounded-full flex items-center justify-center shadow transition-transform duration-300 hover:scale-125 hover:-rotate-6">
                ←
            </button>
            <span class="text-xl font-semibold text-blue-800 tracking-wide">${capitalizedDate}</span>
            <button id="nextMonth" class="text-2xl w-8 h-8 bg-gray-300 hover:bg-gray-400 text-blue-800 font-bold rounded-full flex items-center justify-center shadow transition-transform duration-300 hover:scale-125">
                →
            </button>
        `;

        document.getElementById("prevMonth").onclick = () => {
            if (month === 0) {
                currentMonth = 11;
                currentYear--;
            } else {
                currentMonth--;
            }
            calendarContainer.innerHTML = "";
            renderCalendar(currentMonth, currentYear);
        };

        document.getElementById("nextMonth").onclick = () => {
            if (month === 11) {
                currentMonth = 0;
                currentYear++;
            } else {
                currentMonth++;
            }
            calendarContainer.innerHTML = ""; //
            renderCalendar(currentMonth, currentYear);
        };

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const today = new Date();

        for (let i = 0; i < firstDay; i++) {
            const empty = document.createElement("div");
            calendarContainer.appendChild(empty);
        }

        for (let d = 1; d <= daysInMonth; d++) {
            const date = new Date(year, month, d);
            const dayDiv = document.createElement("div");
            dayDiv.textContent = d;
            dayDiv.className = "border border-gray-300 text-center rounded cursor-pointer py-2 transition-all duration-200";

            const isToday = today.toDateString() === date.toDateString();

            if (isToday) {
                dayDiv.classList.add("bg-blue-600", "text-white", "font-bold", "hover:bg-blue-700");
                dayDiv.addEventListener("click", () => {
                    animateSelection(dayDiv);
                    const formattedDate = `${String(d).padStart(2, '0')}-${String(month + 1).padStart(2, '0')}-${year}`;
                    selectedDateInput.value = formattedDate;
                    selectedHourInput.value = "";
                    generateHours(formattedDate);
                });
            } else if (date >= today) {
                dayDiv.classList.add("bg-green-300", "hover:bg-green-400");
                dayDiv.addEventListener("click", () => {
                    animateSelection(dayDiv);
                    const formattedDate = `${String(d).padStart(2, '0')}-${String(month + 1).padStart(2, '0')}-${year}`;
                    selectedDateInput.value = formattedDate;
                    selectedHourInput.value = "";
                    generateHours(formattedDate);
                });
            } else {
                dayDiv.classList.add("bg-gray-200", "text-gray-400", "cursor-not-allowed");
            }

            calendarContainer.appendChild(dayDiv);
        }
    }

    function animateSelection(el) {
        document.querySelectorAll(".calendar-day").forEach(d => d.classList.remove("ring", "ring-2", "ring-green-600", "calendar-day"));
        el.classList.add("ring", "ring-2", "ring-green-600", "calendar-day");
    }

    function generateHours(dateString) {
        hourSelectionContainer.innerHTML = "";

        // Se extraen solo las horas ocupadas para esa fecha
        const reservedHours = reservedSlots
            .filter(r => r.date === dateString)
            .map(r => r.hour);

        let hours = [];

        // Horario del local para reservas (de 12 a 15:30 y 19 a 23:30)
        const addRange = (start, end) => {
            let [sh, sm] = start.split(":").map(Number);
            let [eh, em] = end.split(":").map(Number);
            while (sh < eh || (sh === eh && sm < em)) {
                hours.push(`${String(sh).padStart(2, '0')}:${String(sm).padStart(2, '0')}`);
                sm += 30;
                if (sm >= 60) { sm = 0; sh++; }
            }
        };
        addRange("12:00", "15:30");
        addRange("19:00", "23:30");

        hours.forEach(hour => {
            const btn = document.createElement("button");
            btn.type = "button";
            btn.textContent = hour;

            if (reservedHours.includes(hour)) {
                btn.className = "bg-red-300 text-white py-1 px-2 rounded cursor-not-allowed opacity-50";
                btn.disabled = true;
            } else {
                btn.className = "bg-gray-200 hover:bg-yellow-400 py-1 px-2 rounded transition-all font-semibold";
                btn.addEventListener("click", () => {
                    selectedHourInput.value = hour;
                    document.querySelectorAll(".selected-hour").forEach(el => el.classList.remove("ring", "ring-2", "ring-yellow-500", "selected-hour"));
                    btn.classList.add("ring", "ring-2", "ring-yellow-500", "selected-hour");
                });
            }
            hourSelectionContainer.appendChild(btn);
        });
    }

    const formWrapper = document.getElementById("reservation-form-wrapper");
    if (formWrapper) {
        formWrapper.classList.add("opacity-0", "translate-y-6");
        setTimeout(() => {
            formWrapper.classList.remove("opacity-0", "translate-y-6");
            formWrapper.classList.add("transition", "duration-700", "opacity-100", "translate-y-0");
        }, 100);
    }

    renderCalendar(currentMonth, currentYear);
});
