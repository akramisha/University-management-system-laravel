<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard | MediCare University</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0fafa 0%, #e8f6f6 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #003d44 0%, #002a2f 50%, #001a1d 100%);
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
            box-shadow: 5px 0 30px rgba(0, 61, 68, 0.2);
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(131, 197, 190, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(131, 197, 190, 0.5);
        }

        /* Sidebar Logo */
        .sidebar-logo {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(131, 197, 190, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .sidebar-logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #83c5be, #00b4d8);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
            box-shadow: 0 5px 20px rgba(131, 197, 190, 0.3);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .sidebar-logo:hover .sidebar-logo-icon {
            transform: rotate(10deg) scale(1.05);
        }

        .sidebar-logo-text {
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
            line-height: 1;
        }

        .sidebar-logo-subtitle {
            font-size: 0.65rem;
            color: #83c5be;
            font-weight: 500;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* Sidebar Navigation */
        .sidebar-nav {
            padding: 15px 0;
        }

        .sidebar-nav-title {
            padding: 12px 20px 8px;
            font-size: 0.65rem;
            color: rgba(131, 197, 190, 0.6);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu-item {
            margin: 2px 8px;
        }

        .sidebar-menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 15px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .sidebar-menu-link:hover {
            background: rgba(131, 197, 190, 0.1);
            color: white;
        }

        .sidebar-menu-link.active {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.4), rgba(0, 180, 216, 0.3));
            color: white;
            box-shadow: 0 4px 15px rgba(0, 109, 119, 0.2);
        }

        .sidebar-menu-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 50%;
            background: linear-gradient(135deg, #83c5be, #00b4d8);
            border-radius: 0 3px 3px 0;
        }

        .sidebar-menu-icon {
            width: 34px;
            height: 34px;
            background: rgba(131, 197, 190, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .sidebar-menu-link:hover .sidebar-menu-icon,
        .sidebar-menu-link.active .sidebar-menu-icon {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
        }

        .sidebar-menu-text {
            flex: 1;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .sidebar-menu-arrow {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
        }

        .sidebar-menu-item.open .sidebar-menu-arrow {
            transform: rotate(180deg);
        }

        .sidebar-menu-badge {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            color: white;
            font-size: 0.6rem;
            padding: 2px 6px;
            border-radius: 15px;
            font-weight: 600;
        }

        /* Sidebar Dropdown */
        .sidebar-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            background: rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            margin: 4px 0;
        }

        .sidebar-menu-item.open .sidebar-dropdown {
            max-height: 500px;
        }

        .sidebar-dropdown-menu {
            list-style: none;
            padding: 8px 0;
            margin: 0;
        }

        .sidebar-dropdown-item {
            margin: 1px 0;
        }

        .sidebar-dropdown-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px 10px 45px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin: 0 8px;
        }

        .sidebar-dropdown-link:hover {
            background: rgba(131, 197, 190, 0.1);
            color: #83c5be;
            padding-left: 50px;
        }

        /* Sidebar Dropdown Icons */
.sidebar-dropdown-link i {
    font-size: 1rem; /* Adjust this to match your other main icons */
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 20px; /* Ensures icons are centered even if widths vary slightly */
}

/* Ensure the container doesn't squash them */
.sidebar-menu-icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

        /* Sidebar Divider */
        .sidebar-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(131, 197, 190, 0.2), transparent);
            margin: 15px 20px;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 15px;
            border-top: 1px solid rgba(131, 197, 190, 0.1);
            margin-top: auto;
        }

        .sidebar-footer-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.8rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar-footer-link:hover {
            background: rgba(131, 197, 190, 0.1);
            color: white;
        }

        .sidebar-footer-link.logout {
            color: #ff6b6b;
        }

        .sidebar-footer-link.logout:hover {
            background: rgba(255, 107, 107, 0.15);
            color: #ff6b6b;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Top Header */
        .top-header {
            background: white;
            padding: 15px 25px;
            box-shadow: 0 2px 20px rgba(0, 61, 68, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .mobile-toggle:hover {
            transform: scale(1.05);
        }

        .mobile-toggle .bi-x {
            display: none;
        }

        .mobile-toggle.active .bi-list {
            display: none;
        }

        .mobile-toggle.active .bi-x {
            display: inline;
        }

        /* Search Bar */
        .search-container {
            flex: 1;
            max-width: 450px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: #f8feff;
            border-radius: 12px;
            padding: 4px 8px 4px 15px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            border-color: #83c5be;
            box-shadow: 0 0 15px rgba(131, 197, 190, 0.15);
        }

        .search-box i {
            color: #006d77;
            font-size: 1rem;
        }

        .search-box input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 10px 12px;
            font-size: 0.9rem;
            color: #003d44;
            outline: none;
        }

        .search-box input::placeholder {
            color: #80cbc4;
        }

        /* Header Right */
        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header-icon-btn {
            width: 40px;
            height: 40px;
            background: #f8feff;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #006d77;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .header-icon-btn:hover {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            transform: translateY(-2px);
        }

        .header-icon-btn .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            border-radius: 50%;
            font-size: 0.65rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

       .header-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 15px 8px 8px;
            background: var(--light-bg);
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .header-profile:hover {
            background: rgba(131, 197, 190, 0.2);
        }

        .header-profile img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent);
        }

        .header-profile-info {
            display: flex;
            flex-direction: column;
        }

        .header-profile-info span {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .header-profile-info small {
            font-size: 0.7rem;
            color: var(--text-muted);
        }

        /* Dashboard Content */
        .dashboard-content {
            padding: 25px;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 5px;
        }

        .page-title .highlight {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: #005459;
            font-size: 0.9rem;
        }

        /* Management Grid */
        .management-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .management-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-decoration: none;
        }

        .management-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
            
        }

        .management-card:hover::before {
            transform: scaleX(1);
        }

        .management-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 61, 68, 0.15);
        }

        .management-card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .management-card:hover .management-card-icon {
            transform: scale(1.1);
        }

        /* Add this to your <style> section */
