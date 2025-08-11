@extends('layouts.app')

@section('title')
    <span data-translate="privacy.title">Politique de Confidentialité</span>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="display-4 fw-bold mb-4" data-translate="privacy.title">Politique de Confidentialité</h1>
                <p class="lead" data-translate="privacy.updated">Dernière mise à jour : {{ date('d/m/Y') }}</p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="row">
                <!-- Table of Contents -->
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="sticky-top" style="top: 2rem;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="font-bold mb-4" data-translate="privacy.toc">Sommaire</h5>
                                <nav class="nav flex-column">
                                    <a class="nav-link px-0 py-2 text-sm" href="#introduction" data-translate="privacy.introduction">Introduction</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#donnees-collectees" data-translate="privacy.data-collected">Données collectées</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#utilisation" data-translate="privacy.data-usage">Utilisation des données</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#partage" data-translate="privacy.data-sharing">Partage des données</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#cookies" data-translate="privacy.cookies">Cookies</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#securite" data-translate="privacy.security">Sécurité</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#droits" data-translate="privacy.rights">Vos droits</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#conservation" data-translate="privacy.conservation">Conservation</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#contact" data-translate="privacy.contact">Contact</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="prose max-w-none">
                        <!-- Introduction -->
                        <section id="introduction" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="privacy.introduction">Introduction</h2>
                            <p class="text-gray-700 mb-4" data-translate="privacy.intro.text1">Nous accordons une grande importance à la protection de vos données personnelles. Cette politique de confidentialité explique comment nous collectons, utilisons et protégeons vos informations personnelles lorsque vous utilisez notre plateforme.</p>
                            <p class="text-gray-700 mb-4" data-translate="privacy.intro.text2">En utilisant notre service, vous acceptez les pratiques décrites dans cette politique de confidentialité.</p>
                        </section>

                        <!-- Données collectées -->
                        <section id="donnees-collectees" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="privacy.data-collected">Données que nous collectons</h2>
                            <h3 class="text-xl font-semibold text-gray-800 mb-3" data-translate="privacy.data-provided">Informations que vous nous fournissez</h3>
                            <!-- Add other content with data-translate -->
                        </section>

                        <!-- Conservation -->
                        <section id="conservation" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="privacy.conservation">Conservation</h2>
                            <p class="text-gray-700 mb-4" data-translate="privacy.conservation.text">Nous conservons vos données personnelles uniquement le temps nécessaire aux finalités pour lesquelles elles ont été collectées :</p>
                            <ul class="list-disc pl-6 mb-4 text-gray-700">
                                <li data-translate="privacy.conservation.account">Données de compte : pendant la durée de vie du compte + 3 ans</li>
                                <li data-translate="privacy.conservation.transactions">Données de transaction : 10 ans (obligations comptables)</li>
                                <li data-translate="privacy.conservation.navigation">Données de navigation : 13 mois maximum</li>
                                <li data-translate="privacy.conservation.support">Données de support : 3 ans après résolution</li>
                            </ul>
                        </section>

                        <!-- Contact -->
                        <section id="contact" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="privacy.contact">Nous contacter</h2>
                            <p class="text-gray-700 mb-4" data-translate="privacy.contact.text">Pour toute question concernant cette politique de confidentialité ou vos données personnelles :</p>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h5 class="font-bold mb-3" data-translate="privacy.contact.dpo">Délégué à la Protection des Données</h5>
                                <ul class="list-none mb-0 text-gray-700">
                                    <li><strong data-translate="privacy.contact.email">Email :</strong> privacy@marketplace.com</li>
                                    <li><strong data-translate="privacy.contact.address">Adresse :</strong> 123 Rue de la Paix, 75001 Paris, France</li>
                                    <li><strong data-translate="privacy.contact.phone">Téléphone :</strong> +33 1 23 45 67 89</li>
                                </ul>
                            </div>
                            <p class="text-gray-700 mt-4" data-translate="privacy.contact.cnil">Vous avez également le droit de déposer une plainte auprès de la CNIL si vous estimez que vos droits ne sont pas respectés.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link[href^="#"]');

            function highlightActiveSection() {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (window.pageYOffset >= sectionTop - 200) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active', 'text-primary');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active', 'text-primary');
                    }
                });
            }

            navLinks.forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            window.addEventListener('scroll', highlightActiveSection);
            highlightActiveSection();

            // Re-highlight on language change
            document.addEventListener('languageChanged', highlightActiveSection);
        });
    </script>
@endpush
