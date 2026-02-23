
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | MediCare University</title>
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

        .sidebar-footer-links {
            display: flex;
            flex-direction: column;
            gap: 5px;
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

        .sidebar-footer-link i {
            width: 20px;
            text-align: center;
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

        .search-btn {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border: none;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 109, 119, 0.3);
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
        .dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 25px;
    gap: 20px; /* This creates a mandatory space between the three sections */
}

.header-left {
    display: flex;
    align-items: center;
    flex-shrink: 0; /* Prevents the name section from getting squashed */
    max-width: 30%; /* Limits how much room the name can take */
}

.page-title h2 {
    white-space: nowrap;      /* Keeps the greeting on one line */
    overflow: hidden;         /* Hides extra text if the name is TOO long */
    text-overflow: ellipsis;  /* Adds '...' if the name is cut off */
    font-size: 1.2rem;
}

.header-center {
    flex: 1;                 /* This makes the search bar take up all available space */
    display: flex;
    justify-content: center; /* Centers the search bar inside that space */
    min-width: 200px;        /* Ensures the search bar doesn't disappear */
}

.header-right {
    display: flex;
    align-items: center;
    gap: 15px;               /* Space between individual icons */
    flex-shrink: 0;          /* Keeps icons from merging */
}
        /* Page Title */
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

        .page-date {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #80cbc4;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        /* Stats Cards - FIXED: 4 cards in one row */
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

        .stat-card-icon.students {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .stat-card-icon.courses {
            background: linear-gradient(135deg, rgba(131, 197, 190, 0.2), rgba(131, 197, 190, 0.1));
            color: #00897b;
        }

        .stat-card-icon.staff {
            background: linear-gradient(135deg, rgba(0, 180, 216, 0.1), rgba(0, 180, 216, 0.2));
            color: #0097a7;
        }

        .stat-card-icon.revenue {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2));
            color: #43a047;
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

        /* Main Grid */
        .main-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
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

        /* Gender Ratio Chart */
        .gender-chart-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
        }

        .gender-chart {
            position: relative;
            width: 180px;
            height: 180px;
        }

        .gender-chart-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .gender-chart-total {
            font-size: 1.5rem;
            font-weight: 800;
            color: #003d44;
            line-height: 1;
        }

        .gender-chart-label {
            font-size: 0.75rem;
            color: #80cbc4;
        }

        .gender-legend {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .legend-color {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: white;
        }

        .legend-color.male {
            background: linear-gradient(135deg, #006d77, #00b4d8);
        }

        .legend-color.female {
            background: linear-gradient(135deg, #83c5be, #4db6ac);
        }

        .legend-info h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 2px;
        }

        .legend-info p {
            font-size: 0.75rem;
            color: #80cbc4;
            margin: 0;
        }

        .legend-info span {
            font-size: 1.2rem;
            font-weight: 700;
            color: #006d77;
        }

        /* Recent Activity */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-height: 320px;
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

        .activity-icon.enrollment {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .activity-icon.payment {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2));
            color: #43a047;
        }

        .activity-icon.course {
            background: linear-gradient(135deg, rgba(131, 197, 190, 0.2), rgba(131, 197, 190, 0.1));
            color: #00897b;
        }

        .activity-icon.alert {
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2));
            color: #fb8c00;
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
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .activity-time {
            font-size: 0.7rem;
            color: #80cbc4;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Quick Actions */
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .quick-action-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            transition: all 0.4s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .quick-action-card:hover {
            transform: translateY(-3px);
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

        .quick-action-icon.add-student {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .quick-action-icon.add-course {
            background: linear-gradient(135deg, rgba(131, 197, 190, 0.2), rgba(131, 197, 190, 0.1));
            color: #00897b;
        }

        .quick-action-icon.add-staff {
            background: linear-gradient(135deg, rgba(0, 180, 216, 0.1), rgba(0, 180, 216, 0.2));
            color: #0097a7;
        }

        .quick-action-icon.reports {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2));
            color: #8e24aa;
        }

        .quick-action-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 3px;
        }

        .quick-action-text {
            font-size: 0.75rem;
            color: #80cbc4;
        }

        /* Charts Row */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        .chart-container {
            position: relative;
            height: 280px;
        }

        /* Department Progress */
        .department-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .department-item {
            background: #f8feff;
            border-radius: 12px;
            padding: 15px;
            transition: all 0.3s ease;
        }

        .department-item:hover {
            background: #e0f2f1;
        }

        .department-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .department-name {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .department-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
        }

        .department-name span {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
        }

        .department-count {
            font-size: 0.8rem;
            font-weight: 600;
            color: #006d77;
        }

        .department-progress {
            height: 6px;
            background: rgba(0, 109, 119, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .department-progress-bar {
            height: 100%;
            border-radius: 10px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            transition: width 1s ease;
        }

        /* Events & Table Row */
        .events-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .event-item {
            display: flex;
            gap: 12px;
            padding: 12px;
            background: #f8feff;
            border-radius: 12px;
            transition: all 0.3s ease;
            border-left: 4px solid;
        }

        .event-item:hover {
            transform: translateX(5px);
        }

        .event-item.important {
            border-color: #ff6b6b;
        }

        .event-item.meeting {
            border-color: #006d77;
        }

        .event-item.deadline {
            border-color: #fb8c00;
        }

        .event-date {
            text-align: center;
            padding: 8px 12px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 61, 68, 0.08);
        }

        .event-date-day {
            font-size: 1.2rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
        }

        .event-date-month {
            font-size: 0.65rem;
            color: #80cbc4;
            text-transform: uppercase;
        }

        .event-content {
            flex: 1;
        }

        .event-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 4px;
        }

        .event-time {
            font-size: 0.75rem;
            color: #005459;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Students Table */
        .table-container {
            overflow-x: auto;
        }

        .students-table {
            width: 100%;
            border-collapse: collapse;
        }

        .students-table th {
            text-align: left;
            padding: 12px;
            background: #f8feff;
            color: #003d44;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .students-table th:first-child {
            border-radius: 10px 0 0 10px;
        }

        .students-table th:last-child {
            border-radius: 0 10px 10px 0;
        }

        .students-table td {
            padding: 12px;
            color: #005459;
            font-size: 0.85rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .students-table tr:hover td {
            background: #f8feff;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            object-fit: cover;
        }

        .student-name {
            font-weight: 600;
            color: #003d44;
            font-size: 0.85rem;
        }

        .student-id {
            font-size: 0.7rem;
            color: #80cbc4;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .status-badge.active {
            background: rgba(76, 175, 80, 0.1);
            color: #43a047;
        }

        .status-badge.pending {
            background: rgba(255, 152, 0, 0.1);
            color: #fb8c00;
        }

        .status-badge.inactive {
            background: rgba(244, 67, 54, 0.1);
            color: #e53935;
        }

        .table-action-btn {
            background: none;
            border: none;
            color: #80cbc4;
            font-size: 1rem;
            cursor: pointer;
            padding: 4px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .table-action-btn:hover {
            background: #f8feff;
            color: #006d77;
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

        /* ========== RESPONSIVE STYLES ========== */
        @media (max-width: 1400px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 15px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-card-value {
                font-size: 1.5rem;
            }

            .stat-card-icon {
                width: 42px;
                height: 42px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-grid {
                grid-template-columns: 1fr;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions-grid {
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

            .header-profile-info {
                display: none;
            }

            .search-container {
                max-width: 280px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .stat-card {
                padding: 12px;
            }

            .stat-card-value {
                font-size: 1.3rem;
            }

            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .top-header {
                padding: 12px 15px;
            }

            .dashboard-content {
                padding: 15px;
            }

            .gender-chart-container {
                flex-direction: column;
                gap: 20px;
            }

            .gender-chart {
                width: 160px;
                height: 160px;
            }

            .search-container {
                display: none;
            }

            .header-right {
                gap: 8px;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .page-title {
                font-size: 1.3rem;
            }

            .stat-card-value {
                font-size: 1.2rem;
            }

            .stat-card-icon {
                width: 38px;
                height: 38px;
                font-size: 1rem;
            }

            .dashboard-card {
                padding: 15px;
            }

            .quick-actions-grid {
                grid-template-columns: 1fr 1fr;
            }

            .quick-action-card {
                padding: 15px;
            }

            .quick-action-icon {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
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
        .quick-action-card {
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
                <span class="sidebar-logo-subtitle">University</span>
            </div>
        </a>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <div class="sidebar-nav-title">Main Menu</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link active">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Students</span>
                        <span class="sidebar-menu-badge">1.2k</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    All Students
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Add New Student
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Student Attendance
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Promotions
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Student Reports
                                </a>
                            </li>
                        </ul>
                    </div>
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
                                    <i class="bi bi-circle-fill"></i>
                                    All Courses
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Add New Course
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Course Categories
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Course Schedule
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Faculty</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    All Faculty
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Add New Faculty
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Departments
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Faculty Schedule
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Hospital</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Schedule</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-journal-bookmark-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Library</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-nav-title">Management</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-credit-card-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Finance</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Fee Collection
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Expenses
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Scholarships
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Payroll
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-clipboard-data-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Examinations</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Exam Schedule
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Results
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Grade Cards
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Reports</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-megaphone-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Announcements</span>
                        <span class="sidebar-menu-badge">3</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Messages</span>
                        <span class="sidebar-menu-badge">12</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-nav-title">System</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-gear-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Settings</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    General Settings
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Email Settings
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    Payment Gateway
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <i class="bi bi-circle-fill"></i>
                                    SMS Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">User Roles</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-database-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Backup</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-question-circle-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Help & Support</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar Divider -->
        <div class="sidebar-divider"></div>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="sidebar-footer-links">
                <a href="#" class="sidebar-footer-link">
                    <i class="bi bi-person-circle"></i>
                    My Profile
                </a>
                <a href="#" class="sidebar-footer-link">
                    <i class="bi bi-sliders"></i>
                    Preferences
                </a>
                <a href="#" class="sidebar-footer-link">
                    <i class="bi bi-clock-history"></i>
                    Activity Log
                </a>
                
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
            </div>
        </div>
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
                    <input type="text" placeholder="Search students, courses, faculty...">
                    <button class="search-btn">Search</button>
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
                <h1 class="page-title">Admin <span class="highlight">Portal</span></h1>
                <p class="page-subtitle">Welcome back! Here's what's happening at MediCare University today.</p>
                <p class="page-date">
                    <i class="bi bi-calendar3"></i>
                    <span id="currentDate"></span>
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
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
                    <div class="stat-card-value" data-count="5248">0</div>
                    <div class="stat-card-label">Total Students</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-clock"></i>
                        Updated just now
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon courses">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <div class="stat-card-trend up">
                            <i class="bi bi-arrow-up"></i>
                            8%
                        </div>
                    </div>
                    <div class="stat-card-value" data-count="156">0</div>
                    <div class="stat-card-label">Active Courses</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-clock"></i>
                        Updated 5 mins ago
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon staff">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="stat-card-trend up">
                            <i class="bi bi-arrow-up"></i>
                            5%
                        </div>
                    </div>
                    <div class="stat-card-value" data-count="328">0</div>
                    <div class="stat-card-label">Faculty Members</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-clock"></i>
                        Updated 10 mins ago
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon revenue">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="stat-card-trend up">
                            <i class="bi bi-arrow-up"></i>
                            18%
                        </div>
                    </div>
                    <div class="stat-card-value">$2.4M</div>
                    <div class="stat-card-label">Total Revenue</div>
                    <div class="stat-card-footer">
                        <i class="bi bi-clock"></i>
                        Updated 1 hour ago
                    </div>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="main-grid">
                <!-- Gender Ratio -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Student Gender Ratio</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                <i class="bi bi-download"></i>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="gender-chart-container">
                        <div class="gender-chart">
                            <canvas id="genderChart"></canvas>
                            <div class="gender-chart-center">
                                <div class="gender-chart-total">5,248</div>
                                <div class="gender-chart-label">Total Students</div>
                            </div>
                        </div>
                        <div class="gender-legend">
                            <div class="legend-item">
                                <div class="legend-color male">
                                    <i class="bi bi-gender-male"></i>
                                </div>
                                <div class="legend-info">
                                    <h4>Male Students</h4>
                                    <p>2,834 students</p>
                                    <span>54%</span>
                                </div>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color female">
                                    <i class="bi bi-gender-female"></i>
                                </div>
                                <div class="legend-info">
                                    <h4>Female Students</h4>
                                    <p>2,414 students</p>
                                    <span>46%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Activity</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                View All
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon enrollment">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New Student Enrolled</div>
                                <div class="activity-text">Sarah Johnson enrolled in MBBS Program</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    5 minutes ago
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon payment">
                                <i class="bi bi-credit-card-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Fee Payment Received</div>
                                <div class="activity-text">$5,000 received from Michael Brown</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    15 minutes ago
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon course">
                                <i class="bi bi-journal-plus"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New Course Added</div>
                                <div class="activity-text">Advanced Surgery Techniques created</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    1 hour ago
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon alert">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">System Alert</div>
                                <div class="activity-text">Server maintenance scheduled tonight</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    2 hours ago
                                </div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon enrollment">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Graduation Approved</div>
                                <div class="activity-text">45 students approved for graduation</div>
                                <div class="activity-time">
                                    <i class="bi bi-clock"></i>
                                    3 hours ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions-grid">
                <div class="quick-action-card">
                    <div class="quick-action-icon add-student">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div class="quick-action-title">Add Student</div>
                    <div class="quick-action-text">Register new student</div>
                </div>
                <div class="quick-action-card">
                    <div class="quick-action-icon add-course">
                        <i class="bi bi-journal-plus"></i>
                    </div>
                    <div class="quick-action-title">Add Course</div>
                    <div class="quick-action-text">Create new course</div>
                </div>
                <div class="quick-action-card">
                    <div class="quick-action-icon add-staff">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <div class="quick-action-title">Add Faculty</div>
                    <div class="quick-action-text">Register new faculty</div>
                </div>
                <div class="quick-action-card">
                    <div class="quick-action-icon reports">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </div>
                    <div class="quick-action-title">Generate Report</div>
                    <div class="quick-action-text">Create analytics report</div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="charts-grid">
                <!-- Enrollment Chart -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Monthly Enrollment</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                <i class="bi bi-calendar3"></i>
                                This Year
                            </button>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="enrollmentChart"></canvas>
                    </div>
                </div>

                <!-- Departments -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Department Students</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                <i class="bi bi-three-dots"></i>
                            </button>
                        </div>
                    </div>
                    <div class="department-list">
                        <div class="department-item">
                            <div class="department-header">
                                <div class="department-name">
                                    <div class="department-icon">
                                        <i class="bi bi-heart-pulse"></i>
                                    </div>
                                    <span>Medicine (MBBS)</span>
                                </div>
                                <span class="department-count">1,850</span>
                            </div>
                            <div class="department-progress">
                                <div class="department-progress-bar" style="width: 85%;"></div>
                            </div>
                        </div>
                        <div class="department-item">
                            <div class="department-header">
                                <div class="department-name">
                                    <div class="department-icon">
                                        <i class="bi bi-capsule"></i>
                                    </div>
                                    <span>Pharmacy</span>
                                </div>
                                <span class="department-count">980</span>
                            </div>
                            <div class="department-progress">
                                <div class="department-progress-bar" style="width: 65%;"></div>
                            </div>
                        </div>
                        <div class="department-item">
                            <div class="department-header">
                                <div class="department-name">
                                    <div class="department-icon">
                                        <i class="bi bi-bandaid"></i>
                                    </div>
                                    <span>Nursing</span>
                                </div>
                                <span class="department-count">750</span>
                            </div>
                            <div class="department-progress">
                                <div class="department-progress-bar" style="width: 50%;"></div>
                            </div>
                        </div>
                        <div class="department-item">
                            <div class="department-header">
                                <div class="department-name">
                                    <div class="department-icon">
                                        <i class="bi bi-activity"></i>
                                    </div>
                                    <span>Physiotherapy</span>
                                </div>
                                <span class="department-count">420</span>
                            </div>
                            <div class="department-progress">
                                <div class="department-progress-bar" style="width: 35%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events & Table Row -->
            <div class="main-grid">
                <!-- Upcoming Events -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Upcoming Events</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                <i class="bi bi-plus"></i>
                                Add Event
                            </button>
                        </div>
                    </div>
                    <div class="events-list">
                        <div class="event-item important">
                            <div class="event-date">
                                <div class="event-date-day">15</div>
                                <div class="event-date-month">Dec</div>
                            </div>
                            <div class="event-content">
                                <div class="event-title">Final Examinations Begin</div>
                                <div class="event-time">
                                    <i class="bi bi-clock"></i>
                                    9:00 AM - 5:00 PM
                                </div>
                            </div>
                        </div>
                        <div class="event-item meeting">
                            <div class="event-date">
                                <div class="event-date-day">18</div>
                                <div class="event-date-month">Dec</div>
                            </div>
                            <div class="event-content">
                                <div class="event-title">Faculty Meeting</div>
                                <div class="event-time">
                                    <i class="bi bi-clock"></i>
                                    2:00 PM - 4:00 PM
                                </div>
                            </div>
                        </div>
                        <div class="event-item deadline">
                            <div class="event-date">
                                <div class="event-date-day">22</div>
                                <div class="event-date-month">Dec</div>
                            </div>
                            <div class="event-content">
                                <div class="event-title">Fee Submission Deadline</div>
                                <div class="event-time">
                                    <i class="bi bi-clock"></i>
                                    11:59 PM
                                </div>
                            </div>
                        </div>
                        <div class="event-item meeting">
                            <div class="event-date">
                                <div class="event-date-day">25</div>
                                <div class="event-date-month">Dec</div>
                            </div>
                            <div class="event-content">
                                <div class="event-title">Christmas Holiday</div>
                                <div class="event-time">
                                    <i class="bi bi-clock"></i>
                                    All Day
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Students -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Students</h3>
                        <div class="card-actions">
                            <button class="card-action-btn">
                                View All
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="students-table">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Program</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="student-info">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100"
                                                alt="Student" class="student-avatar">
                                            <div>
                                                <div class="student-name" ></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>