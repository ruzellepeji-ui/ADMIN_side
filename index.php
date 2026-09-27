<?php
// Static mockup data mirroring the dashboard interface
$admin_name = "Admin User";
$admin_role = "Administrator";
$current_date = "September 19, 2026";
$current_time = "07:51:25 PM";


$metrics = [
    ['title' => 'Total Reservations', 'value' => '0', 'icon' => 'fa-calendar-check', 'bg' => '#fbe8eb', 'color' => '#6b1224'],
    ['title' => 'Pending Reservations', 'value' => '0', 'icon' => 'fa-clock', 'bg' => '#fef3d6', 'color' => '#d97706'],
    ['title' => 'Confirmed Reservations', 'value' => '0', 'icon' => 'fa-check-circle', 'bg' => '#dcfce7', 'color' => '#16a34a'],
    ['title' => 'Cancelled Reservations', 'value' => '0', 'icon' => 'fa-times-circle', 'bg' => '#fee2e2', 'color' => '#dc2626'],
    ['title' => "Today's Reservations", 'value' => '0', 'icon' => 'fa-calendar-day', 'bg' => '#e0f2fe', 'color' => '#0284c7'],
    ['title' => 'Upcoming Reservations', 'value' => '0', 'icon' => 'fa-calendar-alt', 'bg' => '#f3e8ff', 'color' => '#9333ea'],
    ['title' => 'Total Customers', 'value' => '0', 'icon' => 'fa-users', 'bg' => '#e0e7ff', 'color' => '#4f46e5'],
    ['title' => 'Estimated Revenue', 'value' => '₱00.00', 'icon' => 'fa-ruble-sign', 'bg' => '#fce7f3', 'color' => '#db2777'],
    ['title' => 'Most Reserved Service', 'value' => 'Events Place', 'sub' => '(10 reservations)', 'icon' => 'fa-star', 'bg' => '#f3e8ff', 'color' => '#7e22ce'],
    ['title' => 'Upcoming Events', 'value' => '0', 'icon' => 'fa-hands-helping', 'bg' => '#ffedd5', 'color' => '#ea580c']
];

$events = [
    ['day' => '23', 'month' => 'SEP', 'title' => 'Debut', 'time' => '6:00 PM - 11:00 PM', 'location' => 'Events Place'],
    ['day' => '24', 'month' => 'SEP', 'title' => 'Reunion', 'time' => '10:00 AM - 5:00 PM', 'location' => 'Events Place'],
    ['day' => '35', 'month' => 'SEP', 'title' => 'Family Dinner', 'time' => '7:00 PM - 10:00 PM', 'location' => 'Restaurant dining']
];

