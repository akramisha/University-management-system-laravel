document.body.classList.add("js-enabled")

// ========== READING PROGRESS BAR ==========
function updateReadingProgress() {
  const scrollTop = window.scrollY
  const docHeight = document.documentElement.scrollHeight - window.innerHeight
  const scrollPercent = (scrollTop / docHeight) * 100
  document.getElementById("readingProgress").style.width = scrollPercent + "%"
}

window.addEventListener("scroll", updateReadingProgress)

// ========== BACK TO TOP BUTTON ==========
const backToTopBtn = document.getElementById("backToTop")

window.addEventListener("scroll", () => {
  if (window.scrollY > 500) {
    backToTopBtn.classList.add("pp-visible")
  } else {
    backToTopBtn.classList.remove("pp-visible")
  }
})

backToTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  })
})

// ========== INTERSECTION OBSERVER FOR ANIMATIONS ==========
const ppObserverOptions = {
  root: null,
  rootMargin: "0px 0px -100px 0px",
  threshold: 0.15,
}

const ppAnimationObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const delay = entry.target.dataset.delay || 0
      setTimeout(() => {
        entry.target.classList.add("pp-visible")
      }, Number.parseInt(delay))
      ppAnimationObserver.unobserve(entry.target)
    }
  })
}, ppObserverOptions)

document.querySelectorAll("[data-animate]").forEach((el) => {
  ppAnimationObserver.observe(el)
})

document.querySelectorAll(".pp-summary-card, .pp-right-card, .pp-cookie-card").forEach((el) => {
  ppAnimationObserver.observe(el)
})

// ========== EXPANDABLE SECTIONS ==========
document.querySelectorAll(".pp-expandable-header").forEach((header) => {
  header.addEventListener("click", () => {
    const expandable = header.parentElement
    expandable.classList.toggle("pp-expanded")
  })
})

// ========== TOC ACTIVE STATE ON SCROLL ==========
const ppSections = document.querySelectorAll(
  ".pp-policy-section, .pp-rights-section, .pp-cookie-section, .pp-contact-section",
)
const ppTocLinks = document.querySelectorAll(".pp-toc-link")

function updateActiveSection() {
  let current = ""

  ppSections.forEach((section) => {
    const sectionTop = section.offsetTop
    const sectionHeight = section.offsetHeight
    const scrollPosition = window.scrollY + 250

    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
      current = section.getAttribute("id")
    }
  })

  // If no section is currently in view, default to first section
  if (!current && ppSections.length > 0) {
    current = ppSections[0].getAttribute("id")
  }

  ppTocLinks.forEach((link) => {
    link.classList.remove("pp-active")
    if (link.getAttribute("href") === `#${current}`) {
      link.classList.add("pp-active")
    }
  })
}

updateActiveSection()
window.addEventListener("scroll", updateActiveSection)

// ========== SMOOTH SCROLL FOR TOC LINKS ==========
ppTocLinks.forEach((link) => {
  link.addEventListener("click", function (e) {
    e.preventDefault()
    const targetId = this.getAttribute("href")
    const targetSection = document.querySelector(targetId)

    if (targetSection) {
      const offsetTop = targetSection.offsetTop - 100
      window.scrollTo({
        top: offsetTop,
        behavior: "smooth",
      })

      setTimeout(() => {
        updateActiveSection()
      }, 100)
    }
  })
})

// ========== COOKIE TOGGLE ANIMATION ==========
document.querySelectorAll(".pp-cookie-toggle input").forEach((toggle) => {
  toggle.addEventListener("change", function () {
    const card = this.closest(".pp-cookie-card")
    if (this.checked) {
      card.style.borderColor = "var(--pp-secondary)"
    } else {
      card.style.borderColor = "rgba(255, 255, 255, 0.15)"
    }
  })
})

// ========== PRINT BUTTON ANIMATION ==========
document.querySelectorAll(".pp-quick-btn").forEach((btn) => {
  btn.addEventListener("click", function () {
    this.style.transform = "translateX(15px) scale(0.98)"
    setTimeout(() => {
      this.style.transform = ""
    }, 200)
  })
})

// ========== DATA ITEMS HOVER STAGGER ==========
document.querySelectorAll(".pp-data-list").forEach((list) => {
  const items = list.querySelectorAll(".pp-data-item")
  items.forEach((item, index) => {
    item.style.transitionDelay = `${index * 0.05}s`
  })
})

// ========== HIGHLIGHT BOX ANIMATION ==========
const ppHighlightObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.animation = "pp-highlight-pulse 0.6s ease"
      }
    })
  },
  { threshold: 0.5 },
)

document.querySelectorAll(".pp-highlight-box").forEach((box) => {
  ppHighlightObserver.observe(box)
})

// Add highlight pulse animation
const ppStyle = document.createElement("style")
ppStyle.textContent = `
  @keyframes pp-highlight-pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.02); }
    100% { transform: scale(1); }
  }
`
document.head.appendChild(ppStyle)

// ========== CONTACT BUTTON RIPPLE ==========
const contactBtn = document.querySelector(".pp-contact-btn")
if (contactBtn) {
  contactBtn.addEventListener("click", function (e) {
    const rect = this.getBoundingClientRect()
    const x = e.clientX - rect.left
    const y = e.clientY - rect.top

    const ripple = document.createElement("span")
    ripple.style.cssText = `
      position: absolute;
      background: rgba(255,255,255,0.4);
      border-radius: 50%;
      transform: scale(0);
      animation: pp-ripple 0.6s ease-out;
      pointer-events: none;
      left: ${x}px;
      top: ${y}px;
      width: 200px;
      height: 200px;
      margin-left: -100px;
      margin-top: -100px;
    `

    this.style.position = "relative"
    this.style.overflow = "hidden"
    this.appendChild(ripple)

    setTimeout(() => ripple.remove(), 600)
  })
}

// Add ripple animation
const ppRippleStyle = document.createElement("style")
ppRippleStyle.textContent = `
  @keyframes pp-ripple {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }
`
document.head.appendChild(ppRippleStyle)

// ========== VERSION ITEMS STAGGER ==========
document.querySelectorAll(".pp-version-item").forEach((item, index) => {
  item.style.transitionDelay = `${index * 0.1}s`
  item.style.opacity = "0"
  item.style.transform = "translateX(-20px)"

  setTimeout(
    () => {
      item.style.transition = "all 0.5s ease"
      item.style.opacity = "1"
      item.style.transform = "translateX(0)"
    },
    500 + index * 150,
  )
})

// ========== SIDEBAR STICKY SHADOW ==========
window.addEventListener("scroll", () => {
  const sidebar = document.querySelector(".pp-sidebar")
  if (sidebar) {
    if (window.scrollY > 300) {
      sidebar.style.filter = "drop-shadow(0 10px 30px rgba(0, 109, 119, 0.15))"
    } else {
      sidebar.style.filter = "none"
    }
  }
})
