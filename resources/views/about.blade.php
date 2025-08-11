@extends('layouts.app')

@section('title')
    <span data-translate="about.title">À propos</span>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="display-4 fw-bold mb-4" data-translate="about.title">À propos de nous</h1>
                <p class="lead max-w-3xl mx-auto" data-translate="about.subtitle">Découvrez notre histoire, notre mission et les valeurs qui nous guident dans la création de la meilleure marketplace.</p>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4" data-translate="about.mission">Notre Mission</h2>
                    <p class="text-lg text-gray-600 mb-4" data-translate="about.mission.text1">Nous nous efforçons de créer une plateforme de commerce en ligne sécurisée, accessible et innovante qui connecte les acheteurs et les vendeurs du monde entier.</p>
                    <p class="text-gray-600 mb-4" data-translate="about.mission.text2">Notre objectif est de démocratiser le commerce électronique en offrant des outils puissants et une expérience utilisateur exceptionnelle à tous nos utilisateurs, qu'ils soient particuliers ou professionnels.</p>
                    <div class="d-flex gap-4 flex-wrap">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 me-2"></i>
                            <span data-translate="about.mission.security">Sécurité garantie</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 me-2"></i>
                            <span data-translate="about.mission.support">Support 24/7</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/placeholder.svg?height=400&width=500" alt="Notre équipe" class="img-fluid rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-translate="about.values">Nos Valeurs</h2>
                <p class="text-lg text-gray-600" data-translate="about.values.subtitle">Les principes qui guident chacune de nos actions</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-handshake text-blue-600 text-2xl"></i>
                        </div>
                        <h5 class="font-bold mb-3" data-translate="about.values.trust">Confiance</h5>
                        <p class="text-gray-600" data-translate="about.values.trust.text">Nous construisons des relations durables basées sur la transparence et l'intégrité.</p>
                    </div>
                </div>
                <!-- Add other value cards with data-translate -->
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-translate="about.values">Notre Parcours</h2>
            </div>
            <div class="relative">
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-gray-200 h-full"></div>
                <div class="space-y-12">
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h4 class="font-bold text-blue-600 mb-2">2020</h4>
                                <h5 class="font-semibold mb-2" data-translate="about.values.2020">Fondation</h5>
                                <p class="text-gray-600 text-sm" data-translate="about.values.2020.text">Création de l'entreprise et premières idées.</p>
                            </div>
                        </div>
                        <div class="w-4 h-4 bg-blue-600 rounded-full relative z-10"></div>
                        <div class="w-1/2 pl-8"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8"></div>
                        <div class="w-4 h-4 bg-green-600 rounded-full relative z-10"></div>
                        <div class="w-1/2 pl-8">
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h4 class="font-bold text-green-600 mb-2">2021</h4>
                                <h5 class="font-semibold mb-2" data-translate="about.values.2021">Lancement de la plateforme</h5>
                                <p class="text-gray-600 text-sm" data-translate="about.values.2021.text">Mise en ligne de la première version et premiers utilisateurs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h4 class="font-bold text-purple-600 mb-2">2022</h4>
                                <h5 class="font-semibold mb-2" data-translate="about.values.2022">Expansion internationale</h5>
                                <p class="text-gray-600 text-sm" data-translate="about.values.2022.text">Ouverture à de nouveaux marchés et partenariats stratégiques.</p>
                            </div>
                        </div>
                        <div class="w-4 h-4 bg-purple-600 rounded-full relative z-10"></div>
                        <div class="w-1/2 pl-8"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8"></div>
                        <div class="w-4 h-4 bg-orange-600 rounded-full relative z-10"></div>
                        <div class="w-1/2 pl-8">
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h4 class="font-bold text-orange-600 mb-2">2023</h4>
                                <h5 class="font-semibold mb-2" data-translate="about.values.2023">Nouvelles fonctionnalités</h5>
                                <p class="text-gray-600 text-sm" data-translate="about.values.2023.text">Intégration de l'IA et amélioration de l'expérience utilisateur.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4" data-translate="about.cta.title">Rejoignez notre aventure</h2>
            <p class="text-lg mb-6 opacity-90" data-translate="about.cta.subtitle">Faites partie de notre communauté grandissante</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5" data-translate="about.cta.register">Créer un compte</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5" data-translate="about.cta.contact">Nous contacter</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            const counters = document.querySelectorAll('.text-4xl');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
                        const increment = target / 100;
                        let current = 0;

                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                counter.textContent = counter.textContent.replace(/\d+/, target);
                                clearInterval(timer);
                            } else {
                                counter.textContent = counter.textContent.replace(/\d+/, Math.floor(current));
                            }
                        }, 20);
                        observer.unobserve(entry.target);
                    }
                });
            });

            counters.forEach(counter => observer.observe(counter));
        });
    </script>
@endpush
