<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Show Classes</title>
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

        /* Add Class Button */
        .add-class-btn {
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

        .add-class-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 109, 119, 0.4);
            color: white;
        }

        .add-class-btn i {
            font-size: 1.2rem;
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
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 61, 68, 0.12);
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

        /* View Toggle */
        .view-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .view-toggle {
            display: flex;
            background: white;
            border-radius: 10px;
            padding: 4px;
            box-shadow: 0 2px 10px rgba(0, 61, 68, 0.08);
        }

        .view-toggle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 36px;
            border: none;
            background: transparent;
            border-radius: 8px;
            color: #80cbc4;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-toggle-btn:hover {
            color: #006d77;
        }

        .view-toggle-btn.active {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
        }

        .filter-sort {
    display: flex;
    align-items: center;
    /* This pushes the buttons to the right */
    justify-content: flex-end; 
    flex-wrap: wrap; 
    gap: 12px;
    margin-bottom: 25px; 
    margin-top: 10px;
    /* Ensures the container takes up the full row */
    width: 100%; 
}



.btn-btn {
    display: inline-flex; /* Changed from flex to inline-flex to prevent 100% width */
    align-items: center;
    justify-content: center; /* Centers the text/icon inside the button */
    gap: 8px;
    background: #005459;
    border: 2px solid #e0f2f1;
    padding: 8px 16px; /* Reduced vertical, increased horizontal for better shape */
    border-radius: 10px;
    font-size: 0.85rem;
    font-weight: 500;
    color: white;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    white-space: nowrap;

    /* Width Control */
    width: fit-content;    /* Only as wide as the content */
    min-width: 120px;      /* Optional: keeps buttons from being TOO tiny */
    margin: 10px auto;     /* Centers the button itself if it's a block-level element */
}

.btn-btn:hover {
    background: white;
    border: 2px solid #005459;
    color: #005459;
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
    text-decoration: none; /* Removes underline from <a> tags */
    transition: all 0.3s ease;
    /* Keeps buttons from stretching too much on small screens */
    white-space: nowrap; 
}

/* Active State to highlight selected filter */
.filter-btn.active {
    background: #006d77;
    border-color: #006d77;
    color: white;
}

