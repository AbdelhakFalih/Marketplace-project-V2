@extends('layouts.app')

@section('title')
    <span data-translate="faq.title">Questions Fréquentes</span>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="display-4 fw-bold mb-4" data-translate="faq.title">Questions Fréquentes</h1>
                <p class="lead max-w-3xl mx-auto" data-translate="faq.subtitle">Trouvez rapidement les réponses à vos questions les plus courantes.</p>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="position-relative">
                    <input type="text" id="faqSearch" class="form-control form-control-lg ps-5"
                           data-translate-placeholder="faq.search.placeholder" placeholder="Rechercher dans la FAQ...">
                    <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-gray-400"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="row">
                <!-- Categories -->
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="sticky-top" style="top: 2rem;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="font-bold mb-4" data-translate="faq.categories">Catégories</h5>
                                <nav class="nav flex-column">
                                    <a class="nav-link px-0 py-2 text-sm active" href="#general" data-category="general">
                                        <i class="fas fa-info-circle me-2"></i><span data-translate="faq.general">Général</span>
                                    </a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#compte" data-category="compte">
                                        <i class="fas fa-user me-2"></i><span data-translate="faq.account">Compte</span>
                                    </a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#vente" data-category="vente">
                                        <i class="fas fa-store me-2"></i><span data-translate="faq.sell">Vendre</span>
                                    </a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#achat" data-category="achat">
                                        <i class="fas fa-shopping-cart me-2"></i><span data-translate="faq.buy">Acheter</span>
                                    </a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#paiement" data-category="paiement">
                                        <i class="fas fa-credit-card me-2"></i><span data-translate="faq.payment">Paiement</span>
                                    </a>
                                    <a class="nav-link px-0 py-2 text-sm" href="#securite" data-category="securite">
                                        <i class="fas fa-shield-alt me-2"></i><span data-translate="faq.security">Sécurité</span>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Items -->
                <div class="col-lg-9">
                    <div id="faqAccordion">
                        <!-- Général -->
                        <div class="faq-category mb-5" data-category="general">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4" data-translate="faq.general">Questions générales</h3>

                            <div class="accordion" id="generalAccordion">
                                <div class="accordion-item faq-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#general1">
                                            <span data-translate="faq.question.what-is-platform">Qu'est-ce que cette plateforme ?</span>
                                        </button>
                                    </h2>
                                    <div id="general1" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                        <div class="accordion-body">
                                            <span data-translate="faq.answer.what-is-platform">Notre plateforme est une marketplace qui permet aux utilisateurs d'acheter, vendre et échanger des biens et services en toute sécurité.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add other FAQ items with data-translate -->
                            </div>
                        </div>
                        <!-- Add other categories (compte, vente, etc.) with data-translate -->
                    </div>

                    <!-- No Results -->
                    <div id="noResults" class="text-center py-8 d-none">
                        <i class="fas fa-search text-4xl text-gray-400 mb-4"></i>
                        <h4 class="text-gray-600 mb-2" data-translate="faq.no-results">Aucun résultat trouvé</h4>
                        <p class="text-gray-500" data-translate="faq.no-results-subtitle">Essayez avec d'autres mots-clés ou parcourez les catégories.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-translate="faq.contact-us">Vous ne trouvez pas votre réponse ?</h2>
                <p class="text-lg text-gray-600 mb-6" data-translate="faq.contact-team">Notre équipe de support est là pour vous aider</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-5" data-translate="faq.contact">Nous contacter</a>
                    <a href="mailto:support@marketplace.com" class="btn btn-outline-primary btn-lg px-5" data-translate="faq.email">Envoyer un email</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('faqSearch');
            const faqItems = document.querySelectorAll('.faq-item');
            const categories = document.querySelectorAll('.faq-category');
            const categoryLinks = document.querySelectorAll('[data-category]');
            const noResults = document.getElementById('noResults');

            // Update search to respect translations
            function updateSearch() {
                const searchTerm = searchInput.value.toLowerCase();
                let hasResults = false;

                faqItems.forEach(item => {
                    const question = item.querySelector('.accordion-button span').textContent.toLowerCase();
                    const answer = item.querySelector('.accordion-body span').textContent.toLowerCase();

                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                        hasResults = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                categories.forEach(category => {
                    const visibleItems = category.querySelectorAll('.faq-item[style="display: block"], .faq-item:not([style*="display: none"])');
                    if (searchTerm === '' || visibleItems.length > 0) {
                        category.style.display = 'block';
                    } else {
                        category.style.display = 'none';
                    }
                });

                noResults.classList.toggle('d-none', searchTerm === '' || hasResults);
            }

            searchInput.addEventListener('input', updateSearch);

            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    categoryLinks.forEach(l => l.classList.remove('active', 'text-primary'));
                    this.classList.add('active', 'text-primary');

                    const targetCategory = this.getAttribute('data-category');

                    categories.forEach(category => {
                        if (category.getAttribute('data-category') === targetCategory) {
                            category.style.display = 'block';
                            category.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        } else {
                            category.style.display = 'none';
                        }
                    });

                    searchInput.value = '';
                    faqItems.forEach(item => item.style.display = 'block');
                    noResults.classList.add('d-none');
                });
            });

            document.querySelector('[data-category="general"]').addEventListener('click', function(e) {
                if (this.classList.contains('active')) {
                    e.preventDefault();
                    categories.forEach(category => category.style.display = 'block');
                }
            });

            // Re-run search on language change
            document.addEventListener('languageChanged', updateSearch);
        });
    </script>
@endpush