.management-card-icon.classes {
    background-color: rgba(13, 202, 240, 0.1); /* Light Cyan */
    color: #0dcaf0; /* Cyan/Medical Blue */
}


        .management-card-icon.students {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .management-card-icon.teachers {
            background: linear-gradient(135deg, rgba(131, 197, 190, 0.2), rgba(131, 197, 190, 0.1));
            color: #00897b;
        }

        .management-card-icon.fee {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2));
            color: #43a047;
        }

        .management-card-icon.courses {
            background: linear-gradient(135deg, rgba(0, 180, 216, 0.1), rgba(0, 180, 216, 0.2));
            color: #0097a7;
        }

        .management-card-icon.timetable {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2));
            color: #8e24aa;
        }

        .management-card-icon.semester {
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2));
            color: #fb8c00;
        }

        .management-card-icon.attendance {
            background: linear-gradient(135deg, rgba(33, 150, 243, 0.1), rgba(33, 150, 243, 0.2));
            color: #1976d2;
        }

        .management-card-icon.notification {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.2));
            color: #ff6b6b;
        }

        .management-card-icon.marks {
            background: linear-gradient(135deg, rgba(96, 125, 139, 0.1), rgba(96, 125, 139, 0.2));
            color: #546e7a;
        }

        .management-card-title {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 8px;
        }

        .management-card-description {
            font-size: 0.8rem;
            color: #80cbc4;
            line-height: 1.4;
            margin-bottom: 15px;
        }

        .management-card-stats {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid rgba(0, 109, 119, 0.1);
        }

        .management-card-count {
            font-size: 1.2rem;
            font-weight: 700;
            color: #006d77;
        }

        .management-card-label {
            font-size: 0.7rem;
            color: #80cbc4;
        }

        .management-card-action {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #006d77;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Quick Stats */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-box {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-box-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-box-content {
            flex: 1;
        }

        .stat-box-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-box-label {
            font-size: 0.8rem;
            color: #80cbc4;
        }

        /* Recent Activities */
        .recent-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .dashboard-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #003d44;
        }

        .card-action-btn {
            background: #f8feff;
            border: none;
            padding: 7px 12px;
            border-radius: 8px;
            font-size: 0.8rem;
            color: #006d77;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-action-btn:hover {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-height: 350px;
            overflow-y: auto;
        }

        .activity-list::-webkit-scrollbar {
            width: 4px;
        }

        .activity-list::-webkit-scrollbar-track {
            background: #f8feff;
            border-radius: 4px;
        }

        .activity-list::-webkit-scrollbar-thumb {
            background: #83c5be;
            border-radius: 4px;
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px;
            background: #f8feff;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: #e0f2f1;
            transform: translateX(5px);
        }

        .activity-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
            min-width: 0;
        }

        .activity-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 2px;
        }

        .activity-text {
            font-size: 0.8rem;
            color: #005459;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 0.7rem;
            color: #80cbc4;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Overlay for Mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 61, 68, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .management-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .quick-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 991px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .management-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .recent-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .management-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .quick-stats {
                grid-template-columns: 1fr;
            }

            .header-profile-info {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .management-grid {
                grid-template-columns: 1fr;
            }

            .search-container {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ========== SIDEBAR ========== -->
    <aside class="sidebar" id="sidebar">
        <!-- Logo -->
        <a href="{{route('management.dashboard')}}" class="sidebar-logo">
            <div class="sidebar-logo-icon">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>
            <div class="sidebar-logo-text">
                <span class="sidebar-logo-title">MediCare</span>
                <span class="sidebar-logo-subtitle">Management</span>
            </div>
        </a>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <div class="sidebar-nav-title">Main Navigation</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{route('management.dashboard')}}" class="sidebar-menu-link active">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="{{route('students.index')}}" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Add Student</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="{{ route('management.teacher.index') }}" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Add Teacher</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <span class="sidebar-menu-text">Fee Challan</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Courses</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-book-half"></i>

                                    </div>
                                    Create Courses
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-person-check"></i>

                                    </div>
                                    Assign Teachers
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-calendar3"></i>
                        </div>
                        <span class="sidebar-menu-text">Timetable</span>
                    </a>
                </li>

                  <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Class Management</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="{{ url('/management/classes') }}" class="sidebar-dropdown-link ">
                                    <div class="sidebar-menu-icon">
                                        <i class="bi bi-calendar-plus"></i>
                    
                                    </div>
                                    Classes 
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="{{route('classes.create')}}" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                        <i class="bi bi-arrow-up-right-circle"></i>
                    
                                    </div>
                                    Add Classes
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Semester Management</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="{{ route('semesters.show') }}" class="sidebar-dropdown-link ">
                                    <div class="sidebar-menu-icon">
                                        <i class="bi bi-calendar-plus"></i>
                    
                                    </div>
                                    Create Semesters
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                        <i class="bi bi-arrow-up-right-circle"></i>
                    
                                    </div>
                                    Promote Students
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <span class="sidebar-menu-text">Attendance</span>
                    </a>
                </li>

               <li class="sidebar-menu-item">
    <a href="{{route('management.notification.view')}}" class="sidebar-menu-link">
        <div class="sidebar-menu-icon" style="position: relative;">
            <i class="bi bi-bell-fill"></i>
            @php $unreadCount = Auth::user()->notifications()->wherePivot('is_read', false)->count(); @endphp
            @if($unreadCount > 0)
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1 border border-light rounded-circle" style="font-size: 0.5rem;">
                    {{ $unreadCount }}
                </span>
            @endif
        </div>
        <span class="sidebar-menu-text">Notifications</span>
    </a>
</li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-clipboard-data"></i>
                        </div>
                        <span class="sidebar-menu-text">Marks Review</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-divider"></div>

            <!-- Logout -->
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-clipboard-data"></i>
                        </div>
                        <span class="sidebar-menu-text">Profile</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" onclick="confirmLogout(event)" class="sidebar-footer-link logout">
    <i class="bi bi-box-arrow-right"></i> Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
function confirmLogout(event) {
    event.preventDefault(); // Stop the link from navigating
    
    // Custom Alert Message
    if (confirm("Are you sure you want to log out of your medical portal?")) {
        document.getElementById('logout-form').submit();
    }
}
</script>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <button class="mobile-toggle" id="mobileToggle">
                <i class="bi bi-list"></i>
                <i class="bi bi-x"></i>
            </button>

            <div class="search-container">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search for anything...">
                </div>
            </div>

            <div class="header-right">
                <button class="header-icon-btn" title="Notifications">
                    <i class="bi bi-bell-fill"></i>
                    <span class="badge">8</span>
                </button>
                <button class="header-icon-btn" title="Messages">
                    <i class="bi bi-envelope-fill"></i>
                    <span class="badge">4</span>
                </button>
                <button class="header-icon-btn" title="Settings">
                    <i class="bi bi-gear-fill"></i>
                </button>
                <div class="header-profile">
                        <div class="profile-image-wrapper">
    @php
        // This helper variable makes the code cleaner
        $profile = Auth::user()->teacherProfile;
    @endphp

    @if($profile && $profile->profile_photo)
        <img src="{{ asset('storage/' . $profile->profile_photo) }}" 
             alt="{{ Auth::user()->name }}"
             class="rounded-circle"
             style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #83c5be;">
    @else
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=83c5be&color=fff&size=100&length=2" 
             alt="{{ Auth::user()->name }}">
    @endif
</div>
                    <div class="header-profile-info">
                        <span class="header-profile-name">{{ Auth::user()->name }}</span>
    <span class="header-profile-role">{{ ucfirst(Auth::user()->role) }}</span>
    
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Management <span class="highlight">Dashboard</span></h1>
                <p class="page-subtitle">Manage all university operations from one central location</p>
            </div>

            <!-- Quick Stats -->
            <div class="quick-stats">
                <div class="stat-box">
                    <div class="stat-box-icon"
                        style="background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1)); color: #006d77;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-box-content">
                        <div class="stat-box-value">5,248</div>
                        <div class="stat-box-label">Total Students</div>
                    </div>
                </div>

                <div class="stat-box">
                    <div class="stat-box-icon"
                        style="background: linear-gradient(135deg, rgba(131, 197, 190, 0.2), rgba(131, 197, 190, 0.1)); color: #00897b;">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div class="stat-box-content">
                        <div class="stat-box-value">328</div>
                        <div class="stat-box-label">Faculty Members</div>
                    </div>
                </div>

                <div class="stat-box">
                    <div class="stat-box-icon"
                        style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2)); color: #43a047;">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="stat-box-content">
                        <div class="stat-box-value">₹2.4M</div>
                        <div class="stat-box-label">Pending Fees</div>
                    </div>
                </div>

                <div class="stat-box">
                    <div class="stat-box-icon"
                        style="background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2)); color: #fb8c00;">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="stat-box-content">
                        <div class="stat-box-value">92%</div>
                        <div class="stat-box-label">Attendance Rate</div>
                    </div>
                </div>
            </div>

            <!-- Management Cards -->
            <div class="management-grid">
                <a href="{{route('students.index')}}" class="management-card">
                    <div class="management-card-icon students">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <h3 class="management-card-title">Add Student</h3>
                    <p class="management-card-description">Register new students and manage enrollments</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">156</div>
                            <div class="management-card-label">This Month</div>
                        </div>
                        <div class="management-card-action">
                            Add New
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="{{route('management.teacher.index')}}" class="management-card">
                    <div class="management-card-icon teachers">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <h3 class="management-card-title">Add Teacher</h3>
                    <p class="management-card-description">Add faculty members and manage profiles</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">{{ $teacherCount }}</div>
                            <div class="management-card-label">New Faculty</div>
                        </div>
                        <div class="management-card-action">
                            Add New
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="management-card">
                    <div class="management-card-icon fee">
                        <i class="bi bi-receipt"></i>
                    </div>
                    <h3 class="management-card-title">Fee Challan</h3>
                    <p class="management-card-description">Generate and manage fee payment challans</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">432</div>
                            <div class="management-card-label">Pending</div>
                        </div>
                        <div class="management-card-action">
                            Generate
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="management-card">
                    <div class="management-card-icon courses">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    <h3 class="management-card-title">Courses</h3>
                    <p class="management-card-description">Create courses and assign teachers</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">156</div>
                            <div class="management-card-label">Active</div>
                        </div>
                        <div class="management-card-action">
                            Manage
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="management-card">
                    <div class="management-card-icon timetable">
                        <i class="bi bi-calendar3"></i>
                    </div>
                    <h3 class="management-card-title">Timetable</h3>
                    <p class="management-card-description">Schedule and manage class timetables</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">24</div>
                            <div class="management-card-label">Today</div>
                        </div>
                        <div class="management-card-action">
                            View
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="{{ url('/management/classes') }}" class="management-card">
    <div class="management-card-icon classes">
        <i class="bi bi-book-half"></i>
    </div>
    <h3 class="management-card-title">Classes</h3>
    <p class="management-card-description">Create classes and their details.</p>
    <div class="management-card-stats">
        <div>
            <div class="management-card-count">{{ $totalClasses ?? 0 }}</div>
            <div class="management-card-label">Total Registered</div>
        </div>
        <div class="management-card-action">
            View
            <i class="bi bi-arrow-right"></i>
        </div>
    </div>
