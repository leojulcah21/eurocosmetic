import './bootstrap';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';
import 'drift-zoom/dist/drift-basic.min.css';

import '../../node_modules/tail.datetime/langs/tail.datetime-es.js';
import '../../node_modules/tail.datetime/css/tail.datetime-harx-light.css';
import '../css/datepicker.css';
import tailDateTime from 'tail.datetime';

console.log('%c✅ app.js cargó', 'color: lime; font-weight: bold;');

// ----------- DOMContentLoaded -----------
document.addEventListener('DOMContentLoaded', () => {
    // ----------- Datepickers -----------
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

    // ----------- Slider de anuncios -----------
    const wrapper = document.getElementById('anuncio-wrapper');
    if (wrapper) {
        const slides = wrapper.children;
        let current = 0;
        setInterval(() => {
            current = (current + 1) % slides.length;
            wrapper.style.transform = `translateY(-${current * 2.5}rem)`;
        }, 5000);
    }
});
