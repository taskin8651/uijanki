// AOS Init
AOS.init({
  duration: 850,
  easing: "ease-out-cubic",
  once: true,
  offset: 80
});

// Sticky header shadow
const header = document.getElementById("mainHeader");

window.addEventListener("scroll", () => {
  if (window.scrollY > 30) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

// Counter animation
const counters = document.querySelectorAll(".counter");

const runCounter = (counter) => {
  const target = Number(counter.getAttribute("data-target"));
  const speed = 35;
  let count = 0;
  const increment = Math.ceil(target / speed);

  const update = () => {
    count += increment;

    if (count < target) {
      counter.innerText = count + "+";
      requestAnimationFrame(update);
    } else {
      counter.innerText = target + "+";
    }
  };

  update();
};

const counterObserver = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      runCounter(entry.target);
      observer.unobserve(entry.target);
    }
  });
}, {
  threshold: 0.4
});

counters.forEach(counter => counterObserver.observe(counter));

// Close mobile menu after clicking nav link
document.querySelectorAll(".navbar-nav .nav-link").forEach(link => {
  link.addEventListener("click", () => {
    const navbarCollapse = document.querySelector(".navbar-collapse");
    if (navbarCollapse.classList.contains("show")) {
      const bsCollapse = new bootstrap.Collapse(navbarCollapse);
      bsCollapse.hide();
    }
  });
});








// ================= HERO IMAGE SLIDER START =================

document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".hero-slider-dots button");

  if (!slides.length || !dots.length) return;

  let currentSlide = 0;
  let sliderTimer;

  function showSlide(index) {
    slides.forEach(function (slide) {
      slide.classList.remove("active");
    });

    dots.forEach(function (dot) {
      dot.classList.remove("active");
    });

    slides[index].classList.add("active");
    dots[index].classList.add("active");

    currentSlide = index;
  }

  function nextSlide() {
    let nextIndex = currentSlide + 1;

    if (nextIndex >= slides.length) {
      nextIndex = 0;
    }

    showSlide(nextIndex);
  }

  function startSlider() {
    sliderTimer = setInterval(nextSlide, 3000);
  }

  function resetSlider() {
    clearInterval(sliderTimer);
    startSlider();
  }

  dots.forEach(function (dot, index) {
    dot.addEventListener("click", function () {
      showSlide(index);
      resetSlider();
    });
  });

  showSlide(0);
  startSlider();
});

// ================= HERO IMAGE SLIDER END =================








// ================= IMPACT NUMBERS COUNTER START =================

document.addEventListener("DOMContentLoaded", function () {
  const impactSection = document.querySelector(".impact-numbers-section");
  const counters = document.querySelectorAll(".impact-counter");

  if (!impactSection || counters.length === 0) return;

  let counterStarted = false;

  function animateCounter(counter) {
    const target = Number(counter.getAttribute("data-target")) || 0;
    const duration = 1700;
    const startTime = performance.now();

    function updateCounter(currentTime) {
      const elapsedTime = currentTime - startTime;
      const progress = Math.min(elapsedTime / duration, 1);

      const easeOut = 1 - Math.pow(1 - progress, 3);
      const currentValue = Math.floor(easeOut * target);

      counter.textContent = currentValue;

      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      } else {
        counter.textContent = target;
      }
    }

    requestAnimationFrame(updateCounter);
  }

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting && !counterStarted) {
        counterStarted = true;

        counters.forEach(function (counter) {
          counter.textContent = "0";
          animateCounter(counter);
        });
      }
    });
  }, {
    threshold: 0.35
  });

  observer.observe(impactSection);
});

// ================= IMPACT NUMBERS COUNTER END =================