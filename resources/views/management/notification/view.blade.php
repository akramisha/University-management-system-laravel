<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Notifications</title>
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

        /* Page Header */
        .page-header {
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

  <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

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
                    <a href="{{route('management.notification.view')}}" class="sidebar-menu-link active">
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
                    <input type="text" placeholder="Search notifications...">
                </div>
            </div>

            <div class="header-right">
             <button class="header-icon-btn" title="Notifications" onclick="window.location.href='{{ route('management.notification.view') }}'">
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
                    <a href="{{route('management.dashboard')}}">Dashboard</a>
                    <span>/</span>
                    <span class="current">Notifications</span>
                </div>
            </div>

           <div class="notification-stats">
    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1)); color: #006d77;">
            <i class="bi bi-bell-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $stats['total'] }}</h3>
            <p>Total Notifications</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, rgba(33, 150, 243, 0.1), rgba(33, 150, 243, 0.2)); color: #1976d2;">
            <i class="bi bi-envelope-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $stats['unread'] }}</h3>
            <p>Unread</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.2)); color: #ff6b6b;">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $stats['urgent'] }}</h3>
            <p>Urgent</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(76, 175, 80, 0.2)); color: #43a047;">
            <i class="bi bi-send-fill"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $stats['sent_this_week'] }}</h3>
            <p>Sent by You</p>
        </div>
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
        
        <div class="search-filter">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Search notifications..." id="searchInput" onkeyup="searchNotifications()">
        </div>
    </div>
    
    <div class="action-buttons">
        <button class="btn btn-outline" onclick="markAllRead()">
            <i class="bi bi-check-all"></i>
            Mark All Read
        </button>
        
        @if(auth()->user()->role == 'management')
        <a href="{{route('notifications.create')}}" class="btn btn-primary">
              <i class="bi bi-plus-circle"></i>
            Create Notification
        </a>
        @endif
    </div>
</div>

            <!-- Notifications Container -->
