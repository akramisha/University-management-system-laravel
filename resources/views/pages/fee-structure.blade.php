@extends('base')
@section('title', 'Fee Structure | MediCare University')
@push('page-styles')
    <link rel="stylesheet" href="{{ asset('css/pages/fee-structure.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@endpush

@section('content')

    <br>

    <!-- HERO BANNER -->
    <section class="mc-hero-banner">
        <div class="mc-floating-icons">
            <i class="bi bi-heart-pulse mc-floating-icon" style="left: 10%; animation-delay: 0s;"></i>
            <i class="bi bi-capsule mc-floating-icon" style="left: 25%; animation-delay: 3s;"></i>
            <i class="bi bi-hospital mc-floating-icon" style="left: 40%; animation-delay: 6s;"></i>
            <i class="bi bi-clipboard2-pulse mc-floating-icon" style="left: 55%; animation-delay: 2s;"></i>
            <i class="bi bi-activity mc-floating-icon" style="left: 70%; animation-delay: 5s;"></i>
            <i class="bi bi-shield-plus mc-floating-icon" style="left: 85%; animation-delay: 1s;"></i>
        </div>
        <div class="mc-hero-content">
            <div class="mc-hero-badge">
                <i class="bi bi-calendar-check"></i>
                Academic Year 2024-2025
            </div>
            <h1 class="mc-hero-title">Fee <span>Structure</span></h1>
            <p class="mc-hero-subtitle">Transparent and comprehensive fee details for all our medical programs. Invest
                in your future with world-class medical education.</p>
            <div class="mc-stats-row">
                <div class="mc-stat-item">
                    <span class="mc-stat-number" data-count="6">0</span>
                    <span class="mc-stat-label">Programs Offered</span>
                </div>
                <div class="mc-stat-item">
                    <span class="mc-stat-number" data-count="40" data-suffix="%">0%</span>
                    <span class="mc-stat-label">Scholarship Available</span>
                </div>
                <div class="mc-stat-item">
                    <span class="mc-stat-number" data-count="12">0</span>
                    <span class="mc-stat-label">EMI Options</span>
                </div>
            </div>
        </div>
    </section>

    <!-- BREADCRUMB -->
    <div class="mc-breadcrumb">
        <div class="mc-breadcrumb-inner">
            <a href="{{route('home')}}" class="mc-breadcrumb-link"><i class="bi bi-house-fill"></i> Home</a>
            <span class="mc-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
            <a href="{{route('fee-structure')}}" class="mc-breadcrumb-link">Admissions</a>
            <span class="mc-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
            <span class="mc-breadcrumb-active">Fee Structure</span>
        </div>
    </div>

    <!-- MAIN CONTAINER -->
    <main class="mc-main-container">
        <!-- Alert Notice -->
        <div class="mc-alert-notice" data-animate="slide-right">
            <div class="mc-alert-icon">
                <i class="bi bi-info-circle-fill"></i>
            </div>
            <div class="mc-alert-content">
                <h4>Important Notice for Applicants</h4>
                <p>All fees are subject to revision by the university. The fees mentioned are for the academic year
                    2024-2025. International students should refer to the separate fee structure applicable to them. For
                    any queries, please contact the Admissions Office at <strong>admissions@medicare.edu</strong></p>
            </div>
        </div>

        <!-- Section Header -->
        <div class="mc-section-header" data-animate="fade-up">
            <span class="mc-section-tag"><i class="bi bi-mortarboard-fill"></i> Our Programs</span>
            <br>
            <h2 class="mc-section-title">Program-wise Fee Structure</h2>
            <p class="mc-section-desc">Choose your program and explore the detailed fee breakdown including tuition,
                laboratory, and other charges.</p>
        </div>

        <!-- Program Tabs -->
        <div class="mc-program-tabs" data-animate="fade-up">
            <button class="mc-tab-btn mc-active" data-filter="all">
                <i class="bi bi-grid-3x3-gap-fill"></i> All Programs
            </button>
            <button class="mc-tab-btn" data-filter="undergraduate">
                <i class="bi bi-mortarboard"></i> Undergraduate
            </button>
            <button class="mc-tab-btn" data-filter="postgraduate">
                <i class="bi bi-award"></i> Postgraduate
            </button>
            <button class="mc-tab-btn" data-filter="diploma">
                <i class="bi bi-file-earmark-medical"></i> Diploma
            </button>
        </div>

        <!-- Fee Cards Grid -->
        <div class="mc-fee-grid">
            <!-- MBBS Card -->
            <div class="mc-fee-card" data-animate="fade-up" data-category="undergraduate">
                <div class="mc-card-header">
                    <div class="mc-program-icon">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>
                    <h3 class="mc-program-name">Medicine (MBBS)</h3>
                    <p class="mc-program-duration"><i class="bi bi-clock"></i> 5.5 Years + 1 Year Internship</p>
                </div>
                <div class="mc-card-body">
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-book-fill"></i> Tuition Fee</span>
                        <span class="mc-fee-amount">$15,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="fa-solid fa-flask"></i> Laboratory Fee</span>
                        <span class="mc-fee-amount">$2,500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-hospital-fill"></i> Clinical Training</span>
                        <span class="mc-fee-amount">$3,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-file-text-fill"></i> Examination Fee</span>
                        <span class="mc-fee-amount">$800/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-building-fill"></i> Development Fee</span>
                        <span class="mc-fee-amount">$500/year</span>
                    </div>
                    <div class="mc-fee-total">
                        <span class="mc-total-label">Total Annual Fee</span>
                        <span class="mc-total-amount">$21,800</span>
                    </div>
                </div>
            </div>

            <!-- Nursing Card -->
            <div class="mc-fee-card" data-animate="fade-up" data-delay="100" data-category="undergraduate">
                <div class="mc-card-header mc-nursing">
                    <div class="mc-program-icon">
                        <i class="bi bi-shield-fill-plus"></i>
                    </div>
                    <h3 class="mc-program-name">B.Sc Nursing</h3>
                    <p class="mc-program-duration"><i class="bi bi-clock"></i> 4 Years</p>
                </div>
                <div class="mc-card-body">
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-book-fill"></i> Tuition Fee</span>
                        <span class="mc-fee-amount">$6,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="fa-solid fa-flask"></i> Laboratory Fee</span>
                        <span class="mc-fee-amount">$1,200/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-hospital-fill"></i> Clinical Training</span>
                        <span class="mc-fee-amount">$1,800/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-file-text-fill"></i> Examination Fee</span>
                        <span class="mc-fee-amount">$500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-building-fill"></i> Development Fee</span>
                        <span class="mc-fee-amount">$300/year</span>
                    </div>
                    <div class="mc-fee-total">
                        <span class="mc-total-label">Total Annual Fee</span>
                        <span class="mc-total-amount">$9,800</span>
                    </div>
                </div>
            </div>

            <!-- Pharmacy Card -->
            <div class="mc-fee-card" data-animate="fade-up" data-delay="200" data-category="undergraduate">
                <div class="mc-card-header mc-pharmacy">
                    <div class="mc-program-icon">
                        <i class="bi bi-capsule"></i>
                    </div>
                    <h3 class="mc-program-name">B.Pharm</h3>
                    <p class="mc-program-duration"><i class="bi bi-clock"></i> 4 Years</p>
                </div>
                <div class="mc-card-body">
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-book-fill"></i> Tuition Fee</span>
                        <span class="mc-fee-amount">$7,500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="fa-solid fa-flask"></i> Laboratory Fee</span>
                        <span class="mc-fee-amount">$2,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-prescription2"></i> Pharmacy Practice</span>
                        <span class="mc-fee-amount">$1,500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-file-text-fill"></i> Examination Fee</span>
                        <span class="mc-fee-amount">$600/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-building-fill"></i> Development Fee</span>
                        <span class="mc-fee-amount">$400/year</span>
                    </div>
                    <div class="mc-fee-total">
                        <span class="mc-total-label">Total Annual Fee</span>
                        <span class="mc-total-amount">$12,000</span>
                    </div>
                </div>
            </div>

            <!-- Physiotherapy Card -->
            <div class="mc-fee-card" data-animate="fade-up" data-delay="300" data-category="undergraduate">
                <div class="mc-card-header mc-physio">
                    <div class="mc-program-icon">
                        <i class="bi bi-activity"></i>
                    </div>
                    <h3 class="mc-program-name">BPT (Physiotherapy)</h3>
                    <p class="mc-program-duration"><i class="bi bi-clock"></i> 4.5 Years</p>
                </div>
                <div class="mc-card-body">
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-book-fill"></i> Tuition Fee</span>
                        <span class="mc-fee-amount">$5,500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="fa-solid fa-flask"></i> Laboratory Fee</span>
                        <span class="mc-fee-amount">$1,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-hospital-fill"></i> Clinical Training</span>
                        <span class="mc-fee-amount">$1,500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-file-text-fill"></i> Examination Fee</span>
                        <span class="mc-fee-amount">$500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-building-fill"></i> Development Fee</span>
                        <span class="mc-fee-amount">$300/year</span>
                    </div>
                    <div class="mc-fee-total">
                        <span class="mc-total-label">Total Annual Fee</span>
                        <span class="mc-total-amount">$8,800</span>
                    </div>
                </div>
            </div>

            <!-- Dental Card -->
            <div class="mc-fee-card" data-animate="fade-up" data-delay="400" data-category="undergraduate">
                <div class="mc-card-header mc-dental">
                    <div class="mc-program-icon">
                        <i class="bi bi-emoji-smile-fill"></i>
                    </div>
                    <h3 class="mc-program-name">BDS (Dental Surgery)</h3>
                    <p class="mc-program-duration"><i class="bi bi-clock"></i> 5 Years + 1 Year Internship</p>
                </div>
                <div class="mc-card-body">
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-book-fill"></i> Tuition Fee</span>
                        <span class="mc-fee-amount">$12,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="fa-solid fa-flask"></i> Laboratory Fee</span>
                        <span class="mc-fee-amount">$2,200/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-hospital-fill"></i> Clinical Training</span>
                        <span class="mc-fee-amount">$2,800/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-file-text-fill"></i> Examination Fee</span>
                        <span class="mc-fee-amount">$700/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-building-fill"></i> Development Fee</span>
                        <span class="mc-fee-amount">$500/year</span>
                    </div>
                    <div class="mc-fee-total">
                        <span class="mc-total-label">Total Annual Fee</span>
                        <span class="mc-total-amount">$18,200</span>
                    </div>
                </div>
            </div>

            <!-- Medical Lab Technology Card -->
            <div class="mc-fee-card" data-animate="fade-up" data-delay="500" data-category="diploma">
                <div class="mc-card-header mc-lab">
                    <div class="mc-program-icon">
                        <i class="bi bi-droplet-fill"></i>
                    </div>
                    <h3 class="mc-program-name">B.Sc MLT</h3>
                    <p class="mc-program-duration"><i class="bi bi-clock"></i> 3 Years</p>
                </div>
                <div class="mc-card-body">
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-book-fill"></i> Tuition Fee</span>
                        <span class="mc-fee-amount">$4,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="fa-solid fa-flask"></i> Laboratory Fee</span>
                        <span class="mc-fee-amount">$1,500/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-hospital-fill"></i> Clinical Training</span>
                        <span class="mc-fee-amount">$1,000/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-file-text-fill"></i> Examination Fee</span>
                        <span class="mc-fee-amount">$400/year</span>
                    </div>
                    <div class="mc-fee-row">
                        <span class="mc-fee-label"><i class="bi bi-building-fill"></i> Development Fee</span>
                        <span class="mc-fee-amount">$250/year</span>
                    </div>
                    <div class="mc-fee-total">
                        <span class="mc-total-label">Total Annual Fee</span>
                        <span class="mc-total-amount">$7,150</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Fees Table Section -->
        <div class="mc-table-section" data-animate="fade-up">
            <div class="mc-section-header">
                <span class="mc-section-tag"><i class="bi bi-receipt"></i> Additional Charges</span>
                <br>
                <h2 class="mc-section-title">Additional Fees & Charges</h2>
                <p class="mc-section-desc">One-time and recurring charges applicable to all programs</p>
            </div>
            <div class="mc-table-wrapper">
                <table class="mc-data-table">
                    <thead>
                        <tr>
                            <th>Fee Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Frequency</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Admission Fee</strong></td>
                            <td>One-time registration and admission processing</td>
                            <td><strong>$1,500</strong></td>
                            <td><span class="mc-fee-badge mc-onetime"><i class="bi bi-check-circle-fill"></i>
                                    One-time</span></td>
                        </tr>
                        <tr>
                            <td><strong>Caution Deposit</strong></td>
                            <td>Refundable security deposit</td>
                            <td><strong>$500</strong></td>
                            <td><span class="mc-fee-badge mc-onetime"><i class="bi bi-arrow-counterclockwise"></i>
                                    Refundable</span></td>
                        </tr>
                        <tr>
                            <td><strong>Library Fee</strong></td>
                            <td>Access to digital and physical library resources</td>
                            <td><strong>$300</strong></td>
                            <td><span class="mc-fee-badge mc-mandatory"><i class="bi bi-arrow-repeat"></i> Per
                                    Year</span></td>
                        </tr>
                        <tr>
                            <td><strong>Insurance Premium</strong></td>
                            <td>Medical and accident insurance coverage</td>
                            <td><strong>$250</strong></td>
                            <td><span class="mc-fee-badge mc-mandatory"><i class="bi bi-arrow-repeat"></i> Per
                                    Year</span></td>
                        </tr>
                        <tr>
                            <td><strong>Sports & Activities</strong></td>
                            <td>Access to sports facilities and extracurricular activities</td>
                            <td><strong>$200</strong></td>
                            <td><span class="mc-fee-badge mc-optional"><i class="bi bi-hand-thumbs-up-fill"></i>
                                    Optional</span></td>
                        </tr>
                        <tr>
                            <td><strong>ID Card & Uniform</strong></td>
                            <td>Official ID card and medical uniform (coat, scrubs)</td>
                            <td><strong>$350</strong></td>
                            <td><span class="mc-fee-badge mc-onetime"><i class="bi bi-check-circle-fill"></i>
                                    One-time</span></td>
                        </tr>
                        <tr>
                            <td><strong>Technology Fee</strong></td>
                            <td>Access to e-learning platforms and digital resources</td>
                            <td><strong>$400</strong></td>
                            <td><span class="mc-fee-badge mc-mandatory"><i class="bi bi-arrow-repeat"></i> Per
                                    Year</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Hostel Section -->
        <section class="mc-hostel-section">
            <div class="mc-section-header" data-animate="fade-up">
                <span class="mc-section-tag"><i class="bi bi-house-heart-fill"></i> Accommodation</span>
                <br>
                <h2 class="mc-section-title">Hostel Accommodation</h2>
                <p class="mc-section-desc">Comfortable and secure on-campus living options for students</p>
            </div>
            <div class="mc-hostel-grid">
                <div class="mc-hostel-card" data-animate="fade-up">
                    <div class="mc-hostel-header">
                        <span class="mc-hostel-type">Single Room</span>
                        <div class="mc-hostel-price">
                            <span class="mc-amount">$3,600</span>
                            <span class="mc-period">per year</span>
                        </div>
                    </div>
                    <div class="mc-hostel-features">
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Private Room</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Attached Bathroom</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Air Conditioning</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Study Table & Chair</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> High-speed WiFi</div>
                    </div>
                </div>

                <div class="mc-hostel-card mc-featured" data-animate="fade-up" data-delay="100">
                    <div class="mc-hostel-header">
                        <span class="mc-hostel-type">Double Sharing</span>
                        <div class="mc-hostel-price">
                            <span class="mc-amount">$2,400</span>
                            <span class="mc-period">per year</span>
                        </div>
                    </div>
                    <div class="mc-hostel-features">
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Shared Room (2 Students)
                        </div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Common Bathroom</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Ceiling Fan & AC Option
                        </div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Study Table & Chair</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> High-speed WiFi</div>
                    </div>
                </div>

                <div class="mc-hostel-card" data-animate="fade-up" data-delay="200">
                    <div class="mc-hostel-header">
                        <span class="mc-hostel-type">Triple Sharing</span>
                        <div class="mc-hostel-price">
                            <span class="mc-amount">$1,800</span>
                            <span class="mc-period">per year</span>
                        </div>
                    </div>
                    <div class="mc-hostel-features">
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Shared Room (3 Students)
                        </div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Common Bathroom</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Ceiling Fan</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Study Table & Chair</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Basic WiFi</div>
                    </div>
                </div>

                <div class="mc-hostel-card" data-animate="fade-up" data-delay="300">
                    <div class="mc-hostel-header">
                        <span class="mc-hostel-type">Mess (Food Plan)</span>
                        <div class="mc-hostel-price">
                            <span class="mc-amount">$1,500</span>
                            <span class="mc-period">per year</span>
                        </div>
                    </div>
                    <div class="mc-hostel-features">
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Breakfast, Lunch & Dinner
                        </div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Veg & Non-Veg Options
                        </div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Sunday Special Menu</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Evening Snacks</div>
                        <div class="mc-hostel-feature"><i class="bi bi-check-circle-fill"></i> Hygienic Kitchen</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Payment Section -->
        <section class="mc-payment-section" data-animate="scale-up">
            <div class="mc-payment-content">
                <h2 class="mc-payment-title"><i class="bi bi-credit-card-2-front-fill"></i> Flexible Payment Options
                </h2>
                <div class="mc-payment-grid">
                    <div class="mc-payment-card">
                        <div class="mc-payment-icon"><i class="bi bi-credit-card-fill"></i></div>
                        <h4>Online Payment</h4>
                        <p>Pay securely via credit/debit cards through our payment portal</p>
                    </div>
                    <div class="mc-payment-card">
                        <div class="mc-payment-icon"><i class="bi bi-bank2"></i></div>
                        <h4>Bank Transfer</h4>
                        <p>Direct bank transfer to university account with NEFT/RTGS</p>
                    </div>
                    <div class="mc-payment-card">
                        <div class="mc-payment-icon"><i class="bi bi-calendar3"></i></div>
                        <h4>EMI Options</h4>
                        <p>Easy monthly installments with 0% interest for up to 12 months</p>
                    </div>
                    <div class="mc-payment-card">
                        <div class="mc-payment-icon"><i class="bi bi-wallet2"></i></div>
                        <h4>Education Loan</h4>
                        <p>Tie-ups with leading banks for hassle-free education loans</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Scholarships Section -->
        <section class="mc-scholarship-section">
            <div class="mc-section-header" data-animate="fade-up">
                <span class="mc-section-tag"><i class="bi bi-trophy-fill"></i> Financial Aid</span>
                <br>
                <h2 class="mc-section-title">Scholarships & Financial Aid</h2>
                <p class="mc-section-desc">We believe financial constraints shouldn't limit your dreams of becoming a
                    healthcare professional</p>
            </div>
            <div class="mc-scholarship-grid">
                <div class="mc-scholarship-card mc-gold" data-animate="slide-right">
                    <span class="mc-discount-tag">100% OFF</span>
                    <h4 class="mc-scholarship-title">Merit Excellence Scholarship</h4>
                    <p class="mc-scholarship-desc">Full tuition waiver for exceptional academic performers</p>
                    <ul class="mc-criteria-list">
                        <li><i class="bi bi-check-circle-fill"></i> 95%+ in qualifying examination</li>
                        <li><i class="bi bi-check-circle-fill"></i> Top 100 rank in entrance exam</li>
                        <li><i class="bi bi-check-circle-fill"></i> Maintain 85%+ CGPA</li>
                    </ul>
                </div>
                <div class="mc-scholarship-card mc-silver" data-animate="slide-right" data-delay="100">
                    <span class="mc-discount-tag">50% OFF</span>
                    <h4 class="mc-scholarship-title">Academic Achievement Award</h4>
                    <p class="mc-scholarship-desc">Half tuition waiver for high academic performers</p>
                    <ul class="mc-criteria-list">
                        <li><i class="bi bi-check-circle-fill"></i> 85%+ in qualifying examination</li>
                        <li><i class="bi bi-check-circle-fill"></i> Top 500 rank in entrance exam</li>
                        <li><i class="bi bi-check-circle-fill"></i> Maintain 75%+ CGPA</li>
                    </ul>
                </div>
                <div class="mc-scholarship-card mc-bronze" data-animate="slide-right" data-delay="200">
                    <span class="mc-discount-tag">25% OFF</span>
                    <h4 class="mc-scholarship-title">Need-Based Scholarship</h4>
                    <p class="mc-scholarship-desc">Financial assistance for economically disadvantaged students</p>
                    <ul class="mc-criteria-list">
                        <li><i class="bi bi-check-circle-fill"></i> Family income below threshold</li>
                        <li><i class="bi bi-check-circle-fill"></i> Valid income certificate</li>
                        <li><i class="bi bi-check-circle-fill"></i> Maintain 70%+ CGPA</li>
                    </ul>
                </div>
                <div class="mc-scholarship-card" data-animate="slide-right" data-delay="300">
                    <span class="mc-discount-tag">40% OFF</span>
                    <h4 class="mc-scholarship-title">Sports Quota Scholarship</h4>
                    <p class="mc-scholarship-desc">For students with exceptional sports achievements</p>
                    <ul class="mc-criteria-list">
                        <li><i class="bi bi-check-circle-fill"></i> National/State level representation</li>
                        <li><i class="bi bi-check-circle-fill"></i> Certified by sports authority</li>
                        <li><i class="bi bi-check-circle-fill"></i> Continue sports participation</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="mc-faq-section">
            <div class="mc-section-header" data-animate="fade-up">
                <span class="mc-section-tag"><i class="bi bi-question-circle-fill"></i> FAQs</span>
                <br>
                <h2 class="mc-section-title">Frequently Asked Questions</h2>
                <p class="mc-section-desc">Find answers to common queries about fees and payments</p>
            </div>
            <div class="mc-faq-container">
                <div class="mc-faq-item" data-animate="fade-up">
                    <div class="mc-faq-question">
                        <h4><span class="mc-q-icon">Q</span> When is the fee payment deadline?</h4>
                        <div class="mc-faq-toggle"><i class="bi bi-chevron-down"></i></div>
                    </div>
                    <div class="mc-faq-answer">
                        <div class="mc-faq-answer-inner">
                            Fee payment for each semester must be completed within 15 days from the start of the
                            academic session. Late payment will attract a fine of $50 per week. For EMI payments, the
                            first installment must be paid before the session begins.
                        </div>
                    </div>
                </div>
                <div class="mc-faq-item" data-animate="fade-up" data-delay="50">
                    <div class="mc-faq-question">
                        <h4><span class="mc-q-icon">Q</span> Is the caution deposit refundable?</h4>
                        <div class="mc-faq-toggle"><i class="bi bi-chevron-down"></i></div>
                    </div>
                    <div class="mc-faq-answer">
                        <div class="mc-faq-answer-inner">
                            Yes, the caution deposit of $500 is fully refundable upon completion of the program,
                            provided there are no dues pending and no damage to university property. The refund is
                            processed within 60 days of graduation.
                        </div>
                    </div>
                </div>
                <div class="mc-faq-item" data-animate="fade-up" data-delay="100">
                    <div class="mc-faq-question">
                        <h4><span class="mc-q-icon">Q</span> Can I pay fees in installments?</h4>
                        <div class="mc-faq-toggle"><i class="bi bi-chevron-down"></i></div>
                    </div>
                    <div class="mc-faq-answer">
                        <div class="mc-faq-answer-inner">
                            Yes, we offer flexible EMI options. You can pay your annual fee in 2, 4, or 12 monthly
                            installments. The 12-month EMI option is available at 0% interest through our partner banks.
                            Contact the accounts office for more details.
                        </div>
                    </div>
                </div>
                <div class="mc-faq-item" data-animate="fade-up" data-delay="150">
                    <div class="mc-faq-question">
                        <h4><span class="mc-q-icon">Q</span> What is the refund policy if I withdraw?</h4>
                        <div class="mc-faq-toggle"><i class="bi bi-chevron-down"></i></div>
                    </div>
                    <div class="mc-faq-answer">
                        <div class="mc-faq-answer-inner">
                            Refund policy: 100% refund (minus admission fee) if withdrawn before classes begin; 75%
                            refund within first 2 weeks; 50% refund within first month; No refund after 30 days from the
                            start of the session.
                        </div>
                    </div>
                </div>
                <div class="mc-faq-item" data-animate="fade-up" data-delay="200">
                    <div class="mc-faq-question">
                        <h4><span class="mc-q-icon">Q</span> Are there any hidden charges?</h4>
                        <div class="mc-faq-toggle"><i class="bi bi-chevron-down"></i></div>
                    </div>
                    <div class="mc-faq-answer">
                        <div class="mc-faq-answer-inner">
                            No, all fees are transparently listed on this page. The only additional costs you might
                            incur are for optional services like premium hostel rooms, extra sports activities, or
                            personal equipment not included in the standard package.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="mc-cta-section" data-animate="fade-up">
            <div class="mc-cta-content">
                <h3 class="mc-cta-title">Need More Information?</h3>
                <p class="mc-cta-desc">Our admissions team is here to help you with any questions about fees,
                    scholarships, or payment options.</p>
                <div class="mc-cta-buttons">
                    <button class="mc-cta-btn mc-primary-btn">
                        <i class="bi bi-telephone-fill"></i> Call Us Now
                    </button>
                    <button class="mc-cta-btn mc-secondary-btn">
                        <i class="bi bi-envelope-fill"></i> Send Email
                    </button>
                </div>
            </div>
        </section>

        <!-- Download Bar -->
        <div class="mc-download-bar" data-animate="fade-up">
            <div class="mc-download-info">
                <div class="mc-download-icon">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>
                <div class="mc-download-text">
                    <h4>Download Complete Fee Structure</h4>
                    <p>Get the detailed PDF document with all fee information for academic year 2024-2025</p>
                </div>
            </div>
            <button class="mc-download-btn">
                <i class="bi bi-download"></i> Download PDF
            </button>
        </div>
    </main>
    

    <script>
        // ========== INTERSECTION OBSERVER FOR ANIMATIONS ==========
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15
        };

        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => {
                        entry.target.classList.add('mc-visible');
                    }, delay);
                    animationObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all animatable elements
        document.querySelectorAll('[data-animate]').forEach(el => {
            animationObserver.observe(el);
        });

        // Observe fee cards, hostel cards, scholarship cards
        document.querySelectorAll('.mc-fee-card, .mc-hostel-card, .mc-scholarship-card, .mc-faq-item, .mc-table-section, .mc-payment-section, .mc-cta-section, .mc-download-bar, .mc-alert-notice, .mc-section-header, .mc-program-tabs').forEach(el => {
            animationObserver.observe(el);
        });

        // ========== COUNTER ANIMATION ==========
        function animateCounter(element, target, suffix = '') {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + suffix;
            }, 30);
        }

        // Start counter animation when stats are visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.mc-stat-number');
                    counters.forEach(counter => {
                        const target = parseInt(counter.dataset.count);
                        const suffix = counter.dataset.suffix || '';
                        animateCounter(counter, target, suffix);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statsObserver.observe(document.querySelector('.mc-stats-row'));

        // ========== FAQ ACCORDION ==========
        const faqItems = document.querySelectorAll('.mc-faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.mc-faq-question');
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('mc-active');

                // Close all FAQ items with smooth animation
                faqItems.forEach(faq => {
                    faq.classList.remove('mc-active');
                });

                // Open clicked item if it wasn't active
                if (!isActive) {
                    item.classList.add('mc-active');
                }
            });
        });

        // ========== PROGRAM TABS FILTER ==========
        const tabBtns = document.querySelectorAll('.mc-tab-btn');
        const feeCards = document.querySelectorAll('.mc-fee-card');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active tab
                tabBtns.forEach(b => b.classList.remove('mc-active'));
                btn.classList.add('mc-active');

                const filter = btn.dataset.filter;

                // Filter cards with animation
                feeCards.forEach((card, index) => {
                    const category = card.dataset.category;

                    if (filter === 'all' || category === filter) {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(30px) scale(0.95)';

                        setTimeout(() => {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0) scale(1)';
                            }, 50 + (index * 100));
                        }, 200);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(30px) scale(0.95)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // ========== SMOOTH SCROLL ENHANCEMENT ==========
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // ========== PARALLAX EFFECT ON HERO ==========
        window.addEventListener('scroll', () => {
            const hero = document.querySelector('.mc-hero-banner');
            const scrolled = window.pageYOffset;

            if (hero && scrolled < hero.offsetHeight) {
                hero.style.backgroundPositionY = scrolled * 0.5 + 'px';
            }
        });

        // ========== FLOATING ICONS RANDOM POSITIONING ==========
        document.querySelectorAll('.mc-floating-icon').forEach((icon, index) => {
            icon.style.animationDuration = (12 + Math.random() * 8) + 's';
            icon.style.animationDelay = (index * 2) + 's';
            icon.style.left = (Math.random() * 90 + 5) + '%';
        });

        // ========== BUTTON RIPPLE EFFECT ==========
        document.querySelectorAll('.mc-cta-btn, .mc-download-btn, .mc-tab-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const ripple = document.createElement('span');
                ripple.style.cssText = `
                    position: absolute;
                    background: rgba(255,255,255,0.4);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                    left: ${x}px;
                    top: ${y}px;
                    width: 100px;
                    height: 100px;
                    margin-left: -50px;
                    margin-top: -50px;
                `;

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // ========== TABLE ROW HOVER ANIMATION ==========
        document.querySelectorAll('.mc-data-table tbody tr').forEach((row, index) => {
            row.style.transitionDelay = (index * 0.05) + 's';
        });

        // ========== CARD TILT EFFECT ON HOVER ==========
        document.querySelectorAll('.mc-fee-card, .mc-hostel-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-12px) scale(1.02)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0) scale(1)';
            });
        });

        // ========== SCROLL PROGRESS INDICATOR ==========
        const progressBar = document.createElement('div');
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--mc-secondary), var(--mc-accent));
            z-index: 9999;
            transition: width 0.1s ease;
            width: 0%;
        `;
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            progressBar.style.width = scrollPercent + '%';
        });
    </script>

    @endsection


    @push('page-scripts')
    <script src="{{ asset('js/pages/fee-structure.js') }}"></script>

@endpush