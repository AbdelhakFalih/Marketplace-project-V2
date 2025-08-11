<!-- resources/views/components/user-navbar.blade.php -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm border-bottom">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between w-11/12" >
            <!-- Logo & Back to Site -->
            <div class="d-flex align-items-center">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-decoration-none me-4">
                    <div class="bg-success rounded-3 p-2 me-2">
                        <i class="fas fa-handshake text-white"></i>
                    </div>
                    <span class="fw-bold text-dark" data-translate="site.name">CoopMarket</span>
                </a>
                <div class="vr d-none d-md-block me-4"></div>
                <h4 class="mb-0 fw-bold text-dark d-none d-md-block" data-translate="nav.account">Mon Espace</h4>
            </div>

            <!-- User Info & Actions -->
            <div class="d-flex align-items-center">
                <!-- Theme Toggle -->
                <button id="theme-toggle" class="btn btn-outline-secondary me-3">
                    <i id="theme-icon" class="fas fa-sun"></i>
                </button>

                <!-- Language Dropdown -->
                <div class="dropdown me-3">
                    <button class="btn btn-light dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe"></i> <span id="current-lang">FR</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item lang-btn" data-lang="fr" href="#">Français</a></li>
                        <li><a class="dropdown-item lang-btn" data-lang="ar" href="#">العربية</a></li>
                        <li><a class="dropdown-item lang-btn" data-lang="en" href="#">English</a></li>
                    </ul>
                </div>

                <!-- Notifications -->
                <div class="dropdown me-3">
                    <button class="btn btn-outline-secondary position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            2
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="width: 300px;">
                        <li><h6 class="dropdown-header" data-translate="nav.notifications">Notifications</h6></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-start" href="">
                                <div class="bg-success rounded-circle p-2 me-3">
                                    <i class="fas fa-check text-white small"></i>
                                </div>
                                <div>
                                    <div class="fw-bold small" data-translate="nav.order-shipped">Commande expédiée</div>
                                    <div class="text-muted small">Votre commande #1234 est en route</div>
                                    <div class="text-muted small">Il y a 2h</div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-start" href="">
                                <div class="bg-primary rounded-circle p-2 me-3">
                                    <i class="fas fa-heart text-white small"></i>
                                </div>
                                <div>
                                    <div class="fw-bold small" data-translate="nav.product-promo">Produit en promotion</div>
                                    <div class="text-muted small">Un de vos favoris est en promo</div>
                                    <div class="text-muted small">Il y a 1 jour</div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center" data-translate="nav.view-all">Voir toutes</a></li>
                    </ul>
                </div>

                <!-- Messages -->
                <a href="" class="btn btn-outline-secondary me-3 position-relative">
                    <i class="fas fa-envelope"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        1
                    </span>
                </a>

                <!-- User Profile -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <div class="bg-primary rounded-circle p-2 me-2">
                            @if(Auth::check() && Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="rounded-circle" style="width: 20px; height: 20px;">
                            @else
                                <i class="fas fa-user text-white small"></i>
                            @endif
                        </div>
                        <div class="text-start d-none d-md-block">
                            <div class="fw-bold small">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                            <div class="text-muted small">{{ Auth::user()->email ?? 'user@example.com' }}</div>
                        </div>
                        <i class="fas fa-chevron-down ms-2"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><h6 class="dropdown-header">{{ Auth::user()->name ?? 'Utilisateur' }}</h6></li>
                        <li><small class="dropdown-item-text text-muted">{{ Auth::user()->email ?? 'user@example.com' }}</small></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">
                                <i class="fas fa-user me-2"></i><span data-translate="nav.profile">Mon Profil</span>
                            </a></li>
                        <li><a class="dropdown-item" href="">
                                <i class="fas fa-cog me-2"></i><span data-translate="user.settings">Paramètres</span>
                            </a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">
                                <i class="fas fa-home me-2"></i><span data-translate="nav.back-to-site">Retour au site</span>
                            </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i><span data-translate="nav.logout">Déconnexion</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="navbar-toggler ms-2 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#userNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="collapse navbar-collapse mt-3 d-lg-none" id="userNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/dashboard') ? 'active fw-bold' : '' }}" href="{{ route('user.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i><span data-translate="nav.dashboard">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/profile*') ? 'active fw-bold' : '' }}" href="{{ route('user.profile') }}">
                        <i class="fas fa-user me-2"></i><span data-translate="nav.profile">Mon Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-shopping-bag me-2"></i><span data-translate="nav.orders">Mes Commandes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-heart me-2"></i><span data-translate="user.favorites">Mes Favoris</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-cog me-2"></i><span data-translate="user.settings">Paramètres</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