<div class="notifications-container" id="notificationsContainer">
    @forelse($notifications as $notif)
       <div class="notification-card {{ $notif->pivot->is_read ? '' : 'unread' }}" 
     data-type="{{ $notif->priority }}" 
     style="position: relative; {{ !$notif->pivot->is_read ? 'border-left: 5px solid ' . $notif->color . ';' : '' }}">
            
            <div class="management-actions" style="position: absolute; top: 12px; right: 12px; display: flex; gap: 6px; z-index: 5;">
                <a href="{{ route('notifications.edit', $notif->id) }}" 
                   class="btn btn-sm btn-light" 
                   style="width: 28px; height: 28px; padding: 0; display: flex; align-items: center; justify-content: center; border-radius: 50%; border: 1px solid #e0e0e0; color: #0d6efd;" 
                   title="Edit">
                    <i class="bi bi-pencil-fill" style="font-size: 0.75rem;"></i>
                </a>

                <form action="{{ route('notifications.destroy', $notif->id) }}" method="POST" onsubmit="return confirm('Delete permanently?')" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-sm btn-light" 
                            style="width: 28px; height: 28px; padding: 0; display: flex; align-items: center; justify-content: center; border-radius: 50%; border: 1px solid #e0e0e0; color: #dc3545;" 
                            title="Delete">
                        <i class="bi bi-trash-fill" style="font-size: 0.75rem;"></i>
                    </button>
                </form>
            </div>

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

                    @if($notif->metadata && isset($notif->metadata['poll_options']))
                        <div class="poll-box mt-3 p-3 rounded" style="background: #f8f9fa; border: 1px solid #e9ecef;">
                            <p class="mb-2" style="font-size: 0.85rem; font-weight: 600; color: #444;">Make a selection:</p>
                            <div class="d-flex flex-column gap-2">
                                @foreach($notif->metadata['poll_options'] as $optionText => $voteCount)
                                    <form action="{{ route('notifications.vote', $notif->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="option" value="{{ $optionText }}">
                                        <button type="submit" class="btn btn-sm btn-outline-primary w-100 d-flex justify-content-between align-items-center" style="border-radius: 6px; padding: 6px 12px;">
                                            <span>{{ $optionText }}</span>
                                            <span class="badge bg-primary rounded-pill">{{ $voteCount }}</span>
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    @endif

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
                    <form action="{{ route('notifications.favorite', $notif->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="action-btn {{ $notif->pivot->is_favorite ? 'text-warning' : '' }}" title="Favorite">
                            <i class="bi {{ $notif->pivot->is_favorite ? 'bi-star-fill' : 'bi-star' }}"></i>
                        </button>
                    </form>

                    @if(!$notif->pivot->is_read)
                        <button class="action-btn mark-read" title="Mark as Read" onclick="markAsRead({{ $notif->id }}, this)">
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

    <!-- Create Notification Modal -->
    <div class="modal-overlay" id="createModal">
        <div class="modal-container">
            <div class="modal-header">
                <h2>
                    <i class="bi bi-bell-fill"></i>
                    Create New Notification
                </h2>
                <button class="modal-close" onclick="closeModal()">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="createNotificationForm">
                    <div class="form-group">
                        <label class="form-label">Subject <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter notification subject" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description <span class="required">*</span></label>
                        <textarea class="form-control" placeholder="Enter detailed notification message..."
                            required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="form-control">
                                <option value="">Select Category</option>
                                <option value="announcement">Announcement</option>
                                <option value="alert">Alert</option>
                                <option value="event">Event</option>
                                <option value="info">Information</option>
                                <option value="achievement">Achievement</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Target Audience</label>
                            <select class="form-control">
                                <option value="">Select Audience</option>
                                <option value="all">All Users</option>
                                <option value="students">Students Only</option>
                                <option value="faculty">Faculty Only</option>
                                <option value="staff">Staff Only</option>
                                <option value="department">Specific Department</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Priority Level <span class="required">*</span></label>
                        <div class="priority-options">
                            <label class="priority-option normal selected" onclick="selectPriority(this, 'normal')">
                                <input type="radio" name="priority" value="normal" checked>
                                <span class="priority-label">
                                    <i class="bi bi-circle-fill"></i>
                                    Normal
                                </span>
                            </label>
                            <label class="priority-option important" onclick="selectPriority(this, 'important')">
                                <input type="radio" name="priority" value="important">
                                <span class="priority-label">
                                    <i class="bi bi-star-fill"></i>
                                    Important
                                </span>
                            </label>
                            <label class="priority-option urgent" onclick="selectPriority(this, 'urgent')">
                                <input type="radio" name="priority" value="urgent">
                                <span class="priority-label">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    Urgent
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Schedule Date (Optional)</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Schedule Time (Optional)</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal()">
                    <i class="bi bi-x-circle"></i>
                    Cancel
                </button>
                <button class="btn btn-outline">
                    <i class="bi bi-save"></i>
                    Save Draft
                </button>
                <button class="btn btn-primary" onclick="sendNotification()">
                    <i class="bi bi-send-fill"></i>
                    Send Notification
                </button>
            </div>
        </div>
    </div>

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

        // Modal functions
        function openModal() {
            document.getElementById('createModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('createModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close modal on outside click
        document.getElementById('createModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Priority selection
        function selectPriority(element, priority) {
            document.querySelectorAll('.priority-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            element.classList.add('selected');
        }

        // Filter notifications
      function filterNotifications(priority, btn) {
    // 1. Update Active Button UI
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // 2. Filter the Cards
    const cards = document.querySelectorAll('.notification-card');
    
    cards.forEach(card => {
        const cardPriority = card.getAttribute('data-type'); // important, normal, urgent
        
        if (priority === 'all') {
            card.style.display = 'block';
        } else if (cardPriority === priority) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
        // Search notifications
        function searchNotifications() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.notification-card');

            cards.forEach(card => {
                const subject = card.querySelector('.notification-subject').textContent.toLowerCase();
                const description = card.querySelector('.notification-description').textContent.toLowerCase();

                if (subject.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Mark as read
        function markAsRead(notificationId, btn) {
    // Send request to Laravel Controller
    fetch(`/management/notification/${notificationId}/read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const card = btn.closest('.notification-card');
            card.classList.remove('unread');
            
            // UI Change: Change button to a green checkmark
            btn.innerHTML = '<i class="bi bi-check-circle-fill" style="color: #43a047;"></i>';
            btn.onclick = null; // Disable button after click

            // Remove 'New' badge
            const newBadge = card.querySelector('.notification-badge.new');
            if (newBadge) newBadge.remove();

            // Update the 'Unread' count badge in the filter group
            const unreadCount = document.querySelector('.filter-btn[onclick*="unread"] .count');
            if(unreadCount) unreadCount.innerText = Math.max(0, parseInt(unreadCount.innerText) - 1);
        }
    });
}

        // Mark all as read
        function markAllRead() {
            const cards = document.querySelectorAll('.notification-card.unread');
            cards.forEach(card => {
                card.classList.remove('unread');

                const markBtn = card.querySelector('.mark-read');
                if (markBtn) {
                    markBtn.innerHTML = '<i class="bi bi-check-circle-fill" style="color: #43a047;"></i>';
                }

                const newBadge = card.querySelector('.notification-badge.new');
                if (newBadge) {
                    newBadge.remove();
                }
            });

            // Update stats
            alert('All notifications marked as read!');
        }

        // Delete notification
        function deleteNotification(btn) {
            if (confirm('Are you sure you want to delete this notification?')) {
                const card = btn.closest('.notification-card');
                card.style.animation = 'fadeOut 0.3s ease forwards';
                setTimeout(() => {
                    card.remove();
                }, 300);
            }
        }

        // Send notification
        function sendNotification() {
            // Get form values
            const form = document.getElementById('createNotificationForm');
            const subject = form.querySelector('input[type="text"]').value;
            const description = form.querySelector('textarea').value;

            if (!subject || !description) {
                alert('Please fill in all required fields!');
                return;
            }

            // Show success message
            alert('Notification sent successfully!');
            closeModal();
            form.reset();

            // Reset priority selection
            document.querySelectorAll('.priority-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            document.querySelector('.priority-option.normal').classList.add('selected');
        }

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
</body>

</html>