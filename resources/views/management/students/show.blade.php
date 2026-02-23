<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Teacher Details</title>
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

        .sidebar-dropdown-link.active {
            background: rgba(131, 197, 190, 0.15);
            color: #83c5be;
        }

        .sidebar-dropdown-link i {
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
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

         .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #003d44;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title i {
            color: #006d77;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
        }

        .btn-delete {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .btn-delete:hover {
            background: #ff6b6b;
            color: white;
        }

        .btn-back {
            background: rgba(0, 109, 119, 0.1);
            color: #006d77;
        }

        .btn-back:hover {
            background: #006d77;
            color: white;
        }

        /* ========== TEACHER PROFILE ========== */
        .profile-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            text-align: center;
            height: fit-content;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: white;
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.2);
        }

        .profile-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 8px;
        }

        .profile-role {
            font-size: 0.9rem;
            color: #80cbc4;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .profile-divider {
            height: 1px;
            background: rgba(0, 109, 119, 0.1);
            margin: 20px 0;
        }

        .profile-info-item {
            text-align: left;
            margin-bottom: 18px;
        }

        .profile-info-label {
            font-size: 0.75rem;
            color: #80cbc4;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .profile-info-value {
            font-size: 0.95rem;
            color: #003d44;
            font-weight: 500;
        }

        .profile-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .profile-status.inactive {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* ========== FORM SECTION ========== */
        .form-section {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
        }

        .form-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(0, 109, 119, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card-title i {
            color: #006d77;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-required {
            color: #ff6b6b;
        }

        .form-input,
        .form-select {
            padding: 12px 15px;
            border: 2px solid #e0f2f1;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #003d44;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            background: white;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #83c5be;
            box-shadow: 0 0 15px rgba(131, 197, 190, 0.15);
        }

        .form-input:disabled,
        .form-select:disabled {
            background: #f8feff;
            color: #80cbc4;
            cursor: not-allowed;
        }

        .form-input::placeholder {
            color: #80cbc4;
        }

        .form-hint {
            font-size: 0.75rem;
            color: #80cbc4;
            margin-top: 5px;
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
            }

            .header,
            .main-content {
                margin-left: 0;
            }

            .profile-container {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-wrap: wrap;
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
                    <a href="{{route('management.dashboard')}}" class="sidebar-menu-link ">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="{{route('students.index')}}" class="sidebar-menu-link active">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Add Student</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="{{route('management.teacher.create')}}" class="sidebar-menu-link ">
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
                    <input type="text" placeholder="Search data..." id="searchInput">
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

    <div class="dashboard-content">
        <div class="page-header">
            <h1 class="page-title">
                <i class="bi bi-person-circle"></i>
                Student Details
            </h1>
            <div class="action-buttons">
               <a href="" class="btn-action btn-back" style="text-decoration: none;">
                    <i class="bi bi-arrow-left"></i>
                    Back
               </a>
                 <a href="" class="btn-action btn-edit" title="Edit">
    <i class="bi bi-pencil-fill"></i>
</a>
{{-- <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" 
      onsubmit="return confirm('⚠️ Are you sure? \n\nThis will permanently delete {{ $teacher->name }} and all associated files. This action cannot be undone.')">
    @csrf
    @method('DELETE')
    
    <button type="submit" class="btn-action btn-delete">
        <i class="bi bi-trash-fill"></i>
        Delete 
    </button>
</form> --}}
            </div>
        </div>

        <div class="profile-container">
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-avatar">
   

                         @if($student->profile_photo)
                            <img src="{{ asset('storage/' . $student->profile_photo) }}" class=" shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-light  d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 150px; height: 150px;">
                                <i class="bi bi-person-fill text-secondary" style="font-size: 4rem;"></i>
                            </div>
                        @endif
</div>
                <h2 class="profile-name">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h2>
                <p class="profile-role">{{ $student->student_reg_number }}</p>

                <div class="profile-status">
                    <span class="status-dot"></span>
                Active
                </div>

                <div class="profile-divider"></div>

                <div class="profile-info-item">
                    <div class="profile-info-label">CNIC</div>
                    <div class="profile-info-value">{{$student->cnic}}</div>
                </div>

                
                <div class="profile-info-item">
                    <div class="profile-info-label">Admission Date</div>
                    <div class="profile-info-value"> {{$student->admission_date }}</div>
                </div>

               
              
                <div class="profile-divider"></div>
               <h3 class="form-card-title" style=" border-bottom: none;">
                        <i class="bi bi-person-fill"></i>
                        Emergency Contact
                    </h3>

                <div class="profile-info-item">
                    <div class="profile-info-label">Contant Person Name</div>
                    <div class="profile-info-value">{{$student->guardian_name}} </div>
                </div>
                <div class="profile-info-item">
                    <div class="profile-info-label">Person Relationship</div>
                    <div class="profile-info-value">{{$student->guardian_relation}} </div>
                </div>
                <div class="profile-info-item">
                    <div class="profile-info-label">Person Number</div>
                    <div class="profile-info-value">{{$student->guardian_phone}}</div>
                </div>
                 <div class="profile-divider"></div>
                   <h3 class="form-card-title" style=" border-bottom: none;">
                        <i class="bi bi-book"></i>
                        Documents
                    </h3>
                <div class="profile-info-item">

                   <div class="documents-section ">
                    <div class="d-flex flex-wrap">
                        @php
                        $docs = is_string($student->documents) ? json_decode($student->documents, true) : $student->documents;
                        @endphp
                         @foreach($docs as $path)
                        <div class="doc-card p-2 border rounded bg-light d-flex align-items-center">
                            <i class="bi bi-file-earmark-pdf-fill text-danger me-2" style="font-size: 1.5rem;"></i>
                            <div class="doc-info">
                                <span class="d-block small fw-bold text-dark">Document </span>
                                <a href="{{ asset('storage/' . $path) }}" class="text-muted" target="_blank" 
                                style="text-decoration:none">Click to View</a>
                            </div>
                        </div>
                            
                        @endforeach
             
                    </div>
                    </div>
                </div>
                

            </div>

            <!-- Form Section -->
            <div class="form-section">
                <!-- Personal Information -->
                <div class="form-card">
                    <h3 class="form-card-title">
                        <i class="bi bi-person-fill"></i>
                        Personal Information
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-input" value="{{$student->first_name ?? 'N/A'}}" disabled>
                        </div>

                         <div class="form-group">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-input" value="{{$student->middle_name ?? 'N/A'}}" disabled>
                        </div>

                      
                    </div>

                     <div class="form-row">
                          <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-input" value="{{$student->last_name ?? 'N/A'}}" disabled>
                        </div>
                       
                       <div class="form-group">
                            <label class="form-label">Father Name</label>
                            <input type="text" class="form-input" value="{{$student->father_name ?? 'N/A'}}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
<div class="form-group">
    <label class="form-label">Date of Birth</label>
    <input type="date" class="form-input" 
           value="{{ $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : '' }}" 
           disabled>
</div>

                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <input type="text" class="form-input" value="{{$student->gender ?? 'N/A'}}" disabled>
                        </div>

                        
                    </div>
                    <div class="form-row">
                         <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-input" value="{{ $student->user->email ?? 'No Email Found' }}" disabled>
                        </div>
                       
                         <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-input" value=" {{$student->phone ?? 'N/A'}}" disabled>
                        </div>
                    </div>

                     <div class="form-row">
                         <div class="form-group">
                            <label class="form-label">Nationality</label>
                            <input type="text" class="form-input" value="{{$student->nationality ?? 'N/A'}}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Religion</label>
                            <input type="text" class="form-input" value="{{$student->religion ?? 'N/A'}}" disabled>
                        </div>
                         
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Material Status</label>
                            <input type="text" class="form-input" value=" {{$student->material_status ?? 'N/A'}}" disabled>
                        </div>
                    </div>
                    <div class="form-row full">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-input"
                                value=" {{$student->address ?? 'N/A'}}" disabled>
                        </div>
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="form-card">
                    <h3 class="form-card-title">
                       <i class="bi bi-bank"></i>
                        Fee Information
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Registration Fee </label>
                            <input type="text" class="form-input" value=" {{$student->registration_fee ?? 'N/A'}}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Semester Fee</label>
                            <input type="text" class="form-input" value="  {{$student->semester_fee ?? 'N/A'}}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Discount</label>
                            <input type="text" class="form-input" value=" {{$student->discount ?? 'N/A'}}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Total payable</label>
                            <input type="text" class="form-input" value=" {{$student->total_payable ?? 'N/A'}}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Payment Status</label>
                            <input type="text" class="form-input" value=" {{$student->payment_status ?? 'N/A'}}" disabled>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    </main>

    
</body>
 <script>
        function openEditModal(classData) {
    // Set the values in the form
    document.getElementById('edit_name').value = classData.name;
    document.getElementById('edit_color').value = classData.color;

    // Dynamically set the form action URL
    const form = document.getElementById('editClassForm');
    form.action = `/management/classes/${classData.id}`;

    // Show the modal
    document.getElementById('editClassModal').classList.add('active');
}

function closeEditModal() {
    document.getElementById('editClassModal').classList.remove('active');
}
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

        // Modal functions
        function openModal() {
            document.getElementById('addClassModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('addClassModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close modal when clicking outside
        document.getElementById('addClassModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // View toggle
        function switchView(view) {
            const gridView = document.getElementById('classesGrid');
            const listView = document.getElementById('classesList');
            const gridBtn = document.getElementById('gridViewBtn');
            const listBtn = document.getElementById('listViewBtn');

            if (view === 'grid') {
                gridView.classList.remove('hidden');
                listView.classList.remove('active');
                gridBtn.classList.add('active');
                listBtn.classList.remove('active');
            } else {
                gridView.classList.add('hidden');
                listView.classList.add('active');
                gridBtn.classList.remove('active');
                listBtn.classList.add('active');
            }
        }

        // Toast notification
        function showToast(type, title, message) {
            const toast = document.getElementById('toastNotification');
            const toastIcon = toast.querySelector('.toast-icon i');
            const toastTitle = toast.querySelector('.toast-title');
            const toastMessage = toast.querySelector('.toast-message');

            toast.className = 'toast-notification ' + type;
            toastIcon.className = type === 'success' ? 'bi bi-check-circle-fill' : 'bi bi-x-circle-fill';
            toastTitle.textContent = title;
            toastMessage.textContent = message;

            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }

        function hideToast() {
            document.getElementById('toastNotification').classList.remove('show');
        }

        // Form submit
        document.getElementById('addClassForm').addEventListener('submit', function (e) {
            e.preventDefault();
            showToast('success', 'Success!', 'Class has been created successfully.');
            closeModal();
            this.reset();
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.class-card');
            const listItems = document.querySelectorAll('.class-list-item');

            cards.forEach(card => {
                const code = card.querySelector('.class-code').textContent.toLowerCase();
                const name = card.querySelector('.class-name').textContent.toLowerCase();
                if (code.includes(searchTerm) || name.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });

            listItems.forEach(item => {
                const code = item.querySelector('.class-list-code').textContent.toLowerCase();
                const name = item.querySelector('.class-list-name').textContent.toLowerCase();
                if (code.includes(searchTerm) || name.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

       function switchView(view) {
    const gridView = document.getElementById('classesGrid');
    const listView = document.getElementById('classesList');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');

    if (view === 'grid') {
        // Show Grid, Hide List
        gridView.classList.remove('hidden');
        listView.classList.remove('active');
        
        // Button Colors
        gridBtn.classList.add('active');
        listBtn.classList.remove('active');
    } else {
        // Hide Grid, Show List
        gridView.classList.add('hidden');
        listView.classList.add('active');
        
        // Button Colors
        gridBtn.classList.remove('active');
        listBtn.classList.add('active');
    }
}
    </script>
</html>