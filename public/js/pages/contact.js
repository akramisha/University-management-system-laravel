
        // ========== INTERSECTION OBSERVER FOR ANIMATIONS ==========
        const ctObserverOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.12
        };

        const ctAnimationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => {
                        entry.target.classList.add('ct-visible');
                    }, parseInt(delay));
                    ctAnimationObserver.unobserve(entry.target);
                }
            });
        }, ctObserverOptions);

        // Observe all elements with data-animate
        document.querySelectorAll('[data-animate]').forEach(el => {
            ctAnimationObserver.observe(el);
        });

        // ========== FAQ ACCORDION ==========
        const ctFaqItems = document.querySelectorAll('.ct-faq-item');
        ctFaqItems.forEach(item => {
            const question = item.querySelector('.ct-faq-question');
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('ct-active');

                // Close all items
                ctFaqItems.forEach(faq => faq.classList.remove('ct-active'));

                // Open clicked if not active
                if (!isActive) {
                    item.classList.add('ct-active');
                }
            });
        });

        // ========== FORM SUBMISSION ANIMATION ==========
        const ctContactForm = document.getElementById('contactForm');
        ctContactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const btn = this.querySelector('.ct-submit-btn');
            const originalText = btn.innerHTML;

            btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Message Sent!';
            btn.style.background = 'linear-gradient(135deg, #2ecc71, #27ae60)';

            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = '';
                this.reset();
            }, 3000);
        });

        // ========== INPUT FOCUS ANIMATIONS ==========
        document.querySelectorAll('.ct-input-field, .ct-textarea-field, .ct-select-field').forEach(input => {
            input.addEventListener('focus', function () {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function () {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // ========== QUICK CONTACT ITEMS RIPPLE ==========
        document.querySelectorAll('.ct-quick-item').forEach(item => {
            item.addEventListener('click', function (e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const ripple = document.createElement('span');
                ripple.style.cssText = `
                    position: absolute;
                    background: rgba(255,255,255,0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ct-ripple 0.6s ease-out;
                    pointer-events: none;
                    left: ${x}px;
                    top: ${y}px;
                    width: 200px;
                    height: 200px;
                    margin-left: -100px;
                    margin-top: -100px;
                `;

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple keyframes
        const ctStyle = document.createElement('style');
        ctStyle.textContent = `
            @keyframes ct-ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(ctStyle);

        // ========== HEX CARD STAGGER ANIMATION ==========
        const ctHexCards = document.querySelectorAll('.ct-hex-card');
        ctHexCards.forEach((card, index) => {
            card.style.transitionDelay = `${index * 0.1}s`;
        });

        // ========== SOCIAL CARDS MAGNETIC EFFECT ==========
        document.querySelectorAll('.ct-social-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;

                card.style.transform = `translateY(-15px) scale(1.05) rotateX(${-y / 10}deg) rotateY(${x / 10}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1) rotateX(0) rotateY(0)';
            });
        });

        // ========== SCROLL PROGRESS BAR ==========
        const ctProgressBar = document.createElement('div');
        ctProgressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--ct-secondary), var(--ct-accent));
            z-index: 9999;
            transition: width 0.1s ease;
            width: 0%;
        `;
        document.body.appendChild(ctProgressBar);

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            ctProgressBar.style.width = scrollPercent + '%';
        });

        // ========== GEOMETRIC SHAPES PARALLAX ==========
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const shapes = document.querySelectorAll('.ct-shape');

            shapes.forEach((shape, index) => {
                const speed = 0.1 + (index * 0.05);
                shape.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.1}deg)`;
            });
        });

        // ========== HOUR CARDS SEQUENTIAL ANIMATION ==========
        const ctHourCards = document.querySelectorAll('.ct-hour-card');
        ctHourCards.forEach((card, index) => {
            card.style.transitionDelay = `${index * 0.15}s`;
            ctAnimationObserver.observe(card);
        });

        // ========== MAP BUTTON HOVER EFFECT ==========
        const ctMapBtn = document.querySelector('.ct-map-btn');
        if (ctMapBtn) {
            ctMapBtn.addEventListener('mouseenter', function () {
                this.querySelector('i').style.animation = 'ct-bounce 0.5s ease';
            });

            ctMapBtn.addEventListener('mouseleave', function () {
                this.querySelector('i').style.animation = '';
            });
        }

        // ========== NEWSLETTER FORM ANIMATION ==========
        const ctNewsletterForm = document.querySelector('.ct-newsletter-form');
        if (ctNewsletterForm) {
            ctNewsletterForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const btn = this.querySelector('.ct-newsletter-btn');
                const input = this.querySelector('.ct-newsletter-input');

                btn.innerHTML = '<i class="bi bi-check-lg"></i> Subscribed!';
                btn.style.background = '#2ecc71';
                input.value = '';

                setTimeout(() => {
                    btn.innerHTML = 'Subscribe <i class="bi bi-send-fill"></i>';
                    btn.style.background = '';
                }, 3000);
            });
        }

        // ========== SMOOTH SCROLL FOR ANCHOR LINKS ==========
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

        // ========== TYPING EFFECT FOR HERO TITLE ==========
        const ctHeroTitle = document.querySelector('.ct-hero-title');
        if (ctHeroTitle) {
            const titleText = ctHeroTitle.innerHTML;
            ctHeroTitle.style.opacity = '1';
        }

        // ========== INFO CARD HOVER CHAIN EFFECT ==========
        const ctInfoCards = document.querySelectorAll('.ct-info-card');
        ctInfoCards.forEach((card, index) => {
            card.addEventListener('mouseenter', () => {
                ctInfoCards.forEach((c, i) => {
                    if (i !== index) {
                        c.style.opacity = '0.6';
                        c.style.transform = 'scale(0.98)';
                    }
                });
            });

            card.addEventListener('mouseleave', () => {
                ctInfoCards.forEach(c => {
                    c.style.opacity = '1';
                    c.style.transform = '';
                });
            });
        });
    
