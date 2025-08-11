<nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50 dark:bg-gray-800 dark:border-gray-600">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center dark:bg-green-700">
                        <i class="fas fa-handshake text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100" data-translate="site.name">CoopMarket</h1>
                        <p class="text-xs text-gray-500 dark:text-gray-300" data-translate="site.tagline">Marketplace Coopérative</p>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex space-x-12">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 font-medium transition-colors dark:text-gray-200 dark:hover:text-green-400 {{ request()->is('/') ? 'font-bold' : '' }}" data-translate="nav.home">Accueil</a>
                <a href="{{ route('offers.index') }}" class="text-gray-700 hover:text-green-600 transition-colors dark:text-gray-200 dark:hover:text-green-400 {{ request()->is('products*') ? 'font-bold' : '' }}" data-translate="nav.products">Produits</a>
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 transition-colors dark:text-gray-200 dark:hover:text-green-400 {{ request()->is('cooperatives*') ? 'font-bold' : '' }}" data-translate="nav.cooperatives">Coopératives</a>
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 transition-colors dark:text-gray-200 dark:hover:text-green-400 {{ request()->is('categories*') ? 'font-bold' : '' }}" data-translate="nav.categories">Catégories</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-600 transition-colors dark:text-gray-200 dark:hover:text-green-400 {{ request()->is('about') ? 'font-bold' : '' }}" data-translate="nav.about">À propos</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 transition-colors dark:text-gray-200 dark:hover:text-green-400 {{ request()->is('contact') ? 'font-bold' : '' }}" data-translate="nav.contact">Contact</a>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-4">
                <!-- Language Dropdown -->
                <div class="relative">
                    <button class="btn btn-outline-gray-200 hover:bg-gray-200 hover:text-green-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-green-400 flex items-center space-x-2" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe"></i>
                        <span id="current-lang" data-translate="nav.language">FR</span>
                    </button>
                    <ul class="dropdown-menu mt-2 bg-white shadow-lg rounded-lg dark:bg-gray-700" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item lang-btn text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600" data-lang="fr" href="#" data-translate="nav.french">Français</a></li>
                        <li><a class="dropdown-item lang-btn text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600" data-lang="ar" href="#" data-translate="nav.arabic">العربية</a></li>
                        <li><a class="dropdown-item lang-btn text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600" data-lang="en" href="#" data-translate="nav.english">English</a></li>
                    </ul>
                </div>

                <!-- Theme Toggle -->
                <button id="themeToggle" class="btn btn-outline-gray-200 hover:bg-gray-200 hover:text-green-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-green-400 flex items-center space-x-2">
                    <i class="fas fa-moon"></i>
                    <span data-translate="nav.theme">Mode sombre</span>
                </button>
                <!-- Connexion / register -->
                <a href="{{ route('login') }}" class="btn btn-outline-green-600 hover:bg-green-600 hover:text-white dark:hover:bg-green-500 dark:hover:text-gray-100" data-translate="nav.login">Connexion</a>
                <a href="{{ route('register') }}" class="btn btn-outline-green-600 hover:bg-green-600 hover:text-white dark:hover:bg-green-500 dark:hover:text-gray-100" data-translate="nav.register">Inscription</a>

            </div>
        </div>
    </div>
</nav>
