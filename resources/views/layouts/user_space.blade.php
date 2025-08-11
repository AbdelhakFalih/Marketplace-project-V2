<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mon Espace - @yield('title', 'Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#f0f9ff', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' },
                        user: { 50: '#f8fafc', 500: '#6366f1', 600: '#4f46e5', 700: '#4338ca' }
                    }
                }
            }
        }
    </script>
    <style>
        [data-theme="dark"] {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        .bg-primary-green { background-color: #28a745; }
        .bg-secondary-green { background-color: #17a2b8; }
        .bg-primary-green-light { background-color: #48c78e; }
        .bg-primary-green-dark { background-color: #1e7e34; }
        .bg-user-50 { background-color: #f8f9fa; }
        .text-user-600 { color: #343a40; }
        .bg-user-500 { background-color: #6c757d; }
        .btn-primary-green { background-color: #28a745; border-color: #28a745; color: #fff; }
        .btn-primary-green:hover { background-color: #218838; border-color: #1e7e34; }
        .btn-outline-primary-green { border-color: #28a745; color: #28a745; }
        .btn-outline-primary-green:hover { background-color: #28a745; color: #fff; }
        .btn-primary-yellow { background-color: #ffc107; border-color: #ffc107; color: #000; }
        .btn-primary-yellow:hover { background-color: #e0a800; border-color: #d39e00; }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-gray-50">
<!-- User Navbar -->
@include('components.user-navbar')

<!-- Breadcrumb -->
@include('components.breadcrumb')

<!-- Main Content -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-3">
            <!-- User Sidebar -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="w-16 h-16 bg-user-500 rounded-full mx-auto flex items-center justify-center mb-3">
                            <i class="fas fa-user text-white text-2xl"></i>
                        </div>
                        @if (Auth::check())
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            <p class="text-muted small" data-translate="user.member-since">Membre depuis {{ Auth::user()->created_at->format('M Y') }}</p>
                        @else
                            <h5 class="card-title" data-translate="auth.guest">Invité</h5>
                            <p class="text-muted small" data-translate="auth.login_to_view">Connectez-vous pour voir</p>
                        @endif
                    </div>
                    <nav class="nav flex-column">
                        @if (Auth::check())
                            <a class="nav-link {{ request()->is('user/dashboard') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('user.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i><span data-translate="nav.dashboard">Tableau de bord</span>
                            </a>
                            <a class="nav-link {{ request()->is('user/profile*') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('user.profile') }}">
                                <i class="fas fa-user me-2"></i><span data-translate="nav.profile">Mon Profil</span>
                            </a>
                            <a class="nav-link {{ request()->is('user/profile/edit*') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('user.profile.edit') }}">
                                <i class="fas fa-edit me-2"></i><span data-translate="user.edit-profile">Modifier profile</span>
                            </a>
                            <a class="nav-link {{ request()->is('user/profile/edit/avatar*') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('user.profile.edit.avatar') }}">
                                <i class="fas fa-image me-2"></i><span data-translate="user.edit-avatar">Modifier avatar</span>
                            </a>
                            <a class="nav-link {{ request()->is('user/password/edit*') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('user.password.edit') }}">
                                <i class="fas fa-lock me-2"></i><span data-translate="user.change-password">Changer mot de passe</span>
                            </a>
                            <a class="nav-link" href="">
                                <i class="fas fa-shopping-bag me-2"></i><span data-translate="nav.orders">Mes Commandes</span>
                            </a>
                            <a class="nav-link" href="">
                                <i class="fas fa-heart me-2"></i><span data-translate="user.favorites">Favoris</span>
                            </a>
                            <a class="nav-link {{ request()->is('offers*') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('offers.myoffers') }}">
                                <i class="fas fa-box me-2"></i><span data-translate="user.my-offers">Mes offres</span>
                            </a>
                            <a class="nav-link {{ request()->is('transactions*') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('transactions.index') }}">
                                <i class="fas fa-exchange-alt me-2"></i><span data-translate="user.transactions">Mes transactions</span>
                            </a>
                            <a class="nav-link {{ request()->is('transactions/history*') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('transactions.history') }}">
                                <i class="fas fa-history me-2"></i><span data-translate="user.transaction-history">Historiques de transaction</span>
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i><span data-translate="nav.login">Se connecter</span>
                            </a>
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-2"></i><span data-translate="nav.register">S'inscrire</span>
                            </a>
                        @endif
                        <a class="nav-link {{ request()->is('offers') ? 'active bg-user-50 text-user-600' : '' }}" href="{{ route('offers.index') }}">
                            <i class="fas fa-list me-2"></i><span data-translate="user.discover-offers">Découvrir des offres</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('js/translations.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
