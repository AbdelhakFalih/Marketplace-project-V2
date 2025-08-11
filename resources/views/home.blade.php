@extends('layouts.app')

@section('title')
    <span data-translate="home.hero.title">Accueil</span>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-600 to-green-100 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4" data-translate="home.hero.title">Bienvenue sur notre Marketplace</h1>
                    <p class="lead mb-4" data-translate="home.hero.subtitle">Découvrez des milliers de produits et services de qualité. Achetez, vendez et échangez en toute sécurité.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4" data-translate="home.cta.start">Commencer</a>
                        <a href="#features" class="btn btn-outline-light btn-lg px-4" data-translate="home.cta.learn">En savoir plus</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/market-background.jpg') }}?height=400&width=500" alt="Marketplace" class="img-fluid rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-translate="home.features.title">Pourquoi nous choisir ?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-translate="home.features.subtitle">Notre plateforme offre une expérience unique pour tous vos besoins d'achat et de vente.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="card-body text-center p-4">
                            <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                            </div>
                            <h5 class="card-title font-bold mb-3" data-translate="home.features.secure">Sécurisé</h5>
                            <p class="card-text text-gray-600" data-translate="home.features.secure.text">Transactions sécurisées avec système de vérification avancé et protection des données.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="card-body text-center p-4">
                            <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-users text-green-600 text-2xl"></i>
                            </div>
                            <h5 class="card-title font-bold mb-3" data-translate="home.features.community">Communauté</h5>
                            <p class="card-text text-gray-600" data-translate="home.features.community.text">Rejoignez une communauté active de vendeurs et acheteurs vérifiés.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover:shadow-lg transition-shadow">
                        <div class="card-body text-center p-4">
                            <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-rocket text-purple-600 text-2xl"></i>
                            </div>
                            <h5 class="card-title font-bold mb-3">{{ __('Rapide') }}</h5>
                            <p class="card-text text-gray-600">{{ __('Interface intuitive et processus optimisés pour une expérience fluide.') }}</p>
                        </div>
                    </div>s
                </div>
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-translate="home.steps.title">Comment ça marche ?</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="mb-4">
                        <div class="bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">1</div>
                        <h5 class="font-bold mb-3" data-translate="home.steps.register">Inscrivez-vous</h5>
                        <p class="text-gray-600" data-translate="home.steps.register.text">Créez votre compte en quelques clics</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="mb-4">
                        <div class="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">2</div>
                        <h5 class="font-bold mb-3" data-translate="home.steps.explore">Explorez</h5>
                        <p class="text-gray-600" data-translate="home.steps.explore.text">Découvrez des milliers de produits ou publiez vos annonces</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="mb-4">
                        <div class="bg-purple-600 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">3</div>
                        <h5 class="font-bold mb-3" data-translate="home.steps.transact">Transigez</h5>
                        <p class="text-gray-600" data-translate="home.steps.transact.text">Achetez et vendez en toute sécurité avec notre système de protection</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-green-600 to-green-400 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4" data-translate="home.cta.title">Prêt à commencer ?</h2>
            <p class="text-lg mb-6 opacity-90" data-translate="home.cta.subtitle">Rejoignez des milliers d'utilisateurs satisfaits dès aujourd'hui</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5" data-translate="home.cta.register">Créer un compte</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5" data-translate="home.cta.contact">Nous contacter</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Counter animation
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

            // Re-run counter animation on language change if needed
            document.addEventListener('languageChanged', function() {
                counters.forEach(counter => {
                    if (counter.getBoundingClientRect().top >= 0 && counter.getBoundingClientRect().bottom <= window.innerHeight) {
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
                    }
                });
            });
        });
    </script>
@endpush
