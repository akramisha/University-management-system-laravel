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

        .sidebar-dropdown-link i {
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
        }

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

        /* Breadcrumb */
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .breadcrumb-nav a {
            color: #006d77;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            color: #00b4d8;
        }

        .breadcrumb-nav span {
            color: #80cbc4;
            font-size: 0.85rem;
        }

        .breadcrumb-nav i {
            color: #80cbc4;
            font-size: 0.7rem;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 61, 68, 0.1);
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-card-header {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .form-card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: rotate(30deg);
        }

        .form-card-header-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .form-card-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            backdrop-filter: blur(10px);
        }

        .form-card-title {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .form-card-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .form-card-body {
            padding: 40px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 10px;
        }

        .form-label i {
            color: #006d77;
            font-size: 1rem;
        }

        .form-label .required {
            color: #ff6b6b;
            font-size: 0.8rem;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e0f2f1;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #003d44;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            background: #f8feff;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #83c5be;
            background: white;
            box-shadow: 0 0 20px rgba(131, 197, 190, 0.15);
        }

        .form-input::placeholder {
            color: #80cbc4;
        }

        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23006d77' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 45px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Color Selection */
        .color-options {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 12px;
        }

        .color-option {
            position: relative;
        }

        .color-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .color-option-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            background: #f8feff;
            border: 2px solid #e0f2f1;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .color-option input[type="radio"]:checked+.color-option-label {
            border-color: var(--option-color);
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .color-option-label:hover {
            border-color: #83c5be;
            transform: translateY(-2px);
        }

        .color-dot {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .color-option-text {
            font-size: 0.85rem;
            font-weight: 500;
            color: #003d44;
        }

        .color-option input[type="radio"]:checked+.color-option-label .color-option-text {
            font-weight: 600;
        }

        /* Status Toggle */
        .status-toggle-container {
            display: flex;
            gap: 15px;
        }

        .status-option {
            flex: 1;
        }

        .status-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .status-option-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            background: #f8feff;
            border: 2px solid #e0f2f1;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
            color: #005459;
        }

        .status-option input[type="radio"]:checked+.status-option-label.active-status {
            border-color: #43a047;
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
        }

        .status-option input[type="radio"]:checked+.status-option-label.inactive-status {
            border-color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .status-option input[type="radio"]:checked+.status-option-label.upcoming-status {
            border-color: #fb8c00;
            background: rgba(251, 140, 0, 0.1);
            color: #fb8c00;
        }

        .status-option-label:hover {
            border-color: #83c5be;
            transform: translateY(-2px);
        }

        .status-option-label i {
            font-size: 1.1rem;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 2px solid #e0f2f1;
        }
         .semester-card-footer {
            padding: 15px 20px;
            background: #f8feff;
            border-top: 1px solid rgba(0, 109, 119, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-reset {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background: #f8feff;
            border: 2px solid #e0f2f1;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-reset:hover {
            border-color: #ff6b6b;
            color: #ff6b6b;
            background: rgba(255, 107, 107, 0.05);
        }

        .btn-submit {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 35px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 109, 119, 0.4);
        }

        .btn-submit i {
            font-size: 1.1rem;
        }

        /* Preview Card */
        .preview-section {
            margin-top: 30px;
        }

        .preview-title-text {
    color: #1f2937 !important; 
    font-weight: 700;
}

/* This allows the PROGRAM NAME (BSCS, etc) inside the badge to change color */
#previewProgram {
    color: inherit; /* Inherits the color set on previewBadge by JS */
}

        .preview-title {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .preview-title i {
            color: #006d77;
        }

        .preview-card {
            background: white;
            border-radius: 16px;
            padding: 0;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            overflow: hidden;
            border: 2px dashed #e0f2f1;
        }

       

        .preview-header-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        .preview-card-header {
    padding: 16px 20px;
    border-top: 6px solid #006d77;
    position: relative;
}




       

        .preview-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .preview-status.active {
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
        }

        .preview-status.inactive {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .preview-status.upcoming {
            background: rgba(251, 140, 0, 0.1);
            color: #fb8c00;
        }

        .preview-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .preview-title-text {
            font-size: 1.15rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 5px;
        }

        .preview-subtitle {
            font-size: 0.8rem;
            color: #80cbc4;
        }

        .preview-card-body {
            padding: 0 20px 20px;
        }

        .preview-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .preview-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            background: #f8feff;
            border-radius: 10px;
        }

        .preview-info-icon {
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

        .preview-info-content {
            flex: 1;
        }

        .preview-info-value {
            font-size: 0.95rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
        }

        .preview-info-label {
            font-size: 0.7rem;
            color: #80cbc4;
            margin-top: 2px;
        }

        /* Lock text colors so JS cannot override them */
.preview-title-text,
.preview-info-value,
.preview-info-label,
.preview-info-icon i,
#previewProgram {
    color: #003d44 !important;
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

        /* Success Message */
        .alert-success {
            background: linear-gradient(135deg, rgba(67, 160, 71, 0.1), rgba(102, 187, 106, 0.1));
            border: 2px solid rgba(67, 160, 71, 0.3);
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            animation: slideIn 0.3s ease;
        }

        .alert-success i {
            font-size: 1.3rem;
            color: #43a047;
        }

        .alert-success-text {
            flex: 1;
            font-size: 0.9rem;
            color: #2e7d32;
            font-weight: 500;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
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
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-card-body {
                padding: 25px;
            }

            .form-card-header {
                padding: 25px;
            }

            .form-card-header-content {
                flex-direction: column;
                text-align: center;
            }

            .color-options {
                grid-template-columns: repeat(2, 1fr);
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-reset,
            .btn-submit {
                width: 100%;
                justify-content: center;
            }

            .header-profile-info {
                display: none;
            }

            .status-toggle-container {
                flex-direction: column;
            }

            .preview-info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .search-container {
                display: none;
            }

            .dashboard-content {
                padding: 15px;
            }

            .color-options {
                grid-template-columns: 1fr;
            }
        }
        .preview-card-header {
    padding: 24px;
    background: white;
    border-bottom: 1px solid #f0fafa;
    /* This top border is what the JS will change */
    border-top: 4px solid #006d77; 
    border-radius: 12px 12px 0 0;
    transition: border-color 0.4s ease; /* Makes color change smooth */
}

.preview-title-text {
    color: #1f2937 !important; /* Keep title text dark/neutral */
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0;
}

.preview-program-badge {
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 0.7rem;
    font-weight: 600;
    /* Background and color handled by JS */
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
                    <a href="{{route('students.index')}}" class="sidebar-menu-link">
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
                                <a href="{{route('semesters.show')}}" class="sidebar-dropdown-link active">
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
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <span class="sidebar-menu-text">Profile</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-footer-link logout">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-box-arrow-right"></i>
                        </div>
                        <span class="sidebar-menu-text">Logout</span>
                    </a>
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
                    <input type="text" placeholder="Search...">
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
                <a href="{{route('management.dashboard')}}"><i class="bi bi-house-fill"></i> Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{route('semesters.show')}}">Semester Management</a>
                <i class="bi bi-chevron-right"></i>
                <span>Create Semester</span>
            </nav>

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left">
                    <h1 class="page-title">Create New <span class="highlight">Semester</span></h1>
                    <p class="page-subtitle">Fill in the details below to create a new semester</p>
                </div>
            </div>

            <!-- Form Card -->
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-header-content">
                        <div class="form-card-icon">
                            <i class="bi bi-calendar-plus-fill"></i>
                        </div>
                        <div>
                            <h2 class="form-card-title">Semester Details</h2>
                            <p class="form-card-subtitle">Enter all the required information for the new semester</p>
                        </div>
                    </div>
                </div>

                <div class="form-card-body">
                    <form action="{{ route('semesters.update', $semester->id) }}" method="POST" id="createSemesterForm">
                        @csrf
                        @method('PUT')

                       <div class="form-group">
                        <label class="form-label">
                        <i class="bi bi-mortarboard"></i> Select Program/Class 
                        <span class="required">*</span>
                        </label>
                        <select name="academic_class_id" id="classSelect" class="form-select">
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ $semester->academic_class_id == $class->id ? 'selected' : '' }}>
                                {{ $class->class_code }}
                            </option>
                        @endforeach
                        </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-hash"></i> Semester Number 
                                    <span class="required">*</span>
                                </label>
                                <input type="number" name="semester_number" id="semesterNumber"  value="{{ $semester->semester_number }}"
                                class="form-input" placeholder="e.g. 1" min="1" max="12" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                Type <span class="required">*</span>
                                </label>
    <select name="type" class="form-select" >
        <option value="">Select Type</option>
        <option value="semester" {{ $semester->type == 'semester' ? 'selected' : '' }}>Semester</option>
                        <option value="session" {{ $semester->type == 'session' ? 'selected' : '' }}>Session</option>
    </select>
      </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><i class="bi bi-calendar-event"></i> Start Date <span class="required">*</span></label>
        <input type="date" name="start_date" class="form-input" value="{{ $semester->start_date }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><i class="bi bi-calendar-check"></i> End Date <span class="required">*</span></label>
        <input type="date" name="end_date" class="form-input" value="{{ $semester->end_date }}">
    </div>
</div>

{{-- REMOVED: Color Selection Group --}}

                        <!-- Status Selection -->
                        <div class="form-group">
    <label class="form-label">
        <i class="bi bi-toggle-on"></i>
        Status <span class="required">*</span>
    </label>
    <div class="status-toggle-container">
        <div class="status-option">
            <input type="radio" class="btn-check" name="status" id="active{{ $semester->id }}" value="1" {{ $semester->status == 1 ? 'checked' : '' }}>
            <label class="btn btn-outline-success" for="active{{ $semester->id }}">
                <i class="bi bi-play-circle me-1"></i> Active
            </label>
        </div>

        <div class="status-option">
            <input type="radio" class="btn-check" name="status" id="upcoming{{ $semester->id }}" value="2" {{ $semester->status == 2 ? 'checked' : '' }}>
            <label class="btn btn-outline-warning" for="upcoming{{ $semester->id }}">
                <i class="bi bi-clock-fill me-1"></i> Upcoming
            </label>
        </div>

        <div class="status-option">
            <input type="radio" class="btn-check" name="status" id="inactive{{ $semester->id }}" value="0" {{ $semester->status == 0 ? 'checked' : '' }}>
            <label class="btn btn-outline-secondary" for="inactive{{ $semester->id }}">
                <i class="bi bi-check-all me-1"></i> Completed
            </label>
        </div>
    </div>
</div>

                        <!-- Color Selection -->
                        
                        <!-- Preview Section -->
                        <div class="preview-section">
                            <h4 class="preview-title">
                                <i class="bi bi-eye-fill"></i>
                                Live Preview
                            </h4>
                            <div class="preview-card" id="previewCard">
                               <div class="preview-card-header" id="previewHeader">
                                    <div class="preview-header-top">
                                        <span class="preview-program-badge" id="previewBadge">
                                            <i class="bi bi-mortarboard"></i>
                                            <span id="previewProgram">Select Class</span>
                                        </span>
                                        <span class="preview-status active" id="previewStatus">
                                            <span class="preview-status-dot"></span>
                                            <span id="previewStatusText">Active</span>
                                        </span>
                                    </div>
                                    <h3 class="preview-title-text" id="previewTitle">Semester Name</h3>
                                </div>
                                <div class="preview-card-body">
                                    <div class="preview-info-grid">
                                        <div class="preview-info-item">
                                            <div class="preview-info-icon">
                                                <i class="bi bi-hash"></i>
                                            </div>
                                            <div class="preview-info-content">
                                                <div class="preview-info-value" id="previewNumber">-</div>
                                                <div class="preview-info-label">Semester No.</div>
                                            </div>
                                        </div>
                                        <div class="preview-info-item">
                                            <div class="preview-info-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            <div class="preview-info-content">
                                                <div class="preview-info-value" id="previewStatusLabel">Active</div>
                                                <div class="preview-info-label">Status</div>
                                            </div>
                                        </div>
                                        <div class="semester-card-footer">
                                            <div class="semester-dates" id="previewDates">
                                                <i class="bi bi-calendar-range"></i> 
                                                <span>Start Date - End Date</span> 
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-reset" onclick="resetForm()">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Reset Form
                            </button>
                            <button type="submit" class="btn-submit">
                                <i class="bi bi-plus-circle-fill"></i>
                                Update Semester
                            </button>
                        </div>
                    </form>
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

       
       
        
        
    </script>
 <script>
    // --- LIVE PREVIEW LOGIC ---
    function updatePreview() {
        // 1. Inputs
        const classSelect = document.getElementById('classSelect');
        const semesterNumber = document.getElementById('semesterNumber');
        const typeSelect = document.querySelector('select[name="type"]');
        const statusInput = document.querySelector('input[name="status"]:checked');
        const startDateInput = document.querySelector('input[name="start_date"]');
        const endDateInput = document.querySelector('input[name="end_date"]');

        // 2. Preview Elements
        const previewHeader = document.getElementById('previewHeader');
        const previewBadge = document.getElementById('previewBadge');
        const previewProgram = document.getElementById('previewProgram');
        const previewNumber = document.getElementById('previewNumber');
        const previewTitle = document.getElementById('previewTitle');
        const previewStatusText = document.getElementById('previewStatusText'); // Header status
        const previewStatusLabel = document.getElementById('previewStatusLabel'); // Body grid status
        const statusDot = document.querySelector('.preview-status-dot');
        const previewDates = document.getElementById('previewDates');

        // 3. Date Formatting
        const formatDate = (dateString) => {
            if (!dateString) return null;
            const date = new Date(dateString);
            return date.toLocaleString('default', { month: 'short', year: 'numeric' });
        };

        const startFormatted = formatDate(startDateInput.value) || "Start Date";
        const endFormatted = formatDate(endDateInput.value) || "End Date";

        if (previewDates) {
            previewDates.innerHTML = `<i class="bi bi-calendar-range"></i> ${startFormatted} - ${endFormatted}`;
        }

        // 4. Class & Branding Logic
        const selectedOption = classSelect.options[classSelect.selectedIndex];
        const classColor = selectedOption.getAttribute('data-color') || '#006d77';
        const className = (selectedOption.value === "") ? "Select Class" : selectedOption.text;
        const semNum = semesterNumber.value || '-';
        const typeLabel = typeSelect ? typeSelect.value : 'Semester';

        previewProgram.textContent = className;
        previewNumber.textContent = semNum;
        previewTitle.textContent = semNum !== '-' ? `${typeLabel.charAt(0).toUpperCase() + typeLabel.slice(1)} ${semNum}` : "Semester Name";

        previewHeader.style.borderTopColor = classColor;
        previewBadge.style.backgroundColor = `${classColor}1a`; 
        previewBadge.style.color = classColor;
        
        // 5. Status Mapping (Logic Fix)
       // Inside your updatePreview function
const statusValue = statusInput ? statusInput.value : '1';
let statusText = "Active";
let statusColor = "#10b981"; // Green for Active

if (statusValue == "0") {
    statusText = "Completed";
    statusColor = "#64748b"; // Gray for Completed
} else if (statusValue == "2") {
    statusText = "Upcoming";
    statusColor = "#f59e0b"; // Orange for Upcoming
}

// Update the preview labels and dots
if(previewStatusLabel) previewStatusLabel.textContent = statusText;
if(previewStatusText) {
    previewStatusText.textContent = statusText;
    previewStatusText.style.color = statusColor;
}
if(statusDot) statusDot.style.backgroundColor = statusColor;


        // Apply theme color to icons
        document.querySelectorAll('.preview-info-icon i').forEach(icon => {
            icon.style.color = classColor;
        });
    }

   
    // --- LISTENERS (Keep these OUTSIDE the updatePreview function) ---
    document.getElementById('classSelect').addEventListener('change', updatePreview);
    document.getElementById('semesterNumber').addEventListener('input', updatePreview);
    document.querySelector('select[name="type"]').addEventListener('change', updatePreview);
    
    // Add these for the dates
    document.querySelector('input[name="start_date"]').addEventListener('input', updatePreview);
    document.querySelector('input[name="end_date"]').addEventListener('input', updatePreview);

    // Status listeners
    document.querySelectorAll('input[name="status"]').forEach(r => {
        r.addEventListener('change', updatePreview);
    });

    // Run once on load
    document.addEventListener('DOMContentLoaded', updatePreview);
</script>
</body>

</html>