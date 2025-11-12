import './bootstrap';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';
import 'drift-zoom/dist/drift-basic.min.css';

console.log('%c✅ app.js cargó', 'color: lime; font-weight: bold;');
console.log('%c✨ Tabs re-inicializados', 'color: violet');

import '../../node_modules/tail.datetime/langs/tail.datetime-es.js';
import '../../node_modules/tail.datetime/css/tail.datetime-harx-light.css';
import '../css/datepicker.css';
import tailDateTime from 'tail.datetime';

document.addEventListener('DOMContentLoaded', () => {
    // Selecciona todos los inputs que tengan la clase .datepicker-custom
    const datepickers = document.querySelectorAll('.datepicker-custom');

    datepickers.forEach(input => {
        tailDateTime(input, {
            dateFormat: 'dd/mm/YYYY',
            timeFormat: false,
            locale: 'es',
            position: 'top',
            animate: true,
            stayOpen: false,
            closeButton: true,
            classNames: 'shadow-lg',
        });
    });


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
