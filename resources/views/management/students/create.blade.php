<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University - Add Student Form</title>
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
    display: flex;
    flex-direction: column; /* Stack breadcrumb above form */
    align-items: center;    /* This centers everything inside */
    width: 100%;
}

/* Breadcrumb Container */
.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    font-size: 0.85rem;
    
    /* Crucial change: Match the form's width and alignment */
    width: 100%;
    max-width: 900px; /* Must match your .form-container max-width */
    justify-content: flex-start; /* Keeps text to the left of this 900px box */
}
        .breadcrumb-nav a {
            color: #006d77;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            color: #00b4d8;
        }

        .breadcrumb-nav span {
            color: #80cbc4;
        }

        .breadcrumb-nav .current {
            color: #003d44;
            font-weight: 600;
        }

          /* Form Container */
        .form-container {
            width: 100%;
            max-width: 900px;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 61, 68, 0.1);
            overflow: hidden;
        }

        /* Form Header */
        .form-header {
            
            padding: 30px 35px;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .form-header::after {
            content: '';
            position: absolute;
            bottom: -60%;
            left: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .form-header-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .form-header-icon {
             width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
        
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: white;
        }

        .form-header-text h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: teal;
            margin-bottom: 5px;
        }

        .form-header-text p {
            font-size: 0.9rem;
            color: teal;
            margin: 0;
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

        /* Input Wrapper */
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.08), rgba(0, 180, 216, 0.12));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: #006d77;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .input-wrapper:focus-within .input-icon {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            transform: scale(1.05);
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 15px 20px 15px 70px;
            border: 2px solid #e8f4f4;
            border-radius: 14px;
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
            background: white;
            box-shadow: 0 0 20px rgba(131, 197, 190, 0.15);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #a0d4cf;
        }

        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23006d77' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 20px center;
            background-size: 12px;
            padding-right: 45px;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Date Input Styling */
        .form-input[type="date"] {
            cursor: pointer;
        }

        .form-input[type="date"]::-webkit-calendar-picker-indicator {
    /* Change 'transparent' to 'none' or just remove the line */
    background: auto; 
    cursor: pointer;
    position: absolute;
    right: 15px;
    width: 20px;
    height: 20px;
    /* Optional: This tint matches your teal theme (#006d77) */
    filter: invert(27%) sepia(51%) saturate(2878%) hue-rotate(146deg) brightness(95%) contrast(101%);
}

        /* Form Footer */
        .form-footer {
            padding: 25px 35px;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.03), rgba(0, 180, 216, 0.05));
            border-top: 1px solid rgba(0, 109, 119, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .form-footer-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: #80cbc4;
        }

        .form-footer-info i {
            color: #006d77;
        }

        .form-buttons {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-reset {
            padding: 14px 28px;
            border: 2px solid #e8f4f4;
            background: white;
            border-radius: 12px;
            font-size: 0.9rem;
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
            padding: 14px 32px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border: none;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 5px 20px rgba(0, 109, 119, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 109, 119, 0.4);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        /* Success Animation */
        @keyframes successPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(67, 160, 71, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(67, 160, 71, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(67, 160, 71, 0);
            }
        }

        .form-input.success,
        .form-select.success,
        .form-textarea.success {
            border-color: #43a047;
            animation: successPulse 0.5s ease;
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
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: white;
            padding: 18px 25px;
            border-radius: 14px;
            box-shadow: 0 10px 40px rgba(0, 61, 68, 0.2);
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 3000;
            transform: translateX(150%);
            transition: transform 0.4s ease;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .toast-icon.success {
            background: linear-gradient(135deg, rgba(67, 160, 71, 0.1), rgba(102, 187, 106, 0.15));
            color: #43a047;
        }

        .toast-content h4 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #003d44;
            margin-bottom: 2px;
        }

        .toast-content p {
            font-size: 0.8rem;
            color: #80cbc4;
            margin: 0;
        }

        .toast-close {
            background: none;
            border: none;
            color: #80cbc4;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 5px;
            margin-left: 10px;
            transition: color 0.3s ease;
        }

        .toast-close:hover {
            color: #ff6b6b;
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
            .header-profile-info {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .form-header {
                padding: 25px;
            }

            .form-body {
                padding: 25px;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .form-buttons {
                flex-direction: column;
            }

            .btn-reset,
            .btn-submit {
                width: 100%;
                justify-content: center;
            }

            .form-header-content {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .search-container {
                display: none;
            }

            .dashboard-content {
                padding: 15px;
            }

            .form-input,
            .form-select,
            .form-textarea {
                padding: 14px 15px 14px 60px;
                font-size: 0.9rem;
            }

            .input-icon {
                left: 12px;
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }

            .toast {
                left: 15px;
                right: 15px;
                bottom: 15px;
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
                    <a href="{{route('management.dashboard')}}" class="sidebar-menu-link active">
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
                                <a href="{{route('semesters.show')}}" class="sidebar-dropdown-link ">
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
                    <a href="{{route('management.notification.view')}}" class="sidebar-menu-link">
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
                <a href="dashboard.html"><i class="bi bi-house-fill"></i></a>
                <span>/</span>
                <a href="{{route('students.index')}}">Add Student</a>
                <span>/</span>
                <a href="{{ $selectedClass ? route('students.class.view', $selectedClass->id) : '#' }}">
    @if($selectedClass)
        {{ $selectedClass->class_code }} - {{ $activeSemester ? 'Semester ' . $activeSemester->semester_number : 'General' }}
    @else
        New Student Enrollment
    @endif
</a>
                <span>/</span>
                <span class="current">
    @if($selectedClass)
        Registration for {{ $selectedClass->class_code }} - {{ $selectedClass->name }}
    @else
        New Student Enrollment
    @endif
</span>
            </nav>

            <div class="form-container">
                <!-- Form Card -->
                <div class="form-card">
                    <!-- Form Header -->
                    <div class="form-header">
                        <div class="form-header-content">
                            <div class="form-header-icon">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <div class="form-header-text">
                                <h1>Add New Student</h1>
                                <p>Fill in the details below to register a new student</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Body -->
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="file" name="profile_photo" id="photoInput" 
       accept="image/*" onchange="previewPhoto(this)" hidden>
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
                                <label class="form-label">Father Name <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="father_name" id="lastName" class="form-control" placeholder="Enter last name" required>
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
                                    <input type="tel" name="phone" class="form-control" placeholder="Enter phone number" required>
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
                                <label class="form-label">CNIC</label>
                                <div class="form-control-wrapper">
                                    <input type="tel" name="cnic" class="form-control" placeholder="Enter CNIC">
                                    <i class="bi bi-book"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Date of Birth <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="date" name="date_of_birth" class="form-control" required>
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
                            <div class="form-group">
                                <label class="form-label">Religion <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="religion" class="form-control" placeholder="Enter nationality" value="Islam" required>
                                    <i class="bi bi-moon-stars-fill"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Material Status <span class="required">*</span></label>
                                <select class="form-control" required name="material_status">
                                    <option value="">Select Gender</option>
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                                    <option value="divorced">Divorced</option>
                                </select>
                            </div>

                            <div class="form-group">
    <label class="form-label">Program/Class <span class="required">*</span></label>
    <div class="form-control-wrapper">
        @if($selectedClass)
            <input type="text" class="form-control bg-light fw-bold" 
                   value="{{ $selectedClass->name }} ({{ $selectedClass->class_code }})" readonly>
            <input type="hidden" name="academic_class_id" value="{{ $selectedClass->id }}">
        @else
            <select name="academic_class_id" class="form-select" required>
                <option value="">-- Select Program --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }} ({{ $class->class_code }})</option>
                @endforeach
            </select>
        @endif
        <i class="bi bi-mortarboard-fill"></i>
    </div>
</div>

<div class="form-group">
    <label class="form-label">Current Semester <span class="required">*</span></label>
    <div class="form-control-wrapper">
        @if($activeSemester)
            <input type="text" class="form-control bg-light fw-bold" 
                   value="Semester {{ $activeSemester->semester_number }}" readonly>
            <input type="hidden" name="semester_id" value="{{ $activeSemester->id }}">
        @else
            <select name="semester_id" class="form-select" required>
                <option value="">-- Select Semester --</option>
                @foreach($semesters as $semester)
                    <option value="{{ $semester->id }}">Semester {{ $semester->semester_number }}</option>
                @endforeach
            </select>
        @endif
        <i class="bi bi-calendar-event"></i>
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
                            <h2>Student Information</h2>
                            <p>Student information will be set on their classes and session</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <div class="form-grid">
                           <div class="form-group">
    <label class="form-label">Student Registration Number</label>
    <div class="form-control-wrapper">
        @php
            // Initial defaults if no class is selected
            $previewCode = "CODE";
            $previewSession = "YYyy";

            // Only calculate if a class exists
            if(isset($selectedClass) && $selectedClass) {
                $previewCode = $selectedClass->class_code;
                $years = explode('-', $selectedClass->session);
                if(count($years) == 2) {
                    $previewSession = substr($years[0], -2) . substr($years[1], -2);
                }
            }
        @endphp
        
        <input type="text" 
               class="form-control" 
               placeholder="{{ $previewCode }}-{{ $previewSession }}-001" 
               disabled 
               style="background: #e9ecef; cursor: not-allowed;">
        <i class="bi bi-hash"></i>
    </div>
    <small class="text-secondary">
        ID will be generated as: [Class]-[Session]-[Sequence]
    </small>
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
                                <label class="form-label">Admission Date <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="date" name="admission_date" class="form-control"  min="0" required>
                                    <i class="bi bi-clock-history"></i>
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
                             <h2>Financial Records</h2>
                            <p>Enter the fee information</p>
                        </div>
                    </div>
                    <div class="form-card-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Registration Fee <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="number" name="registration_fee" class="form-control" placeholder="0.00" required>
                                    <i class="bi bi-cash"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Semester Fee <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="number" name="semester_fee" class="form-control" placeholder="0.00" required>
                                    <i class="bi bi-cash"></i>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label">Scholarship/Discount</label>
                                <div class="form-control-wrapper">
                                    <input type="number" name="discount" class="form-control" value="0">
                                    <i class="bi bi-percent"></i>
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
                                <label class="form-label">Gardian Name <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="text" name="gardian_name" class="form-control" placeholder="Enter contact person name" required>
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Contact Number <span class="required">*</span></label>
                                <div class="form-control-wrapper">
                                    <input type="tel" class="form-control" name="gardian_phone" placeholder="Enter contact number" required>
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
                               <input type="file" name="documents[]" id="documentInput" 
       multiple onchange="handleDocuments(this)" hidden>
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
                                    <span class="checkbox-label">CNIC</span>
                                </label>
                            </div>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="degree">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Matric Degree </span>
                                </label>
                            </div>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="experience">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Intermediate Degree</span>
                                </label>
                            </div>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" name="docs" value="aadhar">
                                    <div class="checkbox-box">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <span class="checkbox-label">Domicel</span>
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
                            
                        </div>
                    </div>
                </div>
                </div>

                 <!-- Form Footer -->
                    <div class="form-footer">
                        <div class="form-footer-info">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Fields marked with <span style="color: #ff6b6b;">*</span> are required</span>
                        </div>
                        <div class="form-buttons">
                            <button type="button" class="btn-reset" onclick="resetForm()">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Reset Form
                            </button>
<button type="submit" class="btn-submit">
    <i class="bi bi-check-circle me-2"></i> Save Student
</button>
                        </div>
                    </div>
            </form>
                   
                </div>
            </div>
        </div>
    </main>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="toast-icon success">
            <i class="bi bi-check-circle-fill"></i>
        </div>
        <div class="toast-content">
            <h4>Student Added Successfully!</h4>
            <p>The student has been registered in the system.</p>
        </div>
        <button class="toast-close" onclick="hideToast()">
            <i class="bi bi-x"></i>
        </button>
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

      

        // Reset form
        function resetForm() {
            if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
                document.getElementById('addStudentForm').reset();
            }
        }

        // Toast functions
        function showToast() {
            const toast = document.getElementById('toast');
            toast.classList.add('show');
            setTimeout(() => {
                hideToast();
            }, 5000);
        }

        function hideToast() {
            const toast = document.getElementById('toast');
            toast.classList.remove('show');
        }

      
       
    </script>

    <script>
        // Function for Profile Photo Preview
function previewPhoto(input) {
    const preview = document.getElementById('photoPreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            // Create an image element
            preview.innerHTML = `<img src="${e.target.result}" 
                style="width: 100%; height: 100%; object-fit: cover;">`;
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        // Fallback if no file selected
        preview.innerHTML = '<i class="bi bi-person-fill"></i>';
    }
}
    </script>
    <script>
        // Function for Multiple Documents List
function handleDocuments(input) {
    const container = document.getElementById('uploadedFiles');
    container.innerHTML = ''; // Clear previous list

    if (input.files) {
        Array.from(input.files).forEach((file, index) => {
            const fileSize = (file.size / 1024).toFixed(1) + ' KB';
            
            const fileRow = document.createElement('div');
            fileRow.className = 'uploaded-file-item d-flex align-items-center justify-content-between p-2 mb-2 border rounded bg-white';
            fileRow.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>
                    <div>
                        <div class="small fw-bold text-truncate" style="max-width: 200px;">${file.name}</div>
                        <div class="text-muted" style="font-size: 0.75rem;">${fileSize}</div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm text-danger" onclick="this.parentElement.remove()">
                    <i class="bi bi-x-circle"></i>
                </button>
            `;
            container.appendChild(fileRow);
        });
    }
}
    </script>
</body>

</html>