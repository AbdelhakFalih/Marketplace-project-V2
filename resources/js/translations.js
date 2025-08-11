// public/js/translations.js
export default class TranslationManager {
    constructor() {
        this.currentLanguage = localStorage.getItem('language') || 'fr';
        this.translations = {
            fr: {
                // FAQ
                'faq.title': 'Questions Fréquentes',
                'faq.subtitle': 'Trouvez rapidement les réponses à vos questions les plus courantes.',
                'faq.search.placeholder': 'Rechercher dans la FAQ...',
                'faq.categories': 'Catégories',
                'faq.general': 'Général',
                'faq.account': 'Compte',
                'faq.sell': 'Vendre',
                'faq.buy': 'Acheter',
                'faq.payment': 'Paiement',
                'faq.security': 'Sécurité',
                'faq.no-results': 'Aucun résultat trouvé',
                'faq.no-results-subtitle': 'Essayez avec d\'autres mots-clés ou parcourez les catégories.',
                'faq.contact-us': 'Vous ne trouvez pas votre réponse ?',
                'faq.contact-team': 'Notre équipe de support est là pour vous aider',
                'faq.contact': 'Nous contacter',
                'faq.email': 'Envoyer un email',
                'faq.question.what-is-platform': 'Qu\'est-ce que cette plateforme ?',
                'faq.answer.what-is-platform': 'Notre plateforme est une marketplace qui permet aux utilisateurs d\'acheter, vendre et échanger des biens et services en toute sécurité.',

                // Privacy
                'privacy.title': 'Politique de Confidentialité',
                'privacy.updated': 'Dernière mise à jour : {date}',
                'privacy.toc': 'Sommaire',
                'privacy.introduction': 'Introduction',
                'privacy.data-collected': 'Données collectées',
                'privacy.data-provided': 'Informations que vous nous fournissez',
                'privacy.data-usage': 'Utilisation des données',
                'privacy.data-sharing': 'Partage des données',
                'privacy.cookies': 'Cookies',
                'privacy.security': 'Sécurité',
                'privacy.rights': 'Vos droits',
                'privacy.conservation': 'Conservation',
                'privacy.contact': 'Contact',
                'privacy.intro.text1': 'Nous accordons une grande importance à la protection de vos données personnelles. Cette politique de confidentialité explique comment nous collectons, utilisons et protégeons vos informations personnelles lorsque vous utilisez notre plateforme.',
                'privacy.intro.text2': 'En utilisant notre service, vous acceptez les pratiques décrites dans cette politique de confidentialité.',
                'privacy.conservation.text': 'Nous conservons vos données personnelles uniquement le temps nécessaire aux finalités pour lesquelles elles ont été collectées :',
                'privacy.conservation.account': 'Données de compte : pendant la durée de vie du compte + 3 ans',
                'privacy.conservation.transactions': 'Données de transaction : 10 ans (obligations comptables)',
                'privacy.conservation.navigation': 'Données de navigation : 13 mois maximum',
                'privacy.conservation.support': 'Données de support : 3 ans après résolution',
                'privacy.contact.dpo': 'Délégué à la Protection des Données',
                'privacy.contact.email': 'Email :',
                'privacy.contact.address': 'Adresse :',
                'privacy.contact.phone': 'Téléphone :',
                'privacy.contact.cnil': 'Vous avez également le droit de déposer une plainte auprès de la CNIL si vous estimez que vos droits ne sont pas respectés.',

                // About
                'about.title': 'À propos',
                'about.subtitle': 'Découvrez notre histoire, notre mission et les valeurs qui nous guident dans la création de la meilleure marketplace.',
                'about.mission': 'Notre Mission',
                'about.mission.text1': 'Nous nous efforçons de créer une plateforme de commerce en ligne sécurisée, accessible et innovante qui connecte les acheteurs et les vendeurs du monde entier.',
                'about.mission.text2': 'Notre objectif est de démocratiser le commerce électronique en offrant des outils puissants et une expérience utilisateur exceptionnelle à tous nos utilisateurs, qu\'ils soient particuliers ou professionnels.',
                'about.mission.security': 'Sécurité garantie',
                'about.mission.support': 'Support 24/7',
                'about.values': 'Nos Valeurs',
                'about.values.subtitle': 'Les principes qui guident chacune de nos actions',
                'about.values.trust': 'Confiance',
                'about.values.trust.text': 'Nous construisons des relations durables basées sur la transparence et l\'intégrité.',
                'about.values.2021': 'Lancement de la plateforme',
                'about.values.2021.text': 'Mise en ligne de la première version et premiers utilisateurs.',
                'about.values.2022': 'Expansion internationale',
                'about.values.2022.text': 'Ouverture à de nouveaux marchés et partenariats stratégiques.',
                'about.values.2023': 'Nouvelles fonctionnalités',
                'about.values.2023.text': 'Intégration de l\'IA et amélioration de l\'expérience utilisateur.',
                'about.cta.title': 'Rejoignez notre aventure',
                'about.cta.subtitle': 'Faites partie de notre communauté grandissante',
                'about.cta.register': 'Créer un compte',
                'about.cta.contact': 'Nous contacter',

                // Terms
                'terms.title': 'Conditions Générales d\'Utilisation',
                'terms.updated': 'Dernière mise à jour : {date}',
                'terms.toc': 'Sommaire',
                'terms.article1': '1. Objet',
                'terms.article1.text1': 'Les présentes Conditions Générales d\'Utilisation (CGU) ont pour objet de définir les modalités et conditions d\'utilisation de la plateforme marketplace accessible à l\'adresse [URL], ci-après dénommée "la Plateforme".',
                'terms.article1.text2': 'La Plateforme est un service de mise en relation entre vendeurs et acheteurs, permettant la vente et l\'achat de biens et services.',
                'terms.article10': '10. Résiliation',
                'terms.article10.text1': 'Vous pouvez résilier votre compte à tout moment en nous contactant.',
                'terms.article10.text2': 'Nous nous réservons le droit de suspendre ou de résilier votre compte en cas de violation des présentes CGU.',
                'terms.article11': '11. Droit applicable et juridiction',
                'terms.article11.text': 'Les présentes CGU sont soumises au droit français. En cas de litige, les tribunaux français seront seuls compétents.',
                'terms.article12': '12. Contact',
                'terms.article12.text': 'Pour toute question concernant ces CGU, vous pouvez nous contacter :',
                'terms.contact.email': 'Email :',
                'terms.contact.address': 'Adresse :',
                'terms.contact.phone': 'Téléphone :',

                // Home
                'home.hero.title': 'Bienvenue sur notre Marketplace',
                'home.hero.subtitle': 'Découvrez des milliers de produits et services de qualité. Achetez, vendez et échangez en toute sécurité.',
                'home.cta.start': 'Commencer',
                'home.cta.learn': 'En savoir plus',
                'home.features.title': 'Pourquoi nous choisir ?',
                'home.features.subtitle': 'Notre plateforme offre une expérience unique pour tous vos besoins d\'achat et de vente.',
                'home.features.secure': 'Sécurisé',
                'home.features.secure.text': 'Transactions sécurisées avec système de vérification avancé et protection des données.',
                'home.features.community': 'Communauté',
                'home.features.community.text': 'Rejoignez une communauté active de vendeurs et acheteurs vérifiés.',
                'home.cta.title': 'Prêt à commencer ?',
                'home.cta.subtitle': 'Rejoignez des milliers d\'utilisateurs satisfaits dès aujourd\'hui',
                'home.cta.register': 'Créer un compte',
                'home.cta.contact': 'Nous contacter',
                'home.steps.register': 'Inscrivez-vous',
                'home.steps.register.text': 'Créez votre compte en quelques clics',
                'home.steps.explore': 'Explorez',
                'home.steps.explore.text': 'Découvrez des milliers de produits ou publiez vos annonces',
                'home.steps.transact': 'Transigez',
                'home.steps.transact.text': 'Achetez et vendez en toute sécurité avec notre système de protection',

                // Contact
                'contact.title': 'Contactez-nous',
                'contact.subtitle': 'Nous sommes là pour vous aider. N\'hésitez pas à nous contacter pour toute question ou suggestion.',
                'contact.form.title': 'Envoyez-nous un message',
                'contact.form.first_name': 'Prénom',
                'contact.form.last_name': 'Nom',
                'contact.form.email': 'Email',
                'contact.form.phone': 'Téléphone',
                'contact.form.message': 'Votre message',
                'contact.form.submit': 'Envoyer',
                'contact.form.sending': 'Envoi en cours...',
                'contact.form.characters': 'caractères',
                'contact.info.title': 'Nos coordonnées',
                'contact.info.email': 'Email :',
                'contact.info.phone': 'Téléphone :',
                'contact.info.address': 'Adresse :',
                'contact.faq.title': 'Besoin d\'aide rapide ?',
                'contact.faq.text': 'Consultez notre FAQ pour trouver des réponses immédiates.',
                'contact.faq.link': 'Voir la FAQ',
                'contact.map.title': 'Notre localisation',
                'contact.map.subtitle': 'Venez nous rendre visite à notre bureau parisien',
                'contact.map.text': 'Carte interactive',
                'contact.map.address': '123 Rue de la Paix, 75001 Paris',
            },
            ar: {
                // FAQ
                'faq.title': 'الأسئلة الشائعة',
                'faq.subtitle': 'اعثر على إجابات سريعة لأسئلتك الأكثر شيوعًا.',
                'faq.search.placeholder': 'البحث في الأسئلة الشائعة...',
                'faq.categories': 'الفئات',
                'faq.general': 'عام',
                'faq.account': 'الحساب',
                'faq.sell': 'البيع',
                'faq.buy': 'الشراء',
                'faq.payment': 'الدفع',
                'faq.security': 'الأمان',
                'faq.no-results': 'لم يتم العثور على نتائج',
                'faq.no-results-subtitle': 'جرب بكلمات مفتاحية أخرى أو تصفح الفئات.',
                'faq.contact-us': 'لم تجد إجابتك؟',
                'faq.contact-team': 'فريق الدعم لدينا هنا لمساعدتك',
                'faq.contact': 'اتصل بنا',
                'faq.email': 'إرسال بريد إلكتروني',
                'faq.question.what-is-platform': 'ما هي هذه المنصة؟',
                'faq.answer.what-is-platform': 'منصتنا هي سوق إلكتروني يتيح للمستخدمين شراء وبيع وتبادل السلع والخدمات بأمان.',

                // Privacy
                'privacy.title': 'سياسة الخصوصية',
                'privacy.updated': 'آخر تحديث: {date}',
                'privacy.toc': 'جدول المحتويات',
                'privacy.introduction': 'مقدمة',
                'privacy.data-collected': 'البيانات التي نجمعها',
                'privacy.data-provided': 'المعلومات التي تقدمها لنا',
                'privacy.data-usage': 'استخدام البيانات',
                'privacy.data-sharing': 'مشاركة البيانات',
                'privacy.cookies': 'ملفات تعريف الارتباط',
                'privacy.security': 'الأمان',
                'privacy.rights': 'حقوقك',
                'privacy.conservation': 'الاحتفاظ بالبيانات',
                'privacy.contact': 'الاتصال',
                'privacy.intro.text1': 'نحن نولي أهمية كبيرة لحماية بياناتك الشخصية. توضح سياسة الخصوصية هذه كيفية جمعنا لمعلوماتك الشخصية واستخدامها وحمايتها عند استخدامك لمنصتنا.',
                'privacy.intro.text2': 'باستخدام خدمتنا، فإنك توافق على الممارسات الموضحة في سياسة الخصوصية هذه.',
                'privacy.conservation.text': 'نحتفظ ببياناتك الشخصية فقط للمدة اللازمة للأغراض التي تم جمعها من أجلها:',
                'privacy.conservation.account': 'بيانات الحساب: طوال مدة الحساب + 3 سنوات',
                'privacy.conservation.transactions': 'بيانات المعاملات: 10 سنوات (الالتزامات المحاسبية)',
                'privacy.conservation.navigation': 'بيانات التصفح: 13 شهرًا كحد أقصى',
                'privacy.conservation.support': 'بيانات الدعم: 3 سنوات بعد الحل',
                'privacy.contact.dpo': 'مسؤول حماية البيانات',
                'privacy.contact.email': 'البريد الإلكتروني:',
                'privacy.contact.address': 'العنوان:',
                'privacy.contact.phone': 'الهاتف:',
                'privacy.contact.cnil': 'لديك أيضًا الحق في تقديم شكوى إلى CNIL إذا كنت تعتقد أن حقوقك لم يتم احترامها.',

                // About
                'about.title': 'حول',
                'about.subtitle': 'اكتشف قصتنا، مهمتنا، والقيم التي توجهنا في إنشاء أفضل سوق إلكتروني.',
                'about.mission': 'مهمتنا',
                'about.mission.text1': 'نحن نسعى لإنشاء منصة تجارة إلكترونية آمنة وسهلة الوصول ومبتكرة تربط بين البائعين والمشترين من جميع أنحاء العالم.',
                'about.mission.text2': 'هدفنا هو إضفاء الطابع الديمقراطي على التجارة الإلكترونية من خلال تقديم أدوات قوية وتجربة مستخدم استثنائية لجميع المستخدمين، سواء كانوا أفرادًا أو محترفين.',
                'about.mission.security': 'أمان مضمون',
                'about.mission.support': 'دعم على مدار الساعة',
                'about.values': 'قيمنا',
                'about.values.subtitle': 'المبادئ التي توجه كل عملياتنا',
                'about.values.trust': 'الثقة',
                'about.values.trust.text': 'نبني علاقات طويلة الأمد مبنية على الشفافية والنزاهة.',
                'about.values.2021': 'إطلاق المنصة',
                'about.values.2021.text': 'إطلاق النسخة الأولى واكتساب المستخدمين الأوائل.',
                'about.values.2022': 'التوسع الدولي',
                'about.values.2022.text': 'الانفتاح على أسواق جديدة وشراكات استراتيجية.',
                'about.values.2023': 'ميزات جديدة',
                'about.values.2023.text': 'دمج الذكاء الاصطناعي وتحسين تجربة المستخدم.',
                'about.cta.title': 'انضم إلى مغامرتنا',
                'about.cta.subtitle': 'كن جزءًا من مجتمعنا المتنامي',
                'about.cta.register': 'إنشاء حساب',
                'about.cta.contact': 'اتصل بنا',

                // Terms
                'terms.title': 'شروط الاستخدام العامة',
                'terms.updated': 'آخر تحديث: {date}',
                'terms.toc': 'جدول المحتويات',
                'terms.article1': '1. الغرض',
                'terms.article1.text1': 'تحدد شروط الاستخدام العامة (CGU) هذه الشروط والأحكام التي تحكم استخدام منصة السوق الإلكتروني المتوفرة على العنوان [URL]، والمشار إليها فيما بعد باسم "المنصة".',
                'terms.article1.text2': 'المنصة هي خدمة لربط البائعين والمشترين، مما يتيح بيع وشراء السلع والخدمات.',
                'terms.article10': '10. الإنهاء',
                'terms.article10.text1': 'يمكنك إنهاء حسابك في أي وقت عن طريق التواصل معنا.',
                'terms.article10.text2': 'نحتفظ بالحق في تعليق أو إنهاء حسابك في حالة انتهاك شروط الاستخدام العامة هذه.',
                'terms.article11': '11. القانون المعمول به والاختصاص القضائي',
                'terms.article11.text': 'تخضع شروط الاستخدام العامة هذه للقانون الفرنسي. في حالة النزاع، ستكون المحاكم الفرنسية هي المختصة الوحيدة.',
                'terms.article12': '12. الاتصال',
                'terms.article12.text': 'لأي سؤال يتعلق بشروط الاستخدام العامة، يمكنك التواصل معنا:',
                'terms.contact.email': 'البريد الإلكتروني:',
                'terms.contact.address': 'العنوان:',
                'terms.contact.phone': 'الهاتف:',

                // Home
                'home.hero.title': 'مرحباً بك في السوق الإلكترونية',
                'home.hero.subtitle': 'اكتشف آلاف المنتجات والخدمات عالية الجودة. اشتري وبع وتبادل بأمان.',
                'home.cta.start': 'ابدأ',
                'home.cta.learn': 'اعرف المزيد',
                'home.features.title': 'لماذا تختارنا؟',
                'home.features.subtitle': 'منصتنا تقدم تجربة فريدة لجميع احتياجاتك في البيع والشراء.',
                'home.features.secure': 'آمن',
                'home.features.secure.text': 'معاملات آمنة مع نظام تحقق متقدم وحماية البيانات.',
                'home.features.community': 'مجتمع',
                'home.features.community.text': 'انضم إلى مجتمع نشط من البائعين والمشترين الموثوقين.',
                'home.cta.title': 'هل أنت مستعد للبدء؟',
                'home.cta.subtitle': 'انضم إلى آلاف المستخدمين الراضين اليوم',
                'home.cta.register': 'إنشاء حساب',
                'home.cta.contact': 'اتصل بنا',
                'home.steps.register': 'سجل',
                'home.steps.register.text': 'أنشئ حسابك في بضع نقرات',
                'home.steps.explore': 'استكشف',
                'home.steps.explore.text': 'اكتشف آلاف المنتجات أو انشر إعلاناتك',
                'home.steps.transact': 'تعامل',
                'home.steps.transact.text': 'اشتر وبع بأمان مع نظام الحماية لدينا',

                // Contact
                'contact.title': 'اتصل بنا',
                'contact.subtitle': 'نحن هنا لمساعدتك. لا تتردد في التواصل معنا لأي سؤال أو اقتراح.',
                'contact.form.title': 'أرسل لنا رسالة',
                'contact.form.first_name': 'الاسم الأول',
                'contact.form.last_name': 'الاسم الأخير',
                'contact.form.email': 'البريد الإلكتروني',
                'contact.form.phone': 'الهاتف',
                'contact.form.message': 'رسالتك',
                'contact.form.submit': 'إرسال',
                'contact.form.sending': 'جارٍ الإرسال...',
                'contact.form.characters': 'حرف',
                'contact.info.title': 'معلومات الاتصال',
                'contact.info.email': 'البريد الإلكتروني:',
                'contact.info.phone': 'الهاتف:',
                'contact.info.address': 'العنوان:',
                'contact.faq.title': 'هل تحتاج إلى مساعدة سريعة؟',
                'contact.faq.text': 'راجع الأسئلة الشائعة للعثور على إجابات فورية.',
                'contact.faq.link': 'عرض الأسئلة الشائعة',
                'contact.map.title': 'موقعنا',
                'contact.map.subtitle': 'تفضل بزيارة مكتبنا في باريس',
                'contact.map.text': 'خريطة تفاعلية',
                'contact.map.address': '123 شارع السلام، 75001 باريس',
            },
            en: {
                // FAQ
                'faq.title': 'Frequently Asked Questions',
                'faq.subtitle': 'Find quick answers to your most common questions.',
                'faq.search.placeholder': 'Search in the FAQ...',
                'faq.categories': 'Categories',
                'faq.general': 'General',
                'faq.account': 'Account',
                'faq.sell': 'Sell',
                'faq.buy': 'Buy',
                'faq.payment': 'Payment',
                'faq.security': 'Security',
                'faq.no-results': 'No results found',
                'faq.no-results-subtitle': 'Try with different keywords or browse the categories.',
                'faq.contact-us': 'Can’t find your answer?',
                'faq.contact-team': 'Our support team is here to help you',
                'faq.contact': 'Contact us',
                'faq.email': 'Send an email',
                'faq.question.what-is-platform': 'What is this platform?',
                'faq.answer.what-is-platform': 'Our platform is a marketplace that allows users to buy, sell, and exchange goods and services securely.',

                // Privacy
                'privacy.title': 'Privacy Policy',
                'privacy.updated': 'Last updated: {date}',
                'privacy.toc': 'Table of Contents',
                'privacy.introduction': 'Introduction',
                'privacy.data-collected': 'Data we collect',
                'privacy.data-provided': 'Information you provide us',
                'privacy.data-usage': 'Use of data',
                'privacy.data-sharing': 'Data sharing',
                'privacy.cookies': 'Cookies',
                'privacy.security': 'Security',
                'privacy.rights': 'Your rights',
                'privacy.conservation': 'Data retention',
                'privacy.contact': 'Contact',
                'privacy.intro.text1': 'We place great importance on protecting your personal data. This privacy policy explains how we collect, use, and protect your personal information when you use our platform.',
                'privacy.intro.text2': 'By using our service, you agree to the practices described in this privacy policy.',
                'privacy.conservation.text': 'We retain your personal data only for as long as necessary for the purposes for which it was collected:',
                'privacy.conservation.account': 'Account data: for the lifetime of the account + 3 years',
                'privacy.conservation.transactions': 'Transaction data: 10 years (accounting obligations)',
                'privacy.conservation.navigation': 'Browsing data: 13 months maximum',
                'privacy.conservation.support': 'Support data: 3 years after resolution',
                'privacy.contact.dpo': 'Data Protection Officer',
                'privacy.contact.email': 'Email:',
                'privacy.contact.address': 'Address:',
                'privacy.contact.phone': 'Phone:',
                'privacy.contact.cnil': 'You also have the right to file a complaint with the CNIL if you believe your rights are not respected.',

                // About
                'about.title': 'About',
                'about.subtitle': 'Discover our story, mission, and values that guide us in creating the best marketplace.',
                'about.mission': 'Our Mission',
                'about.mission.text1': 'We strive to create a secure, accessible, and innovative e-commerce platform that connects buyers and sellers worldwide.',
                'about.mission.text2': 'Our goal is to democratize e-commerce by providing powerful tools and an exceptional user experience to all users, whether individuals or professionals.',
                'about.mission.security': 'Guaranteed security',
                'about.mission.support': '24/7 Support',
                'about.values': 'Our Values',
                'about.values.subtitle': 'The principles that guide our actions',
                'about.values.trust': 'Trust',
                'about.values.trust.text': 'We build lasting relationships based on transparency and integrity.',
                'about.values.2021': 'Platform launch',
                'about.values.2021.text': 'Launch of the first version and initial users.',
                'about.values.2022': 'International expansion',
                'about.values.2022.text': 'Opening to new markets and strategic partnerships.',
                'about.values.2023': 'New features',
                'about.values.2023.text': 'Integration of AI and improved user experience.',
                'about.cta.title': 'Join our adventure',
                'about.cta.subtitle': 'Be part of our growing community',
                'about.cta.register': 'Create an account',
                'about.cta.contact': 'Contact us',

                // Terms
                'terms.title': 'Terms of Use',
                'terms.updated': 'Last updated: {date}',
                'terms.toc': 'Table of Contents',
                'terms.article1': '1. Purpose',
                'terms.article1.text1': 'These General Terms of Use (CGU) aim to define the terms and conditions of use of the marketplace platform accessible at [URL], hereinafter referred to as "the Platform".',
                'terms.article1.text2': 'The Platform is a service connecting sellers and buyers, enabling the sale and purchase of goods and services.',
                'terms.article10': '10. Termination',
                'terms.article10.text1': 'You may terminate your account at any time by contacting us.',
                'terms.article10.text2': 'We reserve the right to suspend or terminate your account in case of violation of these CGU.',
                'terms.article11': '11. Applicable law and jurisdiction',
                'terms.article11.text': 'These CGU are subject to French law. In case of dispute, French courts will have exclusive jurisdiction.',
                'terms.article12': '12. Contact',
                'terms.article12.text': 'For any questions regarding these CGU, you can contact us:',
                'terms.contact.email': 'Email:',
                'terms.contact.address': 'Address:',
                'terms.contact.phone': 'Phone:',

                // Home
                'home.hero.title': 'Welcome to our Marketplace',
                'home.hero.subtitle': 'Discover thousands of quality products and services. Buy, sell, and exchange safely.',
                'home.cta.start': 'Get Started',
                'home.cta.learn': 'Learn More',
                'home.features.title': 'Why choose us?',
                'home.features.subtitle': 'Our platform offers a unique experience for all your buying and selling needs.',
                'home.features.secure': 'Secure',
                'home.features.secure.text': 'Secure transactions with advanced verification and data protection.',
                'home.features.community': 'Community',
                'home.features.community.text': 'Join an active community of verified sellers and buyers.',
                'home.cta.title': 'Ready to start?',
                'home.cta.subtitle': 'Join thousands of satisfied users today',
                'home.cta.register': 'Create an account',
                'home.cta.contact': 'Contact us',
                'home.steps.register': 'Register',
                'home.steps.register.text': 'Create your account in a few clicks',
                'home.steps.explore': 'Explore',
                'home.steps.explore.text': 'Discover thousands of products or post your listings',
                'home.steps.transact': 'Transact',
                'home.steps.transact.text': 'Buy and sell safely with our protection system',

                // Contact
                'contact.title': 'Contact us',
                'contact.subtitle': 'We are here to help you. Feel free to contact us with any questions or suggestions.',
                'contact.form.title': 'Send us a message',
                'contact.form.first_name': 'First name',
                'contact.form.last_name': 'Last name',
                'contact.form.email': 'Email',
                'contact.form.phone': 'Phone',
                'contact.form.message': 'Your message',
                'contact.form.submit': 'Send',
                'contact.form.sending': 'Sending...',
                'contact.form.characters': 'characters',
                'contact.info.title': 'Our contact details',
                'contact.info.email': 'Email:',
                'contact.info.phone': 'Phone:',
                'contact.info.address': 'Address:',
                'contact.faq.title': 'Need quick help?',
                'contact.faq.text': 'Check our FAQ for immediate answers.',
                'contact.faq.link': 'View FAQ',
                'contact.map.title': 'Our location',
                'contact.map.subtitle': 'Visit our Paris office',
                'contact.map.text': 'Interactive map',
                'contact.map.address': '123 Rue de la Paix, 75001 Paris',
            }
        };
        this.init();
    }

