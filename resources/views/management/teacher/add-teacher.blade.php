<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Add Teacher</title>
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

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 61, 68, 0.08);
            overflow: hidden;
            margin-bottom: 25px;
        }

        .form-card-header {
            background: linear-gradient(135deg, #006d77 0%, #00b4d8 100%);
            padding: 20px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .form-card-header-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: white;
        }

        .form-card-header-content h2 {
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            margin-bottom: 3px;
        }

        .form-card-header-content p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        .form-card-body {
            padding: 30px;
        }

        /* Section Title */
        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0f2f1;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #006d77;
            font-size: 1.1rem;
        }

        .section-title .section-badge {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            font-size: 0.65rem;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 500;
            margin-left: auto;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-grid-4 {
            grid-template-columns: repeat(4, 1fr);
        }

        /* Form Group */
        .form-group {
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group.span-2 {
            grid-column: span 2;
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

        .form-control-wrapper {
            position: relative;
        }

        .form-control-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #80cbc4;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .form-control-wrapper .form-control {
            padding-left: 45px;
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

        .form-control:focus + i,
        .form-control-wrapper:focus-within i {
            color: #006d77;
        }

        .form-control::placeholder {
            color: #b0d8d4;
        }

        textarea.form-control {
            min-height: 100px;
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

        /* Photo Upload */
        .photo-upload-container {
            display: flex;
            align-items: center;
            gap: 25px;
            padding: 20px;
            background: #f8feff;
            border-radius: 15px;
            border: 2px dashed #83c5be;
        }

        .photo-preview {
            width: 120px;
            height: 120px;
            border-radius: 15px;
            background: linear-gradient(135deg, #e0f2f1, #f8feff);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            border: 3px solid white;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.1);
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-preview i {
            font-size: 3rem;
            color: #83c5be;
        }

        .photo-upload-content {
            flex: 1;
        }

        .photo-upload-content h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 5px;
        }

        .photo-upload-content p {
            font-size: 0.8rem;
            color: #80cbc4;
            margin-bottom: 12px;
        }

        .photo-upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .photo-upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
        }

        .photo-upload-btn input {
            display: none;
        }

        /* Checkbox & Radio */
        .checkbox-group,
        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .checkbox-item,
        .radio-item {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .checkbox-item input,
        .radio-item input {
            display: none;
        }

        .checkbox-box,
        .radio-box {
            width: 22px;
            height: 22px;
            border: 2px solid #83c5be;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .radio-box {
            border-radius: 50%;
        }

        .checkbox-box i,
        .radio-box i {
            font-size: 0.7rem;
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .checkbox-item input:checked + .checkbox-box,
        .radio-item input:checked + .radio-box {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-color: #006d77;
        }

        .checkbox-item input:checked + .checkbox-box i,
        .radio-item input:checked + .radio-box i {
            opacity: 1;
        }

        .checkbox-label,
        .radio-label {
            font-size: 0.9rem;
            color: #003d44;
        }

        /* Document Upload */
        .document-upload-area {
            border: 2px dashed #83c5be;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            background: #f8feff;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .document-upload-area:hover {
            border-color: #006d77;
            background: #e0f2f1;
        }

        .document-upload-area.dragover {
            border-color: #006d77;
            background: #e0f2f1;
        }

        .document-upload-area i {
            font-size: 2.5rem;
            color: #83c5be;
            margin-bottom: 15px;
        }

        .document-upload-area h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 5px;
        }

        .document-upload-area p {
            font-size: 0.8rem;
            color: #80cbc4;
            margin-bottom: 15px;
        }

        .document-upload-area .browse-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 18px;
            background: white;
            border: 2px solid #006d77;
            border-radius: 8px;
            color: #006d77;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .document-upload-area .browse-btn:hover {
            background: #006d77;
            color: white;
        }

        /* Uploaded Files */
        .uploaded-files {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 15px;
        }

        .uploaded-file {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            background: white;
            border-radius: 10px;
            border: 1px solid #e0f2f1;
            transition: all 0.3s ease;
        }

        .uploaded-file:hover {
            box-shadow: 0 5px 15px rgba(0, 61, 68, 0.1);
        }

        .uploaded-file-icon {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #006d77;
        }

        .uploaded-file-info {
            flex: 1;
        }

        .uploaded-file-name {
            font-size: 0.85rem;
            font-weight: 500;
            color: #003d44;
        }

        .uploaded-file-size {
            font-size: 0.7rem;
            color: #80cbc4;
        }

        .uploaded-file-remove {
            width: 25px;
            height: 25px;
            background: rgba(255, 107, 107, 0.1);
            border: none;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ff6b6b;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .uploaded-file-remove:hover {
            background: #ff6b6b;
            color: white;
        }

        /* Course Selection */
        .course-selection {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .course-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            background: #f8feff;
            border-radius: 12px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .course-item:hover {
            background: #e0f2f1;
        }

        .course-item.selected {
            border-color: #006d77;
            background: white;
        }

        .course-item input {
            display: none;
        }

        .course-checkbox {
            width: 22px;
            height: 22px;
            border: 2px solid #83c5be;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .course-item.selected .course-checkbox {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-color: #006d77;
        }

        .course-checkbox i {
            font-size: 0.7rem;
            color: white;
            opacity: 0;
        }

        .course-item.selected .course-checkbox i {
            opacity: 1;
        }

        .course-info {
            flex: 1;
        }

        .course-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #003d44;
        }

        .course-code {
            font-size: 0.75rem;
            color: #80cbc4;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
            padding-top: 20px;
            border-top: 2px solid #e0f2f1;
            margin-top: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 25px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Poppins', sans-serif;
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

        .btn-primary {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 109, 119, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #43a047, #66bb6a);
            color: white;
            box-shadow: 0 5px 20px rgba(67, 160, 71, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 160, 71, 0.4);
        }

        /* Quick Info Cards */
        .quick-info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .quick-info-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quick-info-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .quick-info-content h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 3px;
        }

        .quick-info-content p {
            font-size: 0.8rem;
            color: #80cbc4;
            margin: 0;
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

        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            border-left: 4px solid #006d77;
            color: #006d77;
        }

        .alert i {
            font-size: 1.2rem;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 2px;
        }

        .alert-text {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .form-grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-info-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .course-selection {
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

            .quick-info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-grid-2,
            .form-grid-4 {
                grid-template-columns: 1fr;
            }

            .form-group.span-2 {
                grid-column: span 1;
            }

            .header-profile-info {
                display: none;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .photo-upload-container {
                flex-direction: column;
                text-align: center;
            }

            .course-selection {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .search-container {
                display: none;
            }

            .form-card-body {
                padding: 20px;
            }

            .form-card-header {
                padding: 15px 20px;
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
                    <a href="{{route('students.index')}}" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <span class="sidebar-menu-text">Add Student</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="{{route('management.teacher.create')}}" class="sidebar-menu-link active">
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
                    <input type="text" placeholder="Search Techer...">
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
                    <div class="header-profile">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=83c5be&color=fff&size=100&length=2" alt="{{ Auth::user()->name }}">

                    <div class="header-profile-info">
                        <span class="header-profile-name">{{ Auth::user()->name }}</span>
    <span class="header-profile-role">{{ ucfirst(Auth::user()->role) }}</span>
    
                    </div>
                </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left">
                    <button class="back-btn" onclick="history.back()">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <div>
                        <h1 class="page-title">Add <span class="highlight">Teacher</span></h1>
                        <p class="page-subtitle">Register new faculty members to the university</p>
                    </div>
                </div>
                <div class="breadcrumb-nav">
                    <a href="{{route('management.dashboard')}}">Dashboard</a>
                    <span>/</span>
                    <a href="{{route('management.teacher.index')}}">Teacher's list</a>
                    <span>/</span>
                    <span class="current">Add Teacher</span>
                </div>
            </div>

          
            

            <!-- Alert -->
            <div class="alert alert-info">
                <i class="bi bi-info-circle-fill"></i>
                <div class="alert-content">
                    <div class="alert-title">Important Information</div>
                    <div class="alert-text">Please fill all required fields marked with (*). The teacher will receive login credentials via email after registration.</div>
                </div>
            </div>

            @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger mb-4">
        {{ session('error') }}
    </div>
@endif
            <!-- Add Teacher Form -->
            <form action="{{ route('management.teacher.store') }}" method="POST" enctype="multipart/form-data" id="addTeacherForm">
    @csrf
                <!-- Personal Information -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-card-header-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="form-card-header-content">
                            <h2>Personal Information</h2>
                            <p>Enter the basic details of the teacher</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <!-- Photo Upload -->
                        <div class="form-group full-width" style="margin-bottom: 25px;">
                            <div class="photo-upload-container">
                                <div class="photo-preview" id="photoPreview">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="photo-upload-content">
                                    <h4>Profile Photo</h4>
                                    <p>Upload a professional photo (JPG, PNG - Max 2MB)</p>
                                    <label class="photo-upload-btn">
                                        <i class="bi bi-upload"></i>
                                        Upload Photo
                                        <input type="file" accept="image/*" name="profile_photo" id="photoInput" onchange="previewPhoto(this)">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">First Name <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Enter first name" required>
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Middle Name</label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="middle_name" id="MiddleName" class="form-control" placeholder="Enter middle name">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Last Name <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Enter last name" required>
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email Address <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Phone Number <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="tel" name="phone_number" class="form-control" placeholder="Enter phone number" required>
                                    <i class="bi bi-phone"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                    <i class="bi bi-lock"></i>
                                </div>
                            </div>

                            <div class="form-group">
    <label class="form-label">Confirm Password <span class="required">*</span></label>
    <div class="form-control-wrapper">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password" required>
        <i class="bi bi-shield-lock"></i>
    </div>
</div>

                            <div class="form-group">
                                <label class="form-label">Alternate Phone</label>
                                <div class="form-control-wrapper">
                                    <input type="tel" name="alternative_phone" class="form-control" placeholder="Enter alternate phone">
                                    <i class="bi bi-telephone"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">CNIC</label>
                                <div class="form-control-wrapper">
                                    <input type="tel" name="cnic" class="form-control" placeholder="Enter CNIC">
                                    <i class="bi bi-book"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Date of Birth <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="date" name="dob" class="form-control" required>
                                    <i class="bi bi-calendar"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Gender <span class="required">*</span></label>
                                <select class="form-control" required name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="form-label">Nationality <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="nationality" class="form-control" placeholder="Enter nationality" value="Pakistan" required>
                                    <i class="bi bi-flag"></i>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label"> Address <span class="required">*</span></label>
                                <textarea class="form-control" name="address" placeholder="Enter complete address with city, state and pincode" required></textarea>
                            </div>

                    </div>
                </div>

                <!-- Professional Information -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-card-header-icon">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>
                        <div class="form-card-header-content">
                            <h2>Professional Information</h2>
                            <p>Enter the professional and employment details</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Employee ID <span class="required">*</span></label>
<div class="form-control-wrapper">
    <input type="text" 
           class="form-control" 
           placeholder="Auto-generated on save" 
           disabled 
           style="background: #e9ecef; cursor: not-allowed;">
    <i class="bi bi-hash"></i>
</div>
<small class="text-muted">ID will be assigned automatically (e.g., TCH-2024-0001)</small>
                            </div>

                            {{-- <div class="form-group">
                                <label class="form-label">Department <span class="required">*</span></label>
                                <select class="form-control" required>
                                    <option value="">Select Department</option>
                                    <option value="anatomy">Anatomy</option>
                                    <option value="physiology">Physiology</option>
                                    <option value="biochemistry">Biochemistry</option>
                                    <option value="pharmacology">Pharmacology</option>
                                    <option value="pathology">Pathology</option>
                                    <option value="microbiology">Microbiology</option>
                                    <option value="forensic-medicine">Forensic Medicine</option>
                                    <option value="community-medicine">Community Medicine</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="surgery">Surgery</option>
                                    <option value="pediatrics">Pediatrics</option>
                                    <option value="obstetrics-gynecology">Obstetrics & Gynecology</option>
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label class="form-label">Designation <span class="required">*</span></label>
                                <select class="form-control" name="designation" required>
                                    <option value="">Select Designation</option>
                                    <option value="professor">Professor</option>
                                    <option value="associate-professor">Associate Professor</option>
                                    <option value="assistant-professor">Assistant Professor</option>
                                    <option value="senior-lecturer">Senior Lecturer</option>
                                    <option value="lecturer">Lecturer</option>
                                    <option value="demonstrator">Demonstrator</option>
                                    <option value="tutor">Tutor</option>
                                    <option value="visiting-faculty">Visiting Faculty</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Employment Type <span class="required">*</span></label>
                                <select class="form-control" name="employee_type" required>
                                    <option value="">Select Type</option>
                                    <option value="permanent">Permanent</option>
                                    <option value="contract">Contract</option>
                                    <option value="visiting">Visiting</option>
                                    <option value="guest">Guest Faculty</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Date of Joining <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="date" name="date_of_joining" class="form-control" required>
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="form-label">Experience (Years) <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="number" name="experience" class="form-control" placeholder="Years of experience" min="0" required>
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Specialization <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="specialization" class="form-control" placeholder="Enter specialization area" required>
                                    <i class="bi bi-star"></i>
                                </div>
                            </div>

            
                        </div>
                    </div>
                </div>

                <!-- Educational Qualifications -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-card-header-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <div class="form-card-header-content">
                            <h2>Educational Qualifications</h2>
                            <p>Enter the educational background and degrees</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <div class="section-title">
                            <i class="bi bi-1-circle-fill"></i>
                            Highest Qualification
                            <span class="section-badge">Required</span>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Degree <span class="required">*</span></label>
                                <select class="form-control" required name="degree">
                                    <option value="">Select Degree</option>
                                    <option value="phd">Ph.D.</option>
                                    <option value="md">M.D.</option>
                                    <option value="ms">M.S.</option>
                                    <option value="mds">M.D.S.</option>
                                    <option value="mbbs">M.B.B.S.</option>
                                    <option value="msc">M.Sc.</option>
                                    <option value="mphil">M.Phil.</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Field of Study <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="field_of_study" class="form-control" placeholder="Enter field of study" required>
                                    <i class="bi bi-journal-text"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">University/Institution <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="university" class="form-control" placeholder="Enter university name" required>
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Year of Passing <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="number" name="graduation_year" class="form-control" placeholder="Enter year" min="1970" max="2024" required>
                                    <i class="bi bi-calendar"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Percentage/CGPA</label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="cgpa" class="form-control" placeholder="Enter percentage or CGPA">
                                    <i class="bi bi-percent"></i>
                                </div>
                            </div>

                        </div>

                        <div class="section-title" style="margin-top: 30px;">
                            <i class="bi bi-2-circle-fill"></i>
                            Additional Qualifications
                            <span class="section-badge" style="background: linear-gradient(135deg, #80cbc4, #00897b);">Optional</span>
                        </div>
                        <div class="form-grid form-grid-2">
                            <div class="form-group">
                                <label class="form-label">Additional Degree 1</label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="additional1" class="form-control" placeholder="Enter degree name">
                                    <i class="bi bi-award"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Institution & Year</label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="institute1" class="form-control" placeholder="Institution name, Year">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Additional Degree 2</label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="additional2" class="form-control" placeholder="Enter degree name">
                                    <i class="bi bi-award"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Institution & Year</label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="institue2" class="form-control" placeholder="Institution name, Year">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                <!-- Bank Details -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-card-header-icon">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div class="form-card-header-content">
                            <h2>Bank & Salary Details</h2>
                            <p>Enter the bank account information for salary processing</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Bank Name <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name" required>
                                    <i class="bi bi-bank"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Account Number <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="account_no" class="form-control" placeholder="Enter account number" required>
                                    <i class="bi bi-credit-card"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Branch Name</label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="branch_name" class="form-control" placeholder="Enter branch name">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Basic Salary (PKR)</label>
                                <div class="form-control-wrapper">
                                    <input type="number" name="salary" class="form-control" placeholder="Enter basic salary">
                                    <i >pkr</i>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-card-header-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="form-card-header-content">
                            <h2>Emergency Contact</h2>
                            <p>Enter emergency contact details</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Contact Person Name <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="emergency_person" class="form-control" placeholder="Enter contact person name" required>
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Relationship <span class="required">*</span></label>
                                <select class="form-control" required name="emergency_relation">
                                    <option value="">Select Relationship</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="parent">Parent</option>
                                    <option value="sibling">Sibling</option>
                                    <option value="child">Child</option>
                                    <option value="friend">Friend</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Contact Number <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="tel" class="form-control" name="emergency_no" placeholder="Enter contact number" required>
                                    <i class="bi bi-telephone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document Upload -->
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-card-header-icon">
                            <i class="bi bi-file-earmark-arrow-up-fill"></i>
                        </div>
                        <div class="form-card-header-content">
                            <h2>Document Upload</h2>
                            <p>Upload required documents and certificates</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <div class="document-upload-area" id="documentUploadArea">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <h4>Drag & Drop Files Here</h4>
                            <p>or click to browse (PDF, JPG, PNG - Max 5MB each)</p>
                            <label class="browse-btn">
                                <i class="bi bi-folder2-open"></i>
                                Browse Files
                                <input type="file" name="file" multiple accept=".pdf,.jpg,.jpeg,.png" id="documentInput" style="display: none;" onchange="handleDocuments(this)">
                            </label>
                        </div>

                        <div class="uploaded-files" id="uploadedFiles">
                            <!-- Uploaded files will appear here -->
                        </div>

                        <div class="section-title" style="margin-top: 25px;">
                            <i class="bi bi-list-check"></i>
                            Required Documents
                        </div>
                        <div class="form-grid form-grid-2">
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="resume">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Resume/CV</span>
                                </label>
                            </div>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="degree">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Degree Certificates</span>
                                </label>
                            </div>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="experience">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Experience Letters</span>
                                </label>
                            </div>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="aadhar">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Aadhar Card</span>
                                </label>
                            </div>
                            
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="photo">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Passport Size Photos</span>
                                </label>
                            </div>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="medical">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Medical Council Registration</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-card">
                    <div class="form-card-body">
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                <i class="bi bi-x-circle"></i>
                                Reset Form
                            </button>
                            <button type="button" class="btn btn-primary" onclick="saveDraft()">
                                <i class="bi bi-save"></i>
                                Save as Draft
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i>
                                Register Teacher
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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

        // Photo preview
        function previewPhoto(input) {
            const preview = document.getElementById('photoPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Profile Photo">`;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Toggle course selection
        function toggleCourse(element) {
            element.classList.toggle('selected');
        }

        // Handle document upload
        function handleDocuments(input) {
            const uploadedFiles = document.getElementById('uploadedFiles');
            
            for (let file of input.files) {
                const fileItem = document.createElement('div');
                fileItem.className = 'uploaded-file';
                
                const extension = file.name.split('.').pop().toLowerCase();
                let icon = 'bi-file-earmark';
                if (extension === 'pdf') icon = 'bi-file-earmark-pdf';
                else if (['jpg', 'jpeg', 'png'].includes(extension)) icon = 'bi-file-earmark-image';
                
                const fileSize = (file.size / 1024).toFixed(1);
                
                fileItem.innerHTML = `
                    <div class="uploaded-file-icon">
                        <i class="bi ${icon}"></i>
                    </div>
                    <div class="uploaded-file-info">
                        <div class="uploaded-file-name">${file.name}</div>
                        <div class="uploaded-file-size">${fileSize} KB</div>
                    </div>
                    <button type="button" class="uploaded-file-remove" onclick="this.parentElement.remove()">
                        <i class="bi bi-x"></i>
                    </button>
                `;
                
                uploadedFiles.appendChild(fileItem);
            }
        }

        // Drag and drop for documents
        const dropArea = document.getElementById('documentUploadArea');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.add('dragover'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.remove('dragover'), false);
        });

        dropArea.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            document.getElementById('documentInput').files = files;
            handleDocuments(document.getElementById('documentInput'));
        });

        

        // Reset form
        function resetForm() {
            if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
                document.getElementById('addTeacherForm').reset();
                document.getElementById('photoPreview').innerHTML = '<i class="bi bi-person-fill"></i>';
                document.getElementById('uploadedFiles').innerHTML = '';
                
                // Remove selected class from courses
                document.querySelectorAll('.course-item').forEach(item => {
                    item.classList.remove('selected');
                });
            }
        }

        // Save draft
        function saveDraft() {
            alert('Draft saved successfully!');
        }

       
    </script>
</body>

</html>