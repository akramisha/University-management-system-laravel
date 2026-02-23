// ==================== PRELOADER & PAGE LOAD ANIMATIONS ====================
let pageLoadedTriggered = false;

function triggerPageLoadAnimations() {
    if (pageLoadedTriggered) return; // Prevent duplicate triggers
    pageLoadedTriggered = true;
    
    // Add page-loaded class to html and body
    document.documentElement.classList.add('page-loaded');
    document.body.classList.add('page-loaded');
    
    // Initialize interactive elements
    initSlider();
    setupScrollAnimations();
}

function detectPreloaderCompletion() {
    return new Promise((resolve) => {
        const preloader = document.getElementById('preloader');
        
        // No preloader, resolve immediately
        if (!preloader) {
            resolve();
            return;
        }

        // Check if preloader already hidden
        const isCurrentlyHidden = () => {
            return preloader.style.display === 'none' || 
                   preloader.offsetParent === null ||
                   window.getComputedStyle(preloader).display === 'none';
        };

        if (isCurrentlyHidden()) {
            resolve();
            return;
        }

        // Watch for preloader display changes
        const observer = new MutationObserver(() => {
            if (isCurrentlyHidden()) {
                observer.disconnect();
                resolve();
            }
        });

        observer.observe(preloader, { 
            attributes: true, 
            attributeFilter: ['style', 'class'],
            childList: false 
        });

        // Maximum wait time
        const timeout = setTimeout(() => {
            observer.disconnect();
            resolve();
        }, 6000);

        // Store timeout ID for cleanup
        preloader._timeoutId = timeout;
    });
}

// Main animation trigger
async function initializePageAnimations() {
    // Wait for page resources
    if (document.readyState === 'loading') {
        await new Promise(resolve => document.addEventListener('DOMContentLoaded', resolve));
    }
    
    // Wait for preloader to complete
    await detectPreloaderCompletion();
    
    // Small delay for CSS reflow
    await new Promise(resolve => setTimeout(resolve, 200));
    
    // Trigger all animations
    triggerPageLoadAnimations();
}

// Start initialization
window.addEventListener('load', () => {
    initializePageAnimations();
});

// Backup: if already loaded
if (document.readyState === 'complete') {
    setTimeout(() => {
        initializePageAnimations();
    }, 100);
}

// ==================== SCROLL ANIMATIONS ====================
function setupScrollAnimations() {
    const scrollObserverOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -100px 0px'
    };

    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('section-animated')) {
                entry.target.classList.add('section-visible', 'section-animated');
            }
        });
    }, scrollObserverOptions);

    // Observe all sections except hero
    document.querySelectorAll('section').forEach(section => {
        const isHeroSection = section.getAttribute('data-testid') === 'hero-section' || 
                            section.classList.contains('video-container');
        
        if (!isHeroSection && section.id !== 'preloader') {
            scrollObserver.observe(section);
        }
    });
}

// ========== DOM ELEMENTS ==========
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const sidePanel = document.getElementById('sidePanel');
const closeBtn = document.getElementById('closeBtn');
const overlay = document.getElementById('overlay');
const searchBtn = document.getElementById('searchBtn');
const searchBox = document.getElementById('searchBox');
const searchClose = document.getElementById('searchClose');
const searchInput = document.getElementById('searchInput');
const dropdownItems = document.querySelectorAll('.side-nav-item.has-dropdown');

// ========== OPEN SIDE PANEL ==========
function openSidePanel() {
    sidePanel.classList.add('active');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// ========== CLOSE SIDE PANEL ==========
function closeSidePanel() {
    sidePanel.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = '';

    dropdownItems.forEach(item => {
        item.classList.remove('active');
    });
}

// ========== OPEN SEARCH BOX ==========
function openSearchBox() {
    searchBox.classList.add('active');
    overlay.classList.add('active');
    setTimeout(() => {
        searchInput.focus();
    }, 300);
}

// ========== CLOSE SEARCH BOX ==========
function closeSearchBox() {
    searchBox.classList.remove('active');
    overlay.classList.remove('active');
    searchInput.value = '';
}

// ========== EVENT LISTENERS ==========
mobileMenuBtn.addEventListener('click', openSidePanel);
closeBtn.addEventListener('click', closeSidePanel);
overlay.addEventListener('click', () => {
    closeSidePanel();
    closeSearchBox();
});

searchBtn.addEventListener('click', openSearchBox);
searchClose.addEventListener('click', closeSearchBox);

dropdownItems.forEach(item => {
    const link = item.querySelector('.side-nav-link');
    link.addEventListener('click', (e) => {
        e.preventDefault();
        dropdownItems.forEach(otherItem => {
            if (otherItem !== item) {
                otherItem.classList.remove('active');
            }
        });
        item.classList.toggle('active');
    });
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeSearchBox();
        closeSidePanel();
    }
});

searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        const searchTerm = searchInput.value.trim();
        if (searchTerm) {
            alert(`Searching for: "${searchTerm}"`);
            closeSearchBox();
        }
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth > 991) {
        closeSidePanel();
    }
});

