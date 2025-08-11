@extends('layouts.user_space')

@section('title', __('offers.my_offers'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-primary-green">{{ __('offers.my_offers') }}</h1>
                <p class="text-muted">{{ __('offers.my_offers_subtitle') }}</p>
            </div>
            <div class="btn-group">
                <a href="{{ route('offers.create') }}" class="btn btn-primary-green">
                    <i class="fas fa-plus me-2"></i>{{ __('offers.create') }}
                </a>
                <a href="{{ route('offers.index') }}" class="btn btn-outline-primary-green">
                    <i class="fas fa-list me-2"></i>{{ __('nav.offers') }}
                </a>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary-green text-white">
                    <div class="card-body">
                        <h4 class="mb-0">{{ $myOffers }}</h4>
                        <p class="mb-0">{{ __('offers.my_offers') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary-green text-white">
                    <div class="card-body">
                        <h4 class="mb-0">{{ $totalViews }}</h4>
                        <p class="mb-0">{{ __('offers.total_views') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary-green-light text-white">
                    <div class="card-body">
                        <h4 class="mb-0">{{ $totalSales }}</h4>
                        <p class="mb-0">{{ __('offers.total_sales') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary-green-dark text-white">
                    <div class="card-body">
                        <h4 class="mb-0">{{ number_format($totalRevenue, 2) }}€</h4>
                        <p class="mb-0">{{ __('offers.total_revenue') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des offres -->
        <div class="row">
            @forelse($offers as $offer)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div>
                                        <h5 class="mb-1">{{ $offer->title }}</h5>
                                        <p class="mb-1 text-success">{{ __('offers.your_offer') }}</p>
                                        <small class="text-muted ms-1">/{{ $offer->unit }}</small>
                                    </div>
                                    <small class="text-muted">{{ __('offers.quantity') }}: {{ $offer->quantity }} {{ $offer->unit }}</small>
                                </div>
                                <div class="col-6 text-end">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('offers.detail', $offer->id) }}" class="btn btn-outline-primary-green btn-sm">
                                            <i class="fas fa-eye"></i> {{ __('offers.view') }}
                                        </a>
                                        <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-outline-primary-green btn-sm">
                                            <i class="fas fa-edit"></i> {{ __('offers.edit') }}
                                        </a>
                                        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('{{ __('offers.delete_confirm') }}')">
                                                <i class="fas fa-trash"></i> {{ __('offers.delete') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h4>{{ __('offers.no_results') }}</h4>
                    <p class="text-muted">{{ __('offers.no_results_message') }}</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($offers->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $offers->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
@endsection
