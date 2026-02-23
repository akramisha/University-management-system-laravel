<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* ================================================================================= */
@media (max-width: 992px) {
    .navbar-container {
        /* This ensures Logo stays left and Hamburger stays right */
        flex-direction: row !important; 
        justify-content: space-between;
    }

    /* Move the Side Panel to the Right */
    .side-panel {
        left: auto;
        right: -300px; /* Start off-screen on the right */
        transition: right 0.4s ease-in-out;
    }

    .side-panel.active {
        right: 0; /* Slide in from right */
        left: auto;
    }
}
        /* ========== NAVBAR STYLES (Medical Theme) ========== */
        .navbar-custom {
            background: linear-gradient(135deg, #006d77 0%, #00414a 100%);
            padding: 15px 30px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* ========== LOGO STYLES ========== */
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .navbar-logo:hover {
            
            color: white;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
           border: 2px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
           
        }

        /* ========== NAV LINKS - DESKTOP ========== */
        .nav-links-desktop {
            display: flex;
            align-items: center;
            gap: 5px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            position: relative;
        }

        .nav-link-custom {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 12px 20px;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-link-custom:hover {
            background: rgba(131, 197, 190, 0.2);
            color: white;
        }

        .nav-link-custom i {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .nav-item:hover .nav-link-custom i {
            transform: rotate(180deg);
        }

        /* ========== DROPDOWN - DESKTOP ========== */
        .dropdown-menu-custom {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: white;
            min-width: 220px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 10px 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            list-style: none;
        }

        .dropdown-menu-custom::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid white;
        }

        .nav-item:hover .dropdown-menu-custom {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .dropdown-item-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dropdown-item-custom:hover {
           background: linear-gradient(135deg, #006d77 0%, #00b4d8 100%);
            color: white;
        }

        .dropdown-item-custom i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* ========== SEARCH ICON ========== */
        .search-icon {
            background: rgba(131, 197, 190, 0.2);
            border: none;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-icon:hover {
            background: rgba(131, 197, 190, 0.3);
            transform: scale(1.1);
        }

        /* ========== MOBILE MENU BUTTON ========== */
        .mobile-menu-btn {
            display: none;
            background: rgba(131, 197, 190, 0.2);
            border: none;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(131, 197, 190, 0.3);
        }

        /* ========== OVERLAY ========== */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 109, 119, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ========== SIDE PANEL ========== */
        .side-panel {
            position: fixed;
            top: 0;
            left: -320px;
            width: 300px;
            height: 100%;
            background: linear-gradient(180deg, #006d77 0%, #005459 100%);
            z-index: 1002;
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            box-shadow: 5px 0 30px rgba(0, 0, 0, 0.3);
        }

        .side-panel.active {
            left: 0;
        }

        .side-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .side-panel-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .side-panel-logo .logo-icon {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }

        .close-btn {
            background: rgba(131, 197, 190, 0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background: rgba(131, 197, 190, 0.3);
            transform: rotate(90deg);
        }

        /* ========== SIDE PANEL NAV LINKS ========== */
        .side-panel-nav {
            padding: 20px 0;
            list-style: none;
            margin: 0;
        }

        .side-nav-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .side-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 25px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .side-nav-link:hover {
            background: rgba(131, 197, 190, 0.15);
            color: white;
            padding-left: 30px;
        }

        .side-nav-link i {
            transition: transform 0.3s ease;
        }

        .side-nav-item.active .side-nav-link i {
            transform: rotate(180deg);
        }

        /* ========== SIDE PANEL DROPDOWN ========== */
        .side-dropdown {
            max-height: 0;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.15);
            transition: max-height 0.4s ease;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .side-nav-item.active .side-dropdown {
            max-height: 500px;
        }

        .side-dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 25px 14px 45px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .side-dropdown-item:hover {
            background: rgba(131, 197, 190, 0.15);
            color: white;
            padding-left: 55px;
        }

        .side-dropdown-item i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        /* ========== SEARCH BOX ========== */
        .search-box {
            position: fixed;
            top: 80px;
            left: 50%;
            transform: translateX(-50%) translateY(-20px);
            width: 90%;
            max-width: 600px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 50px rgba(0, 109, 119, 0.2);
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1003;
        }

        .search-box.active {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .search-input-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #f8feff;
            border-radius: 12px;
            padding: 15px 20px;
        }

        .search-input-wrapper i {
            color: #006d77;
            font-size: 1.3rem;
        }

        .search-input-wrapper input {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 1.1rem;
            outline: none;
            color: #333;
        }

        .search-input-wrapper input::placeholder {
            color: #aaa;
        }

        .search-close {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-close:hover {
            background: linear-gradient(135deg, #005459, #0096c7);
        }

          /* ========== RESPONSIVE STYLES ========== */
        @media (max-width: 991px) {
            .nav-links-desktop {
                display: none;
            }

            .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .navbar-container {
                justify-content: space-between;
            }

            .navbar-logo {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            .navbar-left {
                flex: 1;
            }

            .navbar-right {
                flex: 1;
                display: flex;
                justify-content: flex-end;
            }

            .hero-medical-container {
                grid-template-columns: 1fr;
                gap: 50px;
                padding: 60px 30px;
            }

            .hero-medical-title {
                font-size: 3rem;
            }

            .hero-medical-images {
                height: 500px;
            }

            .main-medical-image {
                width: 70%;
                height: 350px;
            }

            .floating-medical-images {
                width: 40%;
            }

            .medical-info-cards {
                grid-template-columns: 1fr;
            }

            .medical-stats {
                flex-direction: column;
                gap: 30px;
            }
        }

        @media (max-width: 576px) {
            .navbar-custom {
                padding: 12px 15px;
            }

            .navbar-logo span {
                display: none;
            }

            .side-panel {
                width: 280px;
                left: -300px;
            }

            .search-box {
                width: 95%;
                padding: 15px;
            }

            .hero-medical-title {
                font-size: 2.2rem;
            }

            .hero-medical-subtitle {
                font-size: 1.1rem;
            }

            .hero-medical-description {
                font-size: 1rem;
            }

            .hero-medical-buttons {
                flex-direction: column;
            }

            .btn-medical-primary,
            .btn-medical-secondary {
                width: 100%;
                justify-content: center;
            }

            .hero-medical-images {
                height: 400px;
            }

            .main-medical-image {
                width: 100%;
                height: 280px;
                position: relative;
                top: 0;
                transform: none;
            }

            .floating-medical-images {
                display: none;
            }

            .medical-stat-number {
                font-size: 2.2rem;
            }
        }
        /* Add a transition to the base navbar for smoothness */
.navbar-custom {
    /* ... your existing styles ... */
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
#main-navbar.scrolled {
    top: 15px;
    width: 95%; /* Increased from 90% to give the text more room */
    max-width: 1400px; 
    margin: 0 auto;
    left: 0;
    right: 0;
    border-radius: 50px;
    padding: 8px 30px; /* Slimmer vertical padding */
    background-color: #0F514E;
}
@media (min-width: 992px) {
    #main-navbar.scrolled {
        width: 90%;
        top: 20px;
        border-radius: 100px;
    }
}
/* Prevent the logo text from ever wrapping */
.navbar-logo span {
    white-space: nowrap;
    display: inline-block; /* Required for transform/scaling */
    transition: all 0.3s ease;
}

/* Ensure the navbar container doesn't restrict the logo */
.navbar-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: nowrap; /* Prevents children from jumping to new lines */
}

/* Optional: Slightly shrink the text size when scrolled 
   to ensure it fits on smaller laptop screens */
#main-navbar.scrolled .navbar-logo span {
    font-size: 1.2rem; 
}

#main-navbar.scrolled .logo-icon {
    width: 38px;
    height: 38px;
}
    </style>
</head>
<body>
     <!-- ========== NAVBAR ========== -->
    <nav id="main-navbar" class="navbar-custom">
        <div class="navbar-container">
            <!-- Mobile Menu Button (Left on mobile) -->
            <div class="navbar-left">
                <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open Menu">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Logo -->
            <a href="{{route('home')}}" class="navbar-logo">
                <div class="logo-icon">
                      <img src="{{asset('images/favicon.png')}}" alt="" style=" width: 45px;
            width: 46px;
    height: 38px;
          
            display: flex;
            align-items: center;
            justify-content: center;
           ">
                </div>
                <span>MediCare University</span>
            </a>

            <!-- Desktop Navigation Links -->
            <ul class="nav-links-desktop">
                <li class="nav-item">
                    <a href="{{route('home')}}"" class="nav-link-custom">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link-custom">
                        Programs
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu-custom">
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-clipboard2-pulse"></i>
                                Medicine (MBBS)
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-shield-fill-plus"></i>
                                Nursing
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-capsule"></i>
                                Pharmacy
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-activity"></i>
                                Physiotherapy
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link-custom">
                        Admissions
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu-custom">
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-person-plus"></i>
                                Apply Now
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-calendar-check"></i>
                                Important Dates
                            </a>
                        </li>
                        <li>
                            <a href="{{route('fee-structure')}}" class="dropdown-item-custom">
                                <i class="bi bi-currency-dollar"></i>
                                Fee Structure
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-award"></i>
                                Scholarships
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('about')}}"" class="nav-link-custom">About</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link-custom">
                        Resources
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu-custom">
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="bi bi-hospital"></i>
                                Hospital
                            </a>
                        </li>
                        <li>
                            <a href="{{route('medical-library')}}" class="dropdown-item-custom">
                                <i class="bi bi-book"></i>
                                Library
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item-custom">
                                <i class="fa-solid fa-flask"></i>
                                Research Labs
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link-custom">
                        Login
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu-custom">
                        <li>
                            <a href="{{route('login')}}" class="dropdown-item-custom">
                                <i class="bi-shield-lock"></i>
                                Admin
                            </a>
                        </li>
                        <li>
                            <a href="{{route('login')}}" class="dropdown-item-custom">
                                <i class="bi-diagram-3"></i>
                                Management
                            </a>
                        </li>
                        <li>
                            <a href="{{route('login')}}" class="dropdown-item-custom">
                                <i class="bi-mortarboard"></i>
                                Teacher
                            </a>
                        </li>
                        <li>
                            <a href="{{route('login')}}" class="dropdown-item-custom">
                                <i class="bi-person-lines-fill"></i>
                                Students
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link-custom">Contact</a>
                </li>
            </ul>

            
        </div>
    </nav>

    <!-- ========== OVERLAY ========== -->
    <div class="overlay" id="overlay"></div>

    <!-- ========== SIDE PANEL (Mobile) ========== -->
    <div class="side-panel" id="sidePanel">
        <div class="side-panel-header">
            <div class="side-panel-logo">
                <div class="logo-icon">
                    <img src="{{asset('images/favicon.png')}}" alt="" style=" width: 45px;
            height: 45px;
           border: 2px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;">
                </div>
                <span>MediCare</span>
            </div>
            <button class="close-btn" id="closeBtn" aria-label="Close Menu">
                <i class="bi bi-x"></i>
            </button>
        </div>

        <ul class="side-panel-nav">
            <li class="side-nav-item">
                <a href="{{route('home')}}" class="side-nav-link">Home</a>
            </li>
            <li class="side-nav-item has-dropdown">
                <a href="#" class="side-nav-link">
                    Programs
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="side-dropdown">
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-clipboard2-pulse"></i>
                            Medicine (MBBS)
                        </a>
                    </li>
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-shield-fill-plus"></i>
                            Nursing
                        </a>
                    </li>
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-capsule"></i>
                            Pharmacy
                        </a>
                    </li>
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-activity"></i>
                            Physiotherapy
                        </a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item has-dropdown">
                <a href="#" class="side-nav-link">
                    Admissions
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="side-dropdown">
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-person-plus"></i>
                            Apply Now
                        </a>
                    </li>
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-calendar-check"></i>
                            Important Dates
                        </a>
                    </li>
                    <li>
                        <a href="{{route('fee-structure')}}" class="side-dropdown-item">
                            <i class="bi bi-currency-dollar"></i>
                            Fee Structure
                        </a>
                    </li>
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-award"></i>
                            Scholarships
                        </a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="{{route('about')}}" class="side-nav-link">About</a>
            </li>
            <li class="side-nav-item has-dropdown">
                <a href="#" class="side-nav-link">
                    Resources
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="side-dropdown">
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="bi bi-hospital"></i>
                            Hospital
                        </a>
                    </li>
                    <li>
                        <a href="{{route('medical-library')}}" class="side-dropdown-item">
                            <i class="bi bi-book"></i>
                            Library
                        </a>
                    </li>
                    <li>
                        <a href="#" class="side-dropdown-item">
                            <i class="fa-solid fa-flask"></i>
                            Research Labs
                        </a>
                    </li>
                </ul>
            </li>
            @auth

    {{-- Admin Specific Link(s) --}}
    @if(Auth::user()->role === 'admin')
        <li class="nav-item">
            <a class="nav-link" href="">
                Admin Control
            </a>
        </li>
    @endif
    
    {{-- Management Specific Link(s) --}}
    @if(Auth::user()->role === 'management' || Auth::user()->role === 'admin')
        <li class="nav-item">
            <a class="nav-link" href="">
                Staff/Student Management
            </a>
        </li>
    @endif
    
   
@else
    {{-- Links for guests (not logged in) --}}
    <li class="side-nav-item">
                <a class="side-nav-link" href="{{route('login')}}">Login</a>
            </li>

    
@endauth
             {{-- <li class="side-nav-item has-dropdown">
                <a href="{{url('/login')}}" class="side-nav-link">
                    Login
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="side-dropdown">
                    <li>
                        <a href="{{url('/login')}}" class="side-dropdown-item">
                            <i class="bi bi-clipboard2-pulse"></i>
                            Admin
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/login')}}" class="side-dropdown-item">
                            <i class="bi bi-shield-fill-plus"></i>
                            Management
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/login')}}" class="side-dropdown-item">
                            <i class="bi bi-capsule"></i>
                            Teacher
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/login')}}" class="side-dropdown-item">
                            <i class="bi bi-activity"></i>
                            Student
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="side-nav-item">
                <a href="{{route('contact')}}" class="side-nav-link">Contact</a>
            </li>
        </ul>
    </div>

  
<script>
    document.querySelectorAll('.has-dropdown').forEach(item => {
    item.addEventListener('click', function(e) {
        // Prevent following the link if it has a dropdown
        e.preventDefault(); 
        this.classList.toggle('active');
    });
});
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
</body>
</html>