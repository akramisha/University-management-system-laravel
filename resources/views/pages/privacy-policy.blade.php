@extends('base')
@section('title', 'Privacy Policy | MediCare University')
@push('page-styles')
    <link rel="stylesheet" href="{{ asset('css/pages/privacy-policy.css') }}">

@endpush

@section('content')
<br>
    <!-- READING PROGRESS -->
    <div class="pp-reading-progress" id="readingProgress"></div>

    <!-- HERO BANNER -->
    <section class="pp-hero-banner">
        <i class="bi bi-shield-check pp-shield-bg"></i>
        <div class="pp-hero-inner">
            <div class="pp-hero-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h1 class="pp-hero-title">Privacy Policy</h1>
            <p class="pp-hero-subtitle">
                Your privacy is important to us. This policy explains how MediCare University collects, uses, and
                protects your personal information.
            </p>
            <div class="pp-meta-bar">
                <div class="pp-meta-item">
                    <i class="bi bi-calendar-check-fill"></i>
                    Last Updated: January 15, 2024
                </div>
                <div class="pp-meta-item">
                    <i class="bi bi-file-text-fill"></i>
                    Version 3.2
                </div>
                <div class="pp-meta-item">
                    <i class="bi bi-clock-fill"></i>
                    10 min read
                </div>
            </div>
        </div>
    </section>

    <!-- BREADCRUMB -->
    <div class="pp-breadcrumb">
        <div class="pp-breadcrumb-inner">
            <a href="#" class="pp-crumb-link"><i class="bi bi-house-fill"></i> Home</a>
            <span class="pp-crumb-sep"><i class="bi bi-chevron-right"></i></span>
            <a href="#" class="pp-crumb-link">Legal</a>
            <span class="pp-crumb-sep"><i class="bi bi-chevron-right"></i></span>
            <span class="pp-crumb-current">Privacy Policy</span>
        </div>
    </div>

    <!-- MAIN LAYOUT -->
    <div class="pp-main-layout">

        <!-- SIDEBAR -->
        <aside class="pp-sidebar">
            <div class="pp-sidebar-card">
                <div class="pp-sidebar-header">
                    <h3 class="pp-sidebar-title">
                        <i class="bi bi-list-ul"></i>
                        Table of Contents
                    </h3>
                </div>
                <ul class="pp-toc-list">
                    <li class="pp-toc-item">
                        <a href="#section1" class="pp-toc-link pp-active">
                            <span class="pp-toc-number">01</span>
                            Information We Collect
                        </a>
                    </li>
                    <li class="pp-toc-item">
                        <a href="#section2" class="pp-toc-link">
                            <span class="pp-toc-number">02</span>
                            How We Use Your Data
                        </a>
                    </li>
                    <li class="pp-toc-item">
                        <a href="#section3" class="pp-toc-link">
                            <span class="pp-toc-number">03</span>
                            Data Security
                        </a>
                    </li>
                    <li class="pp-toc-item">
                        <a href="#section4" class="pp-toc-link">
                            <span class="pp-toc-number">04</span>
                            Third-Party Sharing
                        </a>
                    </li>
                    <li class="pp-toc-item">
                        <a href="#section5" class="pp-toc-link">
                            <span class="pp-toc-number">05</span>
                            Your Rights
                        </a>
                    </li>
                    <li class="pp-toc-item">
                        <a href="#section6" class="pp-toc-link">
                            <span class="pp-toc-number">06</span>
                            Cookie Policy
                        </a>
                    </li>
                    <li class="pp-toc-item">
                        <a href="#section7" class="pp-toc-link">
                            <span class="pp-toc-number">07</span>
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            <div class="pp-quick-actions">
                <h4 class="pp-quick-title">Quick Actions</h4>
                <button class="pp-quick-btn" onclick="window.print()">
                    <i class="bi bi-printer-fill"></i>
                    Print Policy
                </button>
                <a href="#" class="pp-quick-btn">
                    <i class="bi bi-download"></i>
                    Download PDF
                </a>
                <a href="#section7" class="pp-quick-btn">
                    <i class="bi bi-envelope-fill"></i>
                    Contact Privacy Team
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="pp-content-area">

            <!-- SUMMARY CARDS -->
            <section class="pp-summary-section">
                <div class="pp-summary-grid">
                    <div class="pp-summary-card" data-animate data-delay="0">
                        <div class="pp-summary-icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <h3 class="pp-summary-title">Transparency</h3>
                        <p class="pp-summary-text">We clearly explain what data we collect and why. No hidden practices
                            or surprise uses of your information.</p>
                    </div>
                    <div class="pp-summary-card" data-animate data-delay="150">
                        <div class="pp-summary-icon">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <h3 class="pp-summary-title">Security</h3>
                        <p class="pp-summary-text">Your data is protected with industry-standard encryption and security
                            measures at all times.</p>
                    </div>
                    <div class="pp-summary-card" data-animate data-delay="300">
                        <div class="pp-summary-icon">
                            <i class="bi bi-person-check-fill"></i>
                        </div>
                        <h3 class="pp-summary-title">Control</h3>
                        <p class="pp-summary-text">You have full control over your personal data. Access, update, or
                            delete your information anytime.</p>
                    </div>
                </div>
            </section>

            <!-- SECTION 1 -->
            <section class="pp-policy-section" id="section1" data-animate>
                <div class="pp-section-header">
                    <div class="pp-section-number">01</div>
                    <div class="pp-section-title-wrap">
                        <h2>Information We Collect</h2>
                        <p class="pp-section-subtitle">Understanding what personal data we gather and why</p>
                    </div>
                </div>
                <div class="pp-section-content">
                    <p>MediCare University collects various types of information to provide and improve our educational
                        services. We are committed to collecting only the information necessary for legitimate purposes.
                    </p>

                    <div class="pp-highlight-box">
                        <div class="pp-highlight-icon">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <div class="pp-highlight-content">
                            <h4 class="pp-highlight-title">Key Point</h4>
                            <p class="pp-highlight-text">We only collect information that is necessary for providing our
                                educational services and complying with legal requirements.</p>
                        </div>
                    </div>

                    <h4 style="color: var(--pp-primary); margin: 25px 0 15px; font-size: 1.1rem;">Types of Information
                        Collected:</h4>

                    <div class="pp-data-list">
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-person-fill"></i></div>
                            <span class="pp-data-text">Personal Identification (Name, ID)</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-envelope-fill"></i></div>
                            <span class="pp-data-text">Contact Information (Email, Phone)</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-mortarboard-fill"></i></div>
                            <span class="pp-data-text">Academic Records & Transcripts</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-credit-card-fill"></i></div>
                            <span class="pp-data-text">Financial Information</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                            <span class="pp-data-text">Health & Medical Information</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <span class="pp-data-text">Location & Address Details</span>
                        </div>
                    </div>

                    <div class="pp-expandable">
                        <div class="pp-expandable-header">
                            <div class="pp-expandable-title">
                                <i class="bi bi-laptop-fill"></i>
                                Automatically Collected Information
                            </div>
                            <div class="pp-expandable-toggle"><i class="bi bi-chevron-down"></i></div>
                        </div>
                        <div class="pp-expandable-content">
                            <div class="pp-expandable-inner">
                                <p>When you visit our website or use our digital platforms, we automatically collect
                                    certain technical information including:</p>
                                <ul style="margin: 15px 0; padding-left: 25px;">
                                    <li>IP address and browser type</li>
                                    <li>Device information and operating system</li>
                                    <li>Pages visited and time spent on site</li>
                                    <li>Referring website addresses</li>
                                    <li>Cookie data and similar technologies</li>
                                </ul>
                                <p>This information helps us improve our website functionality and user experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 2 -->
            <section class="pp-policy-section" id="section2" data-animate>
                <div class="pp-section-header">
                    <div class="pp-section-number">02</div>
                    <div class="pp-section-title-wrap">
                        <h2>How We Use Your Data</h2>
                        <p class="pp-section-subtitle">The purposes for which we process your information</p>
                    </div>
                </div>
                <div class="pp-section-content">
                    <p>We use the information we collect for specific, legitimate purposes directly related to our
                        educational mission and your relationship with MediCare University.</p>

                    <div class="pp-data-list">
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-check-circle-fill"></i></div>
                            <span class="pp-data-text">Processing Admissions Applications</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-check-circle-fill"></i></div>
                            <span class="pp-data-text">Managing Student Records</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-check-circle-fill"></i></div>
                            <span class="pp-data-text">Processing Fee Payments</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-check-circle-fill"></i></div>
                            <span class="pp-data-text">Sending Important Communications</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-check-circle-fill"></i></div>
                            <span class="pp-data-text">Providing Student Services</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-check-circle-fill"></i></div>
                            <span class="pp-data-text">Complying with Legal Obligations</span>
                        </div>
                    </div>

                    <div class="pp-highlight-box">
                        <div class="pp-highlight-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="pp-highlight-content">
                            <h4 class="pp-highlight-title">Our Commitment</h4>
                            <p class="pp-highlight-text">We will never sell your personal information to third parties
                                or use it for purposes unrelated to your education.</p>
                        </div>
                    </div>

                    <div class="pp-expandable">
                        <div class="pp-expandable-header">
                            <div class="pp-expandable-title">
                                <i class="bi bi-graph-up-arrow"></i>
                                Research & Analytics
                            </div>
                            <div class="pp-expandable-toggle"><i class="bi bi-chevron-down"></i></div>
                        </div>
                        <div class="pp-expandable-content">
                            <div class="pp-expandable-inner">
                                <p>We may use anonymized and aggregated data for research purposes to improve our
                                    educational programs and services. This data cannot be used to identify individual
                                    students and is processed in compliance with ethical research standards.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 3 -->
            <section class="pp-policy-section" id="section3" data-animate>
                <div class="pp-section-header">
                    <div class="pp-section-number">03</div>
                    <div class="pp-section-title-wrap">
                        <h2>Data Security</h2>
                        <p class="pp-section-subtitle">How we protect your personal information</p>
                    </div>
                </div>
                <div class="pp-section-content">
                    <p>Protecting your personal information is our top priority. We implement comprehensive security
                        measures to safeguard your data against unauthorized access, alteration, disclosure, or
                        destruction.</p>

                    <div class="pp-data-list">
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-file-lock2-fill"></i></div>
                            <span class="pp-data-text">256-bit SSL/TLS Encryption</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-shield-fill-check"></i></div>
                            <span class="pp-data-text">Firewall Protection</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-key-fill"></i></div>
                            <span class="pp-data-text">Multi-Factor Authentication</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-arrow-repeat"></i></div>
                            <span class="pp-data-text">Regular Security Audits</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-people-fill"></i></div>
                            <span class="pp-data-text">Staff Security Training</span>
                        </div>
                        <div class="pp-data-item">
                            <div class="pp-data-icon"><i class="bi bi-hdd-rack-fill"></i></div>
                            <span class="pp-data-text">Secure Data Centers</span>
                        </div>
                    </div>

                    <div class="pp-expandable">
                        <div class="pp-expandable-header">
                            <div class="pp-expandable-title">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                Data Breach Response
                            </div>
                            <div class="pp-expandable-toggle"><i class="bi bi-chevron-down"></i></div>
                        </div>
                        <div class="pp-expandable-content">
                            <div class="pp-expandable-inner">
                                <p>In the unlikely event of a data breach, we have established protocols to:</p>
                                <ul style="margin: 15px 0; padding-left: 25px;">
                                    <li>Immediately contain and assess the breach</li>
                                    <li>Notify affected individuals within 72 hours</li>
                                    <li>Report to relevant regulatory authorities</li>
                                    <li>Take corrective measures to prevent future incidents</li>
                                    <li>Provide support and guidance to affected parties</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 4 -->
            <section class="pp-policy-section" id="section4" data-animate>
                <div class="pp-section-header">
                    <div class="pp-section-number">04</div>
                    <div class="pp-section-title-wrap">
                        <h2>Third-Party Sharing</h2>
                        <p class="pp-section-subtitle">When and how we share information with others</p>
                    </div>
                </div>
                <div class="pp-section-content">
                    <p>We may share your personal information with third parties only in limited circumstances and
                        always in accordance with applicable data protection laws.</p>

                    <div class="pp-highlight-box">
                        <div class="pp-highlight-icon">
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </div>
                        <div class="pp-highlight-content">
                            <h4 class="pp-highlight-title">Important</h4>
                            <p class="pp-highlight-text">We require all third parties to maintain the confidentiality of
                                your data and to use it only for the purposes for which it was shared.</p>
                        </div>
                    </div>

                    <div class="pp-expandable">
                        <div class="pp-expandable-header">
                            <div class="pp-expandable-title">
                                <i class="bi bi-building-fill"></i>
                                Service Providers
                            </div>
                            <div class="pp-expandable-toggle"><i class="bi bi-chevron-down"></i></div>
                        </div>
                        <div class="pp-expandable-content">
                            <div class="pp-expandable-inner">
                                <p>We work with trusted service providers who help us deliver our services, including
                                    payment processors, email service providers, and cloud hosting services. These
                                    providers are bound by strict data protection agreements.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pp-expandable">
                        <div class="pp-expandable-header">
                            <div class="pp-expandable-title">
                                <i class="bi bi-bank2"></i>
                                Regulatory Bodies
                            </div>
                            <div class="pp-expandable-toggle"><i class="bi bi-chevron-down"></i></div>
                        </div>
                        <div class="pp-expandable-content">
                            <div class="pp-expandable-inner">
                                <p>We may be required to share information with medical education regulatory bodies,
                                    accreditation organizations, and government agencies for compliance purposes. This
                                    includes the National Medical Commission and similar bodies.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pp-expandable">
                        <div class="pp-expandable-header">
                            <div class="pp-expandable-title">
                                <i class="bi bi-hospital-fill"></i>
                                Clinical Partners
                            </div>
                            <div class="pp-expandable-toggle"><i class="bi bi-chevron-down"></i></div>
                        </div>
                        <div class="pp-expandable-content">
                            <div class="pp-expandable-inner">
                                <p>For students participating in clinical rotations, we may share necessary information
                                    with affiliated hospitals and healthcare facilities to facilitate your training and
                                    ensure patient safety.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 5 - YOUR RIGHTS -->
            <section class="pp-rights-section" id="section5">
                <div class="pp-rights-header">
                    <div class="pp-rights-badge">
                        <i class="bi bi-person-fill-check"></i>
                        Your Data Rights
                    </div>
                    <h2 class="pp-rights-title">Your Privacy Rights</h2>
                    <p class="pp-rights-subtitle">You have complete control over your personal information</p>
                </div>

                <div class="pp-rights-grid">
                    <div class="pp-right-card" data-animate data-delay="0">
                        <div class="pp-right-icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <div class="pp-right-content">
                            <h4>Right to Access</h4>
                            <p>Request a copy of all personal data we hold about you at any time.</p>
                        </div>
                    </div>

                    <div class="pp-right-card" data-animate data-delay="100">
                        <div class="pp-right-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <div class="pp-right-content">
                            <h4>Right to Rectification</h4>
                            <p>Request correction of inaccurate or incomplete personal information.</p>
                        </div>
                    </div>

                    <div class="pp-right-card" data-animate data-delay="200">
                        <div class="pp-right-icon">
                            <i class="bi bi-trash3-fill"></i>
                        </div>
                        <div class="pp-right-content">
                            <h4>Right to Erasure</h4>
                            <p>Request deletion of your personal data under certain circumstances.</p>
                        </div>
                    </div>

                    <div class="pp-right-card" data-animate data-delay="300">
                        <div class="pp-right-icon">
                            <i class="bi bi-download"></i>
                        </div>
                        <div class="pp-right-content">
                            <h4>Right to Portability</h4>
                            <p>Receive your data in a structured, commonly used format.</p>
                        </div>
                    </div>

                    <div class="pp-right-card" data-animate data-delay="400">
                        <div class="pp-right-icon">
                            <i class="bi bi-hand-thumbs-down-fill"></i>
                        </div>
                        <div class="pp-right-content">
                            <h4>Right to Object</h4>
                            <p>Object to certain types of data processing, including marketing.</p>
                        </div>
                    </div>

                    <div class="pp-right-card" data-animate data-delay="500">
                        <div class="pp-right-icon">
                            <i class="bi bi-x-circle-fill"></i>
                        </div>
                        <div class="pp-right-content">
                            <h4>Right to Restrict</h4>
                            <p>Request restriction of processing while we verify your concerns.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 6 - COOKIE POLICY -->
            <section class="pp-cookie-section" id="section6">
                <div class="pp-cookie-content">
                    <div class="pp-cookie-header">
                        <div class="pp-cookie-icon">
                            <i class="bi bi-gear-wide-connected"></i>
                        </div>
                        <h2 class="pp-cookie-title">Cookie Preferences</h2>
                        <p class="pp-cookie-subtitle">Manage how we use cookies on our website</p>
                    </div>

                    <div class="pp-cookie-grid">
                        <div class="pp-cookie-card" data-animate data-delay="0">
                            <div class="pp-cookie-card-header">
                                <div class="pp-cookie-name">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Essential Cookies</span>
                                </div>
                                <label class="pp-cookie-toggle">
                                    <input type="checkbox" checked disabled>
                                    <span class="pp-cookie-slider"></span>
                                </label>
                            </div>
                            <p class="pp-cookie-desc">Required for the website to function properly. These cannot be
                                disabled as they are essential for security and basic functionality.</p>
                            <span class="pp-cookie-required">Always Active</span>
                        </div>

                        <div class="pp-cookie-card" data-animate data-delay="100">
                            <div class="pp-cookie-card-header">
                                <div class="pp-cookie-name">
                                    <i class="bi bi-graph-up"></i>
                                    <span>Analytics Cookies</span>
                                </div>
                                <label class="pp-cookie-toggle">
                                    <input type="checkbox" checked>
                                    <span class="pp-cookie-slider"></span>
                                </label>
                            </div>
                            <p class="pp-cookie-desc">Help us understand how visitors interact with our website,
                                allowing us to improve user experience and content.</p>
                        </div>

                        <div class="pp-cookie-card" data-animate data-delay="200">
                            <div class="pp-cookie-card-header">
                                <div class="pp-cookie-name">
                                    <i class="bi bi-megaphone-fill"></i>
                                    <span>Marketing Cookies</span>
                                </div>
                                <label class="pp-cookie-toggle">
                                    <input type="checkbox">
                                    <span class="pp-cookie-slider"></span>
                                </label>
                            </div>
                            <p class="pp-cookie-desc">Used to deliver personalized advertisements and track the
                                effectiveness of our marketing campaigns.</p>
                        </div>

                        <div class="pp-cookie-card" data-animate data-delay="300">
                            <div class="pp-cookie-card-header">
                                <div class="pp-cookie-name">
                                    <i class="bi bi-sliders"></i>
                                    <span>Preference Cookies</span>
                                </div>
                                <label class="pp-cookie-toggle">
                                    <input type="checkbox" checked>
                                    <span class="pp-cookie-slider"></span>
                                </label>
                            </div>
                            <p class="pp-cookie-desc">Remember your preferences like language settings, login details,
                                and accessibility options for a better experience.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 7 - CONTACT -->
            <section class="pp-contact-section" id="section7" data-animate>
                <div class="pp-contact-icon">
                    <i class="bi bi-envelope-paper-fill"></i>
                </div>
                <h2 class="pp-contact-title">Contact Our Privacy Team</h2>
                <p class="pp-contact-text">Have questions about this policy or want to exercise your data rights? Our
                    dedicated privacy team is here to help.</p>

                <div class="pp-contact-details">
                    <div class="pp-contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <div class="pp-contact-item-info">
                            <div class="pp-contact-item-label">Email</div>
                            <div class="pp-contact-item-value"><a
                                    href="mailto:privacy@medicare.edu">privacy@medicare.edu</a></div>
                        </div>
                    </div>
                    <div class="pp-contact-item">
                        <i class="bi bi-telephone-fill"></i>
                        <div class="pp-contact-item-info">
                            <div class="pp-contact-item-label">Phone</div>
                            <div class="pp-contact-item-value"><a href="tel:+15551234500">+1 (555) 123-4500</a></div>
                        </div>
                    </div>
                    <div class="pp-contact-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div class="pp-contact-item-info">
                            <div class="pp-contact-item-label">Address</div>
                            <div class="pp-contact-item-value">123 Medical Campus Rd</div>
                        </div>
                    </div>
                </div>

                <button class="pp-contact-btn">
                    Submit Privacy Request
                    <i class="bi bi-arrow-right"></i>
                </button>
            </section>

            <!-- VERSION HISTORY -->
            <section class="pp-version-section">
                <h3 class="pp-version-title">
                    <i class="bi bi-clock-history"></i>
                    Policy Version History
                </h3>
                <div class="pp-version-list">
                    <div class="pp-version-item">
                        <span class="pp-version-badge">v3.2</span>
                        <span class="pp-version-date">Jan 15, 2024</span>
                        <span class="pp-version-desc">Updated cookie policy and added new data rights section</span>
                    </div>
                    <div class="pp-version-item">
                        <span class="pp-version-badge">v3.1</span>
                        <span class="pp-version-date">Sep 01, 2023</span>
                        <span class="pp-version-desc">Enhanced security measures documentation</span>
                    </div>
                    <div class="pp-version-item">
                        <span class="pp-version-badge">v3.0</span>
                        <span class="pp-version-date">Mar 15, 2023</span>
                        <span class="pp-version-desc">Major update for GDPR and CCPA compliance</span>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <!-- Added missing back to top button -->
    <button id="backToTop">
    </button>

@endsection
  @push('page-scripts')
    <script src="{{ asset('js/pages/privacy-policy.js') }}"></script>
@endpush
