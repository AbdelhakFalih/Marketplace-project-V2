// public/js/app.js
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import Alpine from 'alpinejs';
import TranslationManager from './translations.js';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Initialize TranslationManager
document.addEventListener('DOMContentLoaded', function() {
    const languageSelect = document.getElementById('languageSelect');
    const languageDropdown = document.getElementById('languageDropdown');
    const themeToggle = document.getElementById('themeToggle');
    const html = document.documentElement;

    // Theme Management
    const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    html.setAttribute('data-theme', savedTheme);
    updateThemeToggleText(savedTheme);

    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeToggleText(newTheme);
        });
    }

    function updateThemeToggleText(theme) {
        if (themeToggle) {
            const lang = TranslationManager.getLanguage();
            themeToggle.querySelector('span').textContent = translations[lang]['nav.theme'] || 'Mode sombre';
        }
    }

    // Language Management
    const savedLanguage = localStorage.getItem('language') || 'fr';
    if (languageSelect) {
        languageSelect.value = savedLanguage;
    }
    if (languageDropdown) {
        const currentLangSpan = document.getElementById('current-lang');
        currentLangSpan.setAttribute('data-translate', `nav.language`);
        TranslationManager.translatePage();
    }
    TranslationManager.setLanguage(savedLanguage);
    html.setAttribute('dir', savedLanguage === 'ar' ? 'rtl' : 'ltr');

    if (languageSelect) {
        languageSelect.addEventListener('change', function() {
            const newLanguage = this.value;
            TranslationManager.setLanguage(newLanguage);
            localStorage.setItem('language', newLanguage);
            html.setAttribute('dir', newLanguage === 'ar' ? 'rtl' : 'ltr');
            updateLanguageDisplay(newLanguage);
            updateThemeToggleText(html.getAttribute('data-theme'));
            document.dispatchEvent(new Event('languageChanged'));
        });
    }

    if (languageDropdown) {
        document.querySelectorAll('.lang-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const newLanguage = this.getAttribute('data-lang');
                TranslationManager.setLanguage(newLanguage);
                localStorage.setItem('language', newLanguage);
                html.setAttribute('dir', newLanguage === 'ar' ? 'rtl' : 'ltr');
                updateLanguageDisplay(newLanguage);
                updateThemeToggleText(html.getAttribute('data-theme'));
                document.dispatchEvent(new Event('languageChanged'));
            });
        });
    }

    function updateLanguageDisplay(language) {
        if (languageDropdown) {
            const currentLangSpan = document.getElementById('current-lang');
            currentLangSpan.setAttribute('data-translate', `nav.language`);
            TranslationManager.translatePage();
        }
    }

    // Apply translations on load
    TranslationManager.translatePage();
});
