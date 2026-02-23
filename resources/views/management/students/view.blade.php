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

        /* Breadcrumb */
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
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
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 8px 25px rgba(0, 109, 119, 0.3);
        }

        .page-info h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #003d44;
            margin: 0;
        }

        .page-info p {
            font-size: 0.85rem;
            color: #80cbc4;
            margin: 0;
        }

        .semester-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #006d77;
            margin-top: 5px;
        }

        .semester-badge i {
            font-size: 0.7rem;
        }

        /* Add Student Button */
        .add-student-btn {
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

        .add-student-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 109, 119, 0.4);
            color: white;
        }

        .add-student-btn i {
            font-size: 1.2rem;
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 61, 68, 0.06);
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
            font-size: 0.75rem;
            color: #80cbc4;
            margin-top: 3px;
        }

        /* Table Card */
        .table-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 61, 68, 0.08);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 25px;
            border-bottom: 1px solid rgba(0, 109, 119, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #003d44;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-title i {
            color: #006d77;
        }

        .table-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-search {
            display: flex;
            align-items: center;
            background: #f8feff;
            border-radius: 10px;
            padding: 8px 15px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .table-search:focus-within {
            border-color: #83c5be;
        }

        .table-search i {
            color: #80cbc4;
            font-size: 0.9rem;
        }

        .table-search input {
            border: none;
            background: transparent;
            padding: 5px 10px;
            font-size: 0.85rem;
            color: #003d44;
            outline: none;
            width: 200px;
        }

        .table-search input::placeholder {
            color: #80cbc4;
        }

        .filter-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #f8feff;
            border: 2px solid #e0f2f1;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            border-color: #006d77;
            color: #006d77;
        }

        .export-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #43a047, #66bb6a);
            border: none;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 160, 71, 0.3);
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
        }

        .students-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1200px;
        }

        .students-table thead {
            background: linear-gradient(135deg, #f8feff, #e0f7fa);
        }

        .students-table th {
            padding: 15px 20px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            color: #006d77;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
            border-bottom: 2px solid rgba(0, 109, 119, 0.1);
        }

        .students-table th:first-child {
            padding-left: 25px;
        }

        .students-table th:last-child {
            padding-right: 25px;
            text-align: center;
        }

        .students-table tbody tr {
            border-bottom: 1px solid rgba(0, 109, 119, 0.05);
            transition: all 0.3s ease;
        }

        .students-table tbody tr:hover {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.02), rgba(0, 180, 216, 0.03));
        }

        .students-table tbody tr:last-child {
            border-bottom: none;
        }

        .students-table td {
    padding: 15px 25px;
    font-size: 0.85rem;
    color: #003d44;
    vertical-align: middle;
    /* Add this to prevent ANY cell from wrapping text */
    white-space: nowrap; 
}

        .students-table td:first-child {
            padding-left: 25px;
        }

        .students-table td:last-child {
            padding-right: 25px;
        }

        .student-id {
            font-weight: 600;
            color: #006d77;
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.8rem;
        }

        .student-name {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #e0f2f1;
        }

        .student-name-text {
            font-weight: 600;
            color: #003d44;
        }

        .student-cnic,
        .student-phone {
            font-family: 'Courier New', monospace;
            font-size: 0.8rem;
            color: #005459;
        }

        .student-roll {
            font-weight: 700;
            color: #006d77;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.08), rgba(0, 180, 216, 0.08));
            padding: 5px 12px;
            border-radius: 6px;
            display: inline-block;
        }

        .semester-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: linear-gradient(135deg, rgba(251, 140, 0, 0.1), rgba(255, 167, 38, 0.1));
            color: #fb8c00;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .student-address {
            max-width: 180px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #005459;
            font-size: 0.8rem;
        }

        .student-dob {
            color: #005459;
            font-size: 0.8rem;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .action-btn {
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

        .action-btn.view {
            background: rgba(0, 109, 119, 0.1);
            color: #006d77;
        }

        .action-btn.view:hover {
            background: #006d77;
            color: white;
        }

        .action-btn.edit {
            background: rgba(251, 140, 0, 0.1);
            color: #fb8c00;
        }

        .action-btn.edit:hover {
            background: #fb8c00;
            color: white;
        }

        .action-btn.delete {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .action-btn.delete:hover {
            background: #ff6b6b;
            color: white;
        }

        /* Pagination */
        .table-footer {
            padding: 20px 25px;
            border-top: 1px solid rgba(0, 109, 119, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-info {
            font-size: 0.85rem;
            color: #80cbc4;
        }

        .table-info strong {
            color: #006d77;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .page-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 2px solid #e0f2f1;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 600;
            color: #005459;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .page-btn:hover {
            border-color: #006d77;
            color: #006d77;
        }

        .page-btn.active {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-color: transparent;
            color: white;
        }

        .page-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
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
            max-width: 700px;
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

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: span 2;
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

        .form-input.readonly {
            background: #f8feff;
            color: #006d77;
            font-weight: 600;
        }

        .modal-footer {
            padding: 20px 25px 25px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            border-top: 1px solid rgba(0, 109, 119, 0.1);
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

        /* Empty State */
        .empty-state {
            padding: 60px 20px;
            text-align: center;
        }

        .empty-state-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.1));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #006d77;
            margin: 0 auto 20px;
        }

        .empty-state h3 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #003d44;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.9rem;
            color: #80cbc4;
            margin-bottom: 20px;
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
            .stats-row {
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

            .table-actions {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 768px) {
            .stats-row {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-profile-info {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .table-search input {
                width: 150px;
            }
        }

        @media (max-width: 576px) {
            .search-container {
                display: none;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .table-actions {
                width: 100%;
            }

            .table-search {
                flex: 1;
            }

            .table-search input {
                width: 100%;
            }

            .table-footer {
                flex-direction: column;
                text-align: center;
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
                    <a href="{{route("students.index")}}" class="sidebar-menu-link active" >
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
                                    <a href="{{ route('semesters.show') }}" class="sidebar-dropdown-link">
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
                    <input type="text" placeholder="Search students...">
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
                <span class="current">{{ $class->name }} - @if($activeSemester)
        Semester {{ $activeSemester->semester_number }}
    @else
        All Students
    @endif</span>
            </nav>

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left">
                    <div class="page-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="page-info">
<h1>
    {{ $class->class_code }} - 
    @if($activeSemester)
        Semester {{ $activeSemester->semester_number }}
    @else
        All Students
    @endif
</h1>
                        <p>{{ $class->name }} </p>
                        <span class="semester-badge">
                            <i class="bi bi-calendar-check"></i>
                          @if($class->semesters->isNotEmpty())
    {{-- We check if start_date is actually a Carbon object before formatting --}}
    @if($class->semesters->first()->start_date instanceof \Carbon\Carbon)
        {{ $class->semesters->first()->start_date->format('d M, Y') }}
    @else
        {{ $class->semesters->first()->start_date }}
    @endif
    
    /

    @if($class->semesters->last()->end_date instanceof \Carbon\Carbon)
        {{ $class->semesters->last()->end_date->format('d M, Y') }}
    @else
        {{ $class->semesters->last()->end_date }}
    @endif
@else
    <span class="text-muted">Dates not available</span>
@endif
                        </span>
                    </div>
                </div>
                    <a href="{{ route('students.create', ['class_id' => $class->id]) }}" class="add-student-btn">
    <i class="bi bi-person-plus-fill"></i>
    Add Student
</a>
            </div>

            <!-- Stats Row -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(0, 109, 119, 0.1), rgba(0, 180, 216, 0.15)); color: #006d77;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">{{ $students->count() }}</div>
                        <div class="stat-card-label">Total Students</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(67, 160, 71, 0.1), rgba(102, 187, 106, 0.15)); color: #43a047;">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">148</div>
                        <div class="stat-card-label">Active Students</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(251, 140, 0, 0.1), rgba(255, 167, 38, 0.15)); color: #fb8c00;">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">6</div>
                        <div class="stat-card-label">Courses</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-icon"
                        style="background: linear-gradient(135deg, rgba(142, 36, 170, 0.1), rgba(171, 71, 188, 0.15)); color: #8e24aa;">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div class="stat-card-content">
                        <div class="stat-card-value">12</div>
                        <div class="stat-card-label">New This Month</div>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="table-card">
                <div class="table-header">
                    <h2 class="table-title">
                        <i class="bi bi-table"></i>
                        Students List
                    </h2>
                    <div class="table-actions">
                        <div class="table-search">
                            <i class="bi bi-search"></i>
                            <input type="text" placeholder="Search by name, CNIC, roll no..." id="tableSearch">
                        </div>
                        <button class="filter-btn">
                            <i class="bi bi-funnel"></i>
                            Filter
                        </button>
                        <button class="export-btn">
                            <i class="bi bi-download"></i>
                            Export
                        </button>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>CNIC</th>
                                <th>Phone No</th>
                                <th>Roll No</th>
                                <th>Semester</th>
                                <th>Address</th>
                                <th>DOB</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($students as $student)
                        <tbody>
                            <tr>
                                <td>
                                    <div class="student-name">
                                        
                                        <span class="student-name-text"> {{ $student->first_name }} {{ $student->last_name }}</span>
                                    </div>
                                </td>
                                <td>{{$student->father_name}}</td>
                                <td><span class="student-cnic">{{$student->cnic}}</span></td>
                                <td><span class="student-phone">{{$student->phone}}</span></td>
                                <td><span class="student-roll">{{ $student->student_reg_number }}</span></td>
                                <td><span class="semester-tag"><i class="bi bi-mortarboard"></i> Semester {{ $student->semester->semester_number ?? 'N/A' }}</span></td>
                                <td><span class="student-address" title="House #123, Street 5, Islamabad">{{$student->address}}</span></td>
                                <td><span class="student-dob">{{$student->date_of_birth}}</span></td>
                                <td>
                                    <div class="action-buttons">
                                       <a href="{{ route('students.show', $student->id) }}" class="action-btn view" title="View Details">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <button class="action-btn edit" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <button class="action-btn delete" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                           
                        </tbody>
                        @endforeach
                    </table>
                </div>

                <div class="table-footer">
                    <div class="table-info">
                        Showing <strong>1</strong> to <strong>8</strong> of <strong>156</strong> students
                    </div>
                    <div class="pagination">
                        <button class="page-btn disabled">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">4</button>
                        <button class="page-btn">...</button>
                        <button class="page-btn">20</button>
                        <button class="page-btn">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Student Modal -->
  
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
            document.getElementById('addStudentModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('addStudentModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close modal when clicking outside
        document.getElementById('addStudentModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Form submit
        document.getElementById('addStudentForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Student added successfully!');
            closeModal();
            this.reset();
        });

        // Table search functionality
        document.getElementById('tableSearch').addEventListener('input', function (e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.students-table tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Pagination buttons
        document.querySelectorAll('.page-btn:not(.disabled)').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                if (!this.querySelector('i')) {
                    this.classList.add('active');
                }
            });
        });

        // Action buttons
        document.querySelectorAll('.action-btn.view').forEach(btn => {
            btn.addEventListener('click', function () {
                alert('View student details');
            });
        });

        document.querySelectorAll('.action-btn.edit').forEach(btn => {
            btn.addEventListener('click', function () {
                alert('Edit student');
            });
        });

        document.querySelectorAll('.action-btn.delete').forEach(btn => {
            btn.addEventListener('click', function () {
                if (confirm('Are you sure you want to delete this student?')) {
                    this.closest('tr').remove();
                }
            });
        });

        // Logout functionality
        document.querySelector('.logout').addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                alert('Logging out...');
            }
        });
    </script>
</body>

</html>