.filter-btn:hover {
    border-color: #006d77;
    color: #006d77;
}



        /* Classes Grid */
        .classes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .class-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 61, 68, 0.08);
            transition: all 0.4s ease;
            position: relative;
        }

        .class-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 61, 68, 0.15);
        }

        .class-card-header {
            padding: 25px 25px 20px;
            position: relative;
            overflow: hidden;
        }

        .class-card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            pointer-events: none;
        }


        .class-card.bscs .class-card-header {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.08), rgba(0, 180, 216, 0.05));
        }

        .class-card.bba .class-card-header {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.08), rgba(255, 142, 142, 0.05));
        }

        .class-card.mbbs .class-card-header {
            background: linear-gradient(135deg, rgba(67, 160, 71, 0.08), rgba(102, 187, 106, 0.05));
        }

        .class-card.bds .class-card-header {
            background: linear-gradient(135deg, rgba(142, 36, 170, 0.08), rgba(171, 71, 188, 0.05));
        }

        .class-card.pharmd .class-card-header {
            background: linear-gradient(135deg, rgba(251, 140, 0, 0.08), rgba(255, 167, 38, 0.05));
        }

        .class-card.bsn .class-card-header {
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.08), rgba(240, 98, 146, 0.05));
        }

        .class-header-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .class-icon-wrapper {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            position: relative;
        }

        .class-card.bscs .class-icon-wrapper {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            box-shadow: 0 8px 25px rgba(0, 109, 119, 0.3);
        }

        .class-card.bba .class-icon-wrapper {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            color: white;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        .class-card.mbbs .class-icon-wrapper {
            background: linear-gradient(135deg, #43a047, #66bb6a);
            color: white;
            box-shadow: 0 8px 25px rgba(67, 160, 71, 0.3);
        }

        .class-card.bds .class-icon-wrapper {
            background: linear-gradient(135deg, #8e24aa, #ab47bc);
            color: white;
            box-shadow: 0 8px 25px rgba(142, 36, 170, 0.3);
        }

        .class-card.pharmd .class-icon-wrapper {
            background: linear-gradient(135deg, #fb8c00, #ffa726);
            color: white;
            box-shadow: 0 8px 25px rgba(251, 140, 0, 0.3);
        }

        .class-card.bsn .class-icon-wrapper {
            background: linear-gradient(135deg, #e91e63, #f06292);
            color: white;
            box-shadow: 0 8px 25px rgba(233, 30, 99, 0.3);
        }

        .class-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .class-status.active {
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
        }

        .class-status.inactive {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .class-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .class-code {
            font-size: 1.4rem;
            font-weight: 800;
            color: #003d44;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .class-name {
            font-size: 0.9rem;
            color: #005459;
            line-height: 1.4;
        }

        .class-card-body {
            padding: 0 25px 20px;
        }

        .class-description {
            font-size: 0.8rem;
            color: #80cbc4;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .class-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .class-stat-item {
            text-align: center;
            padding: 12px 10px;
            background: #f8feff;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .class-stat-item:hover {
            background: #e0f7fa;
        }

        .class-stat-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
        }

        .class-stat-label {
            font-size: 0.65rem;
            color: #003d44;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .class-card-footer {
            padding: 15px 25px;
            background: #f8feff;
            border-top: 1px solid rgba(0, 109, 119, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .class-duration {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: #005459;
        }

        .class-duration i {
            color: #006d77;
        }

        .class-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .class-action-btn {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .class-action-btn.view {
            background: rgba(0, 109, 119, 0.1);
            color: #006d77;
        }

        .class-action-btn.view:hover {
            background: #006d77;
            color: white;
            transform: translateY(-2px);
        }

        .class-action-btn.edit {
            background: rgba(251, 140, 0, 0.1);
            color: #fb8c00;
        }

        .class-action-btn.edit:hover {
            background: #fb8c00;
            color: white;
            transform: translateY(-2px);
        }

        .class-action-btn.delete {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .class-action-btn.delete:hover {
            background: #ff6b6b;
            color: white;
            transform: translateY(-2px);
        }

        /* List View */
        .classes-list {
            display: none;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .classes-list.active {
            display: flex;
        }

        .classes-grid.hidden {
            display: none;
        }

        .class-list-item {
            background: white;
            border-radius: 16px;
            padding: 20px 25px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .class-list-item:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 30px rgba(0, 61, 68, 0.12);
        }

        .class-list-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
            flex-shrink: 0;
        }

        .class-list-icon.bscs {
            background: linear-gradient(135deg, #006d77, #00b4d8);
        }

        .class-list-icon.bba {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        }

        .class-list-icon.mbbs {
            background: linear-gradient(135deg, #43a047, #66bb6a);
        }

        .class-list-icon.bds {
            background: linear-gradient(135deg, #8e24aa, #ab47bc);
        }

        .class-list-icon.pharmd {
            background: linear-gradient(135deg, #fb8c00, #ffa726);
        }

        .class-list-icon.bsn {
            background: linear-gradient(135deg, #e91e63, #f06292);
        }

        .class-list-info {
            flex: 1;
        }

        .class-list-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 5px;
        }

        .class-list-code {
            font-size: 1.1rem;
            font-weight: 700;
            color: #003d44;
        }

        .class-list-name {
            font-size: 0.85rem;
            color: #005459;
        }

        .class-list-stats {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .class-list-stat {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: #80cbc4;
        }

        .class-list-stat i {
            color: #006d77;
        }

        .class-list-stat span {
            font-weight: 600;
            color: #003d44;
        }

        .class-list-actions {
            display: flex;
            align-items: center;
            gap: 10px;
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
            backdrop-filter: blur(5px);
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            width: 100%;
            max-width: 550px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 80px rgba(0, 61, 68, 0.3);
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
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
            width: 38px;
            height: 38px;
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
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 8px;
        }

        .form-label .required {
            color: #ff6b6b;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0f2f1;
            border-radius: 12px;
            font-size: 0.9rem;
            color: #003d44;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            background: #f8feff;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #83c5be;
            box-shadow: 0 0 20px rgba(131, 197, 190, 0.15);
            background: white;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #80cbc4;
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Color Select in Modal */
        .color-options {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
        }

        .color-option {
            position: relative;
        }

        .color-radio {
            display: none;
        }

        .color-label {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .color-label:hover {
            transform: scale(1.1);
        }

        .color-radio:checked+.color-label {
            border-color: #003d44;
            transform: scale(1.1);
        }

        .color-label i {
            color: white;
            font-size: 1rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .color-radio:checked+.color-label i {
            opacity: 1;
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
            padding: 12px 28px;
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
            box-shadow: 0 8px 25px rgba(0, 109, 119, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0, 61, 68, 0.08);
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
            color: #006d77;
            margin: 0 auto 20px;
        }

        .empty-state-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 10px;
        }

        .empty-state-text {
            font-size: 0.9rem;
            color: #80cbc4;
            margin-bottom: 25px;
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

        /* Toast Notification */
        .toast-notification {
            position: fixed;
            top: 25px;
            right: 25px;
            background: white;
            padding: 18px 25px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 15px 50px rgba(0, 61, 68, 0.2);
            z-index: 3000;
            transform: translateX(120%);
            transition: transform 0.4s ease;
        }

        .toast-notification.show {
            transform: translateX(0);
        }

        .toast-notification.success {
            border-left: 4px solid #43a047;
        }

        .toast-notification.error {
            border-left: 4px solid #ff6b6b;
        }

        .toast-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .toast-notification.success .toast-icon {
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
        }

        .toast-notification.error .toast-icon {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
        }

        .toast-message {
            font-size: 0.8rem;
            color: #80cbc4;
        }

        .toast-close {
            background: none;
            border: none;
            color: #80cbc4;
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .toast-close:hover {
            color: #ff6b6b;
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

            .classes-grid {
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

            .class-list-stats {
                display: none;
            }

            .view-controls {
                flex-direction: column;
                align-items: stretch;
                width: 10%;
            }
           .filter-sort {
        gap: 8px;
    }
    .filter-btn {
        padding: 8px 12px;
        font-size: 0.8rem;
        /* Optional: makes buttons take full width on mobile */
        /* flex: 1 1 calc(50% - 10px); */
    }
        }

        @media (max-width: 576px) {
            .stats-summary {
                grid-template-columns: 1fr;
            }

            .search-container {
                display: none;
            }

            .color-options {
                grid-template-columns: repeat(4, 1fr);
            }
            .view-controls {
                flex-direction: column;
                align-items: stretch;
                width: 10%;
            }
           .filter-sort {
        gap: 8px;
    }
    .filter-btn {
        padding: 8px 12px;
        font-size: 0.8rem;
        /* Optional: makes buttons take full width on mobile */
        /* flex: 1 1 calc(50% - 10px); */
    }
        }
        .class-header-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 15px;
        }
      

.class-card:empty {
    display: none;
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
                    <a href="{{route('admin.dashboard')}}" class="sidebar-menu-link ">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>

               
              <li class="sidebar-menu-item">
                    <a href="{{route('classes.index')}}" class="sidebar-menu-link ">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-collection-play"></i>
                        </div>
                        <span class="sidebar-menu-text">Program Registry</span>
                    </a>
                </li>

                 <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link ">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <span class="sidebar-menu-text">Curriculum View</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <div class="sidebar-menu-link active" onclick="toggleDropdown(this)">
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
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-person-video2"></i>
                                    </div>
                                    All Faculty
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-bar-chart-line"></i>
                                    </div>
                                    Enrollment Stats
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="#" class="sidebar-dropdown-link">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-circle-fill"></i>
                                    </div>
                                    Management
                                    
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="{{ route('admin.teachers.index') }}" class="sidebar-dropdown-link active">
                                    <div class="sidebar-menu-icon">
                                    <i class="bi bi-circle-fill"></i>
                                    </div>
                                     Tecahers
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
            <form action="{{ route('admin.teachers.index') }}" method="GET">

        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" name="search" placeholder="Search teachers..." 
                   id="searchInput" value="{{ request('search') }}">
        </div>
</form>

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
                    <h1 class="page-title">Academic <span class="highlight">Teachers</span></h1>
                    <p class="page-subtitle">Manage professors and their data</p>
                </div>
                
            </div>

            <!-- Stats Summary -->
            <div class="stats-summary">
                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1)); color: #006d77;">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">{{ $totalTeachers }}</div>
                        <div class="stat-card-label">Total Teachers</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(67, 160, 71, 0.1), rgba(102, 187, 106, 0.1)); color: #43a047;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">{{ $activeTeachersCount }}</div>
                        <div class="stat-card-label">Active Teachers</div>
                    </div>
                </div>

                
            </div>

            <!-- View Controls -->
            <div class="view-controls">
                <div class="view-toggle">
                    <button class="view-toggle-btn active" id="gridViewBtn" onclick="switchView('grid')">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                    </button>
                    <button class="view-toggle-btn" id="listViewBtn" onclick="switchView('list')">
                        <i class="bi bi-list-ul"></i>
                    </button>
                </div>
            </div>

                <div class="filter-sort">

    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}"
       class="filter-btn {{ request('status') === 'active' ? 'active' : '' }}">
        <i class="bi bi-check-circle"></i>
        Active
    </a>

    <a href="{{ request()->fullUrlWithQuery(['status' => 'inactive']) }}"
       class="filter-btn {{ request('status') === 'inactive' ? 'active' : '' }}">
        <i class="bi bi-x-circle"></i>
        Inactive
    </a>

    <a href="{{ route('admin.teachers.index') }}"
   class="filter-btn {{ !request()->has('status') ? 'active' : '' }}">
    <i class="bi bi-grid"></i>
    All
</a>

    <a href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}"
       class="filter-btn {{ request('sort') === 'asc' ? 'active' : '' }}">
        <i class="bi bi-sort-alpha-down"></i>
        A–Z
    </a>

    <a href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}"
       class="filter-btn {{ request('sort') === 'desc' ? 'active' : '' }}">
        <i class="bi bi-sort-alpha-up"></i>
        Z–A
    </a>

</div>


{{-- EMPTY SEARCH RESULT --}}
@if(request()->has('search') && request('search') !== '' && $teachers->isEmpty())

    <div class="class-card empty-state" style="border-top: 5px solid teal;">
        <div class="text-center py-5">
            <i class="bi bi-person-exclamation" style="font-size: 3rem; color: #ccc;"></i>
            <p class="mt-3">
                No teachers found matching "{{ request('search') }}"
            </p>
            <a href="{{ route('management.teacher.index') }}" class="btn-btn">
                Clear Search
            </a>
        </div>
    </div>

@endif

            <!-- Classes Grid View -->
            <div class="classes-grid" id="classesGrid">         
                
     @forelse($teachers as $teacher)

                <div class="class-card " style="border-top: 5px solid teal;">
                    <div class="class-card-header" 
     style="background-color: color-mix(in srgb, teal, white 90%);">
                        <div class="class-header-top" style=" teal;">
                            <div class="class-icon-wrapper" >
                    <div class="d-flex align-items-center">
        @php
            $initial = strtoupper(mb_substr($teacher->name, 0, 1));
        @endphp

        @if($teacher->teacherProfile && filled($teacher->teacherProfile->profile_photo))
            <img src="{{ asset('storage/' . ($teacher->teacherProfile->profile_photo ?? 'default-avatar.png')) }}" 
     alt="Profile Photo" 
     style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
        @else
            <div class="rounded-circle me-2 d-flex align-items-center justify-content-center"
                 style="width:40px;height:40px;background:#006d77;color:white;font-weight:600;">
                {{ $initial }}
            </div>
        @endif
    </div>
                        </div>
                           <span class="badge {{ ($teacher->teacherProfile->status ?? '') == 'active' ? 'bg-success' : 'bg-danger' }}">
    {{ ucfirst($teacher->teacherProfile->status ?? 'Inactive') }}
</span>
                            
                        </div>
                        <h3 class="class-code">{{ $teacher->name }}</h3>
                    </div>
                    <div class="class-card-body">
                        <p class="class-description">{{ $teacher->email }}</p>
                        <div class="class-stats">
                            <div class="class-stat-item">
                                <div class="class-stat-label">{{ $teacher->teacherProfile->phone_number ?? 'N/A' }}</div>

                            </div>
                            <div class="class-stat-item">
                                <div class="class-stat-label">{{ $teacher->teacherProfile->specialization ?? 'N/A' }}</div>
                            </div>
                            <div class="class-stat-item">
                                <div class="class-stat-label">{{ $teacher->teacherProfile->designation ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="class-card-footer">
                        
                        <div class="class-actions">
                            
                            <a href="{{ route('admin.teachers.view', $teacher->id) }}" class="class-action-btn view">
    <i class="bi bi-eye"></i>
</a>
                   
                         
                        </div>
                    </div>
                </div>
    @endforeach
            </div>

<div class="classes-list" id="classesList">

@foreach ($teachers as $teacher)
                <!-- BSCS List Item -->
                <div class="class-list-item" >
                    <div class="class-list-icon" >
                                               <div class="d-flex align-items-center">
        @php
            $initial = strtoupper(mb_substr($teacher->name, 0, 1));
        @endphp

        @if($teacher->teacherProfile && filled($teacher->teacherProfile->profile_photo))
            <img src="{{ asset('storage/' . ($teacher->teacherProfile->profile_photo ?? 'default-avatar.png')) }}" 
     alt="Profile Photo" 
     style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
        @else
            <div class="rounded-circle me-2 d-flex align-items-center justify-content-center"
                 style="width:40px;height:40px;background:#006d77;color:white;font-weight:600;">
                {{ $initial }}
            </div>
        @endif
    </div>
                        </div>
                    <div class="class-list-info">
                        <div class="class-list-header">
                            <span class="class-list-code"></span>
                            <span class="badge {{ ($teacher->teacherProfile->status ?? '') == 'active' ? 'bg-success' : 'bg-danger' }}">
    {{ ucfirst($teacher->teacherProfile->status ?? 'Inactive') }}
</span>
                            
                        </div>
                        <div class="class-list-name">{{$teacher->name}}</div>
                    </div>
                    <div class="class-list-stats">
                        <div class="class-list-stat">
                            <span>{{$teacher->email}}</span>
                        </div>
                        
                    </div>
                    <div class="class-list-stats">
                        <div class="class-list-stat">
                            <span>{{$teacher->teacherProfile->phone_number ?? 'N/A'}}</span>
                        </div>
                        
                    </div>
                    
                    <div class="class-list-stats">
                        <div class="class-list-stat">
                            <span>{{ $teacher->teacherProfile->specialization ?? 'N/A' }}</span> 
                        </div>
                        
                        
                    </div>
                    <div class="class-list-actions">
                        
                         <a href="{{ route('admin.teachers.view', $teacher->id) }}" class="class-action-btn view">
    <i class="bi bi-eye"></i>
</a>
                   

                       
                    </div>
                </div>
@endforeach

        </div>
        </div>
    </main>
    <!-- Add Class Modal -->
    
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
</body>

</html>