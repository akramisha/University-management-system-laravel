@extends('base')
@section('title', 'About Us | MediCare University')
@push('page-styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/about.css') }}">

@endpush

@section('content')
<br>
    <!-- ========== HERO SECTION ========== -->
    <section class="ab-hero-section">
        <!-- Background Pattern -->
        <div class="ab-hero-pattern"></div>

        <!-- Floating Shapes -->
        <div class="ab-hero-shapes">
            <div class="ab-shape ab-shape-1"></div>
            <div class="ab-shape ab-shape-2"></div>
            <div class="ab-shape ab-shape-3"></div>
        </div>

        <div class="ab-hero-container">
            <!-- Hero Content -->
            <div class="ab-hero-content">
                <div class="ab-hero-label">
                    <i class="bi bi-hospital"></i>
                    <span>Welcome to MediCare University</span>
                </div>
                <h1 class="ab-hero-title">
                    Shaping the Future of
                    <span>Healthcare Excellence</span>
                </h1>
                <p class="ab-hero-description">
                    For over 75 years, MediCare University has been at the forefront of medical education,
                    producing world-class healthcare professionals who are transforming lives globally.
                </p>
                <div class="ab-hero-buttons">
                    <a href="#" class="ab-btn ab-btn-primary">
                        <i class="bi bi-play-circle"></i>
                        Watch Our Story
                    </a>
                    <a href="#" class="ab-btn ab-btn-outline">
                        <i class="bi bi-arrow-down-circle"></i>
                        Explore More
                    </a>
                </div>
            </div>

            <!-- Hero Visual -->
            <div class="ab-hero-visual">
                <div class="ab-hero-image-wrapper">
                    <div class="ab-hero-image-frame"></div>
                    <div class="ab-hero-image">
                        <i class="bi bi-heart-pulse-fill ab-hero-icon-main"></i>
                    </div>

                    <!-- Floating Badges -->
                    <div class="ab-floating-badge ab-badge-1">
                        <div class="ab-badge-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <div class="ab-badge-content">
                            <h5>#1 Ranked</h5>
                            <p>Medical University</p>
                        </div>
                    </div>

                    <div class="ab-floating-badge ab-badge-2">
                        <div class="ab-badge-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <div class="ab-badge-content">
                            <h5>50,000+</h5>
                            <p>Alumni Worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== BREADCRUMB ========== -->
    <nav class="ab-breadcrumb-bar">
        <div class="ab-breadcrumb-container">
            <a href="{{route('home')}}" class="ab-crumb-link">
                <i class="bi bi-house-door-fill"></i>
                Home
            </a>
            <i class="bi bi-chevron-right ab-crumb-divider"></i>
            <span class="ab-crumb-current">About Us</span>
        </div>
    </nav>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="ab-main-wrapper">

        <!-- ========== MISSION VISION VALUES ========== -->
        <section class="ab-mvv-section">
            <div class="ab-section-heading" data-animate>
                <span class="ab-section-label">
                    <i class="bi bi-stars"></i>
                    Our Core Principles
                </span>
                <br>
                <h2 class="ab-section-title">Mission, Vision & Values</h2>
                <p class="ab-section-subtitle">
                    Guided by our commitment to excellence, we strive to create healthcare leaders
                    who will shape the future of medicine.
                </p>
            </div>

            <div class="ab-mvv-grid">
                <!-- Mission Card -->
                <div class="ab-mvv-card" data-delay="0">
                    <div class="ab-mvv-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3 class="ab-mvv-title">Our Mission</h3>
                    <p class="ab-mvv-text">
                        To educate and train the next generation of healthcare professionals through
                        innovative teaching, groundbreaking research, and compassionate patient care,
                        while fostering a culture of lifelong learning and ethical practice.
                    </p>
                </div>

                <!-- Vision Card -->
                <div class="ab-mvv-card" data-delay="150">
                    <div class="ab-mvv-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3 class="ab-mvv-title">Our Vision</h3>
                    <p class="ab-mvv-text">
                        To be the world's leading medical university, recognized for transforming
                        healthcare education, advancing medical science, and improving health outcomes
                        for communities worldwide through excellence and innovation.
                    </p>
                </div>

                <!-- Values Card -->
                <div class="ab-mvv-card" data-delay="300">
                    <div class="ab-mvv-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h3 class="ab-mvv-title">Our Values</h3>
                    <p class="ab-mvv-text">
                        Excellence, Integrity, Compassion, Innovation, and Collaboration form the
                        cornerstone of everything we do. We believe in nurturing not just skilled
                        professionals, but caring human beings dedicated to service.
                    </p>
                </div>
            </div>
        </section>

        <!-- ========== OUR STORY ========== -->
        <section class="ab-story-section">
            <div class="ab-story-wrapper">
                <!-- Story Image -->
                <div class="ab-story-image" data-animate>
                    <div class="ab-story-img-main">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="ab-story-overlay-card ab-card-1">
                        <div class="ab-year">1948</div>
                        <span>Year Established</span>
                    </div>
                </div>

                <!-- Story Content -->
                <div class="ab-story-content" data-animate>
                    <span class="ab-story-badge">
                        <i class="bi bi-book"></i>
                        Our Story
                    </span>
                    <h2 class="ab-story-title">A Legacy of Medical Excellence Since 1948</h2>
                    <p class="ab-story-text">
                        Founded in 1948 by Dr. Alexander MediCare, our university began as a small
                        medical school with a vision to provide accessible, quality medical education.
                        What started with just 50 students and 10 faculty members has grown into one
                        of the most prestigious medical institutions in the world.
                    </p>
                    <p class="ab-story-text">
                        Over the decades, we have expanded our programs, built state-of-the-art facilities,
                        and established partnerships with leading healthcare institutions globally. Our
                        commitment to excellence has remained unchanged, driving us to continuously
                        innovate and improve.
                    </p>

                    <div class="ab-story-highlights">
                        <div class="ab-highlight-item">
                            <div class="ab-highlight-icon">
                                <i class="bi bi-award"></i>
                            </div>
                            <span class="ab-highlight-text">75+ Years of Excellence</span>
                        </div>
                        <div class="ab-highlight-item">
                            <div class="ab-highlight-icon">
                                <i class="bi bi-globe"></i>
                            </div>
                            <span class="ab-highlight-text">Global Recognition</span>
                        </div>
                        <div class="ab-highlight-item">
                            <div class="ab-highlight-icon">
                                <i class="bi bi-lightbulb"></i>
                            </div>
                            <span class="ab-highlight-text">Research Innovation</span>
                        </div>
                        <div class="ab-highlight-item">
                            <div class="ab-highlight-icon">
                                <i class="bi bi-heart"></i>
                            </div>
                            <span class="ab-highlight-text">Community Service</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== TIMELINE ========== -->
        <section class="ab-timeline-section">
            <div class="ab-section-heading" data-animate>
                <span class="ab-section-label">
                    <i class="bi bi-clock-history"></i>
                    Our Journey
                </span>
                <br>
                <h2 class="ab-section-title">Milestones Through the Years</h2>
                <p class="ab-section-subtitle">
                    Discover the key moments that have shaped MediCare University into the
                    institution it is today.
                </p>
            </div>

            <div class="ab-timeline-container">
                <div class="ab-timeline-line"></div>

                <!-- Timeline Item 1 -->
                <div class="ab-timeline-item" data-delay="0">
                    <div class="ab-timeline-content">
                        <span class="ab-timeline-year">1948</span>
                        <h4 class="ab-timeline-title">Foundation Year</h4>
                        <p class="ab-timeline-desc">
                            MediCare University was founded by Dr. Alexander MediCare with a vision
                            to provide world-class medical education. Started with 50 students in a
                            small building.
                        </p>
                    </div>
                    <div class="ab-timeline-dot"></div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="ab-timeline-item" data-delay="150">
                    <div class="ab-timeline-content">
                        <span class="ab-timeline-year">1965</span>
                        <h4 class="ab-timeline-title">First Teaching Hospital</h4>
                        <p class="ab-timeline-desc">
                            Opened our first 500-bed teaching hospital, providing students with
                            hands-on clinical experience and serving the local community.
                        </p>
                    </div>
                    <div class="ab-timeline-dot"></div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="ab-timeline-item" data-delay="300">
                    <div class="ab-timeline-content">
                        <span class="ab-timeline-year">1982</span>
                        <h4 class="ab-timeline-title">Research Center Established</h4>
                        <p class="ab-timeline-desc">
                            Launched the MediCare Research Center, pioneering groundbreaking studies
                            in cardiology, oncology, and infectious diseases.
                        </p>
                    </div>
                    <div class="ab-timeline-dot"></div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="ab-timeline-item" data-delay="450">
                    <div class="ab-timeline-content">
                        <span class="ab-timeline-year">1995</span>
                        <h4 class="ab-timeline-title">International Accreditation</h4>
                        <p class="ab-timeline-desc">
                            Received WHO recognition and international accreditation, allowing our
                            graduates to practice medicine worldwide.
                        </p>
                    </div>
                    <div class="ab-timeline-dot"></div>
                </div>

                <!-- Timeline Item 5 -->
                <div class="ab-timeline-item" data-delay="600">
                    <div class="ab-timeline-content">
                        <span class="ab-timeline-year">2010</span>
                        <h4 class="ab-timeline-title">New Campus Inauguration</h4>
                        <p class="ab-timeline-desc">
                            Inaugurated our new 200-acre campus featuring state-of-the-art
                            facilities, simulation labs, and modern dormitories.
                        </p>
                    </div>
                    <div class="ab-timeline-dot"></div>
                </div>

                <!-- Timeline Item 6 -->
                <div class="ab-timeline-item" data-delay="750">
                    <div class="ab-timeline-content">
                        <span class="ab-timeline-year">2023</span>
                        <h4 class="ab-timeline-title">75th Anniversary</h4>
                        <p class="ab-timeline-desc">
                            Celebrated 75 years of excellence with over 50,000 alumni worldwide,
                            15 Nobel laureates, and cutting-edge research facilities.
                        </p>
                    </div>
                    <div class="ab-timeline-dot"></div>
                </div>
            </div>
        </section>

        <!-- ========== STATS SECTION ========== -->
        <section class="ab-stats-section" data-animate>
            <div class="ab-stats-header">
                <h2 class="ab-stats-title">Our Impact in Numbers</h2>
                <p class="ab-stats-subtitle">
                    Decades of dedication have led to remarkable achievements
                </p>
            </div>

            <div class="ab-stats-grid">
                <div class="ab-stat-box">
                    <div class="ab-stat-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="ab-stat-number" data-count="50000">0</div>
                    <div class="ab-stat-label">Alumni Worldwide</div>
                </div>

                <div class="ab-stat-box">
                    <div class="ab-stat-icon">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div class="ab-stat-number" data-count="500">0</div>
                    <div class="ab-stat-label">Expert Faculty</div>
                </div>

                <div class="ab-stat-box">
                    <div class="ab-stat-icon">
                        <i class="bi bi-journal-richtext"></i>
                    </div>
                    <div class="ab-stat-number" data-count="3500">0</div>
                    <div class="ab-stat-label">Research Papers</div>
                </div>

                <div class="ab-stat-box">
                    <div class="ab-stat-icon">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                    <div class="ab-stat-number" data-count="120">0</div>
                    <div class="ab-stat-label">Partner Institutions</div>
                </div>
            </div>
        </section>

        <!-- ========== LEADERSHIP SECTION ========== -->
        <section class="ab-leadership-section">
            <div class="ab-section-heading" data-animate>
                <span class="ab-section-label">
                    <i class="bi bi-people-fill"></i>
                    Our Leadership
                </span>
                <br>
                <h2 class="ab-section-title">Meet Our Leaders</h2>
                <p class="ab-section-subtitle">
                    Visionary leaders committed to advancing medical education and research excellence.
                </p>
            </div>

            <div class="ab-team-grid">
                <!-- Team Member 1 -->
                <div class="ab-team-card" data-delay="0">
                    <div class="ab-team-image">
                        <i class="bi bi-person-circle"></i>
                        <div class="ab-team-social">
                            <a href="#" class="ab-social-link"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="ab-team-info">
                        <h4 class="ab-team-name">Dr. Sarah Mitchell</h4>
                        <p class="ab-team-role">Chancellor</p>
                        <p class="ab-team-bio">
                            Leading MediCare University with 30+ years of experience in healthcare
                            administration and academic leadership.
                        </p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="ab-team-card" data-delay="150">
                    <div class="ab-team-image">
                        <i class="bi bi-person-circle"></i>
                        <div class="ab-team-social">
                            <a href="#" class="ab-social-link"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="ab-team-info">
                        <h4 class="ab-team-name">Prof. James Anderson</h4>
                        <p class="ab-team-role">Vice Chancellor</p>
                        <p class="ab-team-bio">
                            Renowned cardiologist and researcher, overseeing academic programs
                            and faculty development.
                        </p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="ab-team-card" data-delay="300">
                    <div class="ab-team-image">
                        <i class="bi bi-person-circle"></i>
                        <div class="ab-team-social">
                            <a href="#" class="ab-social-link"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="ab-team-info">
                        <h4 class="ab-team-name">Dr. Emily Chen</h4>
                        <p class="ab-team-role">Dean of Medicine</p>
                        <p class="ab-team-bio">
                            Award-winning educator transforming medical curriculum with innovative
                            teaching methodologies.
                        </p>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="ab-team-card" data-delay="450">
                    <div class="ab-team-image">
                        <i class="bi bi-person-circle"></i>
                        <div class="ab-team-social">
                            <a href="#" class="ab-social-link"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="ab-social-link"><i class="bi bi-envelope-fill"></i></a>
                        </div>
                    </div>
                    <div class="ab-team-info">
                        <h4 class="ab-team-name">Prof. Michael Roberts</h4>
                        <p class="ab-team-role">Director of Research</p>
                        <p class="ab-team-bio">
                            Pioneer in biomedical research with 200+ publications and 15 patents
                            in medical technology.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== ACCREDITATIONS ========== -->
        <section class="ab-accreditation-section">
            <div class="ab-section-heading" data-animate>
                <span class="ab-section-label">
                    <i class="bi bi-patch-check-fill"></i>
                    Accreditations
                </span>
                <br>
                <h2 class="ab-section-title">Recognized Excellence</h2>
                <p class="ab-section-subtitle">
                    Accredited by leading national and international bodies, ensuring the
                    highest standards of medical education.
                </p>
            </div>

            <div class="ab-accreditation-grid">
                <!-- Accreditation 1 -->
                <div class="ab-accreditation-card" data-delay="0">
                    <div class="ab-accreditation-logo">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <h4 class="ab-accreditation-name">PMDC</h4>
                    <p class="ab-accreditation-full">Pakistan Medical & Dental Council</p>
                </div>

                <!-- Accreditation 2 -->
                <div class="ab-accreditation-card" data-delay="100">
                    <div class="ab-accreditation-logo">
                        <i class="bi bi-globe"></i>
                    </div>
                    <h4 class="ab-accreditation-name">WHO</h4>
                    <p class="ab-accreditation-full">World Health Organization</p>
                </div>

                <!-- Accreditation 3 -->
                <div class="ab-accreditation-card" data-delay="200">
                    <div class="ab-accreditation-logo">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <h4 class="ab-accreditation-name">HEC</h4>
                    <p class="ab-accreditation-full">Higher Education Commission</p>
                </div>

                <!-- Accreditation 4 -->
                <div class="ab-accreditation-card" data-delay="300">
                    <div class="ab-accreditation-logo">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="ab-accreditation-name">WFME</h4>
                    <p class="ab-accreditation-full">World Federation for Medical Education</p>
                </div>

                <!-- Accreditation 5 -->
                <div class="ab-accreditation-card" data-delay="400">
                    <div class="ab-accreditation-logo">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <h4 class="ab-accreditation-name">AAMC</h4>
                    <p class="ab-accreditation-full">Association of American Medical Colleges</p>
                </div>
            </div>
        </section>

        <!-- ========== CAMPUS TOUR ========== -->
        <section class="ab-campus-section">
            <div class="ab-section-heading" data-animate>
                <span class="ab-section-label">
                    <i class="bi bi-building"></i>
                    Our Campus
                </span>
                <br>
                <h2 class="ab-section-title">World-Class Facilities</h2>
                <p class="ab-section-subtitle">
                    Explore our state-of-the-art campus designed to provide the best learning
                    environment for future healthcare professionals.
                </p>
            </div>

            <div class="ab-campus-grid">
                <!-- Campus Card 1 - Large -->
                <div class="ab-campus-card ab-large" data-delay="0">
                    <div class="ab-campus-bg">
                        <i class="bi bi-hospital"></i>
                    </div>
                    <div class="ab-campus-overlay">
                        <div class="ab-campus-icon">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                        <h3 class="ab-campus-title">Teaching Hospital</h3>
                        <p class="ab-campus-desc">
                            1000-bed multi-specialty hospital with advanced medical equipment,
                            providing comprehensive clinical training opportunities.
                        </p>
                    </div>
                </div>

                <!-- Campus Card 2 -->
                <div class="ab-campus-card" data-delay="150">
                    <div class="ab-campus-bg">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="ab-campus-overlay">
                        <div class="ab-campus-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <h3 class="ab-campus-title">Medical Library</h3>
                        <p class="ab-campus-desc">
                            Digital library with 500,000+ medical journals and research papers.
                        </p>
                    </div>
                </div>

                <!-- Campus Card 3 -->
                <div class="ab-campus-card" data-delay="300">
                    <div class="ab-campus-bg">
                        <i class="bi bi-pc-display"></i>
                    </div>
                    <div class="ab-campus-overlay">
                        <div class="ab-campus-icon">
                            <i class="bi bi-cpu-fill"></i>
                        </div>
                        <h3 class="ab-campus-title">Simulation Center</h3>
                        <p class="ab-campus-desc">
                            High-fidelity simulators for realistic clinical training scenarios.
                        </p>
                    </div>
                </div>

                <!-- Campus Card 4 -->
                <div class="ab-campus-card" data-delay="450">
                    <div class="ab-campus-bg">
                        <i class="bi bi-flask"></i>
                    </div>
                    <div class="ab-campus-overlay">
                        <div class="ab-campus-icon">
                            <i class="bi bi-eyedropper"></i>
                        </div>
                        <h3 class="ab-campus-title">Research Labs</h3>
                        <p class="ab-campus-desc">
                            Cutting-edge research facilities for biomedical and clinical research.
                        </p>
                    </div>
                </div>

                <!-- Campus Card 5 - Large -->
                <div class="ab-campus-card ab-large" data-delay="600">
                    <div class="ab-campus-bg">
                        <i class="bi bi-house-heart"></i>
                    </div>
                    <div class="ab-campus-overlay">
                        <div class="ab-campus-icon">
                            <i class="bi bi-house-heart-fill"></i>
                        </div>
                        <h3 class="ab-campus-title">Student Housing</h3>
                        <p class="ab-campus-desc">
                            Modern dormitories with all amenities including study rooms,
                            recreational facilities, and 24/7 security.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ========== TESTIMONIALS ========== -->
    <section class="ab-testimonial-section">
        <div class="ab-testimonial-container">
            <div class="ab-section-heading" data-animate>
                <span class="ab-section-label">
                    <i class="bi bi-chat-quote-fill"></i>
                    Testimonials
                </span>
                <br>
                <h2 class="ab-section-title">What Our Alumni Say</h2>
                <p class="ab-section-subtitle">
                    Hear from our graduates about their transformative journey at MediCare University.
                </p>
            </div>

            <div class="ab-testimonial-slider">
                <!-- Testimonial 1 -->
                <div class="ab-testimonial-card" data-delay="0">
                    <i class="bi bi-quote ab-quote-icon"></i>
                    <div class="ab-testimonial-content">
                        <div class="ab-testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="ab-testimonial-text">
                            "MediCare University gave me the foundation to become the physician I am
                            today. The faculty's dedication and the hands-on clinical experience were
                            invaluable in shaping my career."
                        </p>
                        <div class="ab-testimonial-author">
                            <div class="ab-author-avatar">DR</div>
                            <div class="ab-author-info">
                                <h5>Dr. David Rodriguez</h5>
                                <p>Cardiologist, Class of 2010</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="ab-testimonial-card" data-delay="150">
                    <i class="bi bi-quote ab-quote-icon"></i>
                    <div class="ab-testimonial-content">
                        <div class="ab-testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="ab-testimonial-text">
                            "The research opportunities at MediCare are unparalleled. I was able to
                            publish three papers before graduation, which opened doors to prestigious
                            residency programs."
                        </p>
                        <div class="ab-testimonial-author">
                            <div class="ab-author-avatar">AK</div>
                            <div class="ab-author-info">
                                <h5>Dr. Aisha Khan</h5>
                                <p>Oncologist, Class of 2015</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="ab-testimonial-card" data-delay="300">
                    <i class="bi bi-quote ab-quote-icon"></i>
                    <div class="ab-testimonial-content">
                        <div class="ab-testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="ab-testimonial-text">
                            "The global exposure and international exchange programs helped me
                            understand healthcare systems worldwide. Now I work with WHO, making
                            a difference globally."
                        </p>
                        <div class="ab-testimonial-author">
                            <div class="ab-author-avatar">JM</div>
                            <div class="ab-author-info">
                                <h5>Dr. John Miller</h5>
                                <p>WHO Advisor, Class of 2008</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="ab-testimonial-card" data-delay="450">
                    <i class="bi bi-quote ab-quote-icon"></i>
                    <div class="ab-testimonial-content">
                        <div class="ab-testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="ab-testimonial-text">
                            "From anatomy labs to clinical rotations, every aspect of my education
                            at MediCare was exceptional. The supportive community made the challenging
                            journey enjoyable."
                        </p>
                        <div class="ab-testimonial-author">
                            <div class="ab-author-avatar">SP</div>
                            <div class="ab-author-info">
                                <h5>Dr. Sarah Patel</h5>
                                <p>Pediatrician, Class of 2018</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="ab-testimonial-card" data-delay="600">
                    <i class="bi bi-quote ab-quote-icon"></i>
                    <div class="ab-testimonial-content">
                        <div class="ab-testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="ab-testimonial-text">
                            "The mentorship program connected me with industry leaders who guided
                            my career path. Today, I run my own successful practice, thanks to the
                            foundation laid at MediCare."
                        </p>
                        <div class="ab-testimonial-author">
                            <div class="ab-author-avatar">RW</div>
                            <div class="ab-author-info">
                                <h5>Dr. Robert Williams</h5>
                                <p>Surgeon, Class of 2012</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== MAIN WRAPPER CONTINUED ========== -->
    <div class="ab-main-wrapper">
        <!-- ========== PARTNERS ========== -->
        <section class="ab-partners-section">
            <div class="ab-partners-wrapper">
                <h3 class="ab-partners-title">Our Global Partners & Affiliations</h3>
                <div class="ab-partners-track">
                    <!-- Partner Logos (duplicated for seamless loop) -->
                    <div class="ab-partner-logo"><i class="bi bi-hospital"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-globe"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-heart-pulse"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-capsule"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-building"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-shield-plus"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-activity"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-clipboard2-pulse"></i></div>
                    <!-- Duplicated for seamless loop -->
                    <div class="ab-partner-logo"><i class="bi bi-hospital"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-globe"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-heart-pulse"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-capsule"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-building"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-shield-plus"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-activity"></i></div>
                    <div class="ab-partner-logo"><i class="bi bi-clipboard2-pulse"></i></div>
                </div>
            </div>
        </section>

        <!-- ========== CTA SECTION ========== -->
        <section class="ab-cta-section" data-animate>
            <div class="ab-cta-content">
                <div class="ab-cta-icon">
                    <i class="bi bi-rocket-takeoff-fill"></i>
                </div>
                <h2 class="ab-cta-title">Ready to Start Your Medical Journey?</h2>
                <p class="ab-cta-text">
                    Join thousands of successful healthcare professionals who started their
                    journey at MediCare University. Applications for the 2024 session are now open.
                </p>
                <div class="ab-cta-buttons">
                    <a href="#" class="ab-cta-btn ab-cta-btn-white">
                        <i class="bi bi-pencil-square"></i>
                        Apply Now
                    </a>
                    <a href="#" class="ab-cta-btn ab-cta-btn-ghost">
                        <i class="bi bi-calendar-event"></i>
                        Schedule a Visit
                    </a>
                </div>
            </div>
        </section>
    </div>


@endsection
  @push('page-scripts')
    <script src="{{ asset('js/pages/about.js') }}"></script>
@endpush