// public/js/translations.js
export default class TranslationManager {
    constructor() {
        this.currentLanguage = localStorage.getItem('language') || 'fr';
        this.translations = {
            fr: {
                // Navigation
                'nav.home': 'Accueil',
                'nav.products': 'Produits',
                'nav.cooperatives': 'Coopératives',
                'nav.categories': 'Catégories',
                'nav.about': 'À propos',
                'nav.contact': 'Contact',
                'nav.login': 'Connexion',
                'nav.register': 'Inscription',
                'nav.logout': 'Déconnexion',
                'nav.dashboard': 'Tableau de bord',
                'nav.profile': 'Mon Profil',
                'nav.orders': 'Mes Commandes',
                'nav.account': 'Compte',
                'nav.notifications': 'Notifications',
                'nav.view-all': 'Voir tout',
                'nav.order-shipped': 'Commande expédiée',
                'nav.product-promo': 'Produit en promotion',
                'nav.back-to-site': 'Retour au site',
                // Site
                'site.name': 'CoopMarket',
                'site.tagline': 'Marketplace Coopérative',
                // Contact
                'contact.phone': '+212 123 456 789',
                'contact.email': 'contact@marketplace.ma',
                // Search
                'search.placeholder': 'Rechercher des produits, coopératives...',
                'search.button': 'Rechercher',
                // Home
                'home.hero.title': 'Bienvenue sur notre Marketplace',
                'home.hero.subtitle': 'Découvrez des milliers de produits et services de qualité. Achetez, vendez et échangez en toute sécurité.',
                'home.cta.start': 'Commencer',
                'home.cta.learn': 'En savoir plus',
            },
            ar: {
                'nav.home': 'الرئيسية',
                'nav.products': 'المنتجات',
                'nav.cooperatives': 'التعاونيات',
                'nav.categories': 'الفئات',
                'nav.about': 'حول',
                'nav.contact': 'اتصل',
                'nav.login': 'تسجيل الدخول',
                'nav.register': 'التسجيل',
                'nav.logout': 'تسجيل الخروج',
                'nav.dashboard': 'لوحة التحكم',
                'nav.profile': 'ملفي الشخصي',
                'nav.orders': 'طلباتي',
                'nav.account': 'الحساب',
                'nav.notifications': 'الإشعارات',
                'nav.view-all': 'عرض الكل',
                'nav.order-shipped': 'تم شحن الطلب',
                'nav.product-promo': 'منتج في العرض',
                'nav.back-to-site': 'العودة إلى الموقع',
                'site.name': 'كوب ماركت',
                'site.tagline': 'السوق التعاونية',
                'contact.phone': '+212 123 456 789',
                'contact.email': 'contact@marketplace.ma',
                'search.placeholder': 'البحث عن المنتجات والتعاونيات...',
                'search.button': 'بحث',
                'home.hero.title': 'مرحباً بك في السوق الإلكترونية',
                'home.hero.subtitle': 'اكتشف آلاف المنتجات والخدمات عالية الجودة. اشتري وبع وتبادل بأمان.',
                'home.cta.start': 'ابدأ',
                'home.cta.learn': 'اعرف المزيد',
            },
            en: {
                'nav.home': 'Home',
                'nav.products': 'Products',
                'nav.cooperatives': 'Cooperatives',
                'nav.categories': 'Categories',
                'nav.about': 'About',
                'nav.contact': 'Contact',
                'nav.login': 'Login',
                'nav.register': 'Register',
                'nav.logout': 'Logout',
                'nav.dashboard': 'Dashboard',
                'nav.profile': 'My Profile',
                'nav.orders': 'My Orders',
                'nav.account': 'Account',
                'nav.notifications': 'Notifications',
                'nav.view-all': 'View All',
                'nav.order-shipped': 'Order Shipped',
                'nav.product-promo': 'Product on Sale',
                'nav.back-to-site': 'Back to Site',
                'site.name': 'CoopMarket',
                'site.tagline': 'Cooperative Marketplace',
                'contact.phone': '+212 123 456 789',
                'contact.email': 'contact@marketplace.ma',
                'search.placeholder': 'Search for products, cooperatives...',
                'search.button': 'Search',
                'home.hero.title': 'Welcome to our Marketplace',
                'home.hero.subtitle': 'Discover thousands of quality products and services. Buy, sell and exchange safely.',
                'home.cta.start': 'Get Started',
                'home.cta.learn': 'Learn More',
            },
        };
        this.init();
    }

    init() {
        this.applyLanguage(this.currentLanguage);
        this.updateLanguageDisplay();

        // Language switcher
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const lang = btn.getAttribute('data-lang');
                this.applyLanguage(lang);
            });
        });
    }

    applyLanguage(language) {
        this.currentLanguage = language;
        document.documentElement.setAttribute('lang', language);
        document.documentElement.setAttribute('dir', language === 'ar' ? 'rtl' : 'ltr');
        this.translateElements();
        this.translatePlaceholders();
        localStorage.setItem('language', language);
        document.dispatchEvent(new CustomEvent('languageChanged', { detail: { language } }));
    }

    translateElements() {
        document.querySelectorAll('[data-translate]').forEach(element => {
            const key = element.getAttribute('data-translate');
            const translation = this.getTranslation(key);
            if (translation) element.textContent = translation;
        });
    }

    translatePlaceholders() {
        document.querySelectorAll('[data-translate-placeholder]').forEach(element => {
            const key = element.getAttribute('data-translate-placeholder');
            const translation = this.getTranslation(key);
            if (translation) element.setAttribute('placeholder', translation);
        });
    }

    updateLanguageDisplay() {
        const langDisplay = document.getElementById('current-lang');
        if (langDisplay) {
            const langNames = { fr: 'FR', ar: 'ع', en: 'EN' };
            langDisplay.textContent = langNames[this.currentLanguage] || 'FR';
        }
    }

    getTranslation(key) {
        return this.translations[this.currentLanguage]?.[key] || key;
    }
}
