<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | MediCare University</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        .sidebar-dropdown-link i {
            font-size: 0.4rem;
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

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 61, 68, 0.12);
        }

        .stat-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .stat-card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-card-icon.salary {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2));
            color: #43a047;
        }

        .stat-card-icon.courses {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .stat-card-icon.students {
            background: linear-gradient(135deg, rgba(131, 197, 190, 0.2), rgba(131, 197, 190, 0.1));
            color: #00897b;
        }

        .stat-card-icon.classes {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2));
            color: #8e24aa;
        }

        .stat-card-trend {
            display: flex;
            align-items: center;
            gap: 3px;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 15px;
        }

        .stat-card-trend.up {
            background: rgba(76, 175, 80, 0.1);
            color: #43a047;
        }

        .stat-card-trend.down {
            background: rgba(244, 67, 54, 0.1);
            color: #e53935;
        }

        .stat-card-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #003d44;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-card-label {
            color: #005459;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .stat-card-footer {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid rgba(0, 109, 119, 0.1);
            display: flex;
            align-items: center;
            gap: 6px;
            color: #80cbc4;
            font-size: 0.75rem;
        }

        /* Quick Actions Grid */
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .quick-action-card {
            background: white;
            border-radius: 16px;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            transition: all 0.4s ease;
            cursor: pointer;
            border: 2px solid transparent;
            text-decoration: none;
        }

        .quick-action-card:hover {
            transform: translateY(-5px);
            border-color: #83c5be;
            box-shadow: 0 15px 40px rgba(0, 61, 68, 0.12);
        }

        .quick-action-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 15px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .quick-action-card:hover .quick-action-icon {
            transform: scale(1.1);
        }

        .quick-action-icon.attendance {
            background: linear-gradient(135deg, rgba(33, 150, 243, 0.1), rgba(33, 150, 243, 0.2));
            color: #1976d2;
        }

        .quick-action-icon.quiz {
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2));
            color: #fb8c00;
        }

        .quick-action-icon.assignment {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2));
            color: #8e24aa;
        }

        .quick-action-icon.presentation {
            background: linear-gradient(135deg, rgba(0, 180, 216, 0.1), rgba(0, 180, 216, 0.2));
            color: #0097a7;
        }

        .quick-action-icon.exam {
            background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(244, 67, 54, 0.2));
            color: #e53935;
        }

        .quick-action-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 5px;
        }

        .quick-action-count {
            font-size: 1.4rem;
            font-weight: 700;
            color: #006d77;
            line-height: 1;
        }

        /* Main Grid */
        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        /* Card Base */
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

        .card-actions {
            display: flex;
            gap: 8px;
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

        /* Today's Schedule */
        .schedule-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .schedule-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8feff;
            border-radius: 12px;
            border-left: 4px solid;
            transition: all 0.3s ease;
        }

        .schedule-item:hover {
            transform: translateX(5px);
            background: #e0f2f1;
        }

        .schedule-item.ongoing {
            border-color: #43a047;
            background: rgba(76, 175, 80, 0.05);
        }

        .schedule-item.upcoming {
            border-color: #006d77;
        }

        .schedule-item.completed {
            border-color: #80cbc4;
            opacity: 0.7;
        }

        .schedule-time {
            text-align: center;
            min-width: 60px;
        }

        .schedule-time-start {
            font-size: 0.9rem;
            font-weight: 700;
            color: #003d44;
        }

        .schedule-time-end {
            font-size: 0.75rem;
            color: #80cbc4;
        }

        .schedule-content {
            flex: 1;
        }

        .schedule-course {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 2px;
        }

        .schedule-details {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.8rem;
            color: #005459;
        }

        .schedule-badge {
            padding: 3px 8px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            font-size: 0.65rem;
            border-radius: 10px;
            font-weight: 600;
        }

        /* Pending Tasks */
        .task-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .task-item {
            padding: 12px;
            background: #f8feff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .task-item:hover {
            background: #e0f2f1;
            transform: translateX(5px);
        }

        .task-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #83c5be;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .task-item:hover .task-checkbox {
            background: #83c5be;
            color: white;
        }

        .task-content {
            flex: 1;
        }

        .task-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 2px;
        }

        .task-meta {
            font-size: 0.75rem;
            color: #80cbc4;
        }

        .task-priority {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 0.65rem;
            font-weight: 600;
        }

        .task-priority.high {
            background: rgba(244, 67, 54, 0.1);
            color: #e53935;
        }

        .task-priority.medium {
            background: rgba(255, 152, 0, 0.1);
            color: #fb8c00;
        }

        .task-priority.low {
            background: rgba(76, 175, 80, 0.1);
            color: #43a047;
        }

        /* Course Cards */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .course-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
        }

        .course-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 61, 68, 0.12);
        }

        .course-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .course-code {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .course-students {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #80cbc4;
            font-size: 0.8rem;
        }

        .course-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 8px;
        }

        .course-schedule {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #005459;
            font-size: 0.8rem;
            margin-bottom: 12px;
        }

        .course-progress {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(0, 109, 119, 0.1);
        }

        .course-progress-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .course-progress-label {
            font-size: 0.75rem;
            color: #005459;
        }

        .course-progress-value {
            font-size: 0.75rem;
            font-weight: 600;
            color: #006d77;
        }

        .course-progress-bar {
            height: 6px;
            background: rgba(0, 109, 119, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .course-progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-radius: 10px;
            transition: width 1s ease;
        }

        /* Pay Structure Card */
        .pay-structure-card {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.05), rgba(76, 175, 80, 0.02));
            border: 1px solid rgba(76, 175, 80, 0.2);
        }

        .pay-breakdown {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .pay-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
            background: white;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .pay-item:hover {
            background: #f8feff;
            transform: translateX(5px);
        }

        .pay-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: #003d44;
        }

        .pay-icon {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2));
            color: #43a047;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .pay-amount {
            font-size: 0.95rem;
            font-weight: 700;
            color: #43a047;
        }

        .pay-total {
            margin-top: 10px;
            padding-top: 15px;
            border-top: 2px solid rgba(76, 175, 80, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .pay-total-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
        }

        .pay-total-amount {
            font-size: 1.3rem;
            font-weight: 800;
            color: #43a047;
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
        @media (max-width: 1400px) {
            .course-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-actions-grid {
                grid-template-columns: repeat(5, 1fr);
                gap: 15px;
            }
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-grid {
                grid-template-columns: 1fr;
            }

            .course-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-actions-grid {
                grid-template-columns: repeat(3, 1fr);
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

            .quick-actions-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .course-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .header-profile-info {
                display: none;
            }
            .search-container{
                display: none;
            }
            .search-box{
                display: none;
            }
        }

        @media (max-width: 576px) {
            .quick-actions-grid {
                grid-template-columns: 1fr;
            }

            .search-container {
                display: none;
            }
            .search-box{
                display: none;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card,
        .dashboard-card,
        .quick-action-card,
        .course-card {
            animation: fadeIn 0.6s ease forwards;
        }

        .stat-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stat-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stat-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stat-card:nth-child(4) {
            animation-delay: 0.4s;
        }
    </style>
</head>

<body>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ========== SIDEBAR ========== -->
    <aside class="sidebar" id="sidebar">
        <!-- Logo -->
        <a href="#" class="sidebar-logo">
            <div class="sidebar-logo-icon">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>
            <div class="sidebar-logo-text">
                <span class="sidebar-logo-title">MediCare</span>
                <span class="sidebar-logo-subtitle">Teacher Portal</span>
            </div>
        </a>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <div class="sidebar-nav-title">Main Menu</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{route('teacher.dashboard')}}" class="sidebar-menu-link active">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <span class="sidebar-menu-text">Pay Structure</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Courses</span>
                    </a>
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
                            <i class="bi bi-clipboard-data"></i>
                        </div>
                        <span class="sidebar-menu-text">Marks</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                        <i class="bi bi-patch-question"></i>
                                    </div>
                                    
                                <span class="sidebar-menu-text">Quiz</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                         <i class="bi bi-journal-text"></i>
                                    </div>
                                   <span class="sidebar-menu-text">Assignment</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-easel"></i>

                                    </div>
                                    <span class="sidebar-menu-text">Presentation</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-file-earmark-bar-graph"></i>

                                    </div>
                                    <span class="sidebar-menu-text">Midterm</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-mortarboard"></i>

                                    </div>
                                    <span class="sidebar-menu-text">Final</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-bell-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Notifications</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-divider"></div>

            <!-- Logout -->
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{ route('teacher.profile') }}" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-circle"></i>
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
                    <input type="text" placeholder="Search students, courses, materials...">
                </div>
            </div>

            <div class="header-right">
                <button class="header-icon-btn" title="Notifications">
                    <i class="bi bi-bell-fill"></i>
                    <span class="badge">5</span>
                </button>
                <button class="header-icon-btn" title="Messages">
                    <i class="bi bi-envelope-fill"></i>
                    <span class="badge">3</span>
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
            <!-- Page Header -->
            <div class="page-header">
                <p class="page-subtitle">Welcome back, <span class="student-name-highlight" >{{ Auth::user()->name }}!</span> Here's your teaching overview for today.</p>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon salary">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="stat-card-trend up">
                            <i class="bi bi-arrow-up"></i>
                            5%
                        </div>
                    </div>
                    <div class="stat-card-value">₹85,000</div>
                    <div class="stat-card-label">Monthly Salary</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-calendar"></i>
                        Next payment in 15 days
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon courses">
                            <i class="bi bi-book-fill"></i>
                        </div>
                    </div>
                    <div class="stat-card-value">6</div>
                    <div class="stat-card-label">Active Courses</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-clock"></i>
                        2 new this semester
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon students">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-card-trend up">
                            <i class="bi bi-arrow-up"></i>
                            12%
                        </div>
                    </div>
                    <div class="stat-card-value">248</div>
                    <div class="stat-card-label">Total Students</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-person-plus"></i>
                        32 new students
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon classes">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                    </div>
                    <div class="stat-card-value">18</div>
                    <div class="stat-card-label">Classes This Week</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-clock"></i>
                        4 classes today
                    </div>
                </div>
            </div>

            <!-- Quick Actions for Marks -->
            <div class="quick-actions-grid">
                <a href="#" class="quick-action-card">
                    <div class="quick-action-icon quiz">
                        <i class="bi bi-question-circle-fill"></i>
                    </div>
                    <div class="quick-action-title">Quiz</div>
                    <div class="quick-action-count">12</div>
                </a>

                <a href="#" class="quick-action-card">
                    <div class="quick-action-icon assignment">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>
                    <div class="quick-action-title">Assignment</div>
                    <div class="quick-action-count">8</div>
                </a>

                <a href="#" class="quick-action-card">
                    <div class="quick-action-icon presentation">
                        <i class="bi bi-easel-fill"></i>
                    </div>
                    <div class="quick-action-title">Presentation</div>
                    <div class="quick-action-count">5</div>
                </a>

                <a href="#" class="quick-action-card">
                    <div class="quick-action-icon exam">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="quick-action-title">Midterm</div>
                    <div class="quick-action-count">2</div>
                </a>

                <a href="#" class="quick-action-card">
                    <div class="quick-action-icon exam">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="quick-action-title">Final</div>
                    <div class="quick-action-count">1</div>
                </a>
            </div>

            <!-- Main Grid -->
            <div class="main-grid">
                <!-- Today's Schedule -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Today's Schedule</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                <i class="bi bi-calendar3"></i>
                                View Full
                            </button>
                        </div>
                    </div>
                    <div class="schedule-list">
                        <div class="schedule-item ongoing">
                            <div class="schedule-time">
                                <div class="schedule-time-start">9:00</div>
                                <div class="schedule-time-end">10:30</div>
                            </div>
                            <div class="schedule-content">
                                <div class="schedule-course">Human Anatomy</div>
                                <div class="schedule-details">
                                    <span><i class="bi bi-geo-alt"></i> Room 201</span>
                                    <span><i class="bi bi-people"></i> 45 students</span>
                                    <span class="schedule-badge">Ongoing</span>
                                </div>
                            </div>
                        </div>

                        <div class="schedule-item upcoming">
                            <div class="schedule-time">
                                <div class="schedule-time-start">11:00</div>
                                <div class="schedule-time-end">12:30</div>
                            </div>
                            <div class="schedule-content">
                                <div class="schedule-course">Physiology Lab</div>
                                <div class="schedule-details">
                                    <span><i class="bi bi-geo-alt"></i> Lab 3</span>
                                    <span><i class="bi bi-people"></i> 25 students</span>
                                </div>
                            </div>
                        </div>

                        <div class="schedule-item upcoming">
                            <div class="schedule-time">
                                <div class="schedule-time-start">14:00</div>
                                <div class="schedule-time-end">15:30</div>
                            </div>
                            <div class="schedule-content">
                                <div class="schedule-course">Clinical Medicine</div>
                                <div class="schedule-details">
                                    <span><i class="bi bi-geo-alt"></i> Room 305</span>
                                    <span><i class="bi bi-people"></i> 38 students</span>
                                </div>
                            </div>
                        </div>

                        <div class="schedule-item upcoming">
                            <div class="schedule-time">
                                <div class="schedule-time-start">16:00</div>
                                <div class="schedule-time-end">17:00</div>
                            </div>
                            <div class="schedule-content">
                                <div class="schedule-course">Student Consultations</div>
                                <div class="schedule-details">
                                    <span><i class="bi bi-geo-alt"></i> Office</span>
                                    <span><i class="bi bi-people"></i> 5 appointments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Tasks -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Pending Tasks</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                View All
                            </button>
                        </div>
                    </div>
                    <div class="task-list">
                        <div class="task-item">
                            <div class="task-checkbox">
                                <i class="bi bi-check"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Grade Midterm Papers</div>
                                <div class="task-meta">45 papers pending</div>
                            </div>
                            <span class="task-priority high">High</span>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox">
                                <i class="bi bi-check"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Upload Lecture Notes</div>
                                <div class="task-meta">Chapter 5 & 6</div>
                            </div>
                            <span class="task-priority medium">Medium</span>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox">
                                <i class="bi bi-check"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Review Assignments</div>
                                <div class="task-meta">28 submissions</div>
                            </div>
                            <span class="task-priority medium">Medium</span>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox">
                                <i class="bi bi-check"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Prepare Quiz Questions</div>
                                <div class="task-meta">For next week</div>
                            </div>
                            <span class="task-priority low">Low</span>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox">
                                <i class="bi bi-check"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Update Attendance</div>
                                <div class="task-meta">Last 3 days</div>
                            </div>
                            <span class="task-priority high">High</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Courses -->
            <div class="dashboard-card" style="margin-bottom: 25px;">
                <div class="card-header">
                    <h3 class="card-title">My Courses</h3>
                    <div class="card-actions">
                        <button class="card-action-btn">
                            <i class="bi bi-plus"></i>
                            View All
                        </button>
                    </div>
                </div>
                <div class="course-grid">
                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-code">MED-101</span>
                            <span class="course-students">
                                <i class="bi bi-people"></i> 45
                            </span>
                        </div>
                        <h4 class="course-title">Human Anatomy</h4>
                        <div class="course-schedule">
                            <i class="bi bi-clock"></i>
                            Mon, Wed, Fri - 9:00 AM
                        </div>
                        <div class="course-progress">
                            <div class="course-progress-header">
                                <span class="course-progress-label">Course Progress</span>
                                <span class="course-progress-value">65%</span>
                            </div>
                            <div class="course-progress-bar">
                                <div class="course-progress-fill" style="width: 65%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-code">MED-205</span>
                            <span class="course-students">
                                <i class="bi bi-people"></i> 38
                            </span>
                        </div>
                        <h4 class="course-title">Clinical Medicine</h4>
                        <div class="course-schedule">
                            <i class="bi bi-clock"></i>
                            Tue, Thu - 2:00 PM
                        </div>
                        <div class="course-progress">
                            <div class="course-progress-header">
                                <span class="course-progress-label">Course Progress</span>
                                <span class="course-progress-value">48%</span>
                            </div>
                            <div class="course-progress-bar">
                                <div class="course-progress-fill" style="width: 48%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-code">LAB-103</span>
                            <span class="course-students">
                                <i class="bi bi-people"></i> 25
                            </span>
                        </div>
                        <h4 class="course-title">Physiology Lab</h4>
                        <div class="course-schedule">
                            <i class="bi bi-clock"></i>
                            Mon, Wed - 11:00 AM
                        </div>
                        <div class="course-progress">
                            <div class="course-progress-header">
                                <span class="course-progress-label">Course Progress</span>
                                <span class="course-progress-value">72%</span>
                            </div>
                            <div class="course-progress-bar">
                                <div class="course-progress-fill" style="width: 72%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-code">MED-301</span>
                            <span class="course-students">
                                <i class="bi bi-people"></i> 52
                            </span>
                        </div>
                        <h4 class="course-title">Pathology</h4>
                        <div class="course-schedule">
                            <i class="bi bi-clock"></i>
                            Tue, Fri - 10:00 AM
                        </div>
                        <div class="course-progress">
                            <div class="course-progress-header">
                                <span class="course-progress-label">Course Progress</span>
                                <span class="course-progress-value">55%</span>
                            </div>
                            <div class="course-progress-bar">
                                <div class="course-progress-fill" style="width: 55%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-code">MED-402</span>
                            <span class="course-students">
                                <i class="bi bi-people"></i> 35
                            </span>
                        </div>
                        <h4 class="course-title">Surgery Basics</h4>
                        <div class="course-schedule">
                            <i class="bi bi-clock"></i>
                            Thu - 3:00 PM
                        </div>
                        <div class="course-progress">
                            <div class="course-progress-header">
                                <span class="course-progress-label">Course Progress</span>
                                <span class="course-progress-value">40%</span>
                            </div>
                            <div class="course-progress-bar">
                                <div class="course-progress-fill" style="width: 40%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-code">MED-106</span>
                            <span class="course-students">
                                <i class="bi bi-people"></i> 33
                            </span>
                        </div>
                        <h4 class="course-title">Medical Ethics</h4>
                        <div class="course-schedule">
                            <i class="bi bi-clock"></i>
                            Fri - 4:00 PM
                        </div>
                        <div class="course-progress">
                            <div class="course-progress-header">
                                <span class="course-progress-label">Course Progress</span>
                                <span class="course-progress-value">80%</span>
                            </div>
                            <div class="course-progress-bar">
                                <div class="course-progress-fill" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pay Structure -->
            <div class="main-grid">
                <div class="dashboard-card pay-structure-card">
                    <div class="card-header">
                        <h3 class="card-title">Pay Structure - December 2024</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                <i class="bi bi-download"></i>
                                Download
                            </button>
                        </div>
                    </div>
                    <div class="pay-breakdown">
                        <div class="pay-item">
                            <div class="pay-label">
                                <div class="pay-icon">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                                <span>Basic Salary</span>
                            </div>
                            <span class="pay-amount">₹60,000</span>
                        </div>

                        <div class="pay-item">
                            <div class="pay-label">
                                <div class="pay-icon">
                                    <i class="bi bi-house"></i>
                                </div>
                                <span>House Rent Allowance</span>
                            </div>
                            <span class="pay-amount">₹12,000</span>
                        </div>

                        <div class="pay-item">
                            <div class="pay-label">
                                <div class="pay-icon">
                                    <i class="bi bi-heart-pulse"></i>
                                </div>
                                <span>Medical Allowance</span>
                            </div>
                            <span class="pay-amount">₹5,000</span>
                        </div>

                        <div class="pay-item">
                            <div class="pay-label">
                                <div class="pay-icon">
                                    <i class="bi bi-bus-front"></i>
                                </div>
                                <span>Transport Allowance</span>
                            </div>
                            <span class="pay-amount">₹3,000</span>
                        </div>

                        <div class="pay-item">
                            <div class="pay-label">
                                <div class="pay-icon">
                                    <i class="bi bi-award"></i>
                                </div>
                                <span>Performance Bonus</span>
                            </div>
                            <span class="pay-amount">₹5,000</span>
                        </div>

                        <div class="pay-total">
                            <span class="pay-total-label">Total Monthly Salary</span>
                            <span class="pay-total-amount">₹85,000</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Notifications -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Notifications</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                View All
                            </button>
                        </div>
                    </div>
                    <div class="task-list">
                        <div class="task-item">
                            <div class="task-checkbox"
                                style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(244, 67, 54, 0.2)); color: #e53935;">
                                <i class="bi bi-exclamation"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Assignment Deadline</div>
                                <div class="task-meta">Tomorrow at 5:00 PM</div>
                            </div>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox"
                                style="background: linear-gradient(135deg, rgba(33, 150, 243, 0.1), rgba(33, 150, 243, 0.2)); color: #1976d2;">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Faculty Meeting</div>
                                <div class="task-meta">Friday, 2:00 PM</div>
                            </div>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox"
                                style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2)); color: #43a047;">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Grades Submitted</div>
                                <div class="task-meta">MED-101 grades approved</div>
                            </div>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox"
                                style="background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2)); color: #fb8c00;">
                                <i class="bi bi-bell"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">New Enrollment</div>
                                <div class="task-meta">5 new students in MED-301</div>
                            </div>
                        </div>

                        <div class="task-item">
                            <div class="task-checkbox"
                                style="background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2)); color: #8e24aa;">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="task-content">
                                <div class="task-title">Course Material Updated</div>
                                <div class="task-meta">New resources available</div>
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

       

        // Task checkbox interaction
        document.querySelectorAll('.task-item').forEach(task => {
            task.addEventListener('click', function () {
                const checkbox = this.querySelector('.task-checkbox');
                checkbox.innerHTML = '<i class="bi bi-check"></i>';
                this.style.opacity = '0.6';
            });
        });
    </script>
</body>

</html>