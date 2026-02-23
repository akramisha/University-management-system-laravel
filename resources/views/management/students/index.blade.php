<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Add Student</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

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

        .sidebar-dropdown-link.active {
            background: rgba(131, 197, 190, 0.15);
            color: #83c5be;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-header-left {
            flex: 1;
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

        /* Breadcrumb */
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
        }

        .breadcrumb-nav a {
            color: #006d77;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            color: #00b4d8;
        }

        .breadcrumb-nav span {
            color: #80cbc4;
        }

        .breadcrumb-nav .current {
            color: #003d44;
            font-weight: 600;
        }

        /* Instruction Card */
        .instruction-card {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.05), rgba(0, 180, 216, 0.08));
            border: 2px dashed rgba(0, 109, 119, 0.2);
            border-radius: 16px;
            padding: 25px 30px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .instruction-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .instruction-content h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 5px;
        }

        .instruction-content p {
            font-size: 0.9rem;
            color: #005459;
            margin: 0;
        }

        /* Program Section */
        .program-section {
            margin-bottom: 35px;
        }

        .program-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(0, 109, 119, 0.1);
        }

        .program-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }


        .program-info h2 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #003d44;
            margin: 0;
        }

        .program-info p {
            font-size: 0.8rem;
            color: #80cbc4;
            margin: 0;
        }

        .program-actions {
    margin-left: auto;          /* pushes whole group to right */
    display: flex;
    gap: 10px;                  /* space between badges */
    align-items: center;
}

.program-badge {
    background: #f8feff;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    color: #006d77;
    white-space: nowrap;
}

/* No Semester Card */
.no-semester-card {
    position: relative;
    background: white;
    border-radius: 14px;
    padding: 30px 20px;
    text-align: center;
    color: #555;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(0, 61, 68, 0.06);
    transition: all 0.3s ease;
    cursor: default;
}

/* Top color line (like your hover) */
.no-semester-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--card-color);
}

/* Icon above text */
.no-semester-icon {
    font-size: 2rem;
    color: var(--card-color);
    margin-bottom: 10px;
}

/* Text */
.no-semester-text {
    margin: 0;
    font-size: 1rem;
    color: #333;
}

/* Optional: shadow + hover effect (like semester cards) */
.no-semester-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 61, 68, 0.1);
}


        /* Semester Cards Grid */
        .semester-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        /* Semester Selection Card */
        .semester-select-card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 61, 68, 0.06);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
            text-decoration: none;
            display: block;
            position: relative;
            overflow: hidden;
        }

      .semester-select-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--card-color);

    /* HIDDEN STATE */
    opacity: 0;
    transform: scaleX(0);
    transform-origin: left;

    transition: transform 0.3s ease, opacity 0.2s ease;
}


.semester-select-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 61, 68, 0.12);
}

