(function () {
  "use strict";

  var root = document.querySelector(".tm-carousel");
  if (!root) return;

  var track = root.querySelector(".tm-track");
  var viewport = root.querySelector(".tm-viewport");
  var slides = Array.prototype.slice.call(root.querySelectorAll(".tm-card"));
  var dotsWrap = root.querySelector(".tm-dots");
  var prevBtn = root.querySelector(".tm-prev");
  var nextBtn = root.querySelector(".tm-next");

  var DELAY = 5000;
  var autoplay = !(
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches
  );

  var index = 0;
  var timer = null;
  var dots = [];

  slides.forEach(function (slide, i) {
    slide.setAttribute("role", "group");
    slide.setAttribute("aria-roledescription", "slide");
    slide.setAttribute("aria-label", i + 1 + " of " + slides.length);

    var dot = document.createElement("button");
    dot.type = "button";
    dot.className = "tm-dot";
    dot.setAttribute("role", "tab");
    dot.setAttribute("aria-label", "Go to testimonial " + (i + 1));
    dot.addEventListener("click", function () {
      goTo(i);
    });
    dotsWrap.appendChild(dot);
    dots.push(dot);
  });

  function render() {
    track.style.transform = "translateX(" + -index * 100 + "%)";
    slides.forEach(function (slide, i) {
      var active = i === index;
      slide.classList.toggle("is-active", active);
      slide.setAttribute("aria-hidden", active ? "false" : "true");
    });
    dots.forEach(function (dot, i) {
      var active = i === index;
      dot.classList.toggle("is-active", active);
      dot.setAttribute("aria-selected", active ? "true" : "false");
    });
  }

  function stop() {
    clearTimeout(timer);
    timer = null;
  }

  function schedule() {
    stop();
    if (!autoplay || slides.length < 2 || document.hidden) return;
    timer = setTimeout(function () {
      goTo(index + 1);
    }, DELAY);
  }

  function goTo(i) {
    index = (i + slides.length) % slides.length;
    render();
    schedule();
  }

  prevBtn.addEventListener("click", function () {
    goTo(index - 1);
  });
  nextBtn.addEventListener("click", function () {
    goTo(index + 1);
  });

  root.addEventListener("keydown", function (e) {
    if (e.key === "ArrowLeft") {
      e.preventDefault();
      goTo(index - 1);
    } else if (e.key === "ArrowRight") {
      e.preventDefault();
      goTo(index + 1);
    }
  });

  // Swipe support
  var startX = null;
  var startY = null;
  viewport.addEventListener(
    "touchstart",
    function (e) {
      startX = e.touches[0].clientX;
      startY = e.touches[0].clientY;
    },
    { passive: true },
  );
  viewport.addEventListener(
    "touchend",
    function (e) {
      if (startX === null) return;
      var dx = e.changedTouches[0].clientX - startX;
      var dy = e.changedTouches[0].clientY - startY;
      startX = startY = null;
      if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) {
        goTo(dx < 0 ? index + 1 : index - 1);
      }
    },
    { passive: true },
  );

  // Don't keep cycling in a background tab
  document.addEventListener("visibilitychange", schedule);

  render();
  schedule();
})();