$recent_reservations = [
    ['id' => 'RES-2026-0098', 'name' => 'Jolo Cruzada', 'service' => 'Cafe', 'datetime' => 'Sep 20, 2026 10:00 AM', 'status' => 'Confirmed', 'method' => 'Cash', 'amount' => '₱900.00'],
    ['id' => 'RES-2026-0097', 'name' => 'Khean Digno', 'service' => 'Restaurant', 'datetime' => 'Sep 21, 2026 2:00 PM', 'status' => 'Confirmed', 'method' => 'GCash', 'amount' => '₱1,500.00'],
    ['id' => 'RES-2026-0096', 'name' => 'Ruzelle Peji', 'service' => 'Catering', 'datetime' => 'Sep 22, 2026 4:00 PM', 'status' => 'Cancelled', 'method' => 'Cash', 'amount' => '₱10,000.00'],
    ['id' => 'RES-2026-0095', 'name' => 'Puso Dimaranan', 'service' => 'Events Place', 'datetime' => 'Sep 23, 2026 6:00 PM', 'status' => 'Pending', 'method' => 'Cash', 'amount' => '₱20,000.00'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pio De Roda Reservation System</title>
    <!-- FontAwesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    overflow: hidden; /* Clips image edges cleanly to a circle */
}

.brand-logo-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Fits the image within the circle without distorting */
    display: block;
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

        /* Main Area Layout */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Header Styling */
        .top-navbar {
            background-color: var(--card-bg);
            padding: 12px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
        }

        .header-title-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-title-section h1 {
            font-size: 18px;
            font-weight: 600;
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

        .user-info p {
            font-size: 13px;
            font-weight: 600;
            line-height: 1.2;
        }

        .user-info span {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* Content Container */
        .content-body {
            padding: 25px 30px;
            flex-grow: 1;
        }

        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        .welcome-header h2 {
            font-size: 18px;
            font-weight: 600;
        }

        .welcome-header p {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .time-display {
            font-size: 12px;
            color: var(--text-muted);
            display: flex;
            gap: 15px;
        }

        /* Metric Cards Grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .metric-card {
            background: var(--card-bg);
            padding: 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            border: 1px solid var(--border-color);
        }

        .metric-icon {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .metric-info h4 {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .metric-info h3 {
            font-size: 18px;
            font-weight: 700;
            margin-top: 2px;
        }

        .metric-info span {
            font-size: 10px;
            color: var(--text-muted);
            display: block;
        }

        /* Charts Section Layout */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1.2fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .dashboard-card {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 20px;
            border: 1px solid var(--border-color);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-header h3 {
            font-size: 14px;
            font-weight: 600;
        }

        .card-header select, .card-header a {
            font-size: 11px;
            color: #6366f1;
            text-decoration: none;
            border: 1px solid var(--border-color);
            padding: 4px 8px;
            border-radius: 4px;
            background: #fff;
        }

        /* Custom Donut Legend */
        .chart-container-donut {
            position: relative;
            height: 180px;
        }

        .events-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .event-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .event-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .event-date {
            background-color: #fee2e2;
            color: #dc2626;
            border-radius: 6px;
            padding: 6px 10px;
            text-align: center;
            min-width: 45px;
        }

        .event-date .month {
            font-size: 9px;
            font-weight: 700;
            display: block;
            text-transform: uppercase;
        }

        .event-date .day {
            font-size: 14px;
            font-weight: 700;
        }

        .event-details h4 {
            font-size: 12px;
            font-weight: 600;
        }

        .event-details p {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .event-status {
            margin-left: auto;
            font-size: 10px;
            color: #16a34a;
            background: #dcfce7;
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* Recent Reservations Table */
        .table-responsive {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 12px;
        }

        .data-table th {
            color: var(--text-muted);
            font-weight: 500;
            padding: 10px 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .data-table td {
            padding: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .badge {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-confirmed { background-color: #dcfce7; color: #15803d; }
        .badge-pending { background-color: #fef3c7; color: #b45309; }
        .badge-cancelled { background-color: #fee2e2; color: #b91c1c; }
    </style>
</head>
<body>

    <!-- Left Navigation Bar -->
    <aside class="sidebar">
        <div>
            <div class="brand-header">
                <div class="brand-logo-container">
                    <img src="pioderoda.jpg" alt="Pio De Roda Logo" class="brand-logo-img">
                </div>
                <h2>PIO DE RODA</h2>
                <p>RESERVATION SYSTEM</p>
            </div>
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="indez.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                </li>

                <li class="nav-item">
                    <a href="reservation.php"><i class="fa-solid fa-calendar-check"></i> Reservations</a>
                </li>
                
                <li class="nav-item"><a href="#"><i class="fa-solid fa-calendar-days"></i> calendar</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-concierge-bell"></i> Services</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-calendar-check"></i> Events</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-users"></i> Customers</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-money-bill-wave"></i> Payment</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-chart-column"></i> Reports</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-box-archive"></i> Archive</a></li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <li class="nav-item" style="list-style: none;"><a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main-wrapper">
        <header class="top-navbar">
            <div class="header-title-section">
                <i class="fa-solid fa-bars" style="color: #718096; cursor: pointer;"></i>
                <h1>Dashboard</h1>
            </div>
            <div class="user-profile">
                <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
                <div class="user-info">
                    <p><?php echo $admin_name; ?></p>
                    <span><?php echo $admin_role; ?></span>
                </div>
                <i class="fa-solid fa-chevron-down" style="font-size: 10px; color: #718096; margin-left: 5px;"></i>
            </div>
        </header>

        <div class="content-body">
            <div class="welcome-header">
                <div>
                    <h2>Welcome back, <?php echo $admin_name; ?>!</h2>
                    <p>Here's what's happening with your reservation system today.</p>
                </div>
                <div class="time-display">
                    <span><i class="fa-regular fa-calendar"></i> <?php echo $current_date; ?></span>
                    <span><i class="fa-regular fa-clock"></i> <?php echo $current_time; ?></span>
                </div>
            </div>

            <!-- Top Row: Metric Cards -->
            <div class="metrics-grid">
                <?php foreach($metrics as $item): ?>
                    <div class="metric-card">
                        <div class="metric-icon" style="background-color: <?php echo $item['bg']; ?>; color: <?php echo $item['color']; ?>;">
                            <i class="fa-solid <?php echo $item['icon']; ?>"></i>
                        </div>
                        <div class="metric-info">
                            <h4><?php echo $item['title']; ?></h4>
                            <h3><?php echo $item['value']; ?></h3>
                            <?php if(isset($item['sub'])): ?>
                                <span><?php echo $item['sub']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Middle Section: Charts & Upcoming Events -->
            <div class="dashboard-grid">
                <!-- Line Chart: Overview -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3>Reservations Overview</h3>
                        <select><option>This Week</option></select>
                    </div>
                    <canvas id="reservationsOverviewChart" height="150"></canvas>
                </div>

                <!-- Donut Chart: By Service -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3>Reservations by Service</h3>
                    </div>
                    <div class="chart-container-donut">
                        <canvas id="serviceDonutChart"></canvas>
                    </div>
                </div>

                <!-- Upcoming Events List -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3>Upcoming Events</h3>
                        <a href="#">View All</a>
                    </div>
                    <div class="events-list">
                        <?php foreach($events as $event): ?>
                            <div class="event-item">
                                <div class="event-date">
                                    <span class="month"><?php echo $event['month']; ?></span>
                                    <span class="day"><?php echo $event['day']; ?></span>
                                </div>
                                <div class="event-details">
                                    <h4><?php echo $event['title']; ?></h4>
                                    <p><i class="fa-regular fa-clock"></i> <?php echo $event['time']; ?></p>
                                    <p><i class="fa-solid fa-location-dot"></i> <?php echo $event['location']; ?></p>
                                </div>
                                <span class="event-status">Upcoming</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Bottom Section: Recent Reservations Table -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h3>Recent Reservations</h3>
                    <a href="#">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Reservation ID</th>
                                <th>Customer Name</th>
                                <th>Service</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recent_reservations as $row): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['service']; ?></td>
                                    <td><?php echo $row['datetime']; ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo strtolower($row['status']); ?>">
                                            <?php echo $row['status']; ?>
                                        </span>
                                    </td>
                                    <td><?php echo $row['method']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Chart Setup Scripts -->
    <script>
        // Line Chart Configuration
        const ctxLine = document.getElementById('reservationsOverviewChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [
                    {
                        label: 'Total',
                        data: [23, 24, 32, 28, 38, 28, 29],
                        borderColor: '#500a18',
                        backgroundColor: '#500a181a',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Confirmed',
                        data: [12, 14, 20, 18, 24, 18, 18],
                        borderColor: '#16a34a',
                        tension: 0.3
                    },
                    {
                        label: 'Pending',
                        data: [8, 8, 8, 7, 10, 8, 8],
                        borderColor: '#d97706',
                        tension: 0.3
                    },
                    {
                        label: 'Cancelled',
                        data: [3, 4, 4, 3, 4, 3, 3],
                        borderColor: '#dc2626',
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top', labels: { boxWidth: 8, font: { size: 10 } } }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f0f0f0' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // Chart Configuration
        const ctxDonut = document.getElementById('serviceDonutChart').getContext('2d');
        new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: ['Cafe', 'Restaurant', 'Catering', 'Events place'],
                datasets: [{
                    data: [25, 25, 25, 25],
                    backgroundColor: ['#500a18', '#f43f5e', '#3b82f6', '#06b6d4']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'right', labels: { boxWidth: 10, font: { size: 9 } } }
                },
                cutout: '70%'
            }
        });
    </script>
</body>
</html>