sidePanel.addEventListener('click', (e) => {
    e.stopPropagation();
});

searchBox.addEventListener('click', (e) => {
    e.stopPropagation();
});

// ========== COUNTER ANIMATION ==========
function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target.toLocaleString() + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current).toLocaleString();
        }
    }, 16);
}

const observerOptions = {
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
        }
    });
}, observerOptions);

// Target all sections or specific elements you want to animate
document.querySelectorAll('section').forEach(section => {
    section.classList.add('reveal-on-scroll'); // Add base style via CSS
    observer.observe(section);
});

const medicalStats = document.querySelector('.medical-stats');
if (medicalStats) {
    observer.observe(medicalStats);
}

// ==================== SLIDER FUNCTIONALITY ====================
function initSlider() {
    const programsTrack = document.getElementById('programsTrack');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const sliderDots = document.querySelectorAll('.slider-dot');
    const programCards = document.querySelectorAll('.program-card');
    
    if (!programsTrack || !prevBtn || !nextBtn || programCards.length === 0) {
        return;
    }

    let currentIndex = 0;
    let cardsPerView = 3;
    let totalCards = programCards.length;
    let maxIndex = Math.max(0, Math.ceil(totalCards / cardsPerView) - 1);
    let autoSlideInterval = null;

    function updateCardsPerView() {
        if (window.innerWidth <= 768) {
            cardsPerView = 1;
        } else if (window.innerWidth <= 1200) {
            cardsPerView = 2;
        } else {
            cardsPerView = 3;
        }
        maxIndex = Math.max(0, Math.ceil(totalCards / cardsPerView) - 1);
        updateSliderPosition();
        updateActiveDot();
    }

    function updateSliderPosition() {
        if (programCards.length === 0) return;
        const cardWidth = programCards[0].offsetWidth;
        const gap = 24;
        const translateX = -currentIndex * (cardWidth + gap);
        programsTrack.style.transform = `translateX(${translateX}px)`;
        programsTrack.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
    }

    function updateActiveDot() {
        sliderDots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function nextSlide() {
        currentIndex = currentIndex >= maxIndex ? 0 : currentIndex + 1;
        updateSliderPosition();
        updateActiveDot();
    }

    function prevSlide() {
        currentIndex = currentIndex <= 0 ? maxIndex : currentIndex - 1;
        updateSliderPosition();
        updateActiveDot();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000);
    }

    // Event listeners
    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetAutoSlide();
    });

    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetAutoSlide();
    });

    sliderDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateSliderPosition();
            updateActiveDot();
            resetAutoSlide();
        });
    });

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Hover pause
    const sliderContainer = document.querySelector('.programs-slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        sliderContainer.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    }

    // Resize handler
    window.addEventListener('resize', updateCardsPerView);

    // Initial setup
    updateCardsPerView();
    startAutoSlide();
}

// ========== CATEGORY TABS & FILTERING ==========
const categoryTabs = document.querySelectorAll('.category-tab');
const categoryBtns = document.querySelectorAll('.category-btn');
let currentIndex = 0; // Declare currentIndex variable
const programCards = document.querySelectorAll('.program-card'); // Declare programCards variable

categoryTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Update active tab
        categoryTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        const category = tab.dataset.category;

        // Filter cards
        programCards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        // Reset slider position
        currentIndex = 0;
        updateSlider();
        updateDots();
    });
});

categoryBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const category = btn.dataset.category;
        
        programCards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

function updateDots() { // Declare updateDots function
    const sliderDots = document.querySelectorAll('.slider-dot');
    sliderDots.forEach((dot, index) => {
        if (index === currentIndex) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
}

function updateSlider() { // Declare updateSlider function
    // Implementation for updating slider position
}

// ========== TOUCH/SWIPE SUPPORT ==========
const slider = document.querySelector('.programs-slider'); // Ensure this class matches your HTML
const nextBtn = document.getElementById('nextBtn'); // Declare nextBtn variable
const prevBtn = document.getElementById('prevBtn'); // Declare prevBtn variable

if(slider && nextBtn && prevBtn) {
    nextBtn.addEventListener('click', () => {
        slider.scrollBy({ left: 350, behavior: 'smooth' });
    });
    prevBtn.addEventListener('click', () => {
        slider.scrollBy({ left: -350, behavior: 'smooth' });
    });
}

let touchStartX = 0;
let touchEndX = 0;

slider.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
});

slider.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    const swipeThreshold = 50;
    const diff = touchStartX - touchEndX;

    if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
            initSlider.nextSlide(); // Use nextSlide function
        } else {
            initSlider.prevSlide(); // Use prevSlide function
        }
    }
}

// ================================================================

// ========================================
// SCROLL ANIMATIONS
// ========================================

// Intersection Observer for scroll animations
const scrollAnimationObserverOptions = {
    threshold: 0.2,
    rootMargin: '0px 0px -50px 0px'
};

const scrollObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, scrollAnimationObserverOptions);

// Observe facility rows
document.querySelectorAll('.facility-row').forEach((row, index) => {
    row.style.opacity = '0';
    row.style.transform = 'translateY(50px)';
    row.style.transition = `all 0.8s ease ${index * 0.2}s`;
    scrollObserver.observe(row);
});

// Counter Animation for Stats
function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-box-number');
            
    statNumbers.forEach(stat => {
        const text = stat.textContent;
        const hasK = text.includes('K');
        const hasPlus = text.includes('+');
        const target = parseInt(text.replace(/[^0-9]/g, ''));
                
        let current = 0;
        const increment = target / 50;
        const duration = 2000;
        const stepTime = duration / 50;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
                    
            let displayValue = Math.floor(current);
            if (hasK) {
                displayValue = displayValue + 'K';
            }
            if (hasPlus) {
                displayValue = displayValue + '+';
            }
            stat.textContent = displayValue;
        }, stepTime);
    });
}

const statsSection = document.querySelector('.facilities-stats');
if (statsSection) {
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStats();
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
            
    statsObserver.observe(statsSection);
}

// Parallax effect for floating icons
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const floatingIcons = document.querySelectorAll('.facilities-floating-icon');
            
    floatingIcons.forEach((icon, index) => {
        const speed = (index + 1) * 0.02;
        icon.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

// Image hover effect enhancement
document.querySelectorAll('.facility-image').forEach(image => {
    image.addEventListener('mouseenter', function() {
        this.querySelector('img').style.transform = 'scale(1.1)';
    });
            
    image.addEventListener('mouseleave', function() {
        this.querySelector('img').style.transform = 'scale(1)';
    });
});

// ===============================================================
// ========================================
// FOOTER JAVASCRIPT
// ========================================

// Set Current Year
document.getElementById('currentYear').textContent = new Date().getFullYear();

// ========== Scroll to Top Button ==========
const scrollToTopBtn = document.getElementById('scrollToTop');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        scrollToTopBtn.classList.add('visible');
    } else {
        scrollToTopBtn.classList.remove('visible');
    }
});

scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// ========== Newsletter Form Submission ==========
const newsletterForm = document.getElementById('newsletterForm');

newsletterForm.addEventListener('submit', function(e) {
    e.preventDefault();
            
    const email = this.querySelector('.newsletter-input').value;
    const btn = this.querySelector('.newsletter-btn');
    const originalText = btn.innerHTML;
            
    // Show loading state
    btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Subscribing...';
    btn.disabled = true;

    // Simulate API call
    setTimeout(() => {
        btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Subscribed!';
        btn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                
        // Reset after 3 seconds
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.style.background = '';
            btn.disabled = false;
            this.querySelector('.newsletter-input').value = '';
        }, 3000);
    }, 1500);
});

// ========== Footer Link Hover Sound Effect (Optional) ==========
const footerLinks = document.querySelectorAll('.footer-links a, .social-link');

footerLinks.forEach(link => {
    link.addEventListener('mouseenter', function() {
        this.style.transform = 'translateX(5px)';
    });
            
    link.addEventListener('mouseleave', function() {
        this.style.transform = 'translateX(0)';
    });
});

// ========== Scroll Animation for Footer Columns ==========
const footerObserverOptions = {
    threshold: 0.2,
    rootMargin: '0px 0px -50px 0px'
};

const footerObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, footerObserverOptions);

document.querySelectorAll('.footer-column').forEach(column => {
    footerObserver.observe(column);
});

// ========== Parallax Effect for Floating Icons ==========
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const footerSection = document.querySelector('.footer-section');
    const footerTop = footerSection.offsetTop;
            
    if (scrolled > footerTop - window.innerHeight) {
        const relativeScroll = scrolled - (footerTop - window.innerHeight);
                
        document.querySelectorAll('.footer-floating-icon').forEach((icon, index) => {
            const speed = (index + 1) * 0.015;
            icon.style.transform = `translateY(${relativeScroll * speed}px)`;
        });
    }
});

// ========== Social Link Ripple Effect ==========
document.querySelectorAll('.social-link').forEach(link => {
    link.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
                
        ripple.style.cssText = `
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: inherit;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
        `;
                
        this.style.position = 'relative';
        this.appendChild(ripple);
                
        setTimeout(() => ripple.remove(), 600);
    });
});

// Add ripple animation
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// ========== Smooth Hover Effect for Contact Items ==========
document.querySelectorAll('.footer-contact-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
        this.querySelector('.contact-icon').style.transform = 'scale(1.1)';
    });
            
    item.addEventListener('mouseleave', function() {
        this.querySelector('.contact-icon').style.transform = 'scale(1)';
    });
});

// ========== Accreditation Badge Tooltip ==========
document.querySelectorAll('.accreditation-badge').forEach(badge => {
    badge.style.cursor = 'pointer';
    badge.setAttribute('title', 'Click to learn more');
});
