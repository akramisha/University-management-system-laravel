<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | Medicare University</title>
     <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

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
            width: calc(100% - var(--sidebar-width));
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

          /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        /* Top Header */
        .top-header {
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
            margin-top: 60px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-btn {
            width: 45px;
            height: 45px;
            background: white;
            border: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #006d77;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 61, 68, 0.1);
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            transform: translateX(-3px);
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
            font-size: 0.85rem;
        }

        .breadcrumb-nav a {
            color: #006d77;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            color: #00b4d8;
        }

        .breadcrumb-nav span {
            color: #80cbc4;
        }

        .breadcrumb-nav .current {
            color: #003d44;
            font-weight: 500;
        }

        /* Quick Stats */
        .notification-stats {
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
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 61, 68, 0.12);
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .stat-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 2px;
        }

        .stat-content p {
            font-size: 0.8rem;
            color: #80cbc4;
            margin: 0;
        }

        /* Filter & Actions Bar */
        .actions-bar {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 10px 18px;
            background: #f8feff;
            border: 2px solid transparent;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-btn:hover {
            background: #e0f2f1;
            border-color: #83c5be;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            border-color: transparent;
        }

        .filter-btn .count {
            background: rgba(0, 0, 0, 0.1);
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        .filter-btn.active .count {
            background: rgba(255, 255, 255, 0.2);
        }

        .search-filter {
            display: flex;
            align-items: center;
            background: #f8feff;
            border-radius: 10px;
            padding: 4px 12px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .search-filter:focus-within {
            border-color: #83c5be;
        }

        .search-filter input {
            border: none;
            background: transparent;
            padding: 8px;
            font-size: 0.85rem;
            outline: none;
            width: 200px;
        }

        .search-filter i {
            color: #80cbc4;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 109, 119, 0.4);
        }

        .btn-outline {
            background: white;
            color: #006d77;
            border: 2px solid #e0f2f1;
        }

        .btn-outline:hover {
            background: #f8feff;
            border-color: #83c5be;
        }

        /* Notifications Container */
        .notifications-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Notification Card */
        .notification-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .notification-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 35px rgba(0, 61, 68, 0.12);
        }

     

        .notification-card.unread::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.02), rgba(0, 180, 216, 0.02));
            pointer-events: none;
        }

        .notification-header {
            padding: 20px 25px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            border-bottom: 1px solid #f0f8f8;
        }

        .notification-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .notification-icon.announcement {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .notification-icon.alert {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 142, 142, 0.1));
            color: #ff6b6b;
        }

        .notification-icon.info {
            background: linear-gradient(135deg, rgba(33, 150, 243, 0.1), rgba(33, 150, 243, 0.2));
            color: #1976d2;
        }

        .notification-icon.success {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2));
            color: #43a047;
        }

        .notification-icon.warning {
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.2));
            color: #fb8c00;
        }

        .notification-icon.event {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2));
            color: #8e24aa;
        }

        .notification-main {
            flex: 1;
            min-width: 0;
        }

        .notification-title-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .notification-subject {
            font-size: 1.05rem;
            font-weight: 600;
            color: #003d44;
            margin: 0;
        }

        .notification-badge {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .notification-badge.urgent {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            color: white;
        }

        .notification-badge.important {
            background: linear-gradient(135deg, #fb8c00, #ffb74d);
            color: white;
        }

        .notification-badge.normal {
            background: linear-gradient(135deg, #83c5be, #00b4d8);
            color: white;
        }

        .notification-badge.new {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .notification-description {
            font-size: 0.9rem;
            color: #005459;
            line-height: 1.6;
            margin: 0;
        }

        .notification-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px 25px;
            background: #f8feff;
        }

        .notification-author {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .author-avatar {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .author-info {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
        }

        .author-role {
            font-size: 0.75rem;
            color: #80cbc4;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 8px;
            border-radius: 15px;
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .role-badge.management {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.15), rgba(0, 180, 216, 0.15));
            color: #006d77;
        }

        .role-badge.admin {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.15), rgba(156, 39, 176, 0.1));
            color: #8e24aa;
        }

        .role-badge.hod {
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.15), rgba(255, 152, 0, 0.1));
            color: #fb8c00;
        }

        .notification-datetime {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: #80cbc4;
            margin-left: auto;
        }

        .notification-datetime i {
            font-size: 0.9rem;
        }

        .notification-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: 15px;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            background: white;
            border: none;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: #80cbc4;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            color: #006d77;
            background: #e0f2f1;
        }

        .action-btn.delete:hover {
            color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
        }

        .action-btn.mark-read:hover {
            color: #43a047;
            background: rgba(76, 175, 80, 0.1);
        }

        /* Create Notification Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 61, 68, 0.5);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            padding: 20px;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background: white;
            border-radius: 20px;
            width: 100%;
            max-width: 650px;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.9) translateY(20px);
            transition: all 0.3s ease;
        }

        .modal-overlay.active .modal-container {
            transform: scale(1) translateY(0);
        }

        .modal-header {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-header h2 {
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-close {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            color: #003d44;
            margin-bottom: 8px;
        }

        .form-label .required {
            color: #ff6b6b;
            margin-left: 3px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0f2f1;
            border-radius: 12px;
            font-size: 0.9rem;
            color: #003d44;
            background: #f8feff;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #83c5be;
            background: white;
            box-shadow: 0 0 0 4px rgba(131, 197, 190, 0.1);
        }

        .form-control::placeholder {
            color: #b0d8d4;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2380cbc4' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 45px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .priority-options {
            display: flex;
            gap: 12px;
        }

        .priority-option {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #e0f2f1;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
        }

        .priority-option input {
            display: none;
        }

        .priority-option:hover {
            background: #f8feff;
        }

        .priority-option.normal.selected {
            border-color: #83c5be;
            background: linear-gradient(135deg, rgba(131, 197, 190, 0.1), rgba(0, 180, 216, 0.1));
        }

        .priority-option.important.selected {
            border-color: #fb8c00;
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(255, 152, 0, 0.05));
        }

        .priority-option.urgent.selected {
            border-color: #ff6b6b;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05));
        }

        .priority-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .priority-option.normal .priority-label i {
            color: #83c5be;
        }

        .priority-option.important .priority-label i {
            color: #fb8c00;
        }

        .priority-option.urgent .priority-label i {
            color: #ff6b6b;
        }

        .modal-footer {
            padding: 20px 25px;
            border-top: 2px solid #f0f8f8;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-secondary {
            background: #f8feff;
            color: #006d77;
            border: 2px solid #e0f2f1;
        }

        .btn-secondary:hover {
            background: #e0f2f1;
            border-color: #83c5be;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
        }

        .empty-state-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: #83c5be;
            margin: 0 auto 20px;
        }

        .empty-state h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.9rem;
            color: #80cbc4;
            margin-bottom: 20px;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .pagination-info {
            font-size: 0.85rem;
            color: #80cbc4;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            background: white;
            border: 2px solid #e0f2f1;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-btn:hover {
            border-color: #83c5be;
            background: #f8feff;
        }

        .page-btn.active {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-color: transparent;
            color: white;
        }

        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
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
            .notification-stats {
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

            .notification-stats {
                grid-template-columns: 1fr 1fr;
            }

            .actions-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                justify-content: center;
            }

            .action-buttons {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .notification-stats {
                grid-template-columns: 1fr;
            }

            .header-profile-info {
                display: none;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .notification-header {
                flex-direction: column;
                text-align: center;
            }

            .notification-meta {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            .notification-datetime {
                margin-left: 0;
            }

            .notification-actions {
                margin-left: 0;
                margin-top: 10px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .priority-options {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .search-container {
                display: none;
            }

            .filter-group {
                width: 100%;
                flex-direction: column;
            }

            .filter-btn {
                width: 100%;
                justify-content: center;
            }

            .search-filter {
                width: 100%;
            }

            .search-filter input {
                width: 100%;
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
                        <a href="#" class="nav-link ">
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
                        <a href="{{ route('student.notifications.view') }}" class="nav-link active">
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
        <input type="text" 
               id="searchInput" 
               placeholder="Search notifications..." 
               onkeyup="searchNotifications()">
    </div>
</div>
<script>function searchNotifications() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return; // Safety check

    const searchTerm = searchInput.value.toLowerCase().trim();
    const cards = document.querySelectorAll('.notification-card');
    const noResultsBox = document.getElementById('noResults');
    let visibleCount = 0;

    cards.forEach(card => {
        // We use classList because your snippet shows these are the text holders
        const subjectEl = card.querySelector('.notification-subject');
        const descEl = card.querySelector('.notification-description');

        const subject = subjectEl ? subjectEl.textContent.toLowerCase() : "";
        const description = descEl ? descEl.textContent.toLowerCase() : "";

        if (subject.includes(searchTerm) || description.includes(searchTerm)) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Toggle the "No Results" box
    if (noResultsBox) {
        if (visibleCount === 0 && searchTerm !== "") {
            noResultsBox.style.display = 'block';
            // Hide pagination when no results found
            const pagination = document.querySelector('.mt-4'); 
            if(pagination) pagination.style.display = 'none';
        } else {
            noResultsBox.style.display = 'none';
            // Show pagination again
            const pagination = document.querySelector('.mt-4');
            if(pagination) pagination.style.display = 'block';
        }
    }
}
</script>

            <div class="header-right">
             <button class="header-icon-btn" title="Notifications" onclick="window.location.href='{{ route('student.notifications.view') }}'">
    <i class="bi bi-bell-fill"></i>
    @if($stats['unread'] > 0)
        <span class="badge" id="header-unread-badge">{{ $stats['unread'] }}</span>
    @endif
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
        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left">
                    <button class="back-btn" onclick="history.back()">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <div>
                        <h1 class="page-title">Notification <span class="highlight">Panel</span></h1>
                        <p class="page-subtitle">View and manage all university notifications</p>
                    </div>
                </div>
                <div class="breadcrumb-nav">
                    <a href="{{route('student.dashboard')}}">Dashboard</a>
                    <span>/</span>
                    <span class="current">Notifications</span>
                </div>
            </div>

          
          <div class="actions-bar">
    <div class="filter-group">
        <button class="filter-btn active" onclick="filterNotifications('all', this)">
            <i class="bi bi-grid-fill"></i>
            All
            <span class="count">{{ $stats['total'] }}</span>
        </button>
        {{-- <button class="filter-btn" onclick="filterNotifications('unread', this)">
            <i class="bi bi-envelope-fill"></i>
            Unread
            <span class="count">{{ $stats['unread'] }}</span>
        </button> --}}
        <button class="filter-btn" onclick="filterNotifications('urgent', this)">
            <i class="bi bi-exclamation-circle-fill"></i>
            Urgent
            <span class="count">{{ $stats['urgent'] }}</span>
        </button>
        <button class="filter-btn" onclick="filterNotifications('important', this)">
    <i class="bi bi-star-fill"></i>
    Important
    <span class="count">{{ $notifications->where('priority', 'important')->count() }}</span>
</button>
 <button class="filter-btn" onclick="filterNotifications('favorite', this)">
            <i class="bi bi-star-fill"></i>
            Favorites
        </button>
        
       
    </div>
    
</div>

            <!-- Notifications Container -->
<div class="notifications-container" id="notificationsContainer">
    @forelse($notifications as $notif)
       <div class="notification-card {{ $notif->pivot->is_read ? '' : 'unread' }}" 
     data-type="{{ $notif->priority }}" 
     style="position: relative; {{ !$notif->pivot->is_read ? 'border-left: 5px solid ' . $notif->color . ';' : '' }}">
            
            
            <div class="notification-header">
                <div class="notification-icon" style="background-color: {{ $notif->color }}; color: white; padding: 10px; border-radius: 10px;">
                    <i class="bi {{ $notif->icon }}"></i>
                </div>
                <div class="notification-main">
                    <div class="notification-title-row">
                        <h3 class="notification-subject" style="padding-right: 70px;">{{ $notif->title }}</h3>
                        
                        <span class="notification-badge {{ $notif->priority }}">{{ ucfirst($notif->priority) }}</span>
                        
                       @if(!$notif->pivot->is_read)
    <span class="notification-badge new timeout-badge">New</span>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Find all badges with the 'timeout-badge' class
    const newBadges = document.querySelectorAll('.timeout-badge');
    const headerBadge = document.getElementById('header-unread-badge');

    if (newBadges.length > 0) {
        // 2. Wait 3 seconds (3000ms)
        setTimeout(() => {
            newBadges.forEach(badge => {
                // Apply a smooth fade-out effect
                badge.style.transition = "opacity 0.8s ease, transform 0.8s ease";
                badge.style.opacity = "0";
                badge.style.transform = "translateY(-5px)";
                
                // Remove from DOM after fade completes
                setTimeout(() => badge.remove(), 800);
            });

            // 3. Also fade out the header bell badge since the user has seen them
            if (headerBadge) {
                headerBadge.style.transition = "opacity 0.8s ease";
                headerBadge.style.opacity = "0";
                setTimeout(() => headerBadge.style.display = 'none', 800);
            }

            // 4. OPTIONAL: Tell the server to mark all as read automatically
            // so they don't come back on refresh
            markAllAsReadOnServer();

        }, 3000); 
    }
});

function markAllAsReadOnServer() {
    fetch("{{ route('notifications.markAllRead') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    });
}
</script>

                        @if($notif->is_pinned)
                            <i class="bi bi-pin-angle-fill text-primary ms-2" title="Pinned"></i>
                        @endif
                    </div>
                
                    <p class="notification-description">
                        {{ $notif->description }}
                    </p>
@if(isset($notif->metadata['poll_options']) && is_array($notif->metadata['poll_options']))
    <div class="poll-box mt-3 p-3 rounded bg-light">
        <p class="fw-bold small">
            @if($notif->pivot->has_voted)
                <i class="bi bi-check-circle-fill text-success"></i> You have already voted
            @else
                Participate in this poll:
            @endif
        </p>

        @foreach($notif->metadata['poll_options'] as $optionText => $voteCount)
            <form action="{{ route('notifications.vote', $notif->id) }}" 
                  method="POST" 
                  class="mb-2" 
                  onsubmit="return checkVote(this, {{ $notif->pivot->has_voted ? 'true' : 'false' }})">
                @csrf
                <input type="hidden" name="option" value="{{ $optionText }}">
                
                <button type="submit" 
                    class="btn btn-sm w-100 d-flex justify-content-between align-items-center {{ $notif->pivot->has_voted ? 'btn-light' : 'btn-outline-primary' }}"
                    style="{{ $notif->pivot->has_voted ? 'cursor: not-allowed;' : '' }}">
                    
                    <span>{{ $optionText }}</span>
                    <span class="badge bg-primary rounded-pill">{{ $voteCount }}</span>
                </button>
            </form>
        @endforeach
    </div>
@endif
<script>
    function checkVote(form, hasVoted) {
    if (hasVoted) {
        alert("You have already voted! You cannot vote a second time.");
        return false; // This stops the form from submitting
    }
    return true; // This allows the form to submit
}
</script>
                </div>
            </div>
            
            <div class="notification-meta">
                <div class="notification-author">
                    <div class="author-avatar">{{ substr($notif->sender->name, 0, 1) }}</div>
                    <div class="author-info">
                        <span class="author-name">Sent by: {{ $notif->sender->name }}</span>
                        <span class="author-role">
                            <span class="role-badge management">
                                <i class="bi bi-shield-check"></i>
                                ({{ ucfirst($notif->sender->role) }})
                            </span>
                        </span>
                    </div>
                </div>

                <div class="notification-datetime">
                    <i class="bi bi-calendar3"></i>
                    {{ $notif->created_at->format('M d, Y') }}
                    <span style="margin: 0 5px;">•</span>
                    <i class="bi bi-clock"></i>
                    {{ $notif->created_at->format('h:i A') }}
                </div>

              <div class="notification-actions">
    {{-- NO FORM TAG HERE --}}
    <button type="button" 
            class="action-btn {{ $notif->pivot->is_pinned ? 'text-warning' : '' }}" 
            title="Favorite"
            onclick="toggleFavorite({{ $notif->id }}, this, event)">
        <i class="bi {{ $notif->pivot->is_pinned ? 'bi-star-fill' : 'bi-star' }}"></i>
    </button>

    @if(!$notif->pivot->is_read)
        <button type="button" class="action-btn mark-read" title="Mark as Read" onclick="markAsRead({{ $notif->id }}, this)">
            <i class="bi bi-check-circle"></i>
        </button>
    @endif
</div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <i class="bi bi-chat-left-dots text-muted" style="font-size: 3rem;"></i>
            <p class="mt-3 text-muted">No notifications found yet.</p>
        </div>
    @endforelse
</div>

<div id="noResults" class="text-center py-5" style="display: none; background: white; border-radius: 15px; margin-top: 20px;">
    <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
    <p class="mt-3 text-muted fw-500">No notifications match your search.</p>
    <button class="btn btn-sm btn-outline-primary" onclick="document.getElementById('searchInput').value=''; searchNotifications();">Clear Search</button>
</div>

<div class="mt-4">
    {{ $notifications->links() }}
</div>

            <!-- Pagination -->
            <div class="pagination-container">
              @if($notifications->hasPages())
    <div class="pagination-info">
        Page {{ $notifications->currentPage() }} of {{ $notifications->lastPage() }}
    </div>
@endif
<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($notifications->onFirstPage())
        <button class="page-btn" disabled><i class="bi bi-chevron-left"></i></button>
    @else
        <a href="{{ $notifications->previousPageUrl() }}" class="page-btn"><i class="bi bi-chevron-left"></i></a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($notifications->getUrlRange(1, $notifications->lastPage()) as $page => $url)
        @if ($page == $notifications->currentPage())
            <button class="page-btn active">{{ $page }}</button>
        @else
            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($notifications->hasMorePages())
        <a href="{{ $notifications->nextPageUrl() }}" class="page-btn"><i class="bi bi-chevron-right"></i></a>
    @else
        <button class="page-btn" disabled><i class="bi bi-chevron-right"></i></button>
    @endif
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

      <script>
        function handleNotificationClick(id, element) {
    if (!element.classList.contains('unread')) return;

    fetch(`/notifications/mark-as-read/${id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // 1. Visual update for the card
            element.classList.remove('unread');
            element.style.borderLeft = "none";

            // 2. Hide the "New" tag after 2 seconds
            const newBadge = element.querySelector('.notification-badge.new');
            if (newBadge) {
                setTimeout(() => {
                    newBadge.style.opacity = "0";
                    setTimeout(() => newBadge.remove(), 500);
                }, 2000);
            }

            // 3. IMMEDIATELY update the header badge
            const headerBadge = document.getElementById('header-unread-badge');
            if (headerBadge) {
                let currentCount = parseInt(headerBadge.innerText);
                if (currentCount > 1) {
                    headerBadge.innerText = currentCount - 1;
                } else {
                    headerBadge.style.display = 'none'; // Hide if count reaches 0
                }
            }
        }
    });
}

window.onload = function() {
    // Wait 3 seconds after the page loads, then hide the header badge
    setTimeout(() => {
        const headerBadge = document.getElementById('header-unread-badge');
        if (headerBadge) {
            headerBadge.style.transition = "opacity 0.8s ease";
            headerBadge.style.opacity = "0";
            setTimeout(() => headerBadge.style.display = 'none', 800);
        }
    }, 3000); 
};
</script>

<script>
      // Pagination
        document.querySelectorAll('.page-btn:not(:disabled)').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Add fadeOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from {
                    opacity: 1;
                    transform: translateX(0);
                }
                to {
                    opacity: 0;
                    transform: translateX(100px);
                }
            }
        `;
        document.head.appendChild(style);
        // Priority selection
        function selectPriority(element, priority) {
            document.querySelectorAll('.priority-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            element.classList.add('selected');
        }

       
        
</script>
<script>
   function toggleFavorite(id, element, event) {
    event.stopPropagation(); // Prevents the card click event
    
    fetch(`/notifications/${id}/favorite`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const icon = element.querySelector('i');
            const card = element.closest('.notification-card');
            
            if (data.is_favorite) {
                // Fill the star and turn it yellow
                icon.classList.replace('bi-star', 'bi-star-fill');
                element.classList.add('text-warning');
                card.setAttribute('data-favorite', 'true');
            } else {
                // Empty the star and remove yellow
                icon.classList.replace('bi-star-fill', 'bi-star');
                element.classList.remove('text-warning');
                card.setAttribute('data-favorite', 'false');
            }
        }
    })
    .catch(error => console.error('Error:', error));
}
    // 2. Combined Filter Function (Fixed "data-type" vs "data-priority")
    function filterNotifications(type, btn) {
        // Update Button UI
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cards = document.querySelectorAll('.notification-card');
        
        cards.forEach(card => {
            // We use getAttribute('data-type') because that's what is in your HTML
            const cardPriority = card.getAttribute('data-type'); 
            const isFav = card.getAttribute('data-favorite') === 'true';

            if (type === 'all') {
                card.style.display = 'block';
            } else if (type === 'favorite') {
                card.style.display = isFav ? 'block' : 'none';
            } else {
                // This handles 'important', 'urgent', etc.
                card.style.display = (cardPriority === type) ? 'block' : 'none';
            }
        });
    }

   
</script>
</body>

</html>