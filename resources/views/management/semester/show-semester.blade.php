<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Create Semester</title>
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

        /* Add Semester Button */
        .add-semester-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
            text-decoration: none;
        }

        .add-semester-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 109, 119, 0.4);
            color: white;
        }

        .add-semester-btn i {
            font-size: 1.2rem;
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 2px solid #e0f2f1;
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            border-color: #006d77;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.05), rgba(0, 180, 216, 0.05));
            color: #006d77;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            border-color: transparent;
        }

        /* Semester Cards Grid */
        .semester-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        /* Semester Card */
        .semester-card {
            background: white;
            border-radius: 16px;
            padding: 0;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            transition: all 0.4s ease;
            overflow: hidden;
            position: relative;
        }

        .semester-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 61, 68, 0.15);
        }

        .semester-card-header {
            padding: 20px 20px 15px;
            position: relative;
        }

        .semester-card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
        }

        .semester-card.bscs .semester-card-header::before {
            background: linear-gradient(135deg, #006d77, #00b4d8);
        }

        .semester-card.bba .semester-card-header::before {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        }

        .semester-card.mbbs .semester-card-header::before {
            background: linear-gradient(135deg, #43a047, #66bb6a);
        }

        .semester-card.bds .semester-card-header::before {
            background: linear-gradient(135deg, #8e24aa, #ab47bc);
        }

        .semester-card.pharm .semester-card-header::before {
            background: linear-gradient(135deg, #fb8c00, #ffa726);
        }

        .semester-header-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .semester-program-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .semester-card.bscs .semester-program-badge {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .semester-card.bba .semester-program-badge {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 142, 142, 0.1));
            color: #ff6b6b;
        }

        .semester-card.mbbs .semester-program-badge {
            background: linear-gradient(135deg, rgba(67, 160, 71, 0.1), rgba(102, 187, 106, 0.1));
            color: #43a047;
        }

        .semester-card.bds .semester-program-badge {
            background: linear-gradient(135deg, rgba(142, 36, 170, 0.1), rgba(171, 71, 188, 0.1));
            color: #8e24aa;
        }

        .semester-card.pharm .semester-program-badge {
            background: linear-gradient(135deg, rgba(251, 140, 0, 0.1), rgba(255, 167, 38, 0.1));
            color: #fb8c00;
        }

        .semester-status.active {
    background: rgba(67, 160, 71, 0.1);
    color: #43a047;
}

.semester-status.upcoming {
    background: rgba(251, 140, 0, 0.1);
    color: #fb8c00;
}

.semester-status.inactive {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

        .semester-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .semester-status.active {
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
        }

        .semester-status.upcoming {
            background: rgba(251, 140, 0, 0.1);
            color: #fb8c00;
        }

        .semester-status.completed {
            background: rgba(96, 125, 139, 0.1);
            color: #546e7a;
        }

        .semester-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .semester-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 5px;
        }

        .semester-subtitle {
            font-size: 0.8rem;
            color: #80cbc4;
        }

        .semester-card-body {
            padding: 0 20px 15px;
        }

        .semester-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .semester-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            background: #f8feff;
            border-radius: 10px;
        }

        .semester-info-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
        }

        .semester-info-content {
            flex: 1;
        }

        .semester-info-value {
            font-size: 0.95rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
        }

        .semester-info-label {
            font-size: 0.7rem;
            color: #80cbc4;
            margin-top: 2px;
        }

        .semester-card-footer {
            padding: 15px 20px;
            background: #f8feff;
            border-top: 1px solid rgba(0, 109, 119, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .semester-dates {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.75rem;
            color: #005459;
        }

        .semester-dates i {
            color: #006d77;
        }

        .semester-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .semester-action-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .semester-action-btn.view {
            background: rgba(0, 109, 119, 0.1);
            color: #006d77;
        }

        .semester-action-btn.view:hover {
            background: #006d77;
            color: white;
        }

        .semester-action-btn.edit {
            background: rgba(251, 140, 0, 0.1);
            color: #fb8c00;
        }

        .semester-action-btn.edit:hover {
            background: #fb8c00;
            color: white;
        }

        .semester-action-btn.delete {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .semester-action-btn.delete:hover {
            background: #ff6b6b;
            color: white;
        }

        /* Stats Summary */
        .stats-summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-card-content {
            flex: 1;
        }

        .stat-card-value {
            font-size: 1.4rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
        }

        .stat-card-label {
            font-size: 0.8rem;
            color: #80cbc4;
            margin-top: 3px;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 61, 68, 0.5);
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 61, 68, 0.3);
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 25px 25px 20px;
            border-bottom: 1px solid rgba(0, 109, 119, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #003d44;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-title i {
            color: #006d77;
        }

        .modal-close {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: none;
            background: #f8feff;
            color: #005459;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: #ff6b6b;
            color: white;
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
            font-weight: 600;
            color: #003d44;
            margin-bottom: 8px;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0f2f1;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #003d44;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #83c5be;
            box-shadow: 0 0 15px rgba(131, 197, 190, 0.15);
        }

        .form-input::placeholder {
            color: #80cbc4;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .modal-footer {
            padding: 20px 25px 25px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-cancel {
            padding: 12px 25px;
            border: 2px solid #e0f2f1;
            background: white;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            border-color: #ff6b6b;
            color: #ff6b6b;
        }

        .btn-submit {
            padding: 12px 25px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
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
            .stats-summary {
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
        }

        @media (max-width: 768px) {
            .stats-summary {
                grid-template-columns: 1fr 1fr;
            }

            .semester-grid {
                grid-template-columns: 1fr;
            }

            .header-profile-info {
                display: none;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .stats-summary {
                grid-template-columns: 1fr;
            }

            .search-container {
                display: none;
            }

            .filter-section {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 10px;
            }

            .filter-btn {
                flex-shrink: 0;
            }
        }

        /* Remove the ::before pseudo-element since we use a real border now */
.semester-card-header::before {
    display: none;
}

.semester-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
    transition: all 0.4s ease;
    overflow: hidden;
}

.semester-program-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

/* Maintain Status Colors (Independent of Class Color) */
.semester-status.active { background: rgba(67, 160, 71, 0.1); color: #43a047; }
.semester-status.upcoming { background: rgba(251, 140, 0, 0.1); color: #fb8c00; }
.semester-status.completed { background: rgba(96, 125, 139, 0.1); color: #546e7a; }
.semester-status.inactive { background: rgba(239, 68, 68, 0.1); color: #ef4444; }

.semester-info-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
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
                    <a href="{{route("students.index")}}" class="sidebar-menu-link">
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

                <li class="sidebar-menu-item open">
                    <div class="sidebar-menu-link active" onclick="toggleDropdown(this)">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Semester Management</span>
                        <i class="bi bi-chevron-down sidebar-menu-arrow"></i>
                    </div>
                    <div class="sidebar-dropdown">
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-item">
                                <a href="{{ route('semesters.show') }}" class="sidebar-dropdown-link active " >
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
                    <a href="{{route('management.notification')}}" class="sidebar-menu-link">
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
                    <input type="text" placeholder="Search semesters...">
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
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left">
                    <h1 class="page-title">Create <span class="highlight">Semester</span></h1>
                    <p class="page-subtitle">Manage and create semesters for all programs</p>
                </div>
                <a href="{{ route('semesters.create') }}" class="add-semester-btn">
                    <i class="bi bi-plus-circle-fill"></i>
                    Add Semester
                </a>
            </div>
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
           

            <!-- Stats Summary -->
            <div class="stats-summary">
                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1)); color: #006d77;">
                        <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">{{ $totalSemesters }}</div>
                        <div class="stat-card-label">Total Semesters</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(67, 160, 71, 0.1), rgba(102, 187, 106, 0.1)); color: #43a047;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">{{ $activeSemesters }}</div>
                        <div class="stat-card-label">Active Semesters</div>
                    </div>
                </div>

               

                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(96, 125, 139, 0.1), rgba(120, 144, 156, 0.1)); color: #546e7a;">
                        <i class="bi bi-archive-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">{{ $completedSemesters }}</div>
                        <div class="stat-card-label">Completed</div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
           <div class="filter-section">
    <button class="filter-btn active" data-filter="all">
        <i class="bi bi-grid-3x3-gap"></i>
        All Programs
    </button>

    @foreach($classes as $class)
       <button 
    class="filter-btn" 
    data-filter="{{ strtolower(str_replace(' ', '-', $class->class_code)) }}">
    <i class="{{ $class->icon }}"></i>
    {{ $class->class_code }}
</button>

    @endforeach
</div>
            <!-- Semester Cards Grid -->
            <div class="semester-grid" >
             

                @foreach($semesters as $semester)

                @php
        // Get the color from the class, or use a default if empty
        $brandColor = $semester->academicClass->color ?? '#006d77';
        // Create a 10% opacity version of the color for backgrounds
        $brandColorLight = $brandColor . '1a'; 
    @endphp
    
                <!-- BBA Semester 1 -->
              <div class="semester-card" data-program="{{ strtolower(str_replace(' ', '-', $semester->academicClass->class_code)) }}">
        <div class="semester-card-header" style="border-top: 4px solid {{ $brandColor }}">
            <div class="semester-header-top">
                <span class="semester-program-badge" style="background-color: {{ $brandColorLight }}; color: {{ $brandColor }}">
                    <i class="{{ $semester->academicClass->icon }}"></i>  
                    {{ $semester->academicClass->class_code }}
                </span>

             @php
    // 1 is Active (Green), 0 is Inactive/Completed (Gray/Red)
    if ($semester->status == 1) {
        $statusClass = 'active';
        $statusText = 'Active';
    } else {
        $statusClass = 'completed'; // or 'inactive'
        $statusText = 'Completed';
    }
@endphp

<span class="semester-status {{ $statusClass }}">
    <span class="semester-status-dot"></span>
    {{ $statusText }}
</span>
            </div>
            
            <h3 class="semester-title">{{ ucfirst($semester->type) }} {{ $semester->semester_number }}</h3>
            <p class="semester-subtitle">{{ $semester->academicClass->name ?? 'N/A' }} ( {{$semester->academicClass->session ?? 'N/A'}} )</p>
        </div>

        <div class="semester-card-body">
            <div class="semester-info-grid">
                <div class="semester-info-item">
                    <div class="semester-info-icon" style="background-color: {{ $brandColorLight }}; color: {{ $brandColor }}">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="semester-info-content">
                        <div class="semester-info-value">98</div>
                        <div class="semester-info-label">Students</div>
                    </div>
                </div>
                
                <div class="semester-info-item">
                    <div class="semester-info-icon" style="background-color: {{ $brandColorLight }}; color: {{ $brandColor }}">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    <div class="semester-info-content">
                        <div class="semester-info-value">5</div>
                        <div class="semester-info-label">Courses</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="semester-card-footer">
            <div class="semester-dates">
                <i class="bi bi-calendar-range"></i>
                {{ \Carbon\Carbon::parse($semester->start_date)->format('M Y') }} - 
    {{ \Carbon\Carbon::parse($semester->end_date)->format('M Y') }}
            </div>
            <div class="semester-actions">
<a href="{{ route('semesters.edit', $semester->id) }}" class="semester-action-btn edit" title="Edit">
    <i class="bi bi-pencil-fill"></i>
</a>
<button class="semester-action-btn delete" title="Delete"><i class="bi bi-trash-fill"></i></button>
            </div>
        </div>
    </div>

    

@endforeach


               
    <!-- Add Semester Modal -->
    <div class="modal-overlay" id="addSemesterModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="bi bi-plus-circle-fill"></i>
                    Add New Semester
                </h3>
                <button class="modal-close" onclick="closeModal()">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal()">Cancel</button>
                <button class="btn-submit" type="submit" form="addSemesterForm">
                    <i class="bi bi-plus-lg"></i>
                    Create Semester
                </button>
            </div>
        </div>
    </div>
            </div>
        </div>
    </main>
    

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function () {

            document.querySelectorAll('.filter-btn')
                .forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.dataset.filter;
            const cards = document.querySelectorAll('.semester-card');

            cards.forEach(card => {
                const program = card.dataset.program;

                card.style.display =
                    filterValue === 'all' || program === filterValue
                        ? 'block'
                        : 'none';
            });
        });
    });

});
</script>

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
            document.getElementById('addSemesterModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('addSemesterModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close modal when clicking outside
        document.getElementById('addSemesterModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Filter buttons
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        
       
    </script>
</body>

</html>