</a>

                <a href="" class="management-card">
                    <div class="management-card-icon semester">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <h3 class="management-card-title">Semester Management</h3>
                    <p class="management-card-description">Create semesters and promote students</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">8</div>
                            <div class="management-card-label">Semesters</div>
                        </div>
                        <div class="management-card-action">
                            Manage
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="management-card">
                    <div class="management-card-icon attendance">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <h3 class="management-card-title">Attendance</h3>
                    <p class="management-card-description">Track and manage student attendance</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">92%</div>
                            <div class="management-card-label">Average</div>
                        </div>
                        <div class="management-card-action">
                            Track
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="management-card">
                    <div class="management-card-icon notification">
                        <i class="bi bi-bell-fill"></i>
                    </div>
                    <h3 class="management-card-title">Notifications</h3>
                    <p class="management-card-description">Send announcements and alerts</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">15</div>
                            <div class="management-card-label">Active</div>
                        </div>
                        <div class="management-card-action">
                            Send
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="management-card">
                    <div class="management-card-icon marks">
                        <i class="bi bi-clipboard-data"></i>
                    </div>
                    <h3 class="management-card-title">Marks Review</h3>
                    <p class="management-card-description">Review and manage student grades</p>
                    <div class="management-card-stats">
                        <div>
                            <div class="management-card-count">856</div>
                            <div class="management-card-label">Entries</div>
                        </div>
                        <div class="management-card-action">
                            Review
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Recent Section -->
            <div class="recent-section">
                <!-- Recent Activities -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Activities</h3>
                        <button class="card-action-btn">
                            View All
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1)); color: #006d77;">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New Student Registration</div>
                                <div class="activity-text">John Doe registered for MBBS program</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    5 minutes ago
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2)); color: #43a047;">
                                <i class="bi bi-credit-card-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Fee Payment Received</div>
                                <div class="activity-text">₹50,000 received from Sarah Johnson</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    10 minutes ago
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(0, 180, 216, 0.1), rgba(0, 180, 216, 0.2)); color: #0097a7;">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Course Created</div>
                                <div class="activity-text">Advanced Pharmacology course added</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    30 minutes ago
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(131, 197, 190, 0.2), rgba(131, 197, 190, 0.1)); color: #00897b;">
                                <i class="bi bi-person-badge-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Teacher Assignment</div>
                                <div class="activity-text">Dr. Smith assigned to Anatomy course</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    1 hour ago
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2)); color: #fb8c00;">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Student Promotion</div>
                                <div class="activity-text">45 students promoted to 3rd semester</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    2 hours ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Tasks -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Pending Tasks</h3>
                        <button class="card-action-btn">
                            View All
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.2)); color: #ff6b6b;">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Approve Student Registrations</div>
                                <div class="activity-text">23 pending student registrations</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    High Priority
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(96, 125, 139, 0.1), rgba(96, 125, 139, 0.2)); color: #546e7a;">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Review Exam Results</div>
                                <div class="activity-text">Mid-term results pending review</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    Due Today
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2)); color: #8e24aa;">
                                <i class="bi bi-calendar3"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Update Timetable</div>
                                <div class="activity-text">Next week's schedule needs update</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    Due Tomorrow
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(33, 150, 243, 0.1), rgba(33, 150, 243, 0.2)); color: #1976d2;">
                                <i class="bi bi-clipboard-check"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Process Attendance Reports</div>
                                <div class="activity-text">Generate monthly attendance report</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    Due in 2 days
                                </div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon"
                                style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2)); color: #43a047;">
                                <i class="bi bi-receipt"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Generate Fee Challans</div>
                                <div class="activity-text">Monthly fee challans pending</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    Due in 3 days
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Toggle dropdown menu
        function toggleDropdown(element) {
            const parent = element.parentElement;
            parent.classList.toggle('open');
        }

        // Mobile toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        mobileToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            mobileToggle.classList.remove('active');
        });

        // Add active class to clicked menu items
        const menuLinks = document.querySelectorAll('.sidebar-menu-link');
        menuLinks.forEach(link => {
            if (link.getAttribute('onclick') !== 'toggleDropdown(this)') {
                link.addEventListener('click', function (e) {
                    // Remove active class from all links
                    menuLinks.forEach(l => l.classList.remove('active'));
                    // Add active class to clicked link
                    this.classList.add('active');
                });
            }
        });

        
    </script>
</body>

</html>