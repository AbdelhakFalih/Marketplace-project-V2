@extends('layouts.app')

@section('title')
    <span data-translate="terms.title">Conditions Générales d'Utilisation</span>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="display-4 fw-bold mb-4" data-translate="terms.title">Conditions Générales d'Utilisation</h1>
                <p class="lead" data-translate="terms.updated">Dernière mise à jour : {{ date('d/m/Y') }}</p>
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
                                <h5 class="font-bold mb-4" data-translate="terms.toc">Sommaire</h5>
                                <nav class="nav flex-column">
                                    <a class="nav-link px-0 py-2 text-sm" href="#article1" data-translate="terms.article1">1. Objet</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article2" data-translate="terms.article2">2. Acceptation</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article3" data-translate="terms.article3">3. Inscription</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article4" data-translate="terms.article4">4. Services</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article5" data-translate="terms.article5">5. Obligations</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article6" data-translate="terms.article6">6. Transactions</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article7" data-translate="terms.article7">7. Paiements</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article8" data-translate="terms.article8">8. Responsabilité</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article9" data-translate="terms.article9">9. Propriété intellectuelle</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article10" data-translate="terms.article10">10. Résiliation</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article11" data-translate="terms.article11">11. Droit applicable</a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#article12" data-translate="terms.article12">12. Contact</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="prose max-w-none">
                        <!-- Article 1 -->
                        <section id="article1" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="terms.article1">1. Objet</h2>
                            <p class="text-gray-700 mb-4" data-translate="terms.article1.text1">Les présentes Conditions Générales d'Utilisation (CGU) ont pour objet de définir les modalités et conditions d'utilisation de la plateforme marketplace accessible à l'adresse [URL], ci-après dénommée "la Plateforme".</p>
                            <p class="text-gray-700 mb-4" data-translate="terms.article1.text2">La Plateforme est un service de mise en relation entre vendeurs et acheteurs, permettant la vente et l'achat de biens et services.</p>
                        </section>
                        <!-- Add other articles with data-translate -->

                        <!-- Article 10 -->
                        <section id="article10" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="terms.article10">10. Résiliation</h2>
                            <p class="text-gray-700 mb-4" data-translate="terms.article10.text1">Vous pouvez résilier votre compte à tout moment en nous contactant.</p>
                            <p class="text-gray-700 mb-4" data-translate="terms.article10.text2">Nous nous réservons le droit de suspendre ou de résilier votre compte en cas de violation des présentes CGU.</p>
                        </section>

                        <!-- Article 11 -->
                        <section id="article11" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="terms.article11">11. Droit applicable et juridiction</h2>
                            <p class="text-gray-700 mb-4" data-translate="terms.article11.text">Les présentes CGU sont soumises au droit français. En cas de litige, les tribunaux français seront seuls compétents.</p>
                        </section>

                        <!-- Article 12 -->
                        <section id="article12" class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4" data-translate="terms.article12">12. Contact</h2>
                            <p class="text-gray-700 mb-4" data-translate="terms.article12.text">Pour toute question concernant ces CGU, vous pouvez nous contacter :</p>
                            <ul class="list-none mb-4 text-gray-700">
                                <li><strong data-translate="terms.contact.email">Email :</strong> legal@marketplace.com</li>
                                <li><strong data-translate="terms.contact.address">Adresse :</strong> 123 Rue de la Paix, 75001 Paris, France</li>
                                <li><strong data-translate="terms.contact.phone">Téléphone :</strong> +33 1 23 45 67 89</li>
                            </ul>
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
