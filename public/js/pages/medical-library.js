document.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    // ========== INTERSECTION OBSERVER FOR ANIMATIONS ==========
    const lbObserverOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.12,
    }

    const lbAnimationObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const delay = entry.target.dataset.delay || 0
          setTimeout(() => {
            entry.target.classList.add("lb-visible")
          }, Number.parseInt(delay))
          lbAnimationObserver.unobserve(entry.target)
        }
      })
    }, lbObserverOptions)

    // Observe all elements with data-animate
    document.querySelectorAll("[data-animate]").forEach((el) => {
      lbAnimationObserver.observe(el)
    })

    // Observe additional elements
    document
      .querySelectorAll(
        ".lb-stat-block, .lb-collection-card, .lb-resource-card, .lb-space-card, .lb-hours-card, .lb-service-tile, .lb-rule-item",
      )
      .forEach((el) => {
        lbAnimationObserver.observe(el)
      })

    // ========== COUNTER ANIMATION ==========
    function lbAnimateCounter(element, target) {
      let current = 0
      const increment = target / 100
      const timer = setInterval(() => {
        current += increment
        if (current >= target) {
          current = target
          clearInterval(timer)
        }
        element.textContent = Math.floor(current).toLocaleString()
      }, 15)
    }

    const lbStatsObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll(".lb-stat-number")
            counters.forEach((counter) => {
              const target = Number.parseInt(counter.dataset.count)
              lbAnimateCounter(counter, target)
            })
            lbStatsObserver.unobserve(entry.target)
          }
        })
      },
      { threshold: 0.3 },
    )

    const statsSection = document.querySelector(".lb-stats-banner")
    if (statsSection) {
      lbStatsObserver.observe(statsSection)
    }

    // ========== FILTER CHIPS ==========
    const filterChips = document.querySelectorAll(".lb-filter-chip")
    filterChips.forEach((chip) => {
      chip.addEventListener("click", () => {
        filterChips.forEach((c) => c.classList.remove("lb-active"))
        chip.classList.add("lb-active")
      })
    })

    // ========== SEARCH FUNCTIONALITY ==========
    const searchBtn = document.querySelector(".lb-search-btn")
    const searchInput = document.querySelector(".lb-search-input")

    searchBtn.addEventListener("click", () => {
      const query = searchInput.value.trim()
      if (query) {
        searchBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Searching...'
        setTimeout(() => {
          searchBtn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Found!'
          setTimeout(() => {
            searchBtn.innerHTML = '<i class="bi bi-search"></i> Search'
          }, 2000)
        }, 1500)
      }
    })

    // ========== BOOKS CAROUSEL SCROLL ==========
    const booksCarousel = document.querySelector(".lb-books-carousel")
    let isDown = false
    let startX
    let scrollLeft

    booksCarousel.addEventListener("mousedown", (e) => {
      isDown = true
      booksCarousel.style.cursor = "grabbing"
      startX = e.pageX - booksCarousel.offsetLeft
      scrollLeft = booksCarousel.scrollLeft
    })

    booksCarousel.addEventListener("mouseleave", () => {
      isDown = false
      booksCarousel.style.cursor = "grab"
    })

    booksCarousel.addEventListener("mouseup", () => {
      isDown = false
      booksCarousel.style.cursor = "grab"
    })

    booksCarousel.addEventListener("mousemove", (e) => {
      if (!isDown) return
      e.preventDefault()
      const x = e.pageX - booksCarousel.offsetLeft
      const walk = (x - startX) * 2
      booksCarousel.scrollLeft = scrollLeft - walk
    })

    // ========== COLLECTION CARDS STAGGER ==========
    document.querySelectorAll(".lb-collection-card").forEach((card, index) => {
      card.style.transitionDelay = `${index * 0.1}s`
    })

    // ========== RESOURCE CARDS HOVER EFFECT ==========
    document.querySelectorAll(".lb-resource-card").forEach((card) => {
      card.addEventListener("mouseenter", function () {
        this.style.transform = "translateY(-10px)"
      })
      card.addEventListener("mouseleave", function () {
        this.style.transform = "translateY(0)"
      })
    })

    // ========== SCROLL PROGRESS ==========
    const lbProgressBar = document.createElement("div")
    lbProgressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--lb-secondary), var(--lb-accent));
            z-index: 9999;
            transition: width 0.1s ease;
            width: 0%;
        `
    document.body.appendChild(lbProgressBar)

    window.addEventListener("scroll", () => {
      const scrollTop = window.scrollY
      const docHeight = document.documentElement.scrollHeight - window.innerHeight
      const scrollPercent = (scrollTop / docHeight) * 100
      lbProgressBar.style.width = scrollPercent + "%"
    })

    // ========== FLOATING BOOKS RANDOM ANIMATION ==========
    document.querySelectorAll(".lb-float-book").forEach((book, index) => {
      book.style.animationDuration = `${12 + Math.random() * 8}s`
      book.style.animationDelay = `${index * 2}s`
    })

    // ========== ACTION BUTTONS RIPPLE ==========
    document.querySelectorAll(".lb-action-btn, .lb-cta-btn, .lb-book-btn").forEach((btn) => {
      btn.addEventListener("click", function (e) {
        const rect = this.getBoundingClientRect()
        const x = e.clientX - rect.left
        const y = e.clientY - rect.top

        const ripple = document.createElement("span")
        ripple.style.cssText = `
                    position: absolute;
                    background: rgba(255,255,255,0.4);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: lb-ripple 0.6s ease-out;
                    pointer-events: none;
                    left: ${x}px;
                    top: ${y}px;
                    width: 150px;
                    height: 150px;
                    margin-left: -75px;
                    margin-top: -75px;
                `

        this.style.position = "relative"
        this.style.overflow = "hidden"
        this.appendChild(ripple)

        setTimeout(() => ripple.remove(), 600)
      })
    })

    // Add ripple animation
    const lbStyle = document.createElement("style")
    lbStyle.textContent = `
            @keyframes lb-ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `
    document.head.appendChild(lbStyle)

    // ========== SMOOTH SCROLL ==========
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href")
        if (href !== "#") {
          e.preventDefault()
          const target = document.querySelector(href)
          if (target) {
            target.scrollIntoView({
              behavior: "smooth",
              block: "start",
            })
          }
        }
      })
    })

    // ========== SPACE CARDS SEQUENTIAL ANIMATION ==========
    const spaceCards = document.querySelectorAll(".lb-space-card")
    spaceCards.forEach((card, index) => {
      card.style.transitionDelay = `${index * 0.15}s`
    })

    // ========== PARALLAX ON HERO ==========
    window.addEventListener("scroll", () => {
      const hero = document.querySelector(".lb-immersive-hero")
      const scrolled = window.pageYOffset

      if (hero && scrolled < hero.offsetHeight) {
        const floatingBooks = document.querySelectorAll(".lb-float-book")
        floatingBooks.forEach((book, index) => {
          const speed = 0.2 + index * 0.1
          book.style.transform = `translateY(${scrolled * speed}px)`
        })
      }
    })

    // ========== SERVICE TILES STAGGER ==========
    document.querySelectorAll(".lb-service-tile").forEach((tile, index) => {
      tile.style.transitionDelay = `${index * 0.1}s`
    })

    // ========== RULE ITEMS STAGGER ==========
    document.querySelectorAll(".lb-rule-item").forEach((item, index) => {
      item.style.transitionDelay = `${index * 0.08}s`
    })
  }, 2500) // Wait 2.5 seconds for preloader to complete
})
