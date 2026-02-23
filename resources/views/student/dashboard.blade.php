<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | Medicare University</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-dark: #00414a;
            --primary: #005459;
            --primary-light: #006d77;
            --accent: #83c5be;
            --accent-light: #00b4d8;
            --white: #ffffff;
            --light-bg: #f0f7f7;
            --text-dark: #333333;
            --text-muted: #666666;
            --sidebar-width: 280px;
            --header-height: 70px;
            --shadow: 0 4px 20px rgba(0, 109, 119, 0.15);
            --shadow-hover: 0 8px 30px rgba(0, 109, 119, 0.25);
        }

        body {
            background: var(--light-bg);
            min-height: 100vh;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--primary-light) 0%, var(--primary) 50%, var(--primary-dark) 100%);
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(131, 197, 190, 0.5);
            border-radius: 3px;
        }

        /* ========== SIDEBAR HEADER ========== */
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(131, 197, 190, 0.4);
        }

        .sidebar-logo i {
            font-size: 1.5rem;
            color: white;
        }

        .sidebar-brand {
            color: white;
        }

        .sidebar-brand h2 {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .sidebar-brand span {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* ========== SIDEBAR USER ========== */
        .sidebar-user {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid var(--accent);
            overflow: hidden;
            flex-shrink: 0;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info h4 {
            color: white;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .user-info p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
        }

        .user-status {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 3px;
        }

        .status-dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 5px;
    /* Remove background-color from here */
}

        .user-status span {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.6);
        }

        /* ========== SIDEBAR NAV ========== */
        .sidebar-nav {
            padding: 15px 0;
        }

        .nav-section {
            padding: 0 15px;
            margin-bottom: 10px;
        }

        .nav-section-title {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 15px;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            border-radius: 10px;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            background: rgba(131, 197, 190, 0.15);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, rgba(131, 197, 190, 0.3), rgba(0, 180, 216, 0.2));
            color: white;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: -10px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 25px;
            background: linear-gradient(180deg, var(--accent), var(--accent-light));
            border-radius: 0 4px 4px 0;
        }

        .nav-link i {
            width: 20px;
            font-size: 1rem;
            text-align: center;
        }

        .nav-link span {
            flex: 1;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .nav-link .arrow {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
        }

        .nav-item.open .nav-link .arrow {
            transform: rotate(90deg);
        }

        .nav-badge {
            background: linear-gradient(135deg, #ef4444, #f97316);
            color: white;
            font-size: 0.65rem;
            padding: 2px 8px;
            border-radius: 10px;
            font-weight: 600;
        }

        /* ========== SUBMENU ========== */
        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            list-style: none;
            background: rgba(0, 0, 0, 0.1);
            margin: 5px 10px 5px 20px;
            border-radius: 8px;
        }

        .nav-item.open .submenu {
            max-height: 300px;
        }

        .submenu-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .submenu-link:hover {
            color: white;
            background: rgba(131, 197, 190, 0.1);
        }

        .submenu-link i {
            font-size: 0.5rem;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        /* ========== HEADER ========== */
        .header {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--header-height);
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: var(--shadow);
            z-index: 999;
            transition: left 0.3s ease;
        }

    
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
            padding: 5px;
        }

        
        .page-title p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }
     
        .header-search {
            display: flex;
            align-items: center;
            background: var(--light-bg);
            border-radius: 12px;
            padding: 10px 20px;
            width: 300px;
            transition: all 0.3s ease;
        }

        .header-search:focus-within {
            background: white;
            box-shadow: 0 0 0 2px var(--accent);
        }

        .header-search i {
            color: var(--text-muted);
            margin-right: 10px;
        }

        .header-search input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
            font-size: 0.9rem;
            color: var(--text-dark);
        }

       
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 25px;
    gap: 15px; /* This creates a mandatory space between the three sections */
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


        .header-icon {
            position: relative;
            width: 45px;
            height: 45px;
            background: var(--light-bg);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .header-icon:hover {
            background: var(--accent);
            color: white;
        }

        .header-icon i {
            font-size: 1.1rem;
            color: var(--text-muted);
            transition: color 0.3s ease;
        }

        .header-icon:hover i {
            color: white;
        }

        .header-icon .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: linear-gradient(135deg, #ef4444, #f97316);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
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

        /* ========== DASHBOARD CONTENT ========== */
        .dashboard-content {
            padding: calc(var(--header-height) + 30px) 30px 30px;
        }

        /* ========== WELCOME BANNER ========== */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 50%, var(--primary-dark) 100%);
            border-radius: 20px;
            padding: 30px 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(131, 197, 190, 0.1);
            border-radius: 50%;
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: 20%;
            width: 200px;
            height: 200px;
            background: rgba(0, 180, 216, 0.1);
            border-radius: 50%;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome-text h2 {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            max-width: 500px;
        }

        .welcome-date {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
        }

        .welcome-date i {
            color: var(--accent);
        }

        .welcome-illustration {
            position: relative;
            z-index: 1;
        }

        .welcome-illustration img {
            height: 150px;
        }

        .welcome-illustration .illustration-icon {
            font-size: 8rem;
            color: rgba(255, 255, 255, 0.15);
        }

        /* ========== STATS GRID ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--accent-light));
        }

        .stat-card.courses::before {
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
        }

        .stat-card.attendance::before {
            background: linear-gradient(90deg, #22c55e, #10b981);
        }

        .stat-card.assignments::before {
            background: linear-gradient(90deg, #f59e0b, #f97316);
        }

        .stat-card.quizzes::before {
            background: linear-gradient(90deg, #ef4444, #f43f5e);
        }

        .stat-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-card.courses .stat-icon {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
        }

        .stat-card.attendance .stat-icon {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }

        .stat-card.assignments .stat-icon {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .stat-card.quizzes .stat-icon {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .stat-trend.up {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }

        .stat-trend.down {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .stat-progress {
            margin-top: 15px;
        }

        .progress-bar {
            height: 6px;
            background: var(--light-bg);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 1s ease;
        }

        .stat-card.courses .progress-fill {
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
        }

        .stat-card.attendance .progress-fill {
            background: linear-gradient(90deg, #22c55e, #10b981);
        }

        .stat-card.assignments .progress-fill {
            background: linear-gradient(90deg, #f59e0b, #f97316);
        }

        .stat-card.quizzes .progress-fill {
            background: linear-gradient(90deg, #ef4444, #f43f5e);
        }

        /* ========== DASHBOARD GRID ========== */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        /* ========== CARD STYLES ========== */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 25px;
            border-bottom: 1px solid var(--light-bg);
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .card-title i {
            color: var(--primary);
        }

        .card-action {
            background: var(--light-bg);
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            color: var(--primary);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .card-action:hover {
            background: var(--primary);
            color: white;
        }

        .card-body {
            padding: 25px;
        }

        /* ========== SCHEDULE/TIMETABLE ========== */
        .schedule-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .schedule-item {
            display: flex;
            gap: 15px;
            padding: 15px;
            background: var(--light-bg);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .schedule-item:hover {
            transform: translateX(5px);
            background: rgba(131, 197, 190, 0.15);
        }

        .schedule-time {
            text-align: center;
            padding-right: 15px;
            border-right: 2px solid var(--accent);
            min-width: 70px;
        }

        .schedule-time .time {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
        }

        .schedule-time .period {
            font-size: 0.7rem;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        .schedule-details h4 {
            color: var(--text-dark);
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .schedule-details p {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .schedule-details p i {
            font-size: 0.7rem;
        }

        /* ========== QUICK ACTIONS ========== */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .quick-action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px 15px;
            background: var(--light-bg);
            border: 2px solid transparent;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .quick-action-btn:hover {
            background: white;
            border-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .quick-action-btn i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .quick-action-btn span {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-dark);
            text-align: center;
        }

        /* ========== PERFORMANCE CHART ========== */
        .performance-chart {
            padding: 25px;
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .chart-legend {
            display: flex;
            gap: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .legend-dot.quiz {
            background: var(--primary);
        }

        .legend-dot.assignment {
            background: var(--accent);
        }

        .legend-dot.presentation {
            background: var(--accent-light);
        }

        .chart-bars {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            height: 200px;
            padding-top: 20px;
        }

        .chart-bar-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .bar-container {
            display: flex;
            align-items: flex-end;
            gap: 4px;
            height: 150px;
        }

        .bar {
            width: 20px;
            border-radius: 4px 4px 0 0;
            transition: height 1s ease;
        }

        .bar.quiz {
            background: linear-gradient(180deg, var(--primary-light), var(--primary));
        }

        .bar.assignment {
            background: linear-gradient(180deg, var(--accent), #5fb3a9);
        }

        .bar.presentation {
            background: linear-gradient(180deg, var(--accent-light), #0096c7);
        }

        .chart-bar-group span {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* ========== RECENT ACTIVITY ========== */
        .activity-list {
            display: flex;
            flex-direction: column;
        }

        .activity-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--light-bg);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .activity-icon.quiz {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
        }

        .activity-icon.assignment {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }

        .activity-icon.result {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .activity-icon.fee {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .activity-content {
            flex: 1;
        }

        .activity-content h4 {
            font-size: 0.9rem;
            color: var(--text-dark);
            margin-bottom: 3px;
        }

        .activity-content p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .activity-time {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* ========== NOTIFICATIONS PANEL ========== */
        .notifications-panel {
            display: flex;
            flex-direction: column;
        }

        .notification-item {
            display: flex;
            gap: 12px;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .notification-item:hover {
            background: var(--light-bg);
        }

        .notification-item.unread {
            background: rgba(131, 197, 190, 0.1);
            border-left: 3px solid var(--accent);
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .notification-icon.info {
            background: rgba(0, 180, 216, 0.1);
            color: var(--accent-light);
        }

        .notification-icon.warning {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .notification-icon.success {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }

        .notification-content h4 {
            font-size: 0.85rem;
            color: var(--text-dark);
            margin-bottom: 3px;
        }

        .notification-content p {
            font-size: 0.75rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* ========== COURSES LIST ========== */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .course-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .course-header {
            height: 100px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: rgba(255, 255, 255, 0.3);
            position: relative;
        }

        .course-header.blue {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
        }

        .course-header.green {
            background: linear-gradient(135deg, #22c55e, #16a34a);
        }

        .course-header.orange {
            background: linear-gradient(135deg, #f59e0b, #ea580c);
        }

        .course-header.pink {
            background: linear-gradient(135deg, #ec4899, #db2777);
        }

        .course-code {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            color: white;
        }

        .course-body {
            padding: 20px;
        }

        .course-body h3 {
            font-size: 1rem;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .course-body p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 15px;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .course-instructor {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .course-instructor img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        .course-instructor span {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .course-progress {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
        }

        /* ========== SIDEBAR MOBILE CLOSED ========== */
        .sidebar-closed .sidebar {
            transform: translateX(-100%);
        }

        .sidebar-closed .main-content {
            margin-left: 0;
        }

        .sidebar-closed .header {
            left: 0;
        }

        /* ========== OVERLAY ========== */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 65, 74, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .header-search {
                display: none;
            }
        }

        @media (max-width: 992px) {
            :root {
                --sidebar-width: 260px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
             .header-icon {
                display: none;
            }
            .page-title h2 {
        font-size: 1.1rem;  /* Shrinks text on smaller screens */
        display: block;
        
    }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .header {
                left: 0;
                padding: 0 20px;
            }

            .menu-toggle {
                display: block;
            }

            .header-profile-info {
                display: none;
            }

            .welcome-banner {
                flex-direction: column;
                text-align: center;
                padding: 25px;
            }

            .welcome-illustration {
                display: none;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-content {
                padding: calc(var(--header-height) + 20px) 15px 20px;
            }

            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }

            .chart-bars {
                overflow-x: auto;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }
             .header-icon {
                display: none;
            }
            .page-title h2 {
                font-size: 1.1rem;  
                display: block;

        
    }
        }

        @media (max-width: 480px) {
            

            .page-title p {
                display: none;
            }

            .welcome-text h2 {
                font-size: 1.4rem;
            }

            .header-icon {
                display: none;
            }
            .page-title h2 {
        display: none;

    }
        }

        @media (max-width: 360px) {
           .page-title h2 {
        display: none;  
    }
        }
    </style>
</head>

<body>
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <!-- Sidebar Header -->
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div class="sidebar-brand">
                <h2>Medicare</h2>
                <span>Student Dashboard</span>
            </div>
        </div>

        <!-- Sidebar User -->
       <div class="sidebar-user">
    <div class="user-avatar">
        {{-- This dynamically fetches the initials based on the logged-in user's name --}}
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=83c5be&color=fff&size=100&length=2" alt="{{ Auth::user()->name }}">
    </div>
    <div class="user-info">
    <h3 style="color: white">{{ Auth::user()->name }}</h3>
    <p>Student ID: MED-2024-{{ Auth::user()->id }}</p> 
    
    <div class="user-status">
        @if(Auth::user()->last_seen >= now()->subMinutes(5))
            <span class="status-dot" style="background: #2ecc71;"></span> {{-- Green Dot --}}
            <span>Online</span>
        @else
            <span class="status-dot" style="background: #95a5a6;"></span> {{-- Grey Dot --}}
            <span>Offline</span>
        @endif
    </div>
</div>
</div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar-nav">
            <div class="nav-section">
                <span class="nav-section-title">Main Menu</span>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-book-open"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-check"></i>
                            <span>Attendance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student.notifications.view') }}" class="nav-link">
                            <i class="fas fa-bell"></i>
                            <span>Notifications</span>

                            {{-- Use this line to fetch the count directly in the view --}}
        @php 
            $navUnread = auth()->user()->notifications()->wherePivot('is_read', false)->count(); 
        @endphp

        @if($navUnread > 0)
            <span class="badge bg-danger">{{ $navUnread }}</span>
        @endif
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <span class="nav-section-title">Academics</span>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-question-circle"></i>
                            <span>Quiz</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-presentation"></i>
                            <span>Presentation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tasks"></i>
                            <span>Assignment</span>
                        </a>
                    </li>
                    <li class="nav-item" onclick="toggleSubmenu(this)">
                        <a href="#" class="nav-link" onclick="event.preventDefault()">
                            <i class="fas fa-chart-bar"></i>
                            <span>Results</span>
                            <i class="fas fa-chevron-right arrow"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#" class="submenu-link">
                                    <i class="fas fa-circle"></i>
                                    Mid-term Results
                                </a>
                            </li>
                            <li>
                                <a href="#" class="submenu-link">
                                    <i class="fas fa-circle"></i>
                                    Final-term Results
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Timetable</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-layer-group"></i>
                            <span>Semesters</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <span class="nav-section-title">Finance</span>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Fee Challan</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <span class="nav-section-title">Analytics</span>
                <ul class="nav-menu">
                    <li class="nav-item" onclick="toggleSubmenu(this)">
                        <a href="#" class="nav-link" onclick="event.preventDefault()">
                            <i class="fas fa-chart-line"></i>
                            <span>Performance</span>
                            <i class="fas fa-chevron-right arrow"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#" class="submenu-link">
                                    <i class="fas fa-circle"></i>
                                    Attendance Percentage
                                </a>
                            </li>
                            <li>
                                <a href="#" class="submenu-link">
                                    <i class="fas fa-circle"></i>
                                    Quiz Performance
                                </a>
                            </li>
                            <li>
                                <a href="#" class="submenu-link">
                                    <i class="fas fa-circle"></i>
                                    Assignment Performance
                                </a>
                            </li>
                            <li>
                                <a href="#" class="submenu-link">
                                    <i class="fas fa-circle"></i>
                                    Presentation Performance
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <span class="nav-section-title">Account</span>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-circle"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" onclick="confirmLogout(event)" class="nav-link">
    <i class="fas fa-sign-out-alt"></i> Logout
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
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="menu-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="page-title">
                    <h2>Welcome back, <span class="student-name-highlight" >{{ Auth::user()->name }}!</span></h2>
                </div>
            </div>

            <div class="header-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search courses, assignments...">
            </div>

            <div class="header-right">
               <div class="header-icon">
    {{-- Wrap everything inside the anchor tag --}}
    <a href="{{ route('student.notifications.view') }}" style="text-decoration: none; color: inherit; position: relative;">
        <i class="fas fa-bell"></i>
        
        @php 
            $navUnread = auth()->user()->notifications()->wherePivot('is_read', false)->count(); 
        @endphp

        @if($navUnread > 0)
            <span class="badge bg-danger" style="position: absolute; top: -5px; right: -10px; font-size: 0.65rem; border-radius: 50%;">
                {{ $navUnread }}
            </span>
        @endif
    </a>
</div>
                <div class="header-icon">
                    <i class="fas fa-envelope"></i>
                    <span class="badge">3</span>
                </div>
                <div class="header-profile">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=83c5be&color=fff&size=100&length=2" alt="{{ Auth::user()->name }}">
                <div class="profile-info">
                    <span class="profile-name">{{ Auth::user()->name }}</span>
                    <span class="profile-role">{{ ucfirst(Auth::user()->role) }}</span>
                </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-text">
                    @php
    $hour = date('H');
    $greeting = match(true) {
        $hour < 12 => 'Good Morning',
        $hour < 17 => 'Good Afternoon',
        default    => 'Good Evening',
    };
@endphp

<h2>{{ $greeting }}, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h2>
                    <p>You have 3 pending assignments and 2 quizzes this week. Keep up the great work!</p>
                    <div class="welcome-date">
                        <i class="fas fa-calendar-alt"></i>
                        <span id="currentDate">Monday, January 15, 2025</span>
                    </div>
                </div>
                <div class="welcome-illustration">
                    <i class="fas fa-graduation-cap illustration-icon"></i>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card courses">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>Active</span>
                        </div>
                    </div>
                    <div class="stat-value">6</div>
                    <div class="stat-label">Enrolled Courses</div>
                    <div class="stat-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 75%;"></div>
                        </div>
                    </div>
                </div>

                <div class="stat-card attendance">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>+5%</span>
                        </div>
                    </div>
                    <div class="stat-value">87%</div>
                    <div class="stat-label">Attendance Rate</div>
                    <div class="stat-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 87%;"></div>
                        </div>
                    </div>
                </div>

                <div class="stat-card assignments">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="stat-trend down">
                            <i class="fas fa-clock"></i>
                            <span>3 Due</span>
                        </div>
                    </div>
                    <div class="stat-value">12/15</div>
                    <div class="stat-label">Assignments Completed</div>
                    <div class="stat-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 80%;"></div>
                        </div>
                    </div>
                </div>

                <div class="stat-card quizzes">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>85%</span>
                        </div>
                    </div>
                    <div class="stat-value">8/10</div>
                    <div class="stat-label">Quizzes Attempted</div>
                    <div class="stat-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 80%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Grid -->
            <div class="dashboard-grid">
                <!-- Today's Schedule -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clock"></i>
                            Today's Schedule
                        </h3>
                        <a href="#" class="card-action">View Full Timetable</a>
                    </div>
                    <div class="card-body">
                        <div class="schedule-list">
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <div class="time">09:00</div>
                                    <div class="period">AM</div>
                                </div>
                                <div class="schedule-details">
                                    <h4>Data Structures & Algorithms</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> Room 301, Block A</p>
                                    <p><i class="fas fa-user"></i> Dr. Sarah Ahmed</p>
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <div class="time">11:00</div>
                                    <div class="period">AM</div>
                                </div>
                                <div class="schedule-details">
                                    <h4>Database Management Systems</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> Lab 105, Block B</p>
                                    <p><i class="fas fa-user"></i> Prof. Ali Khan</p>
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <div class="time">02:00</div>
                                    <div class="period">PM</div>
                                </div>
                                <div class="schedule-details">
                                    <h4>Software Engineering</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> Room 205, Block A</p>
                                    <p><i class="fas fa-user"></i> Dr. Fatima Malik</p>
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-time">
                                    <div class="time">04:00</div>
                                    <div class="period">PM</div>
                                </div>
                                <div class="schedule-details">
                                    <h4>Computer Networks</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> Room 102, Block C</p>
                                    <p><i class="fas fa-user"></i> Mr. Hassan Raza</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bolt"></i>
                            Quick Actions
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="quick-actions">
                            <a href="#" class="quick-action-btn">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <span>Pay Fee</span>
                            </a>
                            <a href="#" class="quick-action-btn">
                                <i class="fas fa-download"></i>
                                <span>Download Challan</span>
                            </a>
                            <a href="#" class="quick-action-btn">
                                <i class="fas fa-chart-bar"></i>
                                <span>View Results</span>
                            </a>
                            <a href="#" class="quick-action-btn">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Timetable</span>
                            </a>
                            <a href="#" class="quick-action-btn">
                                <i class="fas fa-upload"></i>
                                <span>Submit Assignment</span>
                            </a>
                            <a href="#" class="quick-action-btn">
                                <i class="fas fa-play-circle"></i>
                                <span>Take Quiz</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance & Activity Row -->
            <div class="dashboard-grid">
                <!-- Performance Chart -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Performance Overview
                        </h3>
                        <a href="#" class="card-action">View Details</a>
                    </div>
                    <div class="performance-chart">
                        <div class="chart-header">
                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-dot quiz"></span>
                                    <span>Quiz</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot assignment"></span>
                                    <span>Assignment</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot presentation"></span>
                                    <span>Presentation</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart-bars">
                            <div class="chart-bar-group">
                                <div class="bar-container">
                                    <div class="bar quiz" style="height: 80px;"></div>
                                    <div class="bar assignment" style="height: 100px;"></div>
                                    <div class="bar presentation" style="height: 60px;"></div>
                                </div>
                                <span>Week 1</span>
                            </div>
                            <div class="chart-bar-group">
                                <div class="bar-container">
                                    <div class="bar quiz" style="height: 90px;"></div>
                                    <div class="bar assignment" style="height: 75px;"></div>
                                    <div class="bar presentation" style="height: 85px;"></div>
                                </div>
                                <span>Week 2</span>
                            </div>
                            <div class="chart-bar-group">
                                <div class="bar-container">
                                    <div class="bar quiz" style="height: 70px;"></div>
                                    <div class="bar assignment" style="height: 110px;"></div>
                                    <div class="bar presentation" style="height: 95px;"></div>
                                </div>
                                <span>Week 3</span>
                            </div>
                            <div class="chart-bar-group">
                                <div class="bar-container">
                                    <div class="bar quiz" style="height: 100px;"></div>
                                    <div class="bar assignment" style="height: 85px;"></div>
                                    <div class="bar presentation" style="height: 75px;"></div>
                                </div>
                                <span>Week 4</span>
                            </div>
                            <div class="chart-bar-group">
                                <div class="bar-container">
                                    <div class="bar quiz" style="height: 95px;"></div>
                                    <div class="bar assignment" style="height: 120px;"></div>
                                    <div class="bar presentation" style="height: 105px;"></div>
                                </div>
                                <span>Week 5</span>
                            </div>
                            <div class="chart-bar-group">
                                <div class="bar-container">
                                    <div class="bar quiz" style="height: 110px;"></div>
                                    <div class="bar assignment" style="height: 95px;"></div>
                                    <div class="bar presentation" style="height: 80px;"></div>
                                </div>
                                <span>Week 6</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-history"></i>
                            Recent Activity
                        </h3>
                        <a href="#" class="card-action">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="activity-list">
                            <div class="activity-item">
                                <div class="activity-icon quiz">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="activity-content">
                                    <h4>Quiz Submitted</h4>
                                    <p>DSA Quiz #5 - Score: 18/20</p>
                                </div>
                                <span class="activity-time">2h ago</span>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon assignment">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="activity-content">
                                    <h4>Assignment Uploaded</h4>
                                    <p>SE Assignment #3</p>
                                </div>
                                <span class="activity-time">5h ago</span>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon result">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="activity-content">
                                    <h4>Result Announced</h4>
                                    <p>DBMS Mid-term: 42/50</p>
                                </div>
                                <span class="activity-time">1d ago</span>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon fee">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div class="activity-content">
                                    <h4>Fee Challan Generated</h4>
                                    <p>Spring 2025 - Due: Feb 15</p>
                                </div>
                                <span class="activity-time">2d ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications & Courses -->
            <div class="dashboard-grid">
                <!-- Notifications -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bell"></i>
                            Latest Notifications
                        </h3>
                        <a href="#" class="card-action">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="notifications-panel">
                            <div class="notification-item unread">
                                <div class="notification-icon warning">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="notification-content">
                                    <h4>Assignment Deadline Approaching</h4>
                                    <p>Software Engineering Assignment #4 is due in 2 days. Submit before the deadline
                                        to avoid penalties.</p>
                                </div>
                            </div>
                            <div class="notification-item unread">
                                <div class="notification-icon info">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div class="notification-content">
                                    <h4>New Quiz Available</h4>
                                    <p>DBMS Quiz #6 is now available. Complete it before Friday, 5:00 PM.</p>
                                </div>
                            </div>
                            <div class="notification-item">
                                <div class="notification-icon success">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="notification-content">
                                    <h4>Mid-term Results Published</h4>
                                    <p>Your mid-term results for Fall 2024 have been published. Check your results page.
                                    </p>
                                </div>
                            </div>
                            <div class="notification-item">
                                <div class="notification-icon info">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="notification-content">
                                    <h4>Holiday Announcement</h4>
                                    <p>University will remain closed on January 20th due to public holiday.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- My Courses Preview -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-book-open"></i>
                            My Courses
                        </h3>
                        <a href="#" class="card-action">View All Courses</a>
                    </div>
                    <div class="card-body" style="padding: 15px;">
                        <div class="courses-grid" style="margin-bottom: 0;">
                            <div class="course-card">
                                <div class="course-header">
                                    <i class="fas fa-code"></i>
                                    <span class="course-code">CS-301</span>
                                </div>
                                <div class="course-body">
                                    <h3>Data Structures & Algorithms</h3>
                                    <p>Advanced concepts in DSA including trees, graphs, and dynamic programming.</p>
                                    <div class="course-meta">
                                        <div class="course-instructor">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Ahmed&background=006d77&color=fff&size=50"
                                                alt="">
                                            <span>Dr. Sarah Ahmed</span>
                                        </div>
                                        <span class="course-progress">75%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="course-card">
                                <div class="course-header blue">
                                    <i class="fas fa-database"></i>
                                    <span class="course-code">CS-302</span>
                                </div>
                                <div class="course-body">
                                    <h3>Database Management Systems</h3>
                                    <p>SQL, normalization, transactions, and database design principles.</p>
                                    <div class="course-meta">
                                        <div class="course-instructor">
                                            <img src="https://ui-avatars.com/api/?name=Ali+Khan&background=6366f1&color=fff&size=50"
                                                alt="">
                                            <span>Prof. Ali Khan</span>
                                        </div>
                                        <span class="course-progress">68%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        // Toggle Sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Close sidebar when clicking overlay
        document.getElementById('overlay').addEventListener('click', function () {
            document.getElementById('sidebar').classList.remove('active');
            this.classList.remove('active');
        });

        // Toggle Submenu
        function toggleSubmenu(item) {
            // Close other open submenus
            document.querySelectorAll('.nav-item.open').forEach(openItem => {
                if (openItem !== item) {
                    openItem.classList.remove('open');
                }
            });

            item.classList.toggle('open');
        }

        // Set active nav link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function (e) {
                if (!this.parentElement.querySelector('.submenu')) {
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });

        // Update current date
        function updateDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            document.getElementById('currentDate').textContent = today.toLocaleDateString('en-US', options);
        }
        updateDate();

        // Animate progress bars on load
        document.addEventListener('DOMContentLoaded', function () {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 500);
            });

            // Animate chart bars
            const chartBars = document.querySelectorAll('.bar');
            chartBars.forEach(bar => {
                const height = bar.style.height;
                bar.style.height = '0';
                setTimeout(() => {
                    bar.style.height = height;
                }, 800);
            });
        });

        // Responsive sidebar handling
        function handleResize() {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').classList.remove('active');
                document.getElementById('overlay').classList.remove('active');
            }
        }

        window.addEventListener('resize', handleResize);
    </script>
</body>

</html>