.semester-select-card:hover::before {
    opacity: 1;
    transform: scaleX(1);
}




        .semester-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

       .semester-number {
    width: 42px;
    height: 42px;
    border-radius: 10px;

    background: var(--sem-color);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 1.1rem;
    font-weight: 700;

    transition: background 0.3s ease, color 0.3s ease;
}


        .semester-arrow {
    width: 32px;
    height: 32px;
    border-radius: 8px;

    /* DEFAULT STATE */
    background: #f8feff;
    color: #80cbc4;

    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;

    transition: background 0.3s ease, color 0.3s ease;
}


       .semester-select-card:hover .semester-arrow {
    background: var(--arrow-bg);
    color: #ffffff;
}


        .semester-card-title {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 5px;
        }

        .semester-card-info {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.75rem;
            color: #80cbc4;
        }

        .semester-card-info span {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .semester-card-info i {
            font-size: 0.7rem;
        }

        /* Stats Summary */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-mini-card {
            background: white;
            border-radius: 14px;
            padding: 18px 20px;
            box-shadow: 0 4px 15px rgba(0, 61, 68, 0.06);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-mini-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .stat-mini-content {
            flex: 1;
        }

        .stat-mini-value {
            font-size: 1.3rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
        }

        .stat-mini-label {
            font-size: 0.75rem;
            color: #80cbc4;
            margin-top: 3px;
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
            .stats-row {
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

            .semester-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-row {
                grid-template-columns: 1fr 1fr;
            }

            .semester-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .header-profile-info {
                display: none;
            }

            .instruction-card {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .stats-row {
                grid-template-columns: 1fr;
            }

            .semester-grid {
                grid-template-columns: 1fr;
            }

            .search-container {
                display: none;
            }

            .program-header {
                flex-wrap: wrap;
            }

            .program-badge {
                margin-left: 0;
                margin-top: 10px;
                width: 100%;
                text-align: center;
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
                    <a href="{{route('management.dashboard')}}" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="" class="sidebar-menu-link active" >
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Add Student</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="{{route('management.teacher.index')}}" class="sidebar-menu-link">
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
                                <a href="{{url('/management/classes')}}" class="sidebar-dropdown-link ">
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
                                <a href="{{route('semesters.show')}}" class="sidebar-dropdown-link ">
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
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-bell-fill"></i>
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
                    <input type="text" placeholder="Search Students...">
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
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=83c5be&color=fff&size=100&length=2" alt="{{ Auth::user()->name }}">

                    <div class="header-profile-info">
                        <span class="header-profile-name">{{ Auth::user()->name }}</span>
    <span class="header-profile-role">{{ ucfirst(Auth::user()->role) }}</span>
    
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Breadcrumb -->
            <nav class="breadcrumb-nav">
                <a href="{{route('management.dashboard')}}"><i class="bi bi-house-fill"></i></a>
                <span>/</span>
                <span class="current">Add Student</span>
            </nav>

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left">
                    <h1 class="page-title">Add <span class="highlight">Student</span></h1>
                    <p class="page-subtitle">Select a semester to add new student</p>
                </div>
            </div>

            <!-- Instruction Card -->
            <div class="instruction-card">
                <div class="instruction-icon">
                    <i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="instruction-content">
                    <h3>Select Semester First</h3>
                    <p>Choose the program and semester where you want to enroll the new student. Click on any semester
                        card below to proceed with the student registration form.</p>
                </div>
            </div>

            <!-- Stats Row -->
            <div class="stats-row">
                <div class="stat-mini-card">
                    <div class="stat-mini-icon"
                        style="background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.15)); color: #006d77;">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="stat-mini-content">
                        <div class="stat-mini-value">{{ $totalPrograms }}</div>
                        <div class="stat-mini-label">Programs</div>
                    </div>
                </div>

                <div class="stat-mini-card">
                    <div class="stat-mini-icon"
                        style="background: linear-gradient(135deg, rgba(67, 160, 71, 0.1), rgba(102, 187, 106, 0.15)); color: #43a047;">
                        <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="stat-mini-content">
                        <div class="stat-mini-value">{{ $activeSemestersCount }}</div>
                        <div class="stat-mini-label">Active Semesters</div>
                    </div>
                </div>

                <div class="stat-mini-card">
                    <div class="stat-mini-icon"
                        style="background: linear-gradient(135deg, rgba(251, 140, 0, 0.1), rgba(255, 167, 38, 0.15)); color: #fb8c00;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-mini-content">
                        <div class="stat-mini-value">5,248</div>
                        <div class="stat-mini-label">Total Students</div>
                    </div>
                </div>

                <div class="stat-mini-card">
                    <div class="stat-mini-icon"
                        style="background: linear-gradient(135deg, rgba(142, 36, 170, 0.1), rgba(171, 71, 188, 0.15)); color: #8e24aa;">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div class="stat-mini-content">
                        <div class="stat-mini-value">156</div>
                        <div class="stat-mini-label">New This Month</div>
                    </div>
                </div>
            </div>

           @foreach($classes as $class)
    <div class="program-section">
        <!-- Program Header (same for all classes) -->
        <div class="program-header">
            <div class="program-icon" style="background-color: {{ $class->color_hex }}22;">
                <i class="{{ $class->icon }}" style="color: {{ $class->color_hex }};"></i>
            </div>

            <div class="program-info">
                <h2>{{ $class->class_code }} | {{ $class->session }}</h2>
                <p>{{ $class->name }}</p>
            </div>

            <div class="program-actions">
                <span class="program-badge">
                    <a href="{{ route('students.class.view', $class->id) }}" class="program-badge" style="text-decoration: none">View all Students</a>
                </span>
                <span class="program-badge">
                    <a href="{{ route('students.create', ['class_id' => $class->id]) }}" class="program-badge" style="text-decoration: none">Add Student</a>
                </span>
                <span class="program-badge">{{ $class->semesters->count() }} Semesters</span>
            </div>
        </div>

        <!-- Semester Grid -->
        <div class="semester-grid">
            @if($class->semesters->isNotEmpty())
                @foreach($class->semesters as $semester)
                    <a href="{{ route('students.class.view', $class->id) }}" class="semester-select-card" style="--card-color: {{ $class->color_hex }};">
                        <div class="semester-card-top">
                            <div class="semester-number" style="--sem-color: {{ $class->color }};">
                                {{ $semester->semester_number }}
                            </div>
                            <div class="semester-arrow" style="--arrow-bg: {{ $class->color }};">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                        <h4 class="semester-card-title">Semester {{ $semester->semester_number }}</h4>
                        <div class="semester-card-info">
                            <span><i class="bi bi-people-fill"></i> 156 Students</span>
                            <span><i class="bi bi-book-fill"></i> 6 Courses</span>
                        </div>
                    </a>
                @endforeach
            @else
                <!-- No Semester Box (small width, same header styling remains) -->
                <div class="semester-select-card" style="--card-color: {{ $class->color_hex }}; ">
                     <div class="semester-card-top">
                    <div class="no-semester-icon">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                     </div>
                    <p class="semester-card-title">No Semester Found</p>
                </div>
            @endif
        </div>
    </div>
@endforeach

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

        
    </script>
</body>

</html>