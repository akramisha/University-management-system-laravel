<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* ===================================================================== */

     /* ========== FOOTER SECTION ========== */
        .footer-section {
            background: linear-gradient(180deg, #003d44 0%, #002a2f 50%, #001a1d 100%);
            position: relative;
            overflow: hidden;
        }

        /* Background Decorations */
        .footer-bg-decoration {
            position: absolute;
            border-radius: 50%;
            opacity: 0.03;
            background: linear-gradient(135deg, #83c5be, #00b4d8);
        }

        .footer-decoration-1 {
            width: 600px;
            height: 600px;
            top: -300px;
            left: -200px;
        }

        .footer-decoration-2 {
            width: 400px;
            height: 400px;
            bottom: -200px;
            right: -100px;
        }

        .footer-decoration-3 {
            width: 300px;
            height: 300px;
            top: 50%;
            right: 20%;
            transform: translateY(-50%);
        }

        /* Floating Medical Icons */
        .footer-floating-icon {
            position: absolute;
            color: rgba(131, 197, 190, 0.05);
            font-size: 100px;
            animation: floatFooterIcon 20s infinite ease-in-out;
        }

        .footer-icon-1 {
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .footer-icon-2 {
            top: 30%;
            right: 8%;
            animation-delay: 5s;
        }

        .footer-icon-3 {
            bottom: 25%;
            left: 15%;
            animation-delay: 10s;
        }

        @keyframes floatFooterIcon {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.05;
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
                opacity: 0.08;
            }
        }

        /* Newsletter Section */
        .footer-newsletter {
            background: linear-gradient(135deg, rgba(0, 109, 119, 0.3), rgba(0, 180, 216, 0.2));
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(131, 197, 190, 0.1);
            padding: 60px 0;
            position: relative;
            z-index: 2;
        }

        .newsletter-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            flex-wrap: wrap;
        }

        .newsletter-content {
            flex: 1;
            min-width: 300px;
        }

        .newsletter-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 10px;
        }

        .newsletter-title .highlight {
            background: linear-gradient(135deg, #83c5be, #00b4d8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .newsletter-text {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .newsletter-form {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
        }

        .newsletter-input-group {
            display: flex;
            gap: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 60px;
            padding: 8px;
            border: 1px solid rgba(131, 197, 190, 0.2);
            transition: all 0.3s ease;
        }

        .newsletter-input-group:focus-within {
            border-color: #83c5be;
            box-shadow: 0 0 30px rgba(131, 197, 190, 0.2);
        }

        .newsletter-input {
            flex: 1;
            background: transparent;
            border: none;
            padding: 15px 25px;
            color: white;
            font-size: 1rem;
            outline: none;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .newsletter-btn {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .newsletter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 180, 216, 0.4);
        }

        .newsletter-btn i {
            transition: transform 0.3s ease;
        }

        .newsletter-btn:hover i {
            transform: translateX(5px);
        }

        /* Main Footer Content */
        .footer-main {
            padding: 80px 0 50px;
            position: relative;
            z-index: 2;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr;
            gap: 50px;
        }

        /* Footer Column */
        .footer-column {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        body.page-loaded .footer-column {
            opacity: 1;
            transform: translateY(0);
        }

        body.page-loaded .footer-column:nth-child(1) { transition-delay: 0.1s; }
        body.page-loaded .footer-column:nth-child(2) { transition-delay: 0.2s; }
        body.page-loaded .footer-column:nth-child(3) { transition-delay: 0.3s; }
        body.page-loaded .footer-column:nth-child(4) { transition-delay: 0.4s; }
        body.page-loaded .footer-column:nth-child(5) { transition-delay: 0.5s; }

        /* Footer Logo & About */
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            text-decoration: none;
        }

        .footer-logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #83c5be, #00b4d8);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 10px 30px rgba(131, 197, 190, 0.3);
            transition: all 0.3s ease;
        }

        .footer-logo:hover .footer-logo-icon {
            transform: rotate(10deg) scale(1.05);
        }

        .footer-logo-text {
            display: flex;
            flex-direction: column;
        }

        .footer-logo-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: white;
            line-height: 1;
        }

        .footer-logo-subtitle {
            font-size: 0.75rem;
            color: #83c5be;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .footer-about-text {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        /* Footer Contact Info */
        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .footer-contact-item:hover {
            transform: translateX(5px);
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            background: rgba(131, 197, 190, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #83c5be;
            font-size: 1.1rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .footer-contact-item:hover .contact-icon {
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
        }

        .contact-details {
            display: flex;
            flex-direction: column;
        }

        .contact-label {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 3px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-value {
            color: white;
            font-size: 0.95rem;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-value:hover {
            color: #83c5be;
        }

        /* Footer Column Title */
        .footer-column-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }

        .footer-column-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-radius: 2px;
        }

        /* Footer Links */
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 0;
        }

        .footer-links a::before {
            content: '';
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #83c5be, #00b4d8);
            position: absolute;
            left: 0;
            bottom: -2px;
            transition: width 0.3s ease;
        }

        .footer-links a:hover {
            color: #83c5be;
            padding-left: 10px;
        }

        .footer-links a:hover::before {
            width: 30px;
        }

        .footer-links a i {
            font-size: 0.7rem;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .footer-links a:hover i {
            opacity: 1;
            transform: translateX(0);
        }

        /* Working Hours */
        .working-hours {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .working-hours li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(131, 197, 190, 0.1);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .working-hours li:last-child {
            border-bottom: none;
        }

        .working-hours .day {
            font-weight: 500;
            color: white;
        }

        .working-hours .time {
            color: #83c5be;
            font-weight: 500;
        }

        .working-hours .closed {
            color: #ff6b6b;
        }

        /* Social Links in Footer */
        .footer-social {
            margin-top: 30px;
        }

        .footer-social-title {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-social-links {
            display: flex;
            gap: 12px;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: rgba(131, 197, 190, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #83c5be;
            font-size: 1.2rem;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .social-link i {
            position: relative;
            z-index: 2;
        }

        .social-link:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 180, 216, 0.3);
            color: white;
        }

        .social-link:hover::before {
            opacity: 1;
        }

        /* Footer Divider */
        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(131, 197, 190, 0.3), transparent);
            margin: 50px 0 30px;
        }

        /* Footer Bottom */
        .footer-bottom {
            padding: 30px 0;
            position: relative;
            z-index: 2;
        }

        .footer-bottom-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-copyright {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .footer-copyright a {
            color: #83c5be;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-copyright a:hover {
            color: #00b4d8;
        }

        .footer-bottom-links {
            display: flex;
            gap: 30px;
        }

        .footer-bottom-links a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .footer-bottom-links a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 1px;
            background: #83c5be;
            transition: width 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: #83c5be;
        }

        .footer-bottom-links a:hover::after {
            width: 100%;
        }

        /* Scroll to Top Button */
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.4s ease;
            z-index: 999;
            box-shadow: 0 10px 30px rgba(0, 109, 119, 0.3);
            border: none;
        }

        .scroll-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .scroll-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 109, 119, 0.4);
        }

        .scroll-to-top i {
            transition: transform 0.3s ease;
        }

        .scroll-to-top:hover i {
            transform: translateY(-3px);
        }

        /* Accreditation Badges */
        .footer-accreditation {
            margin-top: 30px;
        }

        .accreditation-title {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .accreditation-badges {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .accreditation-badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(131, 197, 190, 0.2);
            padding: 10px 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .accreditation-badge:hover {
            background: rgba(131, 197, 190, 0.1);
            border-color: rgba(131, 197, 190, 0.4);
            transform: translateY(-3px);
        }

        .accreditation-badge i {
            color: #83c5be;
            font-size: 1.2rem;
        }

        .accreditation-badge span {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* ========== RESPONSIVE STYLES ========== */
        @media (max-width: 1200px) {
            .footer-grid {
                grid-template-columns: 2fr 1fr 1fr 1fr;
            }

            .footer-grid .footer-column:nth-child(5) {
                grid-column: span 2;
            }
        }

        @media (max-width: 991px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }

            .footer-grid .footer-column:first-child {
                grid-column: span 2;
            }

            .footer-grid .footer-column:nth-child(5) {
                grid-column: span 2;
            }

            .newsletter-container {
                flex-direction: column;
                text-align: center;
            }

            .newsletter-content,
            .newsletter-form {
                max-width: 100%;
            }

            .footer-main {
                padding: 60px 0 40px;
            }
        }

        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .footer-grid .footer-column:first-child,
            .footer-grid .footer-column:nth-child(5) {
                grid-column: span 1;
            }

            .footer-column-title {
                margin-bottom: 20px;
            }

            .footer-bottom-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-bottom-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .newsletter-input-group {
                flex-direction: column;
                border-radius: 20px;
                padding: 15px;
            }

            .newsletter-btn {
                width: 100%;
                justify-content: center;
            }

            .footer-social-links {
                justify-content: center;
            }

            .accreditation-badges {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .footer-newsletter {
                padding: 40px 0;
            }

            .newsletter-title {
                font-size: 1.5rem;
            }

            .footer-logo-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .footer-logo-title {
                font-size: 1.3rem;
            }

            .footer-floating-icon {
                font-size: 60px;
            }

            .scroll-to-top {
                width: 45px;
                height: 45px;
                bottom: 20px;
                right: 20px;
                font-size: 1.1rem;
            }

            .working-hours li {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
        }

        /* Animation for page load */
        body.page-loaded .footer-newsletter {
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
        <!-- ========== FOOTER SECTION ========== -->
        <footer class="footer-section">
            <!-- Background Decorations -->
            <div class="footer-bg-decoration footer-decoration-1"></div>
            <div class="footer-bg-decoration footer-decoration-2"></div>
            <div class="footer-bg-decoration footer-decoration-3"></div>
        
            <!-- Floating Medical Icons -->
            <i class="bi bi-heart-pulse footer-floating-icon footer-icon-1"></i>
            <i class="bi bi-hospital footer-floating-icon footer-icon-2"></i>
            <i class="bi bi-capsule footer-floating-icon footer-icon-3"></i>
        
            <!-- Newsletter Section -->
            <div class="footer-newsletter">
                <div class="newsletter-container">
                    <div class="newsletter-content">
                        <h3 class="newsletter-title">
                            Subscribe to Our <span class="highlight">Newsletter</span>
                        </h3>
                        <p class="newsletter-text">
                            Stay updated with the latest news, events, and admission updates from MediCare University.
                        </p>
                    </div>
                    <form class="newsletter-form" id="newsletterForm">
                        <div class="newsletter-input-group">
                            <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                            <button type="submit" class="newsletter-btn">
                                Subscribe
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        
        
            <!-- Main Footer Content -->
            <div class="footer-main">
                <div class="footer-container">
                    <div class="footer-grid">
                        <!-- Column 1: About & Contact -->
                        <div class="footer-column">
                            <a href="#" class="footer-logo">
                                <div class="footer-logo-icon">
                                    <i class="bi bi-heart-pulse-fill"></i>
                                </div>
                                <div class="footer-logo-text">
                                    <span class="footer-logo-title">MediCare</span>
                                    <span class="footer-logo-subtitle">University</span>
                                </div>
                            </a>
                            <p class="footer-about-text">
                                MediCare University is a premier medical institution dedicated to
                                excellence in medical education, research, and patient care. Join us
                                in shaping the future of healthcare.
                            </p>
        
                            <!-- Contact Information -->
                            <div class="footer-contact-item">
                                <div class="contact-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Address</span>
                                    <span class="contact-value">123 Medical Campus, Health City, HC 12345</span>
                                </div>
                            </div>
        
                            <div class="footer-contact-item">
                                <div class="contact-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Phone</span>
                                    <a href="tel:+1234567890" class="contact-value">+1 (234) 567-890</a>
                                </div>
                            </div>
        
                            <div class="footer-contact-item">
                                <div class="contact-icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Email</span>
                                    <a href="mailto:info@medicare.edu" class="contact-value">info@medicare.edu</a>
                                </div>
                            </div>
        
                            <!-- Accreditation Badges -->
                            <div class="footer-accreditation">
                                <div class="accreditation-title">Accredited By</div>
                                <div class="accreditation-badges">
                                    <div class="accreditation-badge">
                                        <i class="bi bi-award-fill"></i>
                                        <span>PMDC</span>
                                    </div>
                                    <div class="accreditation-badge">
                                        <i class="bi bi-globe"></i>
                                        <span>WHO</span>
                                    </div>
                                    <div class="accreditation-badge">
                                        <i class="bi bi-patch-check-fill"></i>
                                        <span>HEC</span>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Column 2: Quick Links -->
                        <div class="footer-column">
                            <h4 class="footer-column-title">Quick Links</h4>
                            <ul class="footer-links">
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Our Programs
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Admissions
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Faculty
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Research
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Campus Life
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
        
                        <!-- Column 3: Programs -->
                        <div class="footer-column">
                            <h4 class="footer-column-title">Our Programs</h4>
                            <ul class="footer-links">
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        MBBS Program
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        BDS Program
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Nursing (BSN)
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Pharmacy (Pharm.D)
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Physiotherapy (DPT)
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        MS Programs
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        PhD Programs
                                    </a>
                                </li>
                            </ul>
                        </div>
        
                        <!-- Column 4: Resources -->
                        <div class="footer-column">
                            <h4 class="footer-column-title">Resources</h4>
                            <ul class="footer-links">
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Student Portal
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Digital Library
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        E-Learning
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Career Services
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        Alumni Network
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        News & Events
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bi bi-chevron-right"></i>
                                        FAQs
                                    </a>
                                </li>
                            </ul>
                        </div>
        
                        <!-- Column 5: Working Hours & Social -->
                        <div class="footer-column">
                            <h4 class="footer-column-title">Working Hours</h4>
                            <ul class="working-hours">
                                <li>
                                    <span class="day">Monday - Friday</span>
                                    <span class="time">8:00 AM - 5:00 PM</span>
                                </li>
                                <li>
                                    <span class="day">Saturday</span>
                                    <span class="time">9:00 AM - 2:00 PM</span>
                                </li>
                                <li>
                                    <span class="day">Sunday</span>
                                    <span class="time closed">Closed</span>
                                </li>
                                <li>
                                    <span class="day">Hospital (Emergency)</span>
                                    <span class="time">24/7</span>
                                </li>
                            </ul>
        
                            <!-- Social Links -->
                            <div class="footer-social">
                                <div class="footer-social-title">Follow Us</div>
                                <div class="footer-social-links">
                                    <a href="#" class="social-link" aria-label="Facebook">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="social-link" aria-label="Twitter">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                    <a href="#" class="social-link" aria-label="Instagram">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    <a href="#" class="social-link" aria-label="LinkedIn">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                    <a href="#" class="social-link" aria-label="YouTube">
                                        <i class="bi bi-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Footer Divider -->
                    <div class="footer-divider"></div>
                </div>
            </div>
        
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="footer-bottom-container">
                    <div class="footer-copyright">
                        © <span id="currentYear"></span> <a href="#">MediCare University</a>. All Rights Reserved.
                        Designed with <i class="bi bi-heart-fill" style="color: #ff6b6b;"></i> for Healthcare Excellence
                    </div>
                    <div class="footer-bottom-links">
                        <a href="{{route('privacy-policy')}}">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Cookie Policy</a>
                        <a href="#">Sitemap</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Scroll to Top Button -->
        <button class="scroll-to-top" id="scrollToTop" aria-label="Scroll to top">
            <i class="bi bi-chevron-up"></i>
        </button>

</body>
<script>
    // ========== FOOTER ANIMATIONS & INTERACTIONS ==========

        document.addEventListener('DOMContentLoaded', function () {

            // ========== PAGE LOAD ANIMATIONS ==========
            // Add page-loaded class after a small delay to trigger animations
            setTimeout(() => {
                document.body.classList.add('page-loaded');
            }, 100);

            // ========== CURRENT YEAR UPDATE ==========
            const currentYearElement = document.getElementById('currentYear');
            if (currentYearElement) {
                currentYearElement.textContent = new Date().getFullYear();
            }

            // ========== SCROLL TO TOP BUTTON ==========
            const scrollToTopBtn = document.getElementById('scrollToTop');

            // Show/hide scroll to top button based on scroll position
            function toggleScrollToTopButton() {
                if (window.pageYOffset > 300) {
                    scrollToTopBtn.classList.add('visible');
                } else {
                    scrollToTopBtn.classList.remove('visible');
                }
            }

            // Smooth scroll to top functionality
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            // Listen for scroll events
            window.addEventListener('scroll', toggleScrollToTopButton);

            // Click event for scroll to top button
            scrollToTopBtn.addEventListener('click', scrollToTop);

            // ========== INTERSECTION OBSERVER FOR FOOTER ANIMATIONS ==========
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            // Observer for footer columns
            const footerObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);

            // Observe all footer columns
            const footerColumns = document.querySelectorAll('.footer-column');
            footerColumns.forEach(column => {
                footerObserver.observe(column);
            });

            // Observer for newsletter section
            const newsletterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-newsletter');
                    }
                });
            }, observerOptions);

            const newsletterSection = document.querySelector('.footer-newsletter');
            if (newsletterSection) {
                newsletterObserver.observe(newsletterSection);
            }

            // ========== NEWSLETTER FORM HANDLING ==========
            const newsletterForm = document.getElementById('newsletterForm');
            const newsletterInput = newsletterForm.querySelector('.newsletter-input');
            const newsletterBtn = newsletterForm.querySelector('.newsletter-btn');

            // Newsletter form submission
            newsletterForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const email = newsletterInput.value.trim();

                if (!email) {
                    showNotification('Please enter your email address.', 'error');
                    return;
                }

                if (!isValidEmail(email)) {
                    showNotification('Please enter a valid email address.', 'error');
                    return;
                }

                // Simulate form submission
                newsletterBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Subscribing...';
                newsletterBtn.disabled = true;

                // Simulate API call
                setTimeout(() => {
                    showNotification('Thank you for subscribing! You will receive our latest updates.', 'success');
                    newsletterInput.value = '';
                    newsletterBtn.innerHTML = 'Subscribe <i class="bi bi-arrow-right"></i>';
                    newsletterBtn.disabled = false;
                }, 2000);
            });

            // Email validation function
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // ========== NOTIFICATION SYSTEM ==========
            function showNotification(message, type = 'info') {
                // Remove existing notifications
                const existingNotification = document.querySelector('.notification');
                if (existingNotification) {
                    existingNotification.remove();
                }

                // Create notification element
                const notification = document.createElement('div');
                notification.className = `notification notification-${type}`;
                notification.innerHTML = `
            <div class="notification-content">
                <i class="bi bi-${getNotificationIcon(type)}"></i>
                <span>${message}</span>
                <button class="notification-close" aria-label="Close notification">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        `;

                // Add to DOM
                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.add('show');
                }, 10);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    removeNotification(notification);
                }, 5000);

                // Close button functionality
                const closeBtn = notification.querySelector('.notification-close');
                closeBtn.addEventListener('click', () => {
                    removeNotification(notification);
                });
            }

            function getNotificationIcon(type) {
                switch (type) {
                    case 'success': return 'check-circle-fill';
                    case 'error': return 'exclamation-triangle-fill';
                    case 'warning': return 'exclamation-circle-fill';
                    default: return 'info-circle-fill';
                }
            }

            function removeNotification(notification) {
                notification.classList.remove('show');
                notification.classList.add('hide');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }

            // ========== SMOOTH SCROLL FOR FOOTER LINKS ==========
            const footerLinks = document.querySelectorAll('.footer-links a[href^="#"]');
            footerLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // ========== SOCIAL LINK ANALYTICS (Optional) ==========
            const socialLinks = document.querySelectorAll('.social-link');
            socialLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    const platform = this.getAttribute('aria-label');
                    console.log(`Social link clicked: ${platform}`);
                    // Add your analytics tracking code here
                });
            });

            // ========== ENHANCED SCROLL EFFECTS ==========
            let lastScrollTop = 0;

            window.addEventListener('scroll', function () {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                // Parallax effect for footer background decorations
                const footerDecorations = document.querySelectorAll('.footer-bg-decoration');
                footerDecorations.forEach((decoration, index) => {
                    const speed = 0.5 + (index * 0.2);
                    const yPos = -(scrollTop * speed);
                    decoration.style.transform = `translateY(${yPos}px)`;
                });

                // Floating icons parallax
                const floatingIcons = document.querySelectorAll('.footer-floating-icon');
                floatingIcons.forEach((icon, index) => {
                    const speed = 0.3 + (index * 0.1);
                    const yPos = -(scrollTop * speed);
                    icon.style.transform = `translateY(${yPos}px)`;
                });

                lastScrollTop = scrollTop;
            }, { passive: true });

            // ========== ACCESSIBILITY ENHANCEMENTS ==========

            // Keyboard navigation for social links
            socialLinks.forEach(link => {
                link.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }
                });
            });

            // Focus management for newsletter form
            newsletterInput.addEventListener('focus', function () {
                this.parentElement.classList.add('focused');
            });

            newsletterInput.addEventListener('blur', function () {
                this.parentElement.classList.remove('focused');
            });

            // ========== RESPONSIVE ADJUSTMENTS ==========
            function handleResize() {
                const isMobile = window.innerWidth <= 768;

                // Adjust newsletter form layout on mobile
                const newsletterInputGroup = document.querySelector('.newsletter-input-group');
                if (isMobile) {
                    newsletterInputGroup.classList.add('mobile-layout');
                } else {
                    newsletterInputGroup.classList.remove('mobile-layout');
                }
            }

            // Initial call and event listener
            handleResize();
            window.addEventListener('resize', handleResize);

            // ========== FOOTER LINK HOVER EFFECTS ==========
            const allFooterLinks = document.querySelectorAll('.footer-links a');
            allFooterLinks.forEach(link => {
                link.addEventListener('mouseenter', function () {
                    this.style.setProperty('--hover-delay', Math.random() * 0.2 + 's');
                });
            });

            // ========== PERFORMANCE OPTIMIZATIONS ==========

            // Throttle scroll events
            function throttle(func, limit) {
                let inThrottle;
                return function () {
                    const args = arguments;
                    const context = this;
                    if (!inThrottle) {
                        func.apply(context, args);
                        inThrottle = true;
                        setTimeout(() => inThrottle = false, limit);
                    }
                };
            }

            // Apply throttling to scroll events
            window.addEventListener('scroll', throttle(function () {
                // Additional scroll-based animations can be added here
            }, 16)); // ~60fps

        });

        // ========== GLOBAL UTILITY FUNCTIONS ==========

        // Smooth scroll utility
        function smoothScrollTo(element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // Check if element is in viewport
        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // ========== CSS ANIMATIONS EXTENSIONS ==========
        // Add these additional CSS animations to complement the JavaScript

        const additionalStyles = `
    /* Notification Styles */
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        max-width: 400px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transform: translateX(100%);
        transition: all 0.3s ease;
        z-index: 10000;
        border-left: 4px solid #83c5be;
    }

    .notification.show {
        transform: translateX(0);
    }

    .notification.hide {
        transform: translateX(100%);
        opacity: 0;
    }

    .notification-content {
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        color: #333;
    }

    .notification-success {
        border-left-color: #28a745;
    }

    .notification-error {
        border-left-color: #dc3545;
    }

    .notification-warning {
        border-left-color: #ffc107;
    }

    .notification-close {
        background: none;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        color: #666;
        margin-left: auto;
        padding: 5px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .notification-close:hover {
        background: rgba(0, 0, 0, 0.1);
        color: #333;
    }

    /* Enhanced Newsletter Form Styles */
    .newsletter-input-group.focused {
        border-color: #83c5be;
        box-shadow: 0 0 30px rgba(131, 197, 190, 0.3);
    }

    .newsletter-input-group.mobile-layout {
        flex-direction: column;
        gap: 15px;
        padding: 20px;
    }

    .newsletter-input-group.mobile-layout .newsletter-btn {
        width: 100%;
        justify-content: center;
    }

    /* Animate-in class for footer columns */
    .footer-column.animate-in {
        opacity: 1;
        transform: translateY(0);
    }

    .footer-newsletter.animate-newsletter {
        animation: slideInFromBottom 0.8s ease forwards;
    }

    @keyframes slideInFromBottom {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Enhanced scroll to top animations */
    .scroll-to-top.visible {
        animation: bounceIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0) translateY(20px);
            opacity: 0;
        }
        60% {
            transform: scale(1.1) translateY(-5px);
            opacity: 0.8;
        }
        100% {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }

    /* Mobile responsive adjustments */
    @media (max-width: 576px) {
        .notification {
            top: 10px;
            right: 10px;
            left: 10px;
            max-width: none;
        }
        
        .notification-content {
            padding: 15px;
            font-size: 0.9rem;
        }
    }
`;

        // Inject additional styles
        const styleSheet = document.createElement('style');
        styleSheet.textContent = additionalStyles;
        document.head.appendChild(styleSheet);
</script>
</html>