<?php
// Static mockup dataset for reservations
$reservations = [
    [
        'id' => 'RES-2026-0098',
        'customer' => 'Jolo Cruzada',
        'phone' => '+63 000 000 0000',
        'email' => 'jolo,cruzada@email.com',
        'service' => 'Cafe',
        'date' => '2026-09-20',
        'time' => '10:00 AM',
        'guests' => 2,
        'status' => 'Confirmed',
        'payment' => 'Cash',
        'amount' => '₱900.00',
    ],
    [
        'id' => 'RES-2026-0097',
        'customer' => 'Khean Digno',
        'phone' => '+63 000 000 0000',
        'email' => 'khean.digno@email.com',
        'service' => 'Restaurant',
        'date' => '2026-09-21',
        'time' => '02:00 PM',
        'guests' => 3,
        'status' => 'Confirmed',
        'payment' => 'GCash',
        'amount' => '₱1,500.00',
    ],
    [
        'id' => 'RES-2026-0096',
        'customer' => 'Ruzelle Peji',
        'phone' => '+63 000 000 0000',
        'email' => 'ruzelle.peji@email.com',
        'service' => 'Catering',
        'date' => '2026-09-22',
        'time' => '04:00 PM',
        'guests' => 1,
        'status' => 'Cancelled',
        'payment' => 'Cash',
        'amount' => '₱10,000.00',
    ],
    [
        'id' => 'RES-2026-0095',
        'customer' => 'Puso Dimaranan',
        'phone' => '+63 000 000 0000',
        'email' => 'puso.dimaranan@email.com',
        'service' => 'Events Place',
        'date' => '2026-09-23',
        'time' => '06:00 PM',
        'guests' => 100,
        'status' => 'Pending',
        'payment' => 'Cash',
        'amount' => '₱20,000.00',
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Management - Pio De Roda</title>
    <!-- Font Awesome Icons & Google Fonts -->
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

        .content-body {
            padding: 25px 30px;
            flex-grow: 1;
        }

        /* Search and Table Styling */
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

        .filter-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .search-input, .filter-select {
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 13px;
            outline: none;
        }

        .search-input { flex-grow: 1; }

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
        .badge-rejected { background-color: #f3f4f6; color: #374151; }

        .btn {
            padding: 6px 10px;
            border-radius: 6px;
            border: none;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.2s;
        }

        .btn-view { background: #e0f2fe; color: #0284c7; }
        .btn-approve { background: #dcfce7; color: #15803d; }
        .btn-reject { background: #fee2e2; color: #b91c1c; }
        .btn-edit { background: #fef3c7; color: #b45309; }
        .btn-cancel { background: #f3f4f6; color: #4b5563; }

        .action-cell {
            display: flex;
            gap: 5px;
        }

        /* Modal Overlay */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-card {
            background: #fff;
            width: 500px;
            max-width: 90%;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .close-modal { cursor: pointer; font-size: 18px; color: var(--text-muted); }

        .modal-body label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
            margin-bottom: 4px;
        }

        .modal-body input, .modal-body select {
            width: 100%;
            padding: 8px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 13px;
        }

        .modal-footer {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-primary { background: var(--primary-burgundy); color: #fff; }
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
                <li class="nav-item"><a href="index.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="nav-item active"><a href="reservations.php"><i class="fa-solid fa-calendar-check"></i> Reservations</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-calendar-days"></i> calendar</a></li>
                <li class="nav-item"><a href="#"><i class="fa-solid fa-concierge-bell"></i> Services</a></li>
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
    </aside>

    <!-- Main Content Area -->
    <main class="main-wrapper">
        <header class="top-navbar">
            <div class="header-title-section">
                <i class="fa-solid fa-bars" style="color: #718096; cursor: pointer;"></i>
                <h1>Reservation Management</h1>
            </div>
            <div class="user-profile">
                <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
                <div class="user-info">
                    <p>Admin User</p>
                    <span>Administrator</span>
                </div>
            </div>
        </header>

        <div class="content-body">
            <!-- Search & Filter Controls -->
            <div class="filter-bar">
                <input type="text" id="searchInput" class="search-input" placeholder="Search by customer name or reservation ID..." onkeyup="filterTable()">
                <select id="statusFilter" class="filter-select" onchange="filterTable()">
                    <option value="">All Statuses</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>

            <!-- Reservations Table -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h3>All Reservations</h3>
                </div>
                <div class="table-responsive">
                    <table class="data-table" id="reservationsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Service</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reservations as$row): ?>
                                <tr id="row-<?php echo $row['id']; ?>">
                                    <td><strong><?php echo $row['id']; ?></strong></td>
                                    <td><?php echo $row['customer']; ?></td>
                                    <td><?php echo $row['service']; ?></td>
                                    <td><?php echo $row['date'] . ' ' .$row['time']; ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo strtolower($row['status']); ?>" id="status-badge-<?php echo $row['id']; ?>">
                                            <?php echo $row['status']; ?>
                                        </span>
                                    </td>
                                    <td><?php echo $row['payment']; ?></td>
                                    <td class="action-cell">
                                        <!-- View Details -->
                                        <button class="btn btn-view" title="View Details" onclick="viewDetails('<?php echo $row['id']; ?>', '<?php echo$row['customer']; ?>', '<?php echo $row['phone']; ?>', '<?php echo$row['email']; ?>', '<?php echo $row['service']; ?>', '<?php echo$row['date']; ?>', '<?php echo $row['time']; ?>', '<?php echo$row['guests']; ?>', '<?php echo $row['amount']; ?>', '<?php echo$row['notes']; ?>')">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        
                                        <!-- Approve -->
                                        <button class="btn btn-approve" title="Approve" onclick="updateStatus('<?php echo $row['id']; ?>', 'Confirmed')">
                                            <i class="fa-solid fa-check"></i>
                                        </button>

                                        <!-- Reject -->
                                        <button class="btn btn-reject" title="Reject" onclick="updateStatus('<?php echo $row['id']; ?>', 'Rejected')">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>

                                        <!-- Reschedule / Edit -->
                                        <button class="btn btn-edit" title="Edit / Reschedule" onclick="openEditModal('<?php echo $row['id']; ?>', '<?php echo$row['service']; ?>', '<?php echo $row['date']; ?>', '<?php echo$row['time']; ?>', '<?php echo $row['guests']; ?>', '<?php echo$row['status']; ?>')">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>

                                        <!-- Cancel -->
                                        <button class="btn btn-cancel" title="Cancel Booking" onclick="updateStatus('<?php echo $row['id']; ?>', 'Cancelled')">
                                            <i class="fa-solid fa-ban"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal 1: View Reservation Details -->
    <div class="modal-overlay" id="viewModal">
        <div class="modal-card">
            <div class="modal-header">
                <h3>Reservation Details</h3>
                <span class="close-modal" onclick="closeModal('viewModal')">&times;</span>
            </div>
            <div class="modal-body" id="viewModalContent">
                <!-- Injected via JavaScript -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-cancel" onclick="closeModal('viewModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- Modal 2: Reschedule / Edit Reservation -->
    <div class="modal-overlay" id="editModal">
        <div class="modal-card">
            <div class="modal-header">
                <h3>Reschedule / Edit Reservation</h3>
                <span class="close-modal" onclick="closeModal('editModal')">&times;</span>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editResId">
                <label>Service</label>
                <input type="text" id="editService">
                
                <label>Date</label>
                <input type="date" id="editDate">
                
                <label>Time</label>
                <input type="text" id="editTime">

                <label>Guests</label>
                <input type="number" id="editGuests">

                <label>Update Status</label>
                <select id="editStatus">
                    <option value="Confirmed">Confirmed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-cancel" onclick="closeModal('editModal')">Cancel</button>
                <button class="btn btn-primary" onclick="saveEdit()">Save Changes</button>
            </div>
        </div>
    </div>

    <script>
        // Search & Filter Logic
        function filterTable() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            const status = document.getElementById('statusFilter').value.toLowerCase();
            const rows = document.querySelectorAll('#reservationsTable tbody tr');

            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                const matchesSearch = text.includes(search);
                const matchesStatus = status === '' || text.includes(status);

                row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
            });
        }

        // View Reservation Details Modal
        function viewDetails(id, customer, phone, email, service, date, time, guests, amount, notes) {
            const content = `
                <p><strong>Reservation ID:</strong> ${id}</p>
                <p><strong>Customer Name:</strong> ${customer}</p>
                <p><strong>Phone:</strong> ${phone}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Service:</strong> ${service}</p>
                <p><strong>Date & Time:</strong> ${date} at ${time}</p>
                <p><strong>Guests:</strong> ${guests}</p>
                <p><strong>Total Amount:</strong> ${amount}</p>
                <p><strong>Notes:</strong> ${notes}</p>
            `;
            document.getElementById('viewModalContent').innerHTML = content;
            document.getElementById('viewModal').style.display = 'flex';
        }

        // Update Reservation Status (Approve, Reject, Cancel)
        function updateStatus(id, newStatus) {
            if (confirm(`Are you sure you want to change status to ${newStatus}?`)) {
                const badge = document.getElementById(`status-badge-${id}`);
                badge.innerText = newStatus;
                badge.className = `badge badge-${newStatus.toLowerCase()}`;
            }
        }

        // Edit / Reschedule Modal Open
        function openEditModal(id, service, date, time, guests, status) {
            document.getElementById('editResId').value = id;
            document.getElementById('editService').value = service;
            document.getElementById('editDate').value = date;
            document.getElementById('editTime').value = time;
            document.getElementById('editGuests').value = guests;
            document.getElementById('editStatus').value = status;
            document.getElementById('editModal').style.display = 'flex';
        }

        // Save Edit / Reschedule
        function saveEdit() {
            const id = document.getElementById('editResId').value;
            const newStatus = document.getElementById('editStatus').value;
            
            updateStatus(id, newStatus);
            closeModal('editModal');
            alert('Reservation updated successfully!');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
</body>
</html>