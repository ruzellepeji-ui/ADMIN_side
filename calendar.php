<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar & Availability - Pio De Roda</title>
    <!-- Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-burgundy: #500a18;
            --primary-dark: #3b0510;
            --accent-red: #6b1224;
            --bg-light: #f5f6fa;
            --card-bg: #ffffff;
            --text-dark: #2d3748;
            --text-muted: #718096;
            --border-color: #edf2f7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: var(--primary-burgundy);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .brand-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .brand-logo-container {
            width: 60px;
            height: 60px;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .brand-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .brand-header h2 {
            font-size: 16px;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .brand-header p {
            font-size: 9px;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1.5px;
            margin-top: 2px;
        }

        .nav-menu {
            list-style: none;
            padding: 20px 0;
            flex-grow: 1;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 13.5px;
            transition: all 0.2s ease;
        }

        .nav-item a:hover, .nav-item.active a {
            background-color: var(--accent-red);
            color: #ffffff;
        }

        .nav-item a i {
            margin-right: 15px;
            width: 18px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 20px 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Main Content Area */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .top-navbar {
            background-color: var(--card-bg);
            padding: 12px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-burgundy);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-info p { font-size: 13px; font-weight: 600; }
        .user-info span { font-size: 11px; color: var(--text-muted); }

        .content-body {
            padding: 25px 30px;
            flex-grow: 1;
        }

        /* Calendar Layout Grid */
        .calendar-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            border: 1px solid var(--border-color);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-header h2 {
            font-size: 18px;
            font-weight: 600;
        }

        .calendar-nav-btn {
            background: var(--bg-light);
            border: 1px solid var(--border-color);
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }

        /* Calendar Grid */
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            text-align: center;
        }

        .day-name {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            padding-bottom: 8px;
        }

        .day-cell {
            min-height: 90px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 6px;
            text-align: left;
            background: #fafafa;
        }

        .day-cell.other-month { opacity: 0.4; }
        .day-number { font-size: 12px; font-weight: 600; margin-bottom: 4px; }

        /* Event Badges inside Calendar Day */
        .event-chip {
            font-size: 10px;
            padding: 3px 5px;
            border-radius: 4px;
            margin-bottom: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }

        .chip-confirmed { background-color: #dcfce7; color: #15803d; border-left: 3px solid #16a34a; }
        .chip-pending { background-color: #fef3c7; color: #b45309; border-left: 3px solid #d97706; }

        /* Sidebar Panels */
        .panel-section-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .availability-card {
            background: #f8fafc;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid var(--border-color);
        }

        .venue-name { font-size: 13px; font-weight: 600; color: var(--primary-burgundy); }
        .venue-status { font-size: 11px; font-weight: 600; margin-top: 4px; }
        .text-available { color: #16a34a; }
        .text-booked { color: #dc2626; }

        .time-slot {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .event-detail-item {
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .event-detail-item:last-child { border-bottom: none; }
        .event-title { font-size: 13px; font-weight: 600; }
        .event-meta { font-size: 11px; color: var(--text-muted); margin-top: 3px; }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div>
            <div class="brand-header">
                <div class="brand-logo-container">
                    <img src="pioderoda.jpg" alt="Pio De Roda Logo" class="brand-logo-img">
                </div>
                <h2>PIO DE RODA</h2>
                <p>RESERVATION SYSTEM</p>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                </li>

                <li class="nav-item ">
                    <a href="reservation.php"><i class="fa-solid fa-calendar-check"></i> Reservations</a>
                </li>

                <li class="nav-item active">
                    <a href="calendar.php"><i class="fa-solid fa-calendar-days"></i> calendar</a>
                </li>

                <li class="nav-item">
                    <a href="service.php"><i class="fa-solid fa-concierge-bell"></i> Services</a>
                </li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-calendar-days"></i> Events</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-users"></i> Customers</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-money-bill-wave"></i> Payment</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-chart-column"></i> Reports</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-box-archive"></i> Archive</a></li>
            </ul>

        </div>

        <div class="sidebar-footer">
            <li class="nav-item" style="list-style: none;"><a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="top-navbar">
            <h1 style="font-size: 18px;">Calendar & Availability Schedule</h1>
            <div class="user-profile">
                <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
                <div class="user-info">
                    <p>Admin User</p>
                    <span>Administrator</span>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="calendar-layout">
                
                

                <!-- Main Calendar Section -->
<div class="card">
    <div class="calendar-header">
        <!-- Dynamic Month & Year Header -->
        <h2 id="monthYearHeader">September 2026</h2>
        <div>
            <!-- Button controls -->
            <button class="calendar-nav-btn" onclick="changeMonth(-1)"><i class="fa-solid fa-chevron-left"></i> Prev</button>
            <button class="calendar-nav-btn" onclick="changeMonth(1)">Next <i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>

    <!-- Calendar Grid -->
    <div class="calendar-grid" id="calendarDaysGrid">
        <!-- I-ge-generate ito ng JavaScript -->
    </div>
</div>

                    

                <!-- Right Side Information Panel -->
                <div>
                    <!-- Venue Availability Tracker -->
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="panel-section-title">
                            <span>Venue Availability</span>
                            <span style="font-size: 11px; color: var(--text-muted);">Sept 20, 2026</span>
                        </div>

                        <div class="availability-card">
                            <div class="venue-name">Events Place</div>
                            <div class="venue-status text-booked">Booked (10:00 AM - 02:00 PM)</div>
                            <div class="time-slot">Available after 03:00 PM</div>
                        </div>

                        <div class="availability-card">
                            <div class="venue-name">Restaurant</div>
                            <div class="venue-status text-booked">Available All Day</div>
                            <div class="time-slot">Full Open Slot</div>
                        </div>

                        <div class="availability-card">
                            <div class="venue-name">Cafe</div>
                            <div class="venue-status text-available">Available All Day</div>
                            <div class="time-slot">Full Open Slot</div>
                        </div>
                    </div>

                    <!-- Events & Pending List -->
                    <div class="card">
                        <div class="panel-section-title">
                            <span>Schedule Details</span>
                        </div>

                        <div class="event-detail-item">
                            <div class="event-title">Wedding Reception</div>
                            <div class="event-meta"><i class="fa-solid fa-calendar"></i> Sept 18, 2026</div>
                            <div class="event-meta"><i class="fa-solid fa-clock"></i> 05:00 PM - 10:00 PM</div>
                            <div class="event-meta"><i class="fa-solid fa-location-dot"></i>Events PLace</div>
                            <span class="event-chip chip-confirmed" style="display:inline-block; margin-top:5px;">Confirmed Event</span>
                        </div>

                        <div class="event-detail-item">
                            <div class="event-title">Cafe</div>
                            <div class="event-meta"><i class="fa-solid fa-calendar"></i> Sept 20, 2026</div>
                            <div class="event-meta"><i class="fa-solid fa-clock"></i> 02:00 PM - 03:30 PM</div>
                            <div class="event-meta"><i class="fa-solid fa-location-dot"></i>Cafe</div>
                            <span class="event-chip chip-pending" style="display:inline-block; margin-top:5px;">Pending Reservation</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
// Mock Data para sa Events at Venues
const eventsData = [
    { date: '2026-09-18', title: 'Wedding Reception', time: '05:00 PM - 10:00 PM', venue: 'Events Place', status: 'confirmed' },
    { date: '2026-09-19', title: 'Cafe', time: '02:00 PM - 03:30 PM', venue: 'Cafe', status: 'pending' },
    { date: '2026-09-20', title: 'Family Dinner', time: '06:00 PM - 09:00 PM', venue: 'Restaurant', status: 'confirmed' },
    { date: '2026-09-20', title: 'Cafe', time: '02:00 PM - 03:30 PM', venue: 'Cafe', status: 'pending' }
];

const venueList = ['Events Place', 'Restaurant', 'Cafe'];

let currentDate = new Date(2026, 8, 1); // September 2026
let selectedDateStr = '2026-09-20'; // Default selected date

function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    const monthNames = ["January", "February", "March", "April", "May", "June", 
                        "July", "August", "September", "October", "November", "December"];
    document.getElementById('monthYearHeader').innerText = `${monthNames[month]} ${year}`;

    const grid = document.getElementById('calendarDaysGrid');
    grid.innerHTML = '';

    // Day Headers
    ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(day => {
        const dh = document.createElement('div');
        dh.className = 'day-name';
        dh.innerText = day;
        grid.appendChild(dh);
    });

    const firstDayIndex = new Date(year, month, 1).getDay();
    const lastDay = new Date(year, month + 1, 0).getDate();
    const prevLastDay = new Date(year, month, 0).getDate();

    // Previous Month Days
    for (let x = firstDayIndex; x > 0; x--) {
        const cell = document.createElement('div');
        cell.className = 'day-cell other-month';
        cell.innerHTML = `<div class="day-number">${prevLastDay - x + 1}</div>`;
        grid.appendChild(cell);
    }

    // Current Month Days
    for (let i = 1; i <= lastDay; i++) {
        const cell = document.createElement('div');
        cell.className = 'day-cell';
        
        const formattedMonth = String(month + 1).padStart(2, '0');
        const formattedDay = String(i).padStart(2, '0');
        const dateString = `${year}-${formattedMonth}-${formattedDay}`;

        // Dagdag styling kapag napili ang araw
        if (dateString === selectedDateStr) {
            cell.style.border = '2px solid #500a18';
            cell.style.backgroundColor = '#fff5f7';
        }

        let eventsHTML = `<div class="day-number">${i}</div>`;
        const dayEvents = eventsData.filter(e => e.date === dateString);
        dayEvents.forEach(evt => {
            const badgeClass = evt.status === 'confirmed' ? 'chip-confirmed' : 'chip-pending';
            eventsHTML += `<span class="event-chip ${badgeClass}">${evt.title}</span>`;
        });

        cell.innerHTML = eventsHTML;
        
        // CLICK EVENT: Para mag-update ang venue availability & schedule details sa gilid!
        cell.onclick = () => selectDate(dateString);
        grid.appendChild(cell);
    }

    // Next Month Days
    const totalCells = firstDayIndex + lastDay;
    const nextDays = (7 - (totalCells % 7)) % 7;
    for (let j = 1; j <= nextDays; j++) {
        const cell = document.createElement('div');
        cell.className = 'day-cell other-month';
        cell.innerHTML = `<div class="day-number">${j}</div>`;
        grid.appendChild(cell);
    }

    // I-update din ang Side Panels para sa napiling araw
    updateSidePanels(selectedDateStr);
}

function selectDate(dateStr) {
    selectedDateStr = dateStr;
    renderCalendar();
}

function changeMonth(direction) {
    currentDate.setMonth(currentDate.getMonth() + direction);
    // Kusa ring pipiliin ang unang araw ng bagong buwan
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    selectedDateStr = `${year}-${month}-01`;
    renderCalendar();
}

// Function para mag-update ang Venue Availability at Schedule Details sa Side Panels
function updateSidePanels(dateStr) {
    const d = new Date(dateStr + 'T00:00:00');
    const options = { month: 'short', day: 'numeric', year: 'numeric' };
    const formattedDate = d.toLocaleDateString('en-US', options);

    // 1. Update Venue Availability Section Header Date
    const availHeader = document.querySelector('.availability-card')?.parentElement?.querySelector('span:last-child');
    if(availHeader) availHeader.innerText = formattedDate;

    // 2. Filter Events sa napiling araw
    const dayEvents = eventsData.filter(e => e.date === dateStr);

    // Update Schedule Details Container
    const scheduleCard = document.querySelectorAll('.card')[2]; // Pangatlong card sa layout
    if (scheduleCard) {
        let detailsHTML = `<div class="panel-section-title"><span>Schedule Details (${formattedDate})</span></div>`;
        
        if (dayEvents.length === 0) {
            detailsHTML += `<p style="font-size: 12px; color: #718096; padding: 10px 0;">No bookings or events for this date.</p>`;
        } else {
            dayEvents.forEach(evt => {
                const badgeClass = evt.status === 'confirmed' ? 'chip-confirmed' : 'chip-pending';
                const statusLabel = evt.status === 'confirmed' ? 'Confirmed Event' : 'Pending Reservation';
                detailsHTML += `
                    <div class="event-detail-item">
                        <div class="event-title">${evt.title}</div>
                        <div class="event-meta"><i class="fa-solid fa-calendar"></i> ${formattedDate}</div>
                        <div class="event-meta"><i class="fa-solid fa-clock"></i> ${evt.time}</div>
                        <div class="event-meta"><i class="fa-solid fa-location-dot"></i> ${evt.venue}</div>
                        <span class="event-chip ${badgeClass}" style="display:inline-block; margin-top:5px;">${statusLabel}</span>
                    </div>
                `;
            });
        }
        scheduleCard.innerHTML = detailsHTML;
    }

    // 3. Dynamic Venue Availability Cards
    const availCardContainer = document.querySelectorAll('.card')[1]; // Pangalawang card sa layout
    if (availCardContainer) {
        let availHTML = `
            <div class="panel-section-title">
                <span>Venue Availability</span>
                <span style="font-size: 11px; color: var(--text-muted);">${formattedDate}</span>
            </div>`;

        venueList.forEach(v => {
            const bookedEvt = dayEvents.find(e => e.venue === v);
            if (bookedEvt) {
                availHTML += `
                    <div class="availability-card">
                        <div class="venue-name">${v}</div>
                        <div class="venue-status text-booked">Booked (${bookedEvt.time})</div>
                        <div class="time-slot">Slot occupied</div>
                    </div>`;
            } else {
                availHTML += `
                    <div class="availability-card">
                        <div class="venue-name">${v}</div>
                        <div class="venue-status text-available">Available All Day</div>
                        <div class="time-slot">Full Open Slot</div>
                    </div>`;
            }
        });

        availCardContainer.innerHTML = availHTML;
    }
}

document.addEventListener('DOMContentLoaded', renderCalendar);
</script>

</body>
</html>