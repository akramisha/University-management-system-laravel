@extends('base')
@section('title', 'Medical Library | MediCare University')
@push('page-styles')
    <link rel="stylesheet" href="{{ asset('css/pages/medical-library.css') }}">

@endpush

@section('content')
<br>
<br>
    <!-- IMMERSIVE HERO -->
    <section class="lb-immersive-hero">
        <div class="lb-hero-pattern"></div>
        <div class="lb-floating-books">
            <i class="bi bi-book-half lb-float-book"></i>
            <i class="bi bi-journal-medical lb-float-book"></i>
            <i class="bi bi-book lb-float-book"></i>
            <i class="bi bi-journals lb-float-book"></i>
            <i class="bi bi-bookmark-star lb-float-book"></i>
        </div>

        <div class="lb-hero-content">
            <div class="lb-hero-icon-wrap">
                <div class="lb-hero-icon">
                    <i class="bi bi-building-fill-check"></i>
                </div>
            </div>
            <h1 class="lb-hero-title">
                MediCare <span>Library</span>
            </h1>
            <p class="lb-hero-subtitle">
                Explore our extensive collection of medical literature, research journals, and digital resources to
                support your academic journey.
            </p>

            <div class="lb-search-container">
                <div class="lb-search-box">
                    <div class="lb-search-input-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" class="lb-search-input" placeholder="Search books, journals, articles...">
                    </div>
                    <select class="lb-search-select">
                        <option value="all">All Resources</option>
                        <option value="books">Books</option>
                        <option value="journals">Journals</option>
                        <option value="articles">Articles</option>
                        <option value="ebooks">E-Books</option>
                    </select>
                    <button class="lb-search-btn">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>

                <div class="lb-quick-filters">
                    <button class="lb-filter-chip lb-active">
                        <i class="bi bi-fire"></i> Popular
                    </button>
                    <button class="lb-filter-chip">
                        <i class="bi bi-clock-history"></i> Recent
                    </button>
                    <button class="lb-filter-chip">
                        <i class="bi bi-journal-medical"></i> Medical
                    </button>
                    <button class="lb-filter-chip">
                        <i class="bi bi-capsule"></i> Pharmacy
                    </button>
                    <button class="lb-filter-chip">
                        <i class="bi bi-heart-pulse"></i> Nursing
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- BREADCRUMB -->
    <div class="lb-breadcrumb">
        <div class="lb-breadcrumb-wrap">
            <a href="{{route('home')}}" class="lb-crumb"><i class="bi bi-house-fill"></i> Home</a>
            <span class="lb-crumb-divider"><i class="bi bi-chevron-right"></i></span>
            <a href="{{route('medical-library')}}" class="lb-crumb">Resources</a>
            <span class="lb-crumb-divider"><i class="bi bi-chevron-right"></i></span>
            <span class="lb-crumb-active">Library</span>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="lb-main-content">

        <!-- STATISTICS BANNER -->
        <section class="lb-stats-banner">
            <div class="lb-stat-block" data-animate data-delay="0">
                <div class="lb-stat-icon"><i class="bi bi-book-fill"></i></div>
                <div class="lb-stat-number" data-count="125000">0</div>
                <div class="lb-stat-label">Print Books</div>
            </div>
            <div class="lb-stat-block" data-animate data-delay="100">
                <div class="lb-stat-icon"><i class="bi bi-laptop-fill"></i></div>
                <div class="lb-stat-number" data-count="50000">0</div>
                <div class="lb-stat-label">E-Books</div>
            </div>
            <div class="lb-stat-block" data-animate data-delay="200">
                <div class="lb-stat-icon"><i class="bi bi-journal-text"></i></div>
                <div class="lb-stat-number" data-count="8500">0</div>
                <div class="lb-stat-label">Journals</div>
            </div>
            <div class="lb-stat-block" data-animate data-delay="300">
                <div class="lb-stat-icon"><i class="bi bi-database-fill"></i></div>
                <div class="lb-stat-number" data-count="45">0</div>
                <div class="lb-stat-label">Databases</div>
            </div>
            <div class="lb-stat-block" data-animate data-delay="400">
                <div class="lb-stat-icon"><i class="bi bi-people-fill"></i></div>
                <div class="lb-stat-number" data-count="2500">0</div>
                <div class="lb-stat-label">Seats Available</div>
            </div>
        </section>

        <!-- COLLECTION CATEGORIES -->
        <section class="lb-collections-section">
            <div class="lb-section-header">
                <div class="lb-section-badge">
                    <i class="bi bi-collection-fill"></i>
                    Browse Collections
                </div>
                <h2 class="lb-section-title">Explore Our Collections</h2>
                <p class="lb-section-desc">Discover specialized medical literature organized by subject areas</p>
            </div>

            <div class="lb-collection-grid">
                <div class="lb-collection-card lb-featured" data-animate data-delay="0">
                    <div class="lb-collection-bg"><i class="bi bi-clipboard2-pulse"></i></div>
                    <div class="lb-collection-content">
                        <div class="lb-collection-icon"><i class="bi bi-clipboard2-pulse-fill"></i></div>
                        <h3 class="lb-collection-name">Clinical Medicine</h3>
                        <p class="lb-collection-count"><i class="bi bi-book"></i> 35,000+ Resources</p>
                    </div>
                    <div class="lb-collection-arrow"><i class="bi bi-arrow-right"></i></div>
                </div>

                <div class="lb-collection-card" data-animate data-delay="100">
                    <div class="lb-collection-bg"><i class="bi bi-heart-pulse"></i></div>
                    <div class="lb-collection-content">
                        <div class="lb-collection-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                        <h3 class="lb-collection-name">Anatomy & Physiology</h3>
                        <p class="lb-collection-count"><i class="bi bi-book"></i> 18,500+ Resources</p>
                    </div>
                    <div class="lb-collection-arrow"><i class="bi bi-arrow-right"></i></div>
                </div>

                <div class="lb-collection-card" data-animate data-delay="200">
                    <div class="lb-collection-bg"><i class="bi bi-capsule"></i></div>
                    <div class="lb-collection-content">
                        <div class="lb-collection-icon"><i class="bi bi-capsule"></i></div>
                        <h3 class="lb-collection-name">Pharmacology</h3>
                        <p class="lb-collection-count"><i class="bi bi-book"></i> 12,300+ Resources</p>
                    </div>
                    <div class="lb-collection-arrow"><i class="bi bi-arrow-right"></i></div>
                </div>

                <div class="lb-collection-card lb-wide" data-animate data-delay="300">
                    <div class="lb-collection-bg"><i class="bi bi-virus"></i></div>
                    <div class="lb-collection-content">
                        <div class="lb-collection-icon"><i class="bi bi-virus2"></i></div>
                        <h3 class="lb-collection-name">Microbiology & Pathology</h3>
                        <p class="lb-collection-count"><i class="bi bi-book"></i> 22,800+ Resources</p>
                    </div>
                    <div class="lb-collection-arrow"><i class="bi bi-arrow-right"></i></div>
                </div>

                <div class="lb-collection-card" data-animate data-delay="400">
                    <div class="lb-collection-bg"><i class="bi bi-activity"></i></div>
                    <div class="lb-collection-content">
                        <div class="lb-collection-icon"><i class="bi bi-activity"></i></div>
                        <h3 class="lb-collection-name">Nursing Sciences</h3>
                        <p class="lb-collection-count"><i class="bi bi-book"></i> 15,600+ Resources</p>
                    </div>
                    <div class="lb-collection-arrow"><i class="bi bi-arrow-right"></i></div>
                </div>

                <div class="lb-collection-card" data-animate data-delay="500">
                    <div class="lb-collection-bg"><i class="bi bi-graph-up-arrow"></i></div>
                    <div class="lb-collection-content">
                        <div class="lb-collection-icon"><i class="bi bi-graph-up-arrow"></i></div>
                        <h3 class="lb-collection-name">Research & Thesis</h3>
                        <p class="lb-collection-count"><i class="bi bi-book"></i> 8,900+ Resources</p>
                    </div>
                    <div class="lb-collection-arrow"><i class="bi bi-arrow-right"></i></div>
                </div>
            </div>
        </section>

        <!-- FEATURED BOOKS -->
        <section class="lb-books-section">
            <div class="lb-section-header">
                <div class="lb-section-badge">
                    <i class="bi bi-star-fill"></i>
                    Featured Books
                </div>
                <h2 class="lb-section-title">New Arrivals & Popular</h2>
                <p class="lb-section-desc">Latest additions to our collection - hover to see details</p>
            </div>

            <div class="lb-books-carousel">
                <div class="lb-book-card">
                    <div class="lb-book-inner">
                        <div class="lb-book-front">
                            <div class="lb-book-spine"></div>
                            <div class="lb-book-cover">
                                <span class="lb-book-category">Medicine</span>
                                <h3 class="lb-book-title">Harrison's Principles of Internal Medicine</h3>
                                <p class="lb-book-author">by J. Larry Jameson</p>
                            </div>
                            <div class="lb-book-decoration">
                                <div class="lb-book-icon"><i class="bi bi-bookmark-heart-fill"></i></div>
                            </div>
                        </div>
                        <div class="lb-book-back">
                            <h4 class="lb-back-title">Harrison's Principles of Internal Medicine</h4>
                            <p class="lb-back-desc">The definitive guide to internal medicine, now in its 21st edition
                                with comprehensive updates on diagnostics and treatment protocols.</p>
                            <div class="lb-back-meta">
                                <div class="lb-meta-row"><i class="bi bi-calendar3"></i> Published: 2022</div>
                                <div class="lb-meta-row"><i class="bi bi-bookmark"></i> ISBN: 978-1264268504</div>
                                <div class="lb-meta-row"><i class="bi bi-check-circle-fill"></i> Available: 5 copies
                                </div>
                            </div>
                            <div class="lb-back-actions">
                                <button class="lb-action-btn lb-primary-btn"><i class="bi bi-bookmark-plus"></i>
                                    Reserve</button>
                                <button class="lb-action-btn lb-secondary-btn"><i class="bi bi-eye"></i>
                                    Preview</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lb-book-card">
                    <div class="lb-book-inner">
                        <div class="lb-book-front" style="background: linear-gradient(145deg, #00838f, #006064);">
                            <div class="lb-book-spine"></div>
                            <div class="lb-book-cover">
                                <span class="lb-book-category">Anatomy</span>
                                <h3 class="lb-book-title">Gray's Anatomy for Students</h3>
                                <p class="lb-book-author">by Richard Drake</p>
                            </div>
                            <div class="lb-book-decoration">
                                <div class="lb-book-icon"><i class="bi bi-person-lines-fill"></i></div>
                            </div>
                        </div>
                        <div class="lb-book-back">
                            <h4 class="lb-back-title">Gray's Anatomy for Students</h4>
                            <p class="lb-back-desc">Clinical anatomy text with detailed illustrations and clinical
                                correlations designed specifically for medical students.</p>
                            <div class="lb-back-meta">
                                <div class="lb-meta-row"><i class="bi bi-calendar3"></i> Published: 2023</div>
                                <div class="lb-meta-row"><i class="bi bi-bookmark"></i> ISBN: 978-0323393041</div>
                                <div class="lb-meta-row"><i class="bi bi-check-circle-fill"></i> Available: 8 copies
                                </div>
                            </div>
                            <div class="lb-back-actions">
                                <button class="lb-action-btn lb-primary-btn"><i class="bi bi-bookmark-plus"></i>
                                    Reserve</button>
                                <button class="lb-action-btn lb-secondary-btn"><i class="bi bi-eye"></i>
                                    Preview</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lb-book-card">
                    <div class="lb-book-inner">
                        <div class="lb-book-front" style="background: linear-gradient(145deg, #00897b, #00695c);">
                            <div class="lb-book-spine"></div>
                            <div class="lb-book-cover">
                                <span class="lb-book-category">Pharmacology</span>
                                <h3 class="lb-book-title">Goodman & Gilman's Pharmacological Basis</h3>
                                <p class="lb-book-author">by Laurence Brunton</p>
                            </div>
                            <div class="lb-book-decoration">
                                <div class="lb-book-icon"><i class="bi bi-prescription2"></i></div>
                            </div>
                        </div>
                        <div class="lb-book-back">
                            <h4 class="lb-back-title">Pharmacological Basis of Therapeutics</h4>
                            <p class="lb-back-desc">The gold standard pharmacology textbook with comprehensive drug
                                information and therapeutic applications.</p>
                            <div class="lb-back-meta">
                                <div class="lb-meta-row"><i class="bi bi-calendar3"></i> Published: 2023</div>
                                <div class="lb-meta-row"><i class="bi bi-bookmark"></i> ISBN: 978-1264258079</div>
                                <div class="lb-meta-row"><i class="bi bi-check-circle-fill"></i> Available: 3 copies
                                </div>
                            </div>
                            <div class="lb-back-actions">
                                <button class="lb-action-btn lb-primary-btn"><i class="bi bi-bookmark-plus"></i>
                                    Reserve</button>
                                <button class="lb-action-btn lb-secondary-btn"><i class="bi bi-eye"></i>
                                    Preview</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lb-book-card">
                    <div class="lb-book-inner">
                        <div class="lb-book-front" style="background: linear-gradient(145deg, #0097a7, #00838f);">
                            <div class="lb-book-spine"></div>
                            <div class="lb-book-cover">
                                <span class="lb-book-category">Pathology</span>
                                <h3 class="lb-book-title">Robbins Basic Pathology</h3>
                                <p class="lb-book-author">by Vinay Kumar</p>
                            </div>
                            <div class="lb-book-decoration">
                                <div class="lb-book-icon"><i class="bi bi-lungs-fill"></i></div>
                            </div>
                        </div>
                        <div class="lb-book-back">
                            <h4 class="lb-back-title">Robbins Basic Pathology</h4>
                            <p class="lb-back-desc">Essential pathology concepts with beautiful illustrations and
                                clinical correlations for medical students.</p>
                            <div class="lb-back-meta">
                                <div class="lb-meta-row"><i class="bi bi-calendar3"></i> Published: 2022</div>
                                <div class="lb-meta-row"><i class="bi bi-bookmark"></i> ISBN: 978-0323353175</div>
                                <div class="lb-meta-row"><i class="bi bi-check-circle-fill"></i> Available: 6 copies
                                </div>
                            </div>
                            <div class="lb-back-actions">
                                <button class="lb-action-btn lb-primary-btn"><i class="bi bi-bookmark-plus"></i>
                                    Reserve</button>
                                <button class="lb-action-btn lb-secondary-btn"><i class="bi bi-eye"></i>
                                    Preview</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lb-book-card">
                    <div class="lb-book-inner">
                        <div class="lb-book-front" style="background: linear-gradient(145deg, #26a69a, #00897b);">
                            <div class="lb-book-spine"></div>
                            <div class="lb-book-cover">
                                <span class="lb-book-category">Surgery</span>
                                <h3 class="lb-book-title">Schwartz's Principles of Surgery</h3>
                                <p class="lb-book-author">by F. Charles Brunicardi</p>
                            </div>
                            <div class="lb-book-decoration">
                                <div class="lb-book-icon"><i class="bi bi-bandaid-fill"></i></div>
                            </div>
                        </div>
                        <div class="lb-book-back">
                            <h4 class="lb-back-title">Schwartz's Principles of Surgery</h4>
                            <p class="lb-back-desc">Comprehensive surgical textbook covering all major surgical
                                specialties with evidence-based approaches.</p>
                            <div class="lb-back-meta">
                                <div class="lb-meta-row"><i class="bi bi-calendar3"></i> Published: 2024</div>
                                <div class="lb-meta-row"><i class="bi bi-bookmark"></i> ISBN: 978-1264258192</div>
                                <div class="lb-meta-row"><i class="bi bi-check-circle-fill"></i> Available: 4 copies
                                </div>
                            </div>
                            <div class="lb-back-actions">
                                <button class="lb-action-btn lb-primary-btn"><i class="bi bi-bookmark-plus"></i>
                                    Reserve</button>
                                <button class="lb-action-btn lb-secondary-btn"><i class="bi bi-eye"></i>
                                    Preview</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- E-RESOURCES -->
        <section class="lb-resources-section">
            <div class="lb-section-header">
                <div class="lb-section-badge">
                    <i class="bi bi-globe"></i>
                    Digital Resources
                </div>
                <h2 class="lb-section-title">E-Resources & Databases</h2>
                <p class="lb-section-desc">Access world-class medical databases and digital resources</p>
            </div>

            <div class="lb-resources-grid">
                <div class="lb-resource-card" data-animate data-delay="0">
                    <div class="lb-resource-content">
                        <div class="lb-resource-icon"><i class="bi bi-journal-medical"></i></div>
                        <h3 class="lb-resource-name">PubMed Central</h3>
                        <p class="lb-resource-desc">Access millions of biomedical and life sciences journal articles
                            through the NIH's free digital archive.</p>
                        <a href="#" class="lb-resource-link">Access Database <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="lb-resource-card" data-animate data-delay="100">
                    <div class="lb-resource-content">
                        <div class="lb-resource-icon"><i class="bi bi-file-earmark-medical"></i></div>
                        <h3 class="lb-resource-name">UpToDate</h3>
                        <p class="lb-resource-desc">Evidence-based clinical decision support resource trusted by
                            healthcare professionals worldwide.</p>
                        <a href="#" class="lb-resource-link">Access Database <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="lb-resource-card" data-animate data-delay="200">
                    <div class="lb-resource-content">
                        <div class="lb-resource-icon"><i class="bi bi-search"></i></div>
                        <h3 class="lb-resource-name">MEDLINE</h3>
                        <p class="lb-resource-desc">Premier bibliographic database of life sciences and biomedical
                            information from the NLM.</p>
                        <a href="#" class="lb-resource-link">Access Database <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="lb-resource-card" data-animate data-delay="300">
                    <div class="lb-resource-content">
                        <div class="lb-resource-icon"><i class="bi bi-collection-play-fill"></i></div>
                        <h3 class="lb-resource-name">ClinicalKey</h3>
                        <p class="lb-resource-desc">Clinical insight engine providing trusted medical and surgical
                            content for healthcare professionals.</p>
                        <a href="#" class="lb-resource-link">Access Database <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="lb-resource-card" data-animate data-delay="400">
                    <div class="lb-resource-content">
                        <div class="lb-resource-icon"><i class="bi bi-book-half"></i></div>
                        <h3 class="lb-resource-name">Cochrane Library</h3>
                        <p class="lb-resource-desc">High-quality evidence for health care decision-making through
                            systematic reviews.</p>
                        <a href="#" class="lb-resource-link">Access Database <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="lb-resource-card" data-animate data-delay="500">
                    <div class="lb-resource-content">
                        <div class="lb-resource-icon"><i class="bi bi-camera-video-fill"></i></div>
                        <h3 class="lb-resource-name">AccessMedicine</h3>
                        <p class="lb-resource-desc">Complete collection of medical texts, multimedia, cases, and
                            self-assessment tools.</p>
                        <a href="#" class="lb-resource-link">Access Database <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- STUDY SPACES -->
        <section class="lb-spaces-section">
            <div class="lb-spaces-wrapper">
                <div class="lb-spaces-content">
                    <div class="lb-spaces-header">
                        <h2 class="lb-spaces-title"><i class="bi bi-door-open-fill"></i> Study Spaces</h2>
                        <p class="lb-spaces-subtitle">Find the perfect environment for your study needs</p>
                    </div>

                    <div class="lb-spaces-grid">
                        <div class="lb-space-card" data-animate data-delay="0">
                            <div class="lb-space-icon"><i class="bi bi-person-workspace"></i></div>
                            <h4 class="lb-space-name">Individual Study Pods</h4>
                            <p class="lb-space-capacity">50 pods available</p>
                            <span class="lb-space-status lb-available">Available</span>
                        </div>

                        <div class="lb-space-card" data-animate data-delay="100">
                            <div class="lb-space-icon"><i class="bi bi-people-fill"></i></div>
                            <h4 class="lb-space-name">Group Discussion Rooms</h4>
                            <p class="lb-space-capacity">20 rooms (4-8 persons)</p>
                            <span class="lb-space-status lb-limited">Limited</span>
                        </div>

                        <div class="lb-space-card" data-animate data-delay="200">
                            <div class="lb-space-icon"><i class="bi bi-mic-fill"></i></div>
                            <h4 class="lb-space-name">Presentation Rooms</h4>
                            <p class="lb-space-capacity">10 rooms with AV</p>
                            <span class="lb-space-status lb-available">Available</span>
                        </div>

                        <div class="lb-space-card" data-animate data-delay="300">
                            <div class="lb-space-icon"><i class="bi bi-pc-display"></i></div>
                            <h4 class="lb-space-name">Computer Lab</h4>
                            <p class="lb-space-capacity">100 workstations</p>
                            <span class="lb-space-status lb-full">Full</span>
                        </div>
                    </div>

                    <div class="lb-book-space-btn">
                        <button class="lb-book-btn">
                            <i class="bi bi-calendar-plus-fill"></i>
                            Book a Study Space
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- LIBRARY HOURS -->
        <section class="lb-hours-section">
            <div class="lb-section-header">
                <div class="lb-section-badge">
                    <i class="bi bi-clock-fill"></i>
                    Opening Hours
                </div>
                <h2 class="lb-section-title">Library Hours</h2>
                <p class="lb-section-desc">Plan your visit with our operating schedule</p>
            </div>

            <div class="lb-hours-grid">
                <div class="lb-hours-card" data-animate>
                    <div class="lb-hours-header">
                        <div class="lb-hours-icon"><i class="bi bi-building-fill"></i></div>
                        <h3 class="lb-hours-title">Main Library</h3>
                    </div>
                    <div class="lb-hours-list">
                        <div class="lb-hours-row lb-today">
                            <span class="lb-day-name">Monday <span class="lb-today-badge">Today</span></span>
                            <span class="lb-day-time">7:00 AM - 11:00 PM</span>
                        </div>
                        <div class="lb-hours-row">
                            <span class="lb-day-name">Tuesday - Friday</span>
                            <span class="lb-day-time">7:00 AM - 11:00 PM</span>
                        </div>
                        <div class="lb-hours-row">
                            <span class="lb-day-name">Saturday</span>
                            <span class="lb-day-time">8:00 AM - 8:00 PM</span>
                        </div>
                        <div class="lb-hours-row">
                            <span class="lb-day-name">Sunday</span>
                            <span class="lb-day-time">9:00 AM - 6:00 PM</span>
                        </div>
                    </div>
                </div>

                <div class="lb-hours-card" data-animate>
                    <div class="lb-hours-header">
                        <div class="lb-hours-icon"><i class="bi bi-moon-stars-fill"></i></div>
                        <h3 class="lb-hours-title">24/7 Study Zone</h3>
                    </div>
                    <div class="lb-hours-list">
                        <div class="lb-hours-row lb-today">
                            <span class="lb-day-name">All Days <span class="lb-today-badge">Open</span></span>
                            <span class="lb-day-time">24 Hours</span>
                        </div>
                        <div class="lb-hours-row">
                            <span class="lb-day-name">Exam Period</span>
                            <span class="lb-day-time">24 Hours</span>
                        </div>
                        <div class="lb-hours-row">
                            <span class="lb-day-name">Public Holidays</span>
                            <span class="lb-day-time">24 Hours</span>
                        </div>
                        <div class="lb-hours-row">
                            <span class="lb-day-name">Semester Breaks</span>
                            <span class="lb-day-time">8:00 AM - 10:00 PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="lb-services-section">
            <div class="lb-section-header">
                <div class="lb-section-badge">
                    <i class="bi bi-gear-fill"></i>
                    Library Services
                </div>
                <h2 class="lb-section-title">Services We Offer</h2>
                <p class="lb-section-desc">Comprehensive support for your academic success</p>
            </div>

            <div class="lb-services-masonry">
                <div class="lb-service-tile lb-tall" data-animate data-delay="0">
                    <div class="lb-service-header">
                        <div class="lb-service-icon"><i class="bi bi-printer-fill"></i></div>
                        <h3 class="lb-service-name">Print & Copy</h3>
                    </div>
                    <p class="lb-service-desc">High-quality printing, copying, and scanning services available
                        throughout the library.</p>
                    <div class="lb-service-features">
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Color & B/W Printing
                        </div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Large Format Printing
                        </div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Document Scanning</div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Binding Services</div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Lamination</div>
                    </div>
                </div>

                <div class="lb-service-tile" data-animate data-delay="100">
                    <div class="lb-service-header">
                        <div class="lb-service-icon"><i class="bi bi-laptop-fill"></i></div>
                        <h3 class="lb-service-name">Tech Support</h3>
                    </div>
                    <p class="lb-service-desc">Get help with devices, software, and digital research tools.</p>
                    <div class="lb-service-features">
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Device Lending</div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Software Help</div>
                    </div>
                </div>

                <div class="lb-service-tile" data-animate data-delay="200">
                    <div class="lb-service-header">
                        <div class="lb-service-icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <h3 class="lb-service-name">Research Help</h3>
                    </div>
                    <p class="lb-service-desc">One-on-one consultations with research librarians.</p>
                    <div class="lb-service-features">
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Citation Help</div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Literature Search</div>
                    </div>
                </div>

                <div class="lb-service-tile" data-animate data-delay="300">
                    <div class="lb-service-header">
                        <div class="lb-service-icon"><i class="bi bi-truck"></i></div>
                        <h3 class="lb-service-name">Interlibrary Loan</h3>
                    </div>
                    <p class="lb-service-desc">Request books and articles from other libraries worldwide.</p>
                    <div class="lb-service-features">
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Book Requests</div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Article Delivery</div>
                    </div>
                </div>

                <div class="lb-service-tile" data-animate data-delay="400">
                    <div class="lb-service-header">
                        <div class="lb-service-icon"><i class="bi bi-headphones"></i></div>
                        <h3 class="lb-service-name">Multimedia</h3>
                    </div>
                    <p class="lb-service-desc">Access audio-visual resources and recording studios.</p>
                    <div class="lb-service-features">
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Video Library</div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Recording Booth</div>
                    </div>
                </div>

                <div class="lb-service-tile" data-animate data-delay="500">
                    <div class="lb-service-header">
                        <div class="lb-service-icon"><i class="bi bi-wifi"></i></div>
                        <h3 class="lb-service-name">Free WiFi</h3>
                    </div>
                    <p class="lb-service-desc">High-speed internet throughout all library floors.</p>
                    <div class="lb-service-features">
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> 1 Gbps Speed</div>
                        <div class="lb-service-feature"><i class="bi bi-check-circle-fill"></i> Secure Network</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- LIBRARY RULES -->
        <section class="lb-rules-section">
            <div class="lb-rules-container">
                <div class="lb-rules-header">
                    <div class="lb-rules-icon"><i class="bi bi-info-circle-fill"></i></div>
                    <h2 class="lb-rules-title">Library Guidelines</h2>
                </div>

                <div class="lb-rules-list">
                    <div class="lb-rule-item" data-animate data-delay="0">
                        <div class="lb-rule-number">01</div>
                        <div class="lb-rule-content">
                            <h4>Valid ID Required</h4>
                            <p>Present your university ID card at entry and for borrowing materials.</p>
                        </div>
                    </div>

                    <div class="lb-rule-item" data-animate data-delay="50">
                        <div class="lb-rule-number">02</div>
                        <div class="lb-rule-content">
                            <h4>Maintain Silence</h4>
                            <p>Keep noise levels low. Use designated areas for group discussions.</p>
                        </div>
                    </div>

                    <div class="lb-rule-item" data-animate data-delay="100">
                        <div class="lb-rule-number">03</div>
                        <div class="lb-rule-content">
                            <h4>No Food or Drinks</h4>
                            <p>Only water bottles are permitted. Use the cafeteria for meals.</p>
                        </div>
                    </div>

                    <div class="lb-rule-item" data-animate data-delay="150">
                        <div class="lb-rule-number">04</div>
                        <div class="lb-rule-content">
                            <h4>Book Care</h4>
                            <p>Handle all materials with care. Report any damages immediately.</p>
                        </div>
                    </div>

                    <div class="lb-rule-item" data-animate data-delay="200">
                        <div class="lb-rule-number">05</div>
                        <div class="lb-rule-content">
                            <h4>Return on Time</h4>
                            <p>Return borrowed items by due date to avoid late fees.</p>
                        </div>
                    </div>

                    <div class="lb-rule-item" data-animate data-delay="250">
                        <div class="lb-rule-number">06</div>
                        <div class="lb-rule-content">
                            <h4>Respect Others</h4>
                            <p>Be considerate of fellow students and library staff.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="lb-cta-section">
            <div class="lb-cta-content">
                <div class="lb-cta-icon"><i class="bi bi-book-half"></i></div>
                <h2 class="lb-cta-title">Ready to Explore?</h2>
                <p class="lb-cta-desc">Start your research journey today with access to over 175,000 resources at your
                    fingertips.</p>
                <div class="lb-cta-buttons">
                    <button class="lb-cta-btn lb-primary-cta">
                        <i class="bi bi-search"></i> Search Catalog
                    </button>
                    <button class="lb-cta-btn lb-secondary-cta">
                        <i class="bi bi-person-plus-fill"></i> Get Library Card
                    </button>
                </div>
            </div>
        </section>

    </main>


@endsection
  @push('page-scripts')
    <script src="{{ asset('js/pages/medical-library.js') }}"></script>
@endpush
