// public/js/app.js
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import Alpine from 'alpinejs';
import TranslationManager from './translations.js';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Initialize TranslationManager
document.addEventListener('DOMContentLoaded', () => {
    window.translationManager = new TranslationManager();
});
