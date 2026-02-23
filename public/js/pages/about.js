document.addEventListener("DOMContentLoaded", () => {
  console.log("[v0] About JS animations initializing...")

  // 1. Safe Year Update
  const yearEl = document.getElementById("currentYear")
  if (yearEl) {
    yearEl.textContent = new Date().getFullYear()
  }

  const abObserverOptions = {
    root: null,
    threshold: 0.15,
    rootMargin: "0px 0px -100px 0px",
  }

  const abAnimationObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const target = entry.target
        const delay = Number.parseInt(target.dataset.delay) || 0

        setTimeout(() => {
          target.classList.add("ab-visible")
          target.style.opacity = "1"
          target.style.visibility = "visible"
          console.log("[v0] Animated element:", target.className)
        }, delay)

        // Only observe once
        abAnimationObserver.unobserve(target)
      }
    })
  }, abObserverOptions)

  const elementsToAnimate = document.querySelectorAll(`
        [data-animate], 
        .ab-mvv-card, 
        .ab-timeline-item, 
        .ab-team-card, 
        .ab-accreditation-card, 
        .ab-campus-card, 
        .ab-testimonial-card,
        .ab-section-heading,
        .ab-story-image,
        .ab-story-content,
        .ab-stats-section,
        .ab-cta-section,
        .ab-mvv-container > div,
        .ab-timeline-wrapper > div,
        .ab-team-grid > div,
        .ab-accreditation-grid > div,
        .ab-campus-grid > div,
        .ab-testimonial-grid > div,
        .ab-testimonial-wrapper > div
    `)

  console.log("[v0] Total elements to animate:", elementsToAnimate.length)

  elementsToAnimate.forEach((el, index) => {
    el.style.opacity = "0"
    el.style.visibility = "hidden"

    if (!el.dataset.delay && el.parentElement) {
      const childIndex = Array.from(el.parentElement.children).indexOf(el)
      el.dataset.delay = childIndex * 100 // 100ms stagger between items
    }

    abAnimationObserver.observe(el)
  })

  const handleCountUp = () => {
    const counters = document.querySelectorAll(".ab-stat-number")
    counters.forEach((counter) => {
      if (counter.classList.contains("ab-visible")) {
        const target = Number.parseInt(counter.dataset.target) || 0
        const increment = target / 50
        let current = Number.parseInt(counter.textContent) || 0

        if (current < target) {
          current += increment
          counter.textContent = Math.floor(current)
          requestAnimationFrame(handleCountUp)
        }
      }
    })
  }

  // Trigger counter animation when stats section is visible
  const statsObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !entry.target.classList.contains("ab-counting")) {
          entry.target.classList.add("ab-counting")
          handleCountUp()
        }
      })
    },
    { threshold: 0.5 },
  )

  const statsSection = document.querySelector(".ab-stats-section")
  if (statsSection) {
    statsObserver.observe(statsSection)
  }
})
