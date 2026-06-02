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








// ================= EVENT WISE GALLERY FILTER START =================

document.addEventListener("DOMContentLoaded", function () {
  const filterLinks = document.querySelectorAll(".event-wise-filter a");
  const cards = document.querySelectorAll(".event-wise-card");

  if (!filterLinks.length || !cards.length) {
    return;
  }

  filterLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      filterLinks.forEach(function (item) {
        item.classList.remove("active");
      });

      this.classList.add("active");

      const filter = this.getAttribute("data-filter");

      cards.forEach(function (card) {
        const types = card.getAttribute("data-filter-types") || "";

        if (filter === "all" || types.includes(filter)) {
          card.style.display = "";
          return;
        }

        card.style.display = "none";
      });
    });
  });
});

// ================= EVENT WISE GALLERY FILTER END =================




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




// ================= MOBILE GALLERY LIGHTBOX START =================

document.addEventListener("DOMContentLoaded", function () {
  const albumCards = Array.from(document.querySelectorAll(".event-album-select-card"));

  const lightbox = document.getElementById("premiumLightbox");
  const mediaBox = document.getElementById("lightboxMediaBox");
  const closeBtn = document.getElementById("lightboxClose");
  const prevBtn = document.getElementById("lightboxPrev");
  const nextBtn = document.getElementById("lightboxNext");

  let currentMediaList = [];
  let currentIndex = 0;

  if (!lightbox || !mediaBox || !closeBtn || !prevBtn || !nextBtn || albumCards.length === 0) {
    return;
  }

  function escapeAttribute(value) {
    return String(value || "")
      .replace(/&/g, "&amp;")
      .replace(/"/g, "&quot;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;");
  }

  function renderMedia() {
    if (!currentMediaList.length) {
      mediaBox.innerHTML = [
        '<div class="lightbox-empty-message">',
        "<h3>No Media Found</h3>",
        "<p>No photos or videos are available for this event.</p>",
        "</div>"
      ].join("");
      return;
    }

    const media = currentMediaList[currentIndex];
    const src = escapeAttribute(media.src);

    if (media.type === "video") {
      mediaBox.innerHTML = [
        '<iframe src="', src, '"',
        ' title="Event Video"',
        ' allow="autoplay; fullscreen; picture-in-picture"',
        " allowfullscreen>",
        "</iframe>"
      ].join("");
      return;
    }

    mediaBox.innerHTML = '<img src="' + src + '" alt="Event Gallery Image">';
  }

  function openLightbox(card) {
    const mediaSources = Array.from(card.querySelectorAll(".gallery-media-source"));

    currentMediaList = mediaSources.map(function (item) {
      return {
        src: item.getAttribute("data-src"),
        type: item.getAttribute("data-type")
      };
    }).filter(function (media) {
      return media.src;
    });

    if (!currentMediaList.length && card.getAttribute("data-cover-src")) {
      currentMediaList = [{
        src: card.getAttribute("data-cover-src"),
        type: "image"
      }];
    }

    currentIndex = 0;

    albumCards.forEach(function (item) {
      item.classList.remove("active");
    });

    card.classList.add("active");
    renderMedia();

    lightbox.classList.add("active");
    document.body.style.overflow = "hidden";
  }

  function closeLightbox() {
    lightbox.classList.remove("active");
    mediaBox.innerHTML = "";
    document.body.style.overflow = "";
  }

  function showPrev() {
    if (!currentMediaList.length) return;

    currentIndex -= 1;

    if (currentIndex < 0) {
      currentIndex = currentMediaList.length - 1;
    }

    renderMedia();
  }

  function showNext() {
    if (!currentMediaList.length) return;

    currentIndex += 1;

    if (currentIndex >= currentMediaList.length) {
      currentIndex = 0;
    }

    renderMedia();
  }

  albumCards.forEach(function (card) {
    card.addEventListener("click", function () {
      openLightbox(card);
    });
  });

  closeBtn.addEventListener("click", closeLightbox);
  prevBtn.addEventListener("click", showPrev);
  nextBtn.addEventListener("click", showNext);

  lightbox.addEventListener("click", function (event) {
    if (event.target === lightbox) {
      closeLightbox();
    }
  });

  document.addEventListener("keydown", function (event) {
    if (!lightbox.classList.contains("active")) {
      return;
    }

    if (event.key === "Escape") {
      closeLightbox();
    }

    if (event.key === "ArrowLeft") {
      showPrev();
    }

    if (event.key === "ArrowRight") {
      showNext();
    }
  });
});

// ================= MOBILE GALLERY LIGHTBOX END =================
