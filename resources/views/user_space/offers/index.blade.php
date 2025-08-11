@extends('layouts.user_space')

@section('title', __('nav.offers'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-primary-green">{{ __('Les offres récentes') }}</h1>
                <p class="text-muted">{{ __('Découvrir de nouveaux offres') }}</p>
            </div>
            <div class="btn-group">
                <a href="{{ route('offers.create') }}" class="btn btn-primary-green">
                    <i class="fas fa-plus me-2"></i>{{ __('Crée une nouvelle offre') }}
                </a>
                <a href="{{ route('offers.myoffers') }}" class="btn btn-outline-primary-green">
                    <i class="fas fa-user me-2"></i>{{ __('Mes Offres') }}
                </a>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary-green text-white">
                    <div class="card-body">
                        <h4 class="mb-0">{{ $totalOffers }}</h4>
                        <p class="mb-0">{{ __('Total des offres') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary-green text-white">
                    <div class="card-body">
                        <h4 class="mb-0">{{ $newToday }}</h4>
                        <p class="mb-0">{{ __("Nouveaux offres d'/aujourd'/hui") }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('offers.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('Entrer un mot de passe') }}"
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="category" class="form-select">
                            <option value="">{{ __('Catégories') }}</option>
                            <!-- Ajouter les catégories dynamiquement -->
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="max_price" class="form-control" placeholder="{{ __('Prix max') }}"
                               value="{{ request('max_price') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="location" class="form-control" placeholder="{{ __('localisation') }}"
                               value="{{ request('location') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="sort" class="form-select">
                            <option value="">{{ __('Trier par') }}</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>{{ __('Plus petit au plus grand') }}</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>{{ __('Plus grand au plus petit') }}</option>
                            <option value="quantity" {{ request('sort') == 'quantity' ? 'selected' : '' }}>{{ __('Quantité') }}</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="submit" class="btn btn-outline-primary-green w-100">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Liste des offres -->
        <div class="row">
            @forelse($offers ?? [] as $offer)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm hover-shadow transition-all">
                        @include('components/offer-card', ['offer' => $offer])
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4 data-translate="common.no_results">Aucune offre trouvée</h4>
                        <p class="text-muted">Essayez de modifier vos critères de recherche</p>
                        <a href="{{ route('offers.create') }}" class="btn btn-primary-green">
                            <span data-translate="offers.create">Publier la première offre</span>
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($offers) && method_exists($offers, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $offers->links() }}
            </div>
        @endif
    </div>

    <script>
        function addToWishlist(offerId) {
            fetch(`/wishlist/${offerId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ offer_id: offerId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                    } else {
                        alert(data.error || '{{ __('wishlist.error') }}');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('{{ __('wishlist.error') }}');
                });
        }
    </script>
@endsection
