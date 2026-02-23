@extends('base')
@section('title', 'Contact Us | MediCare University')
@push('page-styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/contact.css') }}">

@endpush

@section('content')
 
<body>
<br>
<br>
    <!-- SPLIT HERO SECTION -->
    <section class="ct-split-hero">
        <div class="ct-hero-left">
            <div class="ct-geometric-shapes">
                <div class="ct-shape ct-shape-1"></div>
                <div class="ct-shape ct-shape-2"></div>
                <div class="ct-shape ct-shape-3"></div>
            </div>

            <div class="ct-hero-content">
                <div class="ct-hero-eyebrow">
                    <i class="bi bi-geo-alt-fill"></i>
                    We're Here For You
                </div>
                <h1 class="ct-hero-title">
                    Let's Start a <span class="ct-title-accent">Conversation</span>
                </h1>
                <p class="ct-hero-text">
                    Have questions about admissions, programs, or campus life? Our dedicated team is ready to assist you
                    on your journey to becoming a healthcare professional.
                </p>

                <div class="ct-quick-contacts">
                    <div class="ct-quick-item">
                        <div class="ct-quick-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="ct-quick-info">
                            <h4>Call Us Directly</h4>
                            <p>+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="ct-quick-item">
                        <div class="ct-quick-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="ct-quick-info">
                            <h4>Email Us</h4>
                            <p>info@medicare.edu</p>
                        </div>
                    </div>
                    <div class="ct-quick-item">
                        <div class="ct-quick-icon">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <div class="ct-quick-info">
                            <h4>Live Chat</h4>
                            <p>Available 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ct-hero-right">
            <div class="ct-form-container">
                <div class="ct-form-header">
                    <div class="ct-form-badge">
                        <i class="bi bi-send-fill"></i>
                        Quick Inquiry
                    </div>
                    <h2 class="ct-form-title">Send Us a Message</h2>
                    <p class="ct-form-subtitle">Fill out the form and we'll get back to you within 24 hours.</p>
                </div>

                <form class="ct-contact-form" id="contactForm">
                    <div class="ct-form-row">
                        <div class="ct-input-group">
                            <label class="ct-input-label">First Name</label>
                            <div class="ct-input-wrapper">
                                <input type="text" class="ct-input-field" placeholder="John" required>
                                <i class="bi bi-person-fill ct-input-icon"></i>
                            </div>
                        </div>
                        <div class="ct-input-group">
                            <label class="ct-input-label">Last Name</label>
                            <div class="ct-input-wrapper">
                                <input type="text" class="ct-input-field" placeholder="Doe" required>
                                <i class="bi bi-person-fill ct-input-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="ct-input-group">
                        <label class="ct-input-label">Email Address</label>
                        <div class="ct-input-wrapper">
                            <input type="email" class="ct-input-field" placeholder="john.doe@email.com" required>
                            <i class="bi bi-envelope-fill ct-input-icon"></i>
                        </div>
                    </div>

                    <div class="ct-input-group">
                        <label class="ct-input-label">Department</label>
                        <div class="ct-input-wrapper">
                            <select class="ct-select-field" required>
                                <option value="" disabled selected>Select a department</option>
                                <option value="admissions">Admissions Office</option>
                                <option value="academics">Academic Affairs</option>
                                <option value="finance">Finance & Fees</option>
                                <option value="hostel">Hostel Services</option>
                                <option value="support">General Support</option>
                            </select>
                            <i class="bi bi-building-fill ct-input-icon"></i>
                        </div>
                    </div>

                    <div class="ct-input-group">
                        <label class="ct-input-label">Your Message</label>
                        <textarea class="ct-textarea-field" placeholder="Write your message here..."
                            required></textarea>
                    </div>

                    <button type="submit" class="ct-submit-btn">
                        Send Message
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- BREADCRUMB -->
    <div class="ct-breadcrumb-bar">
        <div class="ct-breadcrumb-wrap">
            <a href="#" class="ct-crumb"><i class="bi bi-house-fill"></i> Home</a>
            <span class="ct-crumb-sep"><i class="bi bi-chevron-right"></i></span>
            <span class="ct-crumb-active">Contact Us</span>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="ct-main-content">

        <!-- DEPARTMENTS SECTION -->
        <section class="ct-departments-section">
            <div class="ct-section-top">
                <div class="ct-section-chip">
                    <i class="bi bi-building-fill"></i>
                    Departments
                </div>
                <h2 class="ct-section-main-title">Contact Our <span>Departments</span></h2>
                <p class="ct-section-desc">Reach out directly to the department that can best assist you with your
                    inquiry</p>
            </div>

            <div class="ct-hex-grid">
                <div class="ct-hex-card" data-animate data-delay="0">
                    <div class="ct-hex-icon-wrap">
                        <div class="ct-hex-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                    </div>
                    <h4 class="ct-hex-title">Admissions Office</h4>
                    <p class="ct-hex-contact"><i class="bi bi-telephone"></i> +1 (555) 123-4001</p>
                    <p class="ct-hex-contact"><i class="bi bi-envelope"></i> admissions@medicare.edu</p>
                    <a href="#" class="ct-hex-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="ct-hex-card" data-animate data-delay="100">
                    <div class="ct-hex-icon-wrap">
                        <div class="ct-hex-icon">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                    </div>
                    <h4 class="ct-hex-title">Finance & Accounts</h4>
                    <p class="ct-hex-contact"><i class="bi bi-telephone"></i> +1 (555) 123-4002</p>
                    <p class="ct-hex-contact"><i class="bi bi-envelope"></i> finance@medicare.edu</p>
                    <a href="#" class="ct-hex-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="ct-hex-card" data-animate data-delay="200">
                    <div class="ct-hex-icon-wrap">
                        <div class="ct-hex-icon">
                            <i class="bi bi-book-half"></i>
                        </div>
                    </div>
                    <h4 class="ct-hex-title">Academic Affairs</h4>
                    <p class="ct-hex-contact"><i class="bi bi-telephone"></i> +1 (555) 123-4003</p>
                    <p class="ct-hex-contact"><i class="bi bi-envelope"></i> academics@medicare.edu</p>
                    <a href="#" class="ct-hex-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="ct-hex-card" data-animate data-delay="300">
                    <div class="ct-hex-icon-wrap">
                        <div class="ct-hex-icon">
                            <i class="bi bi-house-heart-fill"></i>
                        </div>
                    </div>
                    <h4 class="ct-hex-title">Hostel & Housing</h4>
                    <p class="ct-hex-contact"><i class="bi bi-telephone"></i> +1 (555) 123-4004</p>
                    <p class="ct-hex-contact"><i class="bi bi-envelope"></i> hostel@medicare.edu</p>
                    <a href="#" class="ct-hex-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="ct-hex-card" data-animate data-delay="400">
                    <div class="ct-hex-icon-wrap">
                        <div class="ct-hex-icon">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                    </div>
                    <h4 class="ct-hex-title">Teaching Hospital</h4>
                    <p class="ct-hex-contact"><i class="bi bi-telephone"></i> +1 (555) 123-4005</p>
                    <p class="ct-hex-contact"><i class="bi bi-envelope"></i> hospital@medicare.edu</p>
                    <a href="#" class="ct-hex-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="ct-hex-card" data-animate data-delay="500">
                    <div class="ct-hex-icon-wrap">
                        <div class="ct-hex-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                    </div>
                    <h4 class="ct-hex-title">Student Support</h4>
                    <p class="ct-hex-contact"><i class="bi bi-telephone"></i> +1 (555) 123-4006</p>
                    <p class="ct-hex-contact"><i class="bi bi-envelope"></i> support@medicare.edu</p>
                    <a href="#" class="ct-hex-link">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </section>

        <!-- MAP & INFO SECTION -->
        <section class="ct-map-section">
            <div class="ct-section-top">
                <div class="ct-section-chip">
                    <i class="bi bi-geo-alt-fill"></i>
                    Location
                </div>
                <h2 class="ct-section-main-title">Find Us <span>Here</span></h2>
                <p class="ct-section-desc">Visit our campus and experience world-class medical education firsthand</p>
            </div>

            <div class="ct-map-grid">
                <div class="ct-map-container" data-animate>
                    <div class="ct-map-placeholder">
                        <i class="bi bi-geo-alt-fill ct-map-icon"></i>
                        <h3 class="ct-map-text">MediCare University Campus</h3>
                        <p class="ct-map-subtext">123 Medical Campus Road, Healthcare City</p>
                        <button class="ct-map-btn">
                            <i class="bi bi-map-fill"></i>
                            Open in Google Maps
                        </button>
                    </div>
                </div>

                <div class="ct-info-stack" data-animate>
                    <div class="ct-info-card">
                        <div class="ct-info-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="ct-info-details">
                            <h4>Main Campus Address</h4>
                            <p>123 Medical Campus Road,<br>Healthcare City, HC 12345,<br>United States</p>
                        </div>
                    </div>

                    <div class="ct-info-card">
                        <div class="ct-info-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="ct-info-details">
                            <h4>Phone Numbers</h4>
                            <p>Main: <a href="tel:+15551234567">+1 (555) 123-4567</a><br>Admissions: <a
                                    href="tel:+15551234001">+1 (555) 123-4001</a></p>
                        </div>
                    </div>

                    <div class="ct-info-card">
                        <div class="ct-info-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="ct-info-details">
                            <h4>Email Addresses</h4>
                            <p>General: <a href="mailto:info@medicare.edu">info@medicare.edu</a><br>Support: <a
                                    href="mailto:support@medicare.edu">support@medicare.edu</a></p>
                        </div>
                    </div>

                    <div class="ct-info-card">
                        <div class="ct-info-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div class="ct-info-details">
                            <h4>Getting Here</h4>
                            <p>15 mins from International Airport<br>Free campus shuttle service available</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- WORKING HOURS -->
        <section class="ct-hours-section">
            <div class="ct-hours-wrapper">
                <div class="ct-hours-content">
                    <div class="ct-hours-header">
                        <h2 class="ct-hours-title"><i class="bi bi-clock-fill"></i> Office Hours</h2>
                        <p class="ct-hours-subtitle">Our team is available to assist you during the following hours</p>
                    </div>

                    <div class="ct-hours-grid">
                        <div class="ct-hour-card" data-animate data-delay="0">
                            <div class="ct-hour-icon">
                                <i class="bi bi-calendar-week-fill"></i>
                            </div>
                            <h4 class="ct-hour-day">Monday - Friday</h4>
                            <p class="ct-hour-time">8:00 AM - 6:00 PM</p>
                            <span class="ct-hour-status ct-open">Open Now</span>
                        </div>

                        <div class="ct-hour-card" data-animate data-delay="100">
                            <div class="ct-hour-icon">
                                <i class="bi bi-calendar-check-fill"></i>
                            </div>
                            <h4 class="ct-hour-day">Saturday</h4>
                            <p class="ct-hour-time">9:00 AM - 2:00 PM</p>
                            <span class="ct-hour-status ct-open">Open</span>
                        </div>

                        <div class="ct-hour-card" data-animate data-delay="200">
                            <div class="ct-hour-icon">
                                <i class="bi bi-calendar-x-fill"></i>
                            </div>
                            <h4 class="ct-hour-day">Sunday</h4>
                            <p class="ct-hour-time">Closed</p>
                            <span class="ct-hour-status ct-closed">Closed</span>
                        </div>

                        <div class="ct-hour-card ct-emergency" data-animate data-delay="300">
                            <div class="ct-hour-icon">
                                <i class="bi bi-heart-pulse-fill"></i>
                            </div>
                            <h4 class="ct-hour-day">Hospital Emergency</h4>
                            <p class="ct-hour-time">24 Hours / 7 Days</p>
                            <span class="ct-hour-status ct-24hr">24/7 Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section class="ct-faq-section">
            <div class="ct-faq-layout">
                <div class="ct-faq-side" data-animate>
                    <h2 class="ct-faq-side-title">Frequently Asked Questions</h2>
                    <p class="ct-faq-side-text">Find quick answers to the most common questions about contacting us and
                        getting the support you need.</p>

                    <div class="ct-faq-contact-box">
                        <h4><i class="bi bi-headset"></i> Still Have Questions?</h4>
                        <p>Our support team is just a call away. We're here to help you 24/7.</p>
                        <a href="tel:+15551234567" class="ct-faq-call-btn">
                            <i class="bi bi-telephone-fill"></i>
                            Call Now
                        </a>
                    </div>
                </div>

                <div class="ct-faq-list">
                    <div class="ct-faq-item" data-animate data-delay="0">
                        <div class="ct-faq-question">
                            <div class="ct-faq-q-content">
                                <span class="ct-faq-num">01</span>
                                <h4>How can I schedule a campus visit?</h4>
                            </div>
                            <div class="ct-faq-toggle"><i class="bi bi-plus-lg"></i></div>
                        </div>
                        <div class="ct-faq-answer">
                            <div class="ct-faq-answer-inner">
                                You can schedule a campus visit by contacting our admissions office at +1 (555) 123-4001
                                or by filling out the visit request form on our website. Campus tours are available
                                Monday through Saturday and include visits to our teaching hospital, laboratories, and
                                student facilities.
                            </div>
                        </div>
                    </div>

                    <div class="ct-faq-item" data-animate data-delay="100">
                        <div class="ct-faq-question">
                            <div class="ct-faq-q-content">
                                <span class="ct-faq-num">02</span>
                                <h4>What is the response time for email inquiries?</h4>
                            </div>
                            <div class="ct-faq-toggle"><i class="bi bi-plus-lg"></i></div>
                        </div>
                        <div class="ct-faq-answer">
                            <div class="ct-faq-answer-inner">
                                We strive to respond to all email inquiries within 24-48 business hours. For urgent
                                matters, we recommend calling our main office or using our live chat feature which is
                                available 24/7 for immediate assistance.
                            </div>
                        </div>
                    </div>

                    <div class="ct-faq-item" data-animate data-delay="200">
                        <div class="ct-faq-question">
                            <div class="ct-faq-q-content">
                                <span class="ct-faq-num">03</span>
                                <h4>Is there parking available for visitors?</h4>
                            </div>
                            <div class="ct-faq-toggle"><i class="bi bi-plus-lg"></i></div>
                        </div>
                        <div class="ct-faq-answer">
                            <div class="ct-faq-answer-inner">
                                Yes, we have ample visitor parking available on campus. The main visitor parking lot is
                                located near the administration building. Parking is complimentary for the first 2 hours
                                with validation from the office you're visiting.
                            </div>
                        </div>
                    </div>

                    <div class="ct-faq-item" data-animate data-delay="300">
                        <div class="ct-faq-question">
                            <div class="ct-faq-q-content">
                                <span class="ct-faq-num">04</span>
                                <h4>Can international students contact the admissions office?</h4>
                            </div>
                            <div class="ct-faq-toggle"><i class="bi bi-plus-lg"></i></div>
                        </div>
                        <div class="ct-faq-answer">
                            <div class="ct-faq-answer-inner">
                                Absolutely! We have a dedicated International Student Services team available to assist
                                prospective and current international students. They can be reached at
                                international@medicare.edu or through our WhatsApp support at +1 (555) 123-4010.
                            </div>
                        </div>
                    </div>

                    <div class="ct-faq-item" data-animate data-delay="400">
                        <div class="ct-faq-question">
                            <div class="ct-faq-q-content">
                                <span class="ct-faq-num">05</span>
                                <h4>How do I report a technical issue with the website?</h4>
                            </div>
                            <div class="ct-faq-toggle"><i class="bi bi-plus-lg"></i></div>
                        </div>
                        <div class="ct-faq-answer">
                            <div class="ct-faq-answer-inner">
                                Technical issues can be reported to our IT helpdesk at helpdesk@medicare.edu. Please
                                include a description of the issue, the page URL, and screenshots if possible. Our
                                technical team typically resolves issues within 24 hours.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <!-- NEWSLETTER -->
        <section class="ct-newsletter-section">
            <div class="ct-newsletter-content">
                <div class="ct-newsletter-icon">
                    <i class="bi bi-envelope-paper-fill"></i>
                </div>
                <h2 class="ct-newsletter-title">Stay Updated</h2>
                <p class="ct-newsletter-text">Subscribe to our newsletter for the latest news, events, and important
                    announcements from MediCare University.</p>
                <form class="ct-newsletter-form">
                    <input type="email" class="ct-newsletter-input" placeholder="Enter your email address" required>
                    <button type="submit" class="ct-newsletter-btn">
                        Subscribe
                        <i class="bi bi-send-fill"></i>
                    </button>
                </form>
            </div>
        </section>

    </main>

  @endsection
  @push('page-scripts')
    <script src="{{ asset('js/pages/contact.js') }}"></script>
@endpush