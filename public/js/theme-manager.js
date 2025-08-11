// resources/js/theme-manager.js
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    // Thème
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const htmlElement = document.documentElement;

    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const savedTheme = localStorage.getItem('theme') || (prefersDark ? 'dark' : 'light');
    htmlElement.classList.toggle('dark', savedTheme === 'dark');
    themeIcon.classList.toggle('fa-sun', savedTheme === 'light');
    themeIcon.classList.toggle('fa-moon', savedTheme === 'dark');

    themeToggle.addEventListener('click', () => {
        const isDark = htmlElement.classList.toggle('dark');
        themeIcon.classList.toggle('fa-sun', !isDark);
        themeIcon.classList.toggle('fa-moon', isDark);
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });

    // Langue
    const currentLang = localStorage.getItem('language') || 'fr';
    document.getElementById('current-lang').textContent = currentLang.toUpperCase();

    window.changeLanguage = (lang) => {
        localStorage.setItem('language', lang);
        document.getElementById('current-lang').textContent = lang.toUpperCase();
        // Exemple de traduction statique (remplace par ton système réel)
        const translations = {
            fr: {
                'nav.home': 'Accueil',
                'nav.products': 'Produits',
                'nav.cooperatives': 'Coopératives',
                'nav.categories': 'Catégories',
                'nav.about': 'À propos',
                'nav.contact': 'Contact',
                'nav.login': 'Connexion',
                'nav.dashboard': 'Tableau de bord',
                'nav.profile': 'Mon Profil',
                'nav.orders': 'Mes Commandes',
                'nav.logout': 'Déconnexion'
            },
            ar: {
                'nav.home': 'الرئيسية',
                'nav.products': 'المنتجات',
                'nav.cooperatives': 'التعاونيات',
                'nav.categories': 'الفئات',
                'nav.about': 'حول',
                'nav.contact': 'اتصل',
                'nav.login': 'تسجيل الدخول',
                'nav.dashboard': 'لوحة القيادة',
                'nav.profile': 'الملف الشخصي',
                'nav.orders': 'الطلبات',
                'nav.logout': 'تسجيل الخروج'
            },
            en: {
                'nav.home': 'Home',
                'nav.products': 'Products',
                'nav.cooperatives': 'Cooperatives',
                'nav.categories': 'Categories',
                'nav.about': 'About',
                'nav.contact': 'Contact',
                'nav.login': 'Login',
                'nav.dashboard': 'Dashboard',
                'nav.profile': 'Profile',
                'nav.orders': 'Orders',
                'nav.logout': 'Logout'
            },
        };
        document.querySelectorAll('[data-translate]').forEach(el => {
            const key = el.getAttribute('data-translate');
            el.textContent = translations[lang][key] || el.textContent;
        });
    };

    // Appliquer la langue initiale
    changeLanguage(currentLang);
});
