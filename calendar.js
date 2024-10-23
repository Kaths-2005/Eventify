const calendarContainer = document.getElementById('calendar');
const addEventBtn = document.getElementById('addEventBtn');

// Simple calendar setup
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
let events = [];

// Display current month calendar
function displayCalendar(month, year) {
    calendarContainer.innerHTML = ''; // Clear previous calendar

    const monthYear = document.createElement('h2');
    monthYear.textContent = `${months[month]} ${year}`;
    calendarContainer.appendChild(monthYear);

    // Create calendar grid
    const table = document.createElement('table');
    const headerRow = document.createElement('tr');
    const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    
    days.forEach(day => {
        const th = document.createElement('th');
        th.textContent = day;
        headerRow.appendChild(th);
    });
    table.appendChild(headerRow);

    // Calculate the first day of the month
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    let row = document.createElement('tr');
    for (let i = 0; i < firstDay; i++) {
        const td = document.createElement('td');
        row.appendChild(td);
    }

    // Fill in the days of the month
    for (let date = 1; date <= lastDate; date++) {
        if (row.childElementCount === 7) {
            table.appendChild(row);
            row = document.createElement('tr');
        }

        const td = document.createElement('td');
        td.textContent = date;

        // Check for events
        const eventDate = new Date(year, month, date).toLocaleDateString();
        if (events.includes(eventDate)) {
            td.style.backgroundColor = 'lightblue'; // Highlight days with events
        }

        td.addEventListener('click', () => addEvent(date, month, year));
        row.appendChild(td);
    }
    table.appendChild(row);
    calendarContainer.appendChild(table);
}

// Add event function
function addEvent(date, month, year) {
    const eventName = prompt("Enter event name:");
    if (eventName) {
        const eventDate = new Date(year, month, date).toLocaleDateString();
        events.push(eventDate);
        alert(`Event '${eventName}' added on ${eventDate}`);
        displayCalendar(month, year); // Refresh calendar
    }
}

// Initialize calendar with current month
const today = new Date();
displayCalendar(today.getMonth(), today.getFullYear());

addEventBtn.addEventListener('click', () => {
    const currentDate = new Date();
    addEvent(currentDate.getDate(), currentDate.getMonth(), currentDate.getFullYear());
});