    init() {
        // Apply initial language and theme
        this.applyLanguage(this.currentLanguage);
        this.applyTheme();

        // Language switcher with event delegation
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('lang-btn')) {
                const lang = e.target.getAttribute('data-lang');
                this.applyLanguage(lang);
            }
        });

        // Theme toggle
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        if (themeToggle && themeIcon) {
            themeToggle.addEventListener('click', () => {
                const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                document.documentElement.setAttribute('data-theme', isDark ? 'light' : 'dark');
                themeIcon.classList.toggle('fa-sun', isDark);
                themeIcon.classList.toggle('fa-moon', !isDark);
                localStorage.setItem('theme', isDark ? 'light' : 'dark');
            });
        }
    }

    applyLanguage(language) {
        this.currentLanguage = language;
        document.documentElement.setAttribute('lang', language);
        document.documentElement.setAttribute('dir', language === 'ar' ? 'rtl' : 'ltr');
        this.translateElements();
        this.translatePlaceholders();
        this.updateLanguageDisplay();
        localStorage.setItem('language', language);
        document.dispatchEvent(new CustomEvent('languageChanged', { detail: { language } }));
    }

    applyTheme() {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('theme') || (prefersDark ? 'dark' : 'light');
        document.documentElement.setAttribute('data-theme', savedTheme);
        const themeIcon = document.getElementById('theme-icon');
        if (themeIcon) {
            themeIcon.classList.toggle('fa-sun', savedTheme === 'light');
            themeIcon.classList.toggle('fa-moon', savedTheme === 'dark');
        }
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
        const translation = this.translations[this.currentLanguage]?.[key] || key;
        if (translation === key) {
            console.warn(`Translation missing for key: ${key} in language: ${this.currentLanguage}`);
        }
        return translation;
    }
}
