import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';
import 'drift-zoom/dist/drift-basic.min.css';
import AOS from 'aos';
import Drift from 'drift-zoom';
import GLightbox from 'glightbox';
import PureCounter from '@srexi/purecounterjs';

Alpine.plugin(focus)
window.Alpine = Alpine

// Esto le dice a Livewire: "usa este Alpine, no metas otro"
document.addEventListener('alpine:init', () => {
    window.Livewire?.start()
})

Alpine.start()
// 1. Inicializar AOS (animaciones al hacer scroll)
document.addEventListener('DOMContentLoaded', () => {
  AOS.init({
    duration: 600,
    easing: 'ease-in-out',
    once: true,
    mirror: false
  });
});

document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.getElementById('anuncio-wrapper');
    if (!wrapper) return;
    const slides = wrapper.children;
    const slideCount = slides.length;
    let current = 0;

    setInterval(() => {
        current = (current + 1) % slideCount;
        wrapper.style.transform = `translateY(-${current * 2.5}rem)`; // 2.5rem = h-10
    }, 5000);
});

// 3. Inicializar GLightbox (galería de imágenes)
document.addEventListener('DOMContentLoaded', () => {
  GLightbox({ selector: '.glightbox' });
});

// 4. Inicializar PureCounter (contadores animados)
document.addEventListener('DOMContentLoaded', () => {
  new PureCounter();
});

// 5. Inicializar Drift Zoom (zoom en imágenes de producto)
document.addEventListener('DOMContentLoaded', () => {
  const mainImage = document.getElementById('main-product-image');
  if (mainImage) {
    new Drift(mainImage, {
      paneContainer: document.querySelector('.image-zoom-container'),
      inlinePane: window.innerWidth < 768,
      inlineOffsetY: -85,
      containInline: true,
      hoverBoundingBox: false,
      zoomFactor: 3,
      handleTouch: false
    });
  }
});

// 6. Contador regresivo (para ofertas, etc.)
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.countdown').forEach(countDownItem => {
    function updateCountDown() {
      const timeleft = new Date(countDownItem.getAttribute('data-count')).getTime() - new Date().getTime();
      const days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
      const hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

      const daysElement = countDownItem.querySelector('.count-days');
      const hoursElement = countDownItem.querySelector('.count-hours');
      const minutesElement = countDownItem.querySelector('.count-minutes');
      const secondsElement = countDownItem.querySelector('.count-seconds');

      if (daysElement) daysElement.innerHTML = days;
      if (hoursElement) hoursElement.innerHTML = hours;
      if (minutesElement) minutesElement.innerHTML = minutes;
      if (secondsElement) secondsElement.innerHTML = seconds;
    }
    updateCountDown();
    setInterval(updateCountDown, 1000);
  });
});

// const container = document.querySelector('.container');
// const registerBtn = document.querySelector('.register-btn');
// const loginBtn = document.querySelector('.login-btn');

// registerBtn.addEventListener('click', () => {
//     container.classList.add('active');
// })

// loginBtn.addEventListener('click', () => {
//     container.classList.remove('active');
// })
