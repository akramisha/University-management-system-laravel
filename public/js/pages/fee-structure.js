 
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
    