<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Create Class</title>
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

        /* Breadcrumb */
        .breadcrumb-container {
            display: flex;
            align-items: center;
            gap: 8px;
            flex: 1;
        }

        .breadcrumb-item {
            font-size: 0.85rem;
            color: #80cbc4;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-item:hover {
            color: #006d77;
        }

        .breadcrumb-item.active {
            color: #003d44;
            font-weight: 600;
        }

        .breadcrumb-separator {
            color: #80cbc4;
            font-size: 0.8rem;
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

        /* Back Button */
        .back-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 2px solid #e0f2f1;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .back-btn:hover {
            border-color: #006d77;
            color: #006d77;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.05), rgba(0, 180, 216, 0.05));
        }

        /* Form Layout */
        .form-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            align-items: start;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 61, 68, 0.1);
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            padding: 30px;
            text-align: center;
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
            pointer-events: none;
        }

        .form-card-header-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin: 0 auto 15px;
            backdrop-filter: blur(10px);
        }

        .form-card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }

        .form-card-subtitle {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .form-card-body {
            padding: 35px;
        }

        /* Form Styles */
        .form-section {
            margin-bottom: 30px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .form-section-title {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0f2f1;
        }

        .form-section-title i {
            color: #006d77;
            font-size: 1.1rem;
        }

        .form-section-title .step-number {
            width: 26px;
            height: 26px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 10px;
        }

        .form-label .required {
            color: #ff6b6b;
            margin-left: 3px;
        }

        .form-label-hint {
            font-size: 0.75rem;
            color: #80cbc4;
            font-weight: 400;
            margin-left: 5px;
        }

        .form-input,
        .form-select,
        .form-textarea {
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
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #83c5be;
            box-shadow: 0 0 20px rgba(131, 197, 190, 0.2);
            background: white;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
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

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-hint {
            font-size: 0.75rem;
            color: #80cbc4;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-hint i {
            font-size: 0.85rem;
        }

        /* Icon Selection */
        .icon-selection {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 10px;
        }

        .icon-option {
            position: relative;
        }

        .icon-radio {
            display: none;
        }

        .icon-label {
            width: 100%;
            aspect-ratio: 1;
            border: 2px solid #e0f2f1;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #80cbc4;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8feff;
        }

        .icon-label:hover {
            border-color: #83c5be;
            color: #006d77;
            transform: translateY(-2px);
        }

        .icon-radio:checked+.icon-label {
            border-color: #006d77;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            color: #006d77;
            box-shadow: 0 5px 15px rgba(0, 109, 119, 0.15);
        }

        /* Color Selection */
        .color-selection {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
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
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .color-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            border-radius: inherit;
        }

        .color-label:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .color-radio:checked+.color-label {
            border-color: #003d44;
            transform: scale(1.1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .color-label i {
            color: white;
            font-size: 1.2rem;
            opacity: 0;
            transition: opacity 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .color-radio:checked+.color-label i {
            opacity: 1;
        }

        .color-name {
            text-align: center;
            font-size: 0.7rem;
            color: #80cbc4;
            margin-top: 6px;
            font-weight: 500;
        }

        /* Status Toggle */
        .status-toggle-wrapper {
            display: flex;
            gap: 15px;
        }

        .status-option {
            flex: 1;
        }

        .status-radio {
            display: none;
        }

        .status-label {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border: 2px solid #e0f2f1;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8feff;
        }

        .status-label:hover {
            border-color: #83c5be;
        }

        .status-radio:checked+.status-label {
            border-color: #006d77;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.05), rgba(0, 180, 216, 0.05));
        }

        .status-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .status-icon.active {
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
        }

        .status-icon.inactive {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .status-text {
            flex: 1;
        }

        .status-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
        }

        .status-desc {
            font-size: 0.75rem;
            color: #80cbc4;
        }

        .status-check {
            width: 24px;
            height: 24px;
            border: 2px solid #e0f2f1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .status-radio:checked+.status-label .status-check {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-color: transparent;
        }

        .status-check i {
            color: white;
            font-size: 0.75rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .status-radio:checked+.status-label .status-check i {
            opacity: 1;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
            padding-top: 25px;
            border-top: 2px solid #e0f2f1;
            margin-top: 30px;
        }

        .btn-reset {
            padding: 14px 28px;
            border: 2px solid #e0f2f1;
            background: white;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-reset:hover {
            border-color: #ff6b6b;
            color: #ff6b6b;
            background: rgba(255, 107, 107, 0.05);
        }

        .btn-submit {
            padding: 14px 35px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 109, 119, 0.4);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        /* Preview Section */
        .preview-section {
            position: sticky;
            top: 100px;
        }

        .preview-card-wrapper {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0, 61, 68, 0.1);
        }

        .preview-title {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .preview-title i {
            color: #006d77;
        }

        /* Preview Class Card */
        .preview-class-card {
            background: #f8feff;
            border-radius: 16px;
            overflow: hidden;
            border: 2px solid #e0f2f1;
            transition: all 0.3s ease;
        }

        .preview-class-header {
            padding: 25px 25px 20px;
            position: relative;
            transition: all 0.3s ease;
        }

        .preview-class-header.teal {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.08), rgba(0, 180, 216, 0.05));
        }

        .preview-class-header.red {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.08), rgba(255, 142, 142, 0.05));
        }

        .preview-class-header.green {
            background: linear-gradient(135deg, rgba(67, 160, 71, 0.08), rgba(102, 187, 106, 0.05));
        }

        .preview-class-header.purple {
            background: linear-gradient(135deg, rgba(142, 36, 170, 0.08), rgba(171, 71, 188, 0.05));
        }

        .preview-class-header.orange {
            background: linear-gradient(135deg, rgba(251, 140, 0, 0.08), rgba(255, 167, 38, 0.05));
        }

        .preview-class-header.pink {
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.08), rgba(240, 98, 146, 0.05));
        }

        .preview-header-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .preview-icon-wrapper {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: white;
            transition: all 0.3s ease;
        }

        .preview-icon-wrapper.teal {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            box-shadow: 0 8px 25px rgba(0, 109, 119, 0.3);
        }

        .preview-icon-wrapper.red {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        .preview-icon-wrapper.green {
            background: linear-gradient(135deg, #43a047, #66bb6a);
            box-shadow: 0 8px 25px rgba(67, 160, 71, 0.3);
        }

        .preview-icon-wrapper.purple {
            background: linear-gradient(135deg, #8e24aa, #ab47bc);
            box-shadow: 0 8px 25px rgba(142, 36, 170, 0.3);
        }

        .preview-icon-wrapper.orange {
            background: linear-gradient(135deg, #fb8c00, #ffa726);
            box-shadow: 0 8px 25px rgba(251, 140, 0, 0.3);
        }

        .preview-icon-wrapper.pink {
            background: linear-gradient(135deg, #e91e63, #f06292);
            box-shadow: 0 8px 25px rgba(233, 30, 99, 0.3);
        }

        .preview-status {
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

        .preview-status.active {
            background: rgba(67, 160, 71, 0.1);
            color: #43a047;
        }

        .preview-status.inactive {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .preview-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .preview-class-code {
            font-size: 1.3rem;
            font-weight: 800;
            color: #003d44;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .preview-class-name {
            font-size: 0.85rem;
            color: #005459;
            line-height: 1.4;
        }

        .preview-class-body {
            padding: 0 25px 20px;
        }

        .preview-description {
            font-size: 0.8rem;
            color: #80cbc4;
            line-height: 1.5;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .preview-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .preview-stat-item {
            text-align: center;
            padding: 12px 8px;
            background: white;
            border-radius: 10px;
        }

        .preview-stat-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: #003d44;
            line-height: 1;
        }

        .preview-stat-label {
            font-size: 0.65rem;
            color: #80cbc4;
            margin-top: 4px;
            text-transform: uppercase;
        }

        .preview-class-footer {
            padding: 15px 25px;
            background: white;
            border-top: 1px solid rgba(0, 109, 119, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .preview-duration {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: #005459;
        }

        .preview-duration i {
            color: #006d77;
        }

        /* Tips Card */
        .tips-card {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.05), rgba(0, 180, 216, 0.05));
            border-radius: 16px;
            padding: 20px;
            margin-top: 20px;
            border: 1px dashed rgba(0, 109, 119, 0.2);
        }

        .tips-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tips-title i {
            color: #006d77;
        }

        .tips-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tips-list li {
            font-size: 0.8rem;
            color: #005459;
            padding: 6px 0;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .tips-list li i {
            color: #43a047;
            font-size: 0.7rem;
            margin-top: 4px;
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
        .success-message {
            position: fixed;
            top: 25px;
            right: 25px;
            background: white;
            padding: 20px 25px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 15px 50px rgba(0, 61, 68, 0.2);
            z-index: 3000;
            transform: translateX(120%);
            transition: transform 0.4s ease;
            border-left: 4px solid #43a047;
        }

        .success-message.show {
            transform: translateX(0);
        }

        .success-icon {
            width: 45px;
            height: 45px;
            background: rgba(67, 160, 71, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #43a047;
            font-size: 1.3rem;
        }

        .success-content {
            flex: 1;
        }

        .success-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #003d44;
        }

        .success-text {
            font-size: 0.8rem;
            color: #80cbc4;
        }

        .success-close {
            background: none;
            border: none;
            color: #80cbc4;
            cursor: pointer;
            font-size: 1.3rem;
            transition: color 0.3s ease;
        }

        .success-close:hover {
            color: #ff6b6b;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .form-layout {
                grid-template-columns: 1fr;
            }

            .preview-section {
                position: static;
            }

            .icon-selection {
                grid-template-columns: repeat(6, 1fr);
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
            .form-row {
                grid-template-columns: 1fr;
            }

            .status-toggle-wrapper {
                flex-direction: column;
            }

            .form-card-body {
                padding: 25px;
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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .icon-selection {
                grid-template-columns: repeat(4, 1fr);
            }

            .color-selection {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 576px) {
            .dashboard-content {
                padding: 15px;
            }

            .form-card-header {
                padding: 20px;
            }

            .form-card-header-icon {
                width: 55px;
                height: 55px;
                font-size: 1.5rem;
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
                    <a href="{{route('management.open-page')}}" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Add Student</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="{{route('management.add-teacher')}}" class="sidebar-menu-link ">
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
                                 <a href="{{route('classes.index')}}" class="sidebar-dropdown-link ">
                                    <div class="sidebar-menu-icon">
                                        <i class="bi bi-calendar-plus"></i>
                    
                                    </div>
                                    Classes 
                                </a>
                            </li>
                            <li class="sidebar-dropdown-item">
                                <a href="{{route('classes.create')}}" class="sidebar-dropdown-link active">
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

            <div class="breadcrumb-container">
                <a href="{{route('management.dashboard')}}" class="breadcrumb-item">
                    <i class="bi bi-house-door"></i>
                </a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <a href="{{route('classes.index')}}" class="breadcrumb-item">Class Management</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <span class="breadcrumb-item active">Create Class</span>
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
                    <h1 class="page-title">Create New <span class="highlight">Class</span></h1>
                    <p class="page-subtitle">Add a new academic program to the university</p>
                </div>
                <a href="{{route('classes.index')}}" class="back-btn">
                    <i class="bi bi-arrow-left"></i>
                    Back to Classes
                </a>
            </div>

            <!-- Form Layout -->
            <div class="form-layout">
                <!-- Form Card -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-card-header-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h2 class="form-card-title">Class Information</h2>
                        <p class="form-card-subtitle">Fill in the details to create a new academic class</p>
                    </div>

                    <div class="form-card-body">
                        <form action="{{ route('admin.classes.store') }}" method="POST" id="createClassForm">
                            @csrf

                            <!-- Section 1: Basic Information -->
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <span class="step-number">1</span>
                                    Basic Information
                                </h3>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Class Code <span class="required">*</span>
                                        </label>
                                        <input type="text" name="class_code" class="form-input" id="classCode"
                                            placeholder="e.g., BSCS, BBA, MBBS" required maxlength="10">
                                        <div class="form-hint">
                                            <i class="bi bi-info-circle"></i>
                                            Short code for the program (max 10 characters)
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            Full Class Name <span class="required">*</span>
                                        </label>
                                        <input type="text" name="name" class="form-input" id="className" 
       placeholder="e.g., Bachelor of Science in Computer Science" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        Description <span class="form-label-hint">(Optional)</span>
                                    </label>
                                    <textarea name="description" class="form-textarea" id="classDescription"
                                        placeholder="Enter a brief description of the program, its objectives, and career opportunities..."></textarea>
                                </div>
                            </div>

                            <!-- Section 2: Program Details -->
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <span class="step-number">2</span>
                                    Program Details
                                </h3>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Duration (Years) <span class="required">*</span>
                                        </label>
                                        <select name="duration" class="form-select" id="classDuration" required>
                                            <option value="">Select Duration</option>
                                            <option value="2">2 Years</option>
                                            <option value="3">3 Years</option>
                                            <option value="4">4 Years</option>
                                            <option value="5">5 Years</option>
                                            <option value="6">6 Years</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            Total Semesters <span class="required">*</span>
                                        </label>
                                        <input type="number" name="total_semester" class="form-input"
                                            id="totalSemesters" placeholder="e.g., 8" min="1" max="16" required>
                                        <div class="form-hint">
                                            <i class="bi bi-info-circle"></i>
                                            Usually 2 semesters per year
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Status -->
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <span class="step-number">3</span>
                                    Status
                                </h3>

                                <div class="form-group">
                                    <label class="form-label">
                                        Class Status <span class="required">*</span>
                                    </label>
                                    <div class="status-toggle-wrapper">
                                        <div class="status-option">
                                            <input type="radio" name="status" value="1" id="statusActive"
                                                class="status-radio" checked>
                                            <label for="statusActive" class="status-label">
                                                <div class="status-icon active">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                                <div class="status-text">
                                                    <div class="status-title">Active</div>
                                                    <div class="status-desc">Class is open for enrollment</div>
                                                </div>
                                                <div class="status-check">
                                                    <i class="bi bi-check"></i>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="status-option">
                                            <input type="radio" name="status" value="0" id="statusInactive"
                                                class="status-radio">
                                            <label for="statusInactive" class="status-label">
                                                <div class="status-icon inactive">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </div>
                                                <div class="status-text">
                                                    <div class="status-title">Inactive</div>
                                                    <div class="status-desc">Class is temporarily closed</div>
                                                </div>
                                                <div class="status-check">
                                                    <i class="bi bi-check"></i>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 4: Icon Selection -->
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <span class="step-number">4</span>
                                    Class Icon
                                </h3>

                                <div class="form-group">
                                    <label class="form-label">
                                        Select Icon <span class="required">*</span>
                                    </label>
                                    <div class="icon-selection">
                                        <div class="icon-option">
        <input type="radio" name="icon" value="bi-heart-pulse-fill" id="iconHeart" class="icon-radio" checked>
        <label for="iconHeart" class="icon-label">
            <i class="bi bi-heart-pulse-fill"></i>
        </label>
    </div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-capsule" id="iconCapsule" class="icon-radio">
        <label for="iconCapsule" class="icon-label">
            <i class="bi bi-capsule"></i>
        </label>
    </div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-bandaid-fill" id="iconBandaid" class="icon-radio">
        <label for="iconBandaid" class="icon-label">
            <i class="bi bi-bandaid-fill"></i>
        </label>
    </div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-hospital-fill" id="iconHospital" class="icon-radio">
        <label for="iconHospital" class="icon-label">
            <i class="bi bi-hospital-fill"></i>
        </label>
    </div>

    <div class="icon-option">
    <input type="radio" name="icon" value="bi-thermometer-half" id="iconLab" class="icon-radio">
    <label for="iconLab" class="icon-label">
        <i class="bi bi-thermometer-half"></i>
    </label>
</div>

<div class="icon-option">
    <input type="radio" name="icon" value="bi-bag-plus-fill" id="iconKit" class="icon-radio">
    <label for="iconKit" class="icon-label">
        <i class="bi bi-bag-plus-fill"></i>
    </label>
</div>

<div class="icon-option">
    <input type="radio" name="icon" value="bi-person-plus-fill" id="iconDoctor" class="icon-radio">
    <label for="iconDoctor" class="icon-label">
        <i class="bi bi-person-plus-fill"></i>
    </label>
</div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-clipboard2-pulse-fill" id="iconClipboard" class="icon-radio">
        <label for="iconClipboard" class="icon-label">
            <i class="bi bi-clipboard2-pulse-fill"></i>
        </label>
    </div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-droplet-fill" id="iconDroplet" class="icon-radio">
        <label for="iconDroplet" class="icon-label">
            <i class="bi bi-droplet-fill"></i>
        </label>
    </div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-truck-front-fill" id="iconAmbulance" class="icon-radio">
        <label for="Ambulance" class="icon-label">
            <i class="bi bi-truck-front-fill"></i>
        </label>
    </div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-shield-plus" id="iconShield" class="icon-radio">
        <label for="iconShield" class="icon-label">
            <i class="bi bi-shield-plus"></i>
        </label>
    </div>

    <div class="icon-option">
        <input type="radio" name="icon" value="bi-activity" id="iconActivity" class="icon-radio">
        <label for="iconActivity" class="icon-label">
            <i class="bi bi-activity"></i>
        </label>
    </div>
</div>
                                </div>
                            </div>

                            <!-- Section 5: Theme Color -->
                            <div class="form-section">
                                <h3 class="form-section-title">
                                    <span class="step-number">5</span>
                                    Theme Color
                                </h3>

                                <div class="form-group">
                                    <label class="form-label">
                                        Select Color <span class="required">*</span>
                                    </label>
                                    <div class="color-selection">
                                        <div class="color-option">
                                            <input type="radio" name="color" value="teal" id="colorTeal"
                                                class="color-radio" checked>
                                            <label for="colorTeal" class="color-label"
                                                style="background: linear-gradient(135deg, #006d77, #00b4d8);">
                                                <i class="bi bi-check-lg"></i>
                                            </label>
                                            <div class="color-name">Teal</div>
                                        </div>
                                        <div class="color-option">
                                            <input type="radio" name="color" value="red" id="colorRed"
                                                class="color-radio">
                                            <label for="colorRed" class="color-label"
                                                style="background: linear-gradient(135deg, #ff6b6b, #ff8e8e);">
                                                <i class="bi bi-check-lg"></i>
                                            </label>
                                            <div class="color-name">Red</div>
                                        </div>
                                        <div class="color-option">
                                            <input type="radio" name="color" value="green" id="colorGreen"
                                                class="color-radio">
                                            <label for="colorGreen" class="color-label"
                                                style="background: linear-gradient(135deg, #43a047, #66bb6a);">
                                                <i class="bi bi-check-lg"></i>
                                            </label>
                                            <div class="color-name">Green</div>
                                        </div>
                                        <div class="color-option">
                                            <input type="radio" name="color" value="purple" id="colorPurple"
                                                class="color-radio">
                                            <label for="colorPurple" class="color-label"
                                                style="background: linear-gradient(135deg, #8e24aa, #ab47bc);">
                                                <i class="bi bi-check-lg"></i>
                                            </label>
                                            <div class="color-name">Purple</div>
                                        </div>
                                        <div class="color-option">
                                            <input type="radio" name="color" value="orange" id="colorOrange"
                                                class="color-radio">
                                            <label for="colorOrange" class="color-label"
                                                style="background: linear-gradient(135deg, #fb8c00, #ffa726);">
                                                <i class="bi bi-check-lg"></i>
                                            </label>
                                            <div class="color-name">Orange</div>
                                        </div>
                                        <div class="color-option">
                                            <input type="radio" name="color" value="pink" id="colorPink"
                                                class="color-radio">
                                            <label for="colorPink" class="color-label"
                                                style="background: linear-gradient(135deg, #e91e63, #f06292);">
                                                <i class="bi bi-check-lg"></i>
                                            </label>
                                            <div class="color-name">Pink</div>
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
                                    <i class="bi bi-plus-lg"></i>
                                    Create Class
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="preview-section">
                    <div class="preview-card-wrapper">
                        <h4 class="preview-title">
                            <i class="bi bi-eye"></i>
                            Live Preview
                        </h4>

                        <!-- Preview Class Card -->
                        <div class="preview-class-card" id="previewCard">
                            <div class="preview-class-header teal" id="previewHeader">
                                <div class="preview-header-top">
                                    <div class="preview-icon-wrapper teal" id="previewIconWrapper">
    <i class="bi bi-heart-pulse-fill" id="previewIcon"></i>
</div>
<span class="preview-status active" id="previewStatus">
    <span class="preview-status-dot"></span>
    <span id="previewStatusText">Active</span>
</span>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const preview = document.getElementById('previewStatus');
    const text = document.getElementById('previewStatusText');
    const radios = document.querySelectorAll('input[name="status"]');

    function updatePreview(value) {
        if (value === "1") {
            text.textContent = "Active";
            preview.classList.remove('inactive');
            preview.classList.add('active');
        } else {
            text.textContent = "Inactive";
            preview.classList.remove('active');
            preview.classList.add('inactive');
        }
    }

    // 🔹 Update on change
    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            updatePreview(this.value);
        });
    });

    // 🔹 Update on page load (important for edit forms)
    const checkedRadio = document.querySelector('input[name="status"]:checked');
    if (checkedRadio) {
        updatePreview(checkedRadio.value);
    }

});
</script>


                                </div>
                                <h3 class="preview-class-code" id="previewCode">CLASS</h3>
                                <p class="preview-class-name" id="previewName">Full Class Name</p>
                            </div>
                            <div class="preview-class-body">
                                <p class="preview-description" id="previewDescription">
                                    Class description will appear here...
                                </p>
                                <div class="preview-stats">
                                    <div class="preview-stat-item">
                                        <div class="preview-stat-value" id="previewSemesters">-</div>
                                        <div class="preview-stat-label">Semesters</div>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-class-footer">
                                <div class="preview-duration">
                                    <i class="bi bi-clock"></i>
                                    <span id="previewDuration">- Years Program</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tips Card -->
                    <div class="tips-card">
                        <h4 class="tips-title">
                            <i class="bi bi-lightbulb"></i>
                            Quick Tips
                        </h4>
                        <ul class="tips-list">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Use standard abbreviations for class codes (BSCS, BBA, etc.)
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Choose an icon that represents the field of study
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Select unique colors for easy identification
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                Provide a clear description for students
                            </li>
                        </ul>
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

        // Live Preview Updates
        const classCode = document.getElementById('classCode');
        const className = document.getElementById('className');
        const classDescription = document.getElementById('classDescription');
        const classDuration = document.getElementById('classDuration');
        const totalSemesters = document.getElementById('totalSemesters');

        // Update preview on input changes
        classCode.addEventListener('input', function () {
            document.getElementById('previewCode').textContent = this.value.toUpperCase() || 'CLASS';
        });

        className.addEventListener('input', function () {
            document.getElementById('previewName').textContent = this.value || 'Full Class Name';
        });

        classDescription.addEventListener('input', function () {
            document.getElementById('previewDescription').textContent = this.value || 'Class description will appear here...';
        });

        classDuration.addEventListener('change', function () {
            document.getElementById('previewDuration').textContent = this.value ? this.value + ' Years Program' : '- Years Program';
        });

        totalSemesters.addEventListener('input', function () {
            document.getElementById('previewSemesters').textContent = this.value || '-';
        });

        // Icon selection
        const iconRadios = document.querySelectorAll('.icon-radio');
        iconRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                document.getElementById('previewIcon').className = 'bi ' + this.value;
            });
        });

        // Color selection
        const colorRadios = document.querySelectorAll('.color-radio');
        colorRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                const previewHeader = document.getElementById('previewHeader');
                const previewIconWrapper = document.getElementById('previewIconWrapper');

                // Remove all color classes
                previewHeader.className = 'preview-class-header ' + this.value;
                previewIconWrapper.className = 'preview-icon-wrapper ' + this.value;
            });
        });

        // Status selection
        const statusRadios = document.querySelectorAll('.status-radio');
        statusRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                const previewStatus = document.getElementById('previewStatus');
                const previewStatusText = document.getElementById('previewStatusText');

                previewStatus.className = 'preview-status ' + this.value;
                previewStatusText.textContent = this.value.charAt(0).toUpperCase() + this.value.slice(1);
            });
        });

       
    // 1. Logic for the RESET button
    function resetForm() {
        // First, ask for confirmation
        if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
            const form = document.getElementById('createClassForm');
            form.reset();
            
            // If you have a preview update function, call it to reset the preview card too
            if (typeof updatePreview === "function") {
                updatePreview(); 
            }
            alert('Form has been cleared.');
        }
    }

    // 2. Logic for the SAVE (Submit) button
    document.getElementById('createClassForm').addEventListener('submit', function (e) {
        // DO NOT use e.preventDefault() here anymore. 
        // We want the form to submit to the AcademicController.
        
        const btn = document.querySelector('.btn-submit');
        
        // Visual feedback: Disable button and show "Saving..."
        btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Saving...';
        btn.style.opacity = '0.7';
        btn.style.pointerEvents = 'none';
        
        // The form will now naturally submit to your classesStore method.
    });

    </script>
</body>

</html>