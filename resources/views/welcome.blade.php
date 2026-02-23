@extends('base')

@push('page-styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

@endpush

@section('content')
    @if (session('status'))
    <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 10px; text-align: center;">
        {{ session('status') }}
    </div>
@endif

    
    <!-- ========== HERO SECTION (MEDICAL) ========== -->
       <section class="relative min-h-screen flex items-center video-container" data-testid="hero-section"
                x-file-name="App" x-line-number="186" x-component="section" x-id="App_186" x-dynamic="false">
                <video autoplay muted loop playsinline class="hero-video">
                    <source src="{{ asset('video/3191572-hd_1920_1080_25fps.mp4') }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 hero-overlay" x-file-name="App" x-line-number="203" x-component="div"
                    x-id="App_203" x-dynamic="false"></div>
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32" x-file-name="App"
                    x-line-number="206" x-component="div" x-id="App_206" x-dynamic="false">
                    <div class="max-w-3xl" style="opacity: 1;"><span
                            class="inline-block text-teal-200 font-mono text-sm tracking-wider mb-4"
                            style="opacity: 1; transform: none;">EST. 1984 • EXCELLENCE IN MEDICAL EDUCATION</span>
                        <h1 class="text-4xl heading1 sm:text-5xl lg:text-7xl font-bold text-white leading-tight mb-6 text-shadow"
                            style="opacity: 1; transform: none;">Shaping the Future of<span class="block text-cyan-300"
                                x-file-name="App" x-line-number="225" x-component="span" x-id="App_225"
                                x-dynamic="false"> Medical Science</span></h1>
                        <p class="text-lg paragraph sm:text-xl text-teal-100 mb-8 leading-relaxed max-w-2xl"
                            style="opacity: 1; transform: none;">Where precision meets empathy. Join a legacy of medical
                            excellence that has shaped over 50,000 healthcare professionals worldwide.</p>
                        <div class="flex flex-wrap gap-4" style="opacity: 1; transform: none;"><button
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 shadow h-10 bg-white text-teal-700 hover:bg-teal-50 rounded-full px-8 py-6 text-lg font-medium transition-all hover:scale-105 hover:shadow-xl"
                                x-file-name="App" x-line-number="240" x-component="Button" x-id="App_240"
                                x-dynamic="false" data-testid="hero-explore-btn">Explore Programs<svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-chevron-right ml-2 w-5 h-5"
                                    aria-hidden="true">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg></button><button
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 shadow-sm hover:text-accent-foreground h-10 border-2 border-white text-white hover:bg-white/10 rounded-full px-8 py-6 text-lg font-medium transition-all"
                                x-file-name="App" x-line-number="248" x-component="Button" x-id="App_248"
                                x-dynamic="false" data-testid="hero-tour-btn">Virtual Campus Tour</button></div>
                        <div class="mt-16 grid grid-cols-2 sm:grid-cols-4 gap-8" style="opacity: 1; transform: none;">
                            <div class="text-center sm:text-left" x-file-name="App" x-line-number="269"
                                x-component="div" x-id="App_269" x-dynamic="true">
                                <div class="text-3xl sm:text-4xl font-bold text-white mb-1" x-file-name="App"
                                    x-line-number="270" x-component="div" x-id="App_270" x-dynamic="true">20K+</div>
                                <div class="text-teal-200 text-sm" x-file-name="App" x-line-number="271"
                                    x-component="div" x-id="App_271" x-dynamic="true">“Graduates Serving Globally</div>
                            </div>
                            <div class="text-center sm:text-left" x-file-name="App" x-line-number="269"
                                x-component="div" x-id="App_269" x-dynamic="true">
                                <div class="text-3xl sm:text-4xl font-bold text-white mb-1" x-file-name="App"
                                    x-line-number="270" x-component="div" x-id="App_270" x-dynamic="true">98%</div>
                                <div class="text-teal-200 text-sm" x-file-name="App" x-line-number="271"
                                    x-component="div" x-id="App_271" x-dynamic="true">Placement Rate</div>
                            </div>
                            <div class="text-center sm:text-left" x-file-name="App" x-line-number="269"
                                x-component="div" x-id="App_269" x-dynamic="true">
                                <div class="text-3xl sm:text-4xl font-bold text-white mb-1" x-file-name="App"
                                    x-line-number="270" x-component="div" x-id="App_270" x-dynamic="true">200+</div>
                                <div class="text-teal-200 text-sm" x-file-name="App" x-line-number="271"
                                    x-component="div" x-id="App_271" x-dynamic="true">Research Papers</div>
                            </div>
                            <div class="text-center sm:text-left" x-file-name="App" x-line-number="269"
                                x-component="div" x-id="App_269" x-dynamic="true">
                                <div class="text-3xl sm:text-4xl font-bold text-white mb-1" x-file-name="App"
                                    x-line-number="270" x-component="div" x-id="App_270" x-dynamic="true">#12</div>
                                <div class="text-teal-200 text-sm" x-file-name="App" x-line-number="271"
                                    x-component="div" x-id="App_271" x-dynamic="true">Global Ranking</div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </section>

    <!-- ================================================================ -->

        <!-- ========== MARQUEE SECTION ========== -->
        <section class="marquee-section">
            <div class="marquee-wrapper">
                <!-- First Set of Content -->
                <div class="marquee-content">
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <span class="marquee-text">PMDC Accredited</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                        <span class="marquee-text">500+ Bed Teaching Hospital</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-globe"></i>
                        </div>
                        <span class="marquee-text">WHO Recognized</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <span class="marquee-text">50,000+ Alumni Worldwide</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <span class="marquee-text">Top 10 Medical University</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <span class="marquee-text">Advanced Research Labs</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>
                        <span class="marquee-text">State-of-Art Simulation Center</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="marquee-text">Expert Medical Faculty</span>
                    </div>
                    <div class="marquee-divider"></div>
                </div>
        
                <!-- Duplicate for Seamless Loop -->
                <div class="marquee-content">
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <span class="marquee-text">PMDC Accredited</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                        <span class="marquee-text">500+ Bed Teaching Hospital</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-globe"></i>
                        </div>
                        <span class="marquee-text">WHO Recognized</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <span class="marquee-text">50,000+ Alumni Worldwide</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <span class="marquee-text">Top 10 Medical University</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <span class="marquee-text">Advanced Research Labs</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>
                        <span class="marquee-text">State-of-Art Simulation Center</span>
                    </div>
                    <div class="marquee-divider"></div>
        
                    <div class="marquee-item">
                        <div class="marquee-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="marquee-text">Expert Medical Faculty</span>
                    </div>
                    <div class="marquee-divider"></div>
                </div>
            </div>
        </section>
        {{-- ======================================================== --}}

           <section id="about" class="py-24 lg:py-32 bg-white" data-testid="about-section" x-file-name="App"
                x-line-number="303" x-component="section" x-id="App_303" x-dynamic="false">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-file-name="App" x-line-number="304"
                    x-component="div" x-id="App_304" x-dynamic="false">
                    <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center" style="opacity: 1;">
                        <div class="relative" style="opacity: 1; transform: none;">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-teal-900/10"
                                x-file-name="App" x-line-number="314" x-component="div" x-id="App_314"
                                x-dynamic="false"><img alt="Medical students in laboratory"
                                    class="w-full h-[500px] object-cover" x-file-name="App" x-line-number="315"
                                    x-component="img" x-id="App_315" x-dynamic="false"
                                    src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&amp;w=800&amp;auto=format&amp;fit=crop">
                                <div class="absolute inset-0 bg-gradient-to-t from-teal-900/30 to-transparent"
                                    x-file-name="App" x-line-number="320" x-component="div" x-id="App_320"
                                    x-dynamic="false"></div>
                            </div>
                            <div class="absolute -bottom-8 -right-8 bg-white rounded-2xl p-6 shadow-xl hidden lg:block"
                                style="opacity: 1; transform: none;">
                                <div class="flex items-center gap-4" x-file-name="App" x-line-number="330"
                                    x-component="div" x-id="App_330" x-dynamic="false">
                                    <div class="w-14 h-14 rounded-full bg-teal-100 flex items-center justify-center"
                                        x-file-name="App" x-line-number="331" x-component="div" x-id="App_331"
                                        x-dynamic="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-award w-7 h-7 text-teal-600" aria-hidden="true"
                                            x-file-name="App" x-line-number="332" x-component="Award" x-id="App_332"
                                            x-dynamic="false">
                                            <path
                                                d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526">
                                            </path>
                                            <circle cx="12" cy="8" r="6"></circle>
                                        </svg></div>
                                    <div x-file-name="App" x-line-number="334" x-component="div" x-id="App_334"
                                        x-dynamic="false">
                                        <div class="text-2xl font-bold text-teal-900" x-file-name="App"
                                            x-line-number="335" x-component="div" x-id="App_335" x-dynamic="false">40+
                                        </div>
                                        <div class="text-sm text-slate-500" x-file-name="App" x-line-number="336"
                                            x-component="div" x-id="App_336" x-dynamic="false">Years of Excellence</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="opacity: 1;"><span class="text-teal-600 font-mono text-sm tracking-wider"
                                style="opacity: 1; transform: none;">ABOUT US</span>
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-teal-900 mt-4 mb-6"
                                style="opacity: 1; transform: none;">A Legacy of<span class="block gradient-text"
                                    x-file-name="App" x-line-number="356" x-component="span" x-id="App_356"
                                    x-dynamic="false">Medical Excellence</span></h2>
                            <div class="section-divider mb-8" style="opacity: 1; transform: none;"></div>
                            <p class="text-slate-600 text-lg leading-relaxed mb-6" style="opacity: 1; transform: none;">
                                Founded in 1984, Asclepius Medical University has been at the forefront of medical
                                education, combining rigorous academic training with cutting-edge research and
                                compassionate patient care.</p>
                            <p class="text-slate-600 leading-relaxed mb-8" style="opacity: 1; transform: none;">Our
                                state-of-the-art facilities, world-renowned faculty, and innovative curriculum prepare
                                students to become leaders in healthcare, equipped to tackle the medical challenges of
                                tomorrow.</p>
                            <div class="grid sm:grid-cols-2 gap-4" style="opacity: 1;">
                                <div class="flex items-center gap-3 p-4 rounded-xl bg-teal-50/50 hover:bg-teal-50 transition-colors"
                                    style="opacity: 1; transform: none;"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-globe w-5 h-5 text-teal-600" aria-hidden="true">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                        <path d="M2 12h20"></path>
                                    </svg><span class="text-teal-800 font-medium" x-file-name="App" x-line-number="396"
                                        x-component="span" x-id="App_396" x-dynamic="true">International
                                        Recognition</span></div>
                                <div class="flex items-center gap-3 p-4 rounded-xl bg-teal-50/50 hover:bg-teal-50 transition-colors"
                                    style="opacity: 1; transform: none;"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-flask-conical w-5 h-5 text-teal-600" aria-hidden="true">
                                        <path
                                            d="M14 2v6a2 2 0 0 0 .245.96l5.51 10.08A2 2 0 0 1 18 22H6a2 2 0 0 1-1.755-2.96l5.51-10.08A2 2 0 0 0 10 8V2">
                                        </path>
                                        <path d="M6.453 15h11.094"></path>
                                        <path d="M8.5 2h7"></path>
                                    </svg><span class="text-teal-800 font-medium" x-file-name="App" x-line-number="396"
                                        x-component="span" x-id="App_396" x-dynamic="true">Research Excellence</span>
                                </div>
                                <div class="flex items-center gap-3 p-4 rounded-xl bg-teal-50/50 hover:bg-teal-50 transition-colors"
                                    style="opacity: 1; transform: none;"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-heart w-5 h-5 text-teal-600" aria-hidden="true">
                                        <path
                                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                        </path>
                                    </svg><span class="text-teal-800 font-medium" x-file-name="App" x-line-number="396"
                                        x-component="span" x-id="App_396" x-dynamic="true">Patient-Centered Care</span>
                                </div>
                                <div class="flex items-center gap-3 p-4 rounded-xl bg-teal-50/50 hover:bg-teal-50 transition-colors"
                                    style="opacity: 1; transform: none;"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-users w-5 h-5 text-teal-600" aria-hidden="true">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                    </svg><span class="text-teal-800 font-medium" x-file-name="App" x-line-number="396"
                                        x-component="span" x-id="App_396" x-dynamic="true">Diverse Community</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- ========== ACADEMIC PROGRAMS SECTION ========== -->
        <section class="programs-section">
            <!-- Background Decorations -->
            <div class="programs-decoration programs-decoration-1"></div>
            <div class="programs-decoration programs-decoration-2"></div>
        
            <div class="programs-container">
                <!-- Section Header -->
                <div class="programs-header">
                    <div class="programs-badge">
                        <i class="bi bi-mortarboard-fill"></i>
                        Our Programs
                    </div>
                    <h2 class="programs-title" style="font-family: 'Playfair Display', serif;">
                        Academic <span class="highlight">Programs</span>
                    </h2>
                    <p class="programs-description">
                        Explore our comprehensive range of medical and healthcare programs designed to
                        prepare you for a successful career in the healthcare industry with hands-on
                        training and expert guidance.
                    </p>
                </div>
        
                <!-- Category Tabs -->
                <div class="category-tabs">
                    <button class="category-tab active" data-category="all">
                        <i class="bi bi-grid-fill"></i>
                        All Programs
                    </button>
                    <button class="category-tab" data-category="bachelors">
                        <i class="bi bi-mortarboard"></i>
                        Bachelors
                    </button>
                    <button class="category-tab" data-category="masters">
                        <i class="bi bi-award"></i>
                        Masters
                    </button>
                    <button class="category-tab" data-category="doctoral">
                        <i class="bi bi-stars"></i>
                        Doctoral
                    </button>
                    <button class="category-tab" data-category="diploma">
                        <i class="bi bi-file-earmark-text"></i>
                        Diploma
                    </button>
                </div>
        
                <!-- Programs Slider -->
                <div class="programs-slider-container">
                    <!-- Previous Button -->
                    <button class="slider-nav prev" id="prevBtn">
                        <i class="bi bi-chevron-left"></i>
                    </button>
        
                    <!-- Slider -->
                    <div class="programs-slider">
                        <div class="programs-track" id="programsTrack">
                            <!-- Card 1 - MBBS -->
                            <div class="program-card" data-category="bachelors">
                                <div class="duration-badge">5 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-clipboard2-pulse-fill"></i>
                                    </div>
                                    <h3 class="program-card-title">Medicine (MBBS)</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Human Anatomy</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Physiology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Pathology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Clinical Rotations</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-mortarboard"></i>
                                            /Bachelors
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 2 - BDS -->
                            <div class="program-card" data-category="bachelors">
                                <div class="duration-badge">4 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-emoji-smile-fill"></i>
                                    </div>
                                    <h3 class="program-card-title">Dental Surgery (BDS)</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Oral Anatomy</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Dental Materials</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Prosthodontics</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Oral Surgery</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-mortarboard"></i>
                                            /Bachelors
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 3 - Nursing -->
                            <div class="program-card" data-category="bachelors">
                                <div class="duration-badge">4 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-heart-pulse-fill"></i>
                                    </div>
                                    <h3 class="program-card-title">Nursing (BSN)</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Patient Care</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Medical Surgical</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Community Health</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Clinical Practice</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-mortarboard"></i>
                                            /Bachelors
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 4 - Pharmacy -->
                            <div class="program-card" data-category="bachelors">
                                <div class="duration-badge">5 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-capsule"></i>
                                    </div>
                                    <h3 class="program-card-title">Pharmacy (Pharm.D)</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Pharmacology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Medicinal Chemistry</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Clinical Pharmacy</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Hospital Training</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-mortarboard"></i>
                                            /Bachelors
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 5 - Physiotherapy -->
                            <div class="program-card" data-category="bachelors">
                                <div class="duration-badge">5 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-person-arms-up"></i>
                                    </div>
                                    <h3 class="program-card-title">Physiotherapy (DPT)</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Kinesiology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Electrotherapy</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Rehabilitation</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Sports Medicine</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-mortarboard"></i>
                                            /Bachelors
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 6 - MS Surgery -->
                            <div class="program-card" data-category="masters">
                                <div class="duration-badge">4 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-scissors"></i>
                                    </div>
                                    <h3 class="program-card-title">MS General Surgery</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Surgical Anatomy</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Trauma Surgery</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Laparoscopic Surgery</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Surgical Research</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-award"></i>
                                            /Masters
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 7 - MD Medicine -->
                            <div class="program-card" data-category="masters">
                                <div class="duration-badge">3 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-hospital-fill"></i>
                                    </div>
                                    <h3 class="program-card-title">MD Internal Medicine</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Cardiology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Gastroenterology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Pulmonology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Clinical Research</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-award"></i>
                                            /Masters
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 8 - PhD Biomedical -->
                            <div class="program-card" data-category="doctoral">
                                <div class="duration-badge">3-5 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="fa-solid fa-flask"></i>
                                    </div>
                                    <h3 class="program-card-title">PhD Biomedical Science</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Advanced Research</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Molecular Biology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Genetics</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Dissertation</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-stars"></i>
                                            /Doctoral
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Card 9 - Diploma MLT -->
                            <div class="program-card" data-category="diploma">
                                <div class="duration-badge">2 Years</div>
                                <div class="program-card-content">
                                    <div class="program-icon">
                                        <i class="bi bi-droplet-fill"></i>
                                    </div>
                                    <h3 class="program-card-title">Diploma in MLT</h3>
                                    <ul class="course-list">
                                        <li><i class="bi bi-check-circle-fill"></i> Hematology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Biochemistry</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Microbiology</li>
                                        <li><i class="bi bi-check-circle-fill"></i> Lab Practice</li>
                                    </ul>
                                    <div class="program-card-footer">
                                        <a href="#" class="category-btn">
                                            <i class="bi bi-file-earmark-text"></i>
                                            /Diploma
                                        </a>
                                        <div class="arrow-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Next Button -->
                    <button class="slider-nav next" id="nextBtn">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
        
                <!-- Slider Dots -->
                <div class="slider-dots" id="sliderDots">
                    <div class="slider-dot active" data-index="0"></div>
                    <div class="slider-dot" data-index="1"></div>
                    <div class="slider-dot" data-index="2"></div>
                </div>
        
                <!-- View All Button -->
                <div class="view-all-container">
                    <a href="#" class="view-all-btn">
                        View All Programs
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- =============================================================== -->

<!-- ========== FACILITIES SECTION ========== -->
<section class="facilities-section">
    <!-- Background Decorations -->
    <div class="facilities-bg-decoration facilities-decoration-1"></div>
    <div class="facilities-bg-decoration facilities-decoration-2"></div>
    <div class="facilities-bg-decoration facilities-decoration-3"></div>

    <!-- Floating Medical Icons -->
    <i class="bi bi-hospital facilities-floating-icon floating-icon-1"></i>
    <i class="bi bi-heart-pulse facilities-floating-icon floating-icon-2"></i>
    <i class="bi bi-clipboard2-pulse facilities-floating-icon floating-icon-3"></i>

    <div class="facilities-container">
        <!-- Section Header - Right Aligned -->
        <div class="facilities-header">
            <div class="facilities-badge">
                <i class="bi bi-building"></i>
                World-Class Infrastructure
            </div>
            <h2 class="facilities-title">
                Our <span class="highlight">Facilities</span>
            </h2>
            <p class="facilities-subtitle">
                Experience state-of-the-art medical facilities designed to provide hands-on
                training and prepare you for real-world healthcare challenges.
            </p>
        </div>

        <!-- Facilities Grid -->
        <div class="facilities-grid">
            <!-- Row 1: Image Left, Content Right -->
            <div class="facility-row facility-row-1">
                <!-- Image -->
                <div class="facility-image">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800"
                        alt="Teaching Hospital">
                    <div class="image-corner-badge">
                        <i class="bi bi-star-fill"></i>
                        Premium Facility
                    </div>
                    <div class="facility-image-overlay">
                        <div class="overlay-title">500+ Bed Teaching Hospital</div>
                        <div class="overlay-text">24/7 Emergency & Specialty Care</div>
                    </div>
                </div>

                <!-- Content Box -->
                <div class="facility-content-box">
                    <div class="content-box-decoration"></div>
                    <div class="content-box-decoration content-box-decoration-2"></div>

                    <div class="facility-category">
                        <i class="bi bi-mortarboard-fill"></i>
                        Clinical Training
                    </div>
                    <h3 class="facility-content-heading">Teaching Hospital & Clinical Training Center</h3>
                    <p class="facility-content-text">
                        Our 500-bed multi-specialty teaching hospital provides comprehensive
                        clinical exposure with real patient interactions. Students gain hands-on
                        experience in various medical departments under expert supervision.
                    </p>
                    <div class="facility-features">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Emergency Care
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            ICU & CCU
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Operation Theaters
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Diagnostic Labs
                        </div>
                    </div>
                    <a href="#" class="facility-learn-more">
                        Explore Hospital
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Row 2: Content Left, Image Right -->
            <div class="facility-row facility-row-2">
                <!-- Content Box -->
                <div class="facility-content-box">
                    <div class="content-box-decoration"></div>
                    <div class="content-box-decoration content-box-decoration-2"></div>

                    <div class="facility-category">
                        <i class="fa-solid fa-flask"></i>
                        Research & Innovation
                    </div>
                    <h3 class="facility-content-heading">Advanced Research Laboratories</h3>
                    <p class="facility-content-text">
                        State-of-the-art research laboratories equipped with cutting-edge
                        technology for biomedical research, molecular biology, and pharmaceutical
                        studies. Collaborate with leading researchers on groundbreaking projects.
                    </p>
                    <div class="facility-features">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Molecular Biology
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Genetics Lab
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Microbiology
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Simulation Center
                        </div>
                    </div>
                    <a href="#" class="facility-learn-more">
                        Explore Labs
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- Image -->
                <div class="facility-image">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800"
                        alt="Research Laboratory">
                    <div class="image-corner-badge">
                        <i class="bi bi-award-fill"></i>
                        Award Winning
                    </div>
                    <div class="facility-image-overlay">
                        <div class="overlay-title">Modern Research Labs</div>
                        <div class="overlay-text">Equipped with Latest Technology</div>
                    </div>
                </div>
            </div>

            <!-- Row 3: Image Left, Content Right -->
            <div class="facility-row facility-row-1">
                <!-- Image -->
                <div class="facility-image">
                    <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=800" alt="Medical Library">
                    <div class="image-corner-badge">
                        <i class="bi bi-book-fill"></i>
                        Knowledge Hub
                    </div>
                    <div class="facility-image-overlay">
                        <div class="overlay-title">Digital Medical Library</div>
                        <div class="overlay-text">50,000+ Medical Journals & Books</div>
                    </div>
                </div>

                <!-- Content Box -->
                <div class="facility-content-box">
                    <div class="content-box-decoration"></div>
                    <div class="content-box-decoration content-box-decoration-2"></div>

                    <div class="facility-category">
                        <i class="bi bi-journal-medical"></i>
                        Learning Resources
                    </div>
                    <h3 class="facility-content-heading">Digital Library & Learning Center</h3>
                    <p class="facility-content-text">
                        Access our comprehensive digital library with over 50,000 medical
                        journals, e-books, and research papers. Modern study spaces with
                        high-speed internet and collaborative learning environments.
                    </p>
                    <div class="facility-features">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            E-Journals
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Study Rooms
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            24/7 Access
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Online Resources
                        </div>
                    </div>
                    <a href="#" class="facility-learn-more">
                        Explore Library
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Row 4: Content Left, Image Right -->
            <div class="facility-row facility-row-2">
                <!-- Content Box -->
                <div class="facility-content-box">
                    <div class="content-box-decoration"></div>
                    <div class="content-box-decoration content-box-decoration-2"></div>

                    <div class="facility-category">
                        <i class="bi bi-person-workspace"></i>
                        Practical Training
                    </div>
                    <h3 class="facility-content-heading">Simulation & Skills Laboratory</h3>
                    <p class="facility-content-text">
                        Practice clinical procedures in a safe, controlled environment with
                        high-fidelity patient simulators. Our simulation lab replicates
                        real-world medical scenarios for comprehensive practical training.
                    </p>
                    <div class="facility-features">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Patient Simulators
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Surgery Training
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            Emergency Drills
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill"></i>
                            VR Technology
                        </div>
                    </div>
                    <a href="#" class="facility-learn-more">
                        Explore Simulation Lab
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- Image -->
                <div class="facility-image">
                    <img src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=800" alt="Simulation Lab">
                    <div class="image-corner-badge">
                        <i class="bi bi-cpu-fill"></i>
                        Hi-Tech
                    </div>
                    <div class="facility-image-overlay">
                        <div class="overlay-title">Simulation Center</div>
                        <div class="overlay-text">Advanced Medical Training Technology</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- View All Button -->
        <div class="facilities-button-container">
            <a href="#" class="btn-facilities">
                <i class="bi bi-grid-fill"></i>
                View All Facilities
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <!-- Stats Bar -->
        <div class="facilities-stats">
            <div class="stat-box">
                <div class="stat-box-icon">
                    <i class="bi bi-hospital"></i>
                </div>
                <div class="stat-box-number">500+</div>
                <div class="stat-box-label">Hospital Beds</div>
            </div>
            <div class="stat-box">
                <div class="stat-box-icon">
                    <i class="fa-solid fa-flask"></i>
                </div>
                <div class="stat-box-number">25+</div>
                <div class="stat-box-label">Research Labs</div>
            </div>
            <div class="stat-box">
                <div class="stat-box-icon">
                    <i class="bi bi-book"></i>
                </div>
                <div class="stat-box-number">50K+</div>
                <div class="stat-box-label">Medical Journals</div>
            </div>
            <div class="stat-box">
                <div class="stat-box-icon">
                    <i class="bi bi-pc-display"></i>
                </div>
                <div class="stat-box-number">100+</div>
                <div class="stat-box-label">Simulation Units</div>
            </div>
        </div>
    </div>
</section>
  <section id="testimonials" class="py-24 lg:py-32 bg-gradient-to-br from-teal-50 to-cyan-50"
                data-testid="testimonials-section" x-file-name="App" x-line-number="785" x-component="section"
                x-id="App_785" x-dynamic="false">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-file-name="App" x-line-number="786"
                    x-component="div" x-id="App_786" x-dynamic="false">
                    <div class="text-center mb-16" style="opacity: 1;"><span
                            class="text-teal-600 font-mono text-sm tracking-wider"
                            style="opacity: 1; transform: none;">TESTIMONIALS</span>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-teal-900 mt-4 mb-6"
                            style="opacity: 1; transform: none;">Stories of Success</h2>
                        <div class="section-divider mx-auto mb-6" style="opacity: 1; transform: none;"></div>
                        <p class="text-slate-600 text-lg max-w-2xl mx-auto" style="opacity: 1; transform: none;">Hear
                            from our alumni who have gone on to make remarkable contributions to healthcare around the
                            world.</p>
                    </div>
                    <div class="grid lg:grid-cols-3 gap-6 lg:gap-8" style="opacity: 1;">
                        <div class="relative" style="opacity: 1; transform: none;">
                            <div class="text-card-foreground h-full bg-white border-0 shadow-xl shadow-teal-900/5 rounded-2xl overflow-hidden"
                                x-file-name="App" x-line-number="831" x-component="Card" x-id="App_831"
                                x-dynamic="true">
                                <div class="p-8" x-file-name="App" x-line-number="832" x-component="CardContent"
                                    x-id="App_832" x-dynamic="true" x-excluded="true">
                                    <div class="text-6xl text-teal-100 font-serif leading-none mb-4" x-file-name="App"
                                        x-line-number="834" x-component="div" x-id="App_834" x-dynamic="true">"</div>
                                    <p class="text-slate-700 leading-relaxed mb-8 text-lg" x-file-name="App"
                                        x-line-number="836" x-component="p" x-id="App_836" x-dynamic="true">Asclepius
                                        transformed my understanding of medicine. The hands-on training and mentorship I
                                        received prepared me for a successful career in cardiology.</p>
                                    <div class="flex items-center gap-4" x-file-name="App" x-line-number="840"
                                        x-component="div" x-id="App_840" x-dynamic="true"><img alt="Dr. Amanda Foster"
                                            class="w-14 h-14 rounded-full object-cover border-2 border-teal-100"
                                            x-file-name="App" x-line-number="841" x-component="img" x-id="App_841"
                                            x-dynamic="true"
                                            src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&amp;w=200&amp;auto=format&amp;fit=crop">
                                        <div x-file-name="App" x-line-number="846" x-component="div" x-id="App_846"
                                            x-dynamic="true">
                                            <h4 class="font-bold text-teal-900" x-file-name="App" x-line-number="847"
                                                x-component="h4" x-id="App_847" x-dynamic="true">Dr. Amanda Foster</h4>
                                            <p class="text-sm text-teal-600" x-file-name="App" x-line-number="848"
                                                x-component="p" x-id="App_848" x-dynamic="true">Class of 2018</p>
                                            <p class="text-xs text-slate-500" x-file-name="App" x-line-number="849"
                                                x-component="p" x-id="App_849" x-dynamic="true">Cardiologist, Mayo
                                                Clinic</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-1 mt-4" x-file-name="App" x-line-number="854" x-component="div"
                                        x-id="App_854" x-dynamic="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                        <div class="relative" style="opacity: 1; transform: none;">
                            <div class="text-card-foreground h-full bg-white border-0 shadow-xl shadow-teal-900/5 rounded-2xl overflow-hidden"
                                x-file-name="App" x-line-number="831" x-component="Card" x-id="App_831"
                                x-dynamic="true">
                                <div class="p-8" x-file-name="App" x-line-number="832" x-component="CardContent"
                                    x-id="App_832" x-dynamic="true" x-excluded="true">
                                    <div class="text-6xl text-teal-100 font-serif leading-none mb-4" x-file-name="App"
                                        x-line-number="834" x-component="div" x-id="App_834" x-dynamic="true">"</div>
                                    <p class="text-slate-700 leading-relaxed mb-8 text-lg" x-file-name="App"
                                        x-line-number="836" x-component="p" x-id="App_836" x-dynamic="true">The research
                                        opportunities here are unparalleled. My professors didn't just teach me—they
                                        mentored me through groundbreaking research in immunology.</p>
                                    <div class="flex items-center gap-4" x-file-name="App" x-line-number="840"
                                        x-component="div" x-id="App_840" x-dynamic="true"><img alt="Dr. Ryan Patel"
                                            class="w-14 h-14 rounded-full object-cover border-2 border-teal-100"
                                            x-file-name="App" x-line-number="841" x-component="img" x-id="App_841"
                                            x-dynamic="true"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&amp;w=200&amp;auto=format&amp;fit=crop">
                                        <div x-file-name="App" x-line-number="846" x-component="div" x-id="App_846"
                                            x-dynamic="true">
                                            <h4 class="font-bold text-teal-900" x-file-name="App" x-line-number="847"
                                                x-component="h4" x-id="App_847" x-dynamic="true">Dr. Ryan Patel</h4>
                                            <p class="text-sm text-teal-600" x-file-name="App" x-line-number="848"
                                                x-component="p" x-id="App_848" x-dynamic="true">Class of 2015</p>
                                            <p class="text-xs text-slate-500" x-file-name="App" x-line-number="849"
                                                x-component="p" x-id="App_849" x-dynamic="true">Research Lead, NIH</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-1 mt-4" x-file-name="App" x-line-number="854" x-component="div"
                                        x-id="App_854" x-dynamic="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                        <div class="relative" style="opacity: 1; transform: none;">
                            <div class="text-card-foreground h-full bg-white border-0 shadow-xl shadow-teal-900/5 rounded-2xl overflow-hidden"
                                x-file-name="App" x-line-number="831" x-component="Card" x-id="App_831"
                                x-dynamic="true">
                                <div class="p-8" x-file-name="App" x-line-number="832" x-component="CardContent"
                                    x-id="App_832" x-dynamic="true" x-excluded="true">
                                    <div class="text-6xl text-teal-100 font-serif leading-none mb-4" x-file-name="App"
                                        x-line-number="834" x-component="div" x-id="App_834" x-dynamic="true">"</div>
                                    <p class="text-slate-700 leading-relaxed mb-8 text-lg" x-file-name="App"
                                        x-line-number="836" x-component="p" x-id="App_836" x-dynamic="true">From day
                                        one, I felt part of a community dedicated to excellence. The global network of
                                        alumni has opened doors I never imagined possible.</p>
                                    <div class="flex items-center gap-4" x-file-name="App" x-line-number="840"
                                        x-component="div" x-id="App_840" x-dynamic="true"><img alt="Dr. Lisa Chen"
                                            class="w-14 h-14 rounded-full object-cover border-2 border-teal-100"
                                            x-file-name="App" x-line-number="841" x-component="img" x-id="App_841"
                                            x-dynamic="true"
                                            src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&amp;w=200&amp;auto=format&amp;fit=crop">
                                        <div x-file-name="App" x-line-number="846" x-component="div" x-id="App_846"
                                            x-dynamic="true">
                                            <h4 class="font-bold text-teal-900" x-file-name="App" x-line-number="847"
                                                x-component="h4" x-id="App_847" x-dynamic="true">Dr. Lisa Chen</h4>
                                            <p class="text-sm text-teal-600" x-file-name="App" x-line-number="848"
                                                x-component="p" x-id="App_848" x-dynamic="true">Class of 2020</p>
                                            <p class="text-xs text-slate-500" x-file-name="App" x-line-number="849"
                                                x-component="p" x-id="App_849" x-dynamic="true">Surgeon, Johns Hopkins
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex gap-1 mt-4" x-file-name="App" x-line-number="854" x-component="div"
                                        x-id="App_854" x-dynamic="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400"
                                            aria-hidden="true" x-file-name="App" x-line-number="856" x-component="Star"
                                            x-id="App_856" x-dynamic="true">
                                            <path
                                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@push('page-scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
    
@endpush
@endsection
