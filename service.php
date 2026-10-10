<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management - Pio De Roda Cafe</title>
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
            background-color: var(--bg-body);
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
    overflow: hidden; /* Clips image edges to a circle */
}

.brand-logo-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* image within the circle  */
    display: block;
}
        

        .brand-header h2 {
            font-family: 'Inter', serif;
            font-size: 17px;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .brand-header p {
            font-size: 9px;
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 1.5px;
            margin-top: 2px;
            text-transform: uppercase;
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

        .sidebar-footer a {
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
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
            font-size: 14px;
        }

        .user-info p { font-size: 13px; font-weight: 600; }
        .user-info span { font-size: 11px; color: var(--text-muted); }

        .content-body {
            padding: 35px;
            flex-grow: 1;
        }

        /* Header Section Matching Screenshot */
        .page-header-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .page-title-group h1 {
            font-family: 'Inter', serif;
            font-size: 32px;
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 6px;
        }

        .page-title-group p {
            font-size: 13px;
            color: var(--text-muted);
            max-width: 580px;
            line-height: 1.5;
        }

        .btn-add-new {
            background-color: var(--primary-burgundy);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s;
        }

        .btn-add-new:hover {
            background-color: var(--primary-dark);
        }

        /* Cards Grid Layout */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        @media (max-width: 1280px) {
            .services-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .services-grid { grid-template-columns: 1fr; }
        }

        .service-card {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }

        .card-image-wrap {
            width: 100%;
            height: 180px;
            background-color: #eaddd7;
            position: relative;
            overflow: hidden;
        }

        .card-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-body {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .service-title {
            font-family: 'Inter', serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .service-desc {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 20px;
            min-height: 50px;
        }

        .price-label {
            font-size: 14px;
            color: var(--primary-burgundy);
            font-weight: 700;
            margin-bottom: 18px;
        }

        .price-label span {
            font-weight: 400;
            color: var(--primary-burgundy);
        }

        .card-footer-actions {
            margin-top: auto;
        }

        .btn-view-details {
            width: 100%;
            padding: 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }

        /* Default Outline Button */
        .btn-outline {
            background-color: transparent;
            border: 1.5px solid var(--btn-outline-border);
            color: var(--primary-burgundy);
        }

        .btn-outline:hover {
            background-color: var(--primary-burgundy);
            color: #ffffff;
            border-color: var(--primary-burgundy);
        }

        /* Filled Active Button style matching highlighed cards in UI */
        .btn-filled {
            background-color: var(--primary-burgundy);
            border: 1.5px solid var(--primary-burgundy);
            color: #ffffff;
        }

        .btn-filled:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
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
                <h2>Pio De Roda</h2>
                <p>RESERVATION SYSTEM</p>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                </li>

                <li class="nav-item ">
                    <a href="reservation.php"><i class="fa-solid fa-calendar-check"></i> Reservations</a>
                </li>

                <li class="nav-item">
                    <a href="calendar.php"><i class="fa-solid fa-calendar-days"></i> calendar</a>
                </li>

                <li class="nav-item active">
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

    <!-- Main Content Area -->
    <div class="main-wrapper">
        <div class="top-navbar">
            <span style="font-size: 18px; color: var(--text-dark); font-weight: 700;">Pio De Roda Cafe & Catering Services</span>
            <div class="user-profile">
                <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
                <div class="user-info">
                    <p>Admin User</p>
                    <span>Administrator</span>
                </div>
            </div>
        </div>

        <div class="content-body">

            <!-- Page Title Section matching the UI image -->
            <div class="page-header-container">
                <div class="page-title-group">
                    <h1>Our Services & Packages</h1>
                    <p>Manage your service offerings. Every package below can be adjusted to your guest count and budget — tap a card to see what's included.</p>
                </div>
                <button class="btn-add-new"><i class="fa-solid fa-plus"></i> Add New Package</button>
            </div>

            <!-- Services Grid (Row 1 & Row 2) -->
            <div class="services-grid">

                <!-- Card 1: Catering with Menu -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="cateringwithmenu.jpg" alt="Catering with Menu">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Catering with Menu</h3>
                        <p class="service-desc">Full-course catering with a customizable menu for any occasion, served at your chosen venue.</p>
                        <div class="price-label">Starting at ₱1,000 <span>/ head</span></div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Venue Rentals -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="venueRentals.jpg" alt="Venue Rentals">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Venue Rentals</h3>
                        <p class="service-desc">A comfortable and welcoming space for celebrations, gatherings, and memorable special events.</p>
                        <div class="price-label">Starting at ₱15,000</div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Dine-In Menu -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="dineInMenu.jpg" alt="Dine-In Menu">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Dine-In Menu</h3>
                        <p class="service-desc">A selection of delicious meals and refreshing drinks served fresh for all dine-in guests to enjoy and savor.</p>
                        <div class="price-label">Starting at ₱600 <span>/ head</span></div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Non-Coffee Booth Package -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="nonCoffee.jpg" alt="Non-Coffee Booth Package">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Non-Coffee Booth Package</h3>
                        <p class="service-desc">A refreshment booth serving fruit teas, milk drinks, and mocktails for your guests.</p>
                        <div class="price-label">Starting at ₱4,250 <span>/ package</span></div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Coffee Booth Package -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="coffeeBooth.jpg" alt="Coffee Booth Package">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Coffee Booth Package</h3>
                        <p class="service-desc">A coffee station serving freshly brewed coffee and refreshing specialty drinks for your guests.</p>
                        <div class="price-label">Starting at ₱6,250 <span>/ package</span></div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Pizza Booth -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="pio1.jpg" alt="Pizza Booth">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Pizza Booth</h3>
                        <p class="service-desc">A pizza station serving freshly prepared, delicious pizzas and tasty treats, perfect for sharing with your guests.</p>
                        <div class="price-label">Starting at ₱7,500 <span>/ package</span></div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Card 7: Intimate Celebration Package -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="pio1.jpg" alt="Intimate Celebration Package">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Intimate Celebration Package</h3>
                        <p class="service-desc">A cozy, scaled-down package for smaller celebrations with close family and friends.</p>
                        <div class="price-label">Starting at ₱4,000 <span>/ package</span></div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Card 8: Equipment Rental -->
                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="pio1.jpg" alt="Equipment Rental">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Equipment Rental</h3>
                        <p class="service-desc">Tables, chairs, tents, food warmers, and other essentials to keep your event comfortable, organized, and ready for any occasion.</p>
                        <div class="price-label">Starting at ₱300 <span>/ item</span></div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="card-image-wrap">
                        <img src="pio1.jpg" alt="Equipment Rental">
                    </div>
                    <div class="card-body">
                        <h3 class="service-title">Other Services</h3>
                        <p class="service-desc">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.</p>
                        <div class="price-label">Starting at ₱00.00 </div>
                        <div class="card-footer-actions">
                            <button class="btn-view-details btn-outline">View Details</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>