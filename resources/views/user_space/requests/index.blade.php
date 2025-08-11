@extends('layouts.user_space')

@section('title', __('requests.title'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">{{ __('requests.title') }}</h1>
                        <p class="text-muted">{{ __('requests.subtitle') }}</p>
                    </div>
                    <div>
                        <a href="{{ route('requests.create') }}" class="btn btn-primary me-2">
                            <i class="fas fa-plus me-2"></i>{{ __('requests.create') }}
                        </a>
                        @if(auth()->check())
                            <a href="{{ route('requests.myrequests') }}" class="btn btn-outline-primary">
                                <i class="fas fa-search me-2"></i>{{ __('requests.my_requests') }}
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Filtres -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form method="GET" action="{{ route('requests.index') }}" class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ __('requests.search') }}</label>
                                <input type="text" name="search" class="form-control"
                                       placeholder="{{ __('requests.search_placeholder') }}"
                                       value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('requests.category') }}</label>
                                <select name="category" class="form-select">
                                    <option value="">{{ __('requests.all_categories') }}</option>
                                    <option value="fruits" {{ request('category') == 'fruits' ? 'selected' : '' }}>{{ __('requests.fruits') }}</option>
                                    <option value="legumes" {{ request('category') == 'legumes' ? 'selected' : '' }}>{{ __('requests.vegetables') }}</option>
                                    <option value="cereales" {{ request('category') == 'cereales' ? 'selected' : '' }}>{{ __('requests.cereals') }}</option>
                                    <option value="produits-laitiers" {{ request('category') == 'produits-laitiers' ? 'selected' : '' }}>{{ __('requests.dairy') }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('requests.max_budget') }}</label>
                                <input type="number" name="max_budget" class="form-control"
                                       placeholder="0.00" value="{{ request('max_budget') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('requests.location') }}</label>
                                <input type="text" name="location" class="form-control"
                                       placeholder="{{ __('requests.location_placeholder') }}" value="{{ request('location') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('requests.urgency') }}</label>
                                <select name="urgency" class="form-select">
                                    <option value="">{{ __('requests.all_urgencies') }}</option>
                                    <option value="low" {{ request('urgency') == 'low' ? 'selected' : '' }}>{{ __('requests.low') }}</option>
                                    <option value="medium" {{ request('urgency') == 'medium' ? 'selected' : '' }}>{{ __('requests.medium') }}</option>
                                    <option value="high" {{ request('urgency') == 'high' ? 'selected' : '' }}>{{ __('requests.high') }}</option>
                                </select>
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <button type="submit" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $totalRequests ?? 89 }}</h4>
                                <p class="mb-0">{{ __('requests.active') }}</p>
                            </div>
                            <i class="fas fa-search fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $urgentRequests ?? 12 }}</h4>
                                <p class="mb-0">{{ __('requests.urgent') }}</p>
                            </div>
                            <i class="fas fa-exclamation-circle fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des demandes -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($requests as $request)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-2">{{ $request->title ?? 'Recherche tomates bio locales' }}</h5>
                                    <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-{{ $request->urgency == 'high' ? 'danger' : ($request->urgency == 'medium' ? 'warning' : 'secondary') }} me-2">
                                    {{ $request->urgency == 'high' ? __('requests.urgent') : ($request->urgency == 'medium' ? __('requests.medium') : __('requests.normal')) }}
                                </span>
                                        <span class="badge bg-primary">{{ $request->category ?? 'Légumes' }}</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="h5 text-success mb-0">{{ $request->budget ?? '15.00' }}€</div>
                                    <small class="text-muted">{{ __('requests.max_budget') }}</small>
                                </div>
                            </div>

                            <p class="card-text">{{ Str::limit($request->description ?? 'Je recherche des tomates biologiques cultivées localement pour mes conserves maison. Quantité souhaitée : 10kg minimum.', 120) }}</p>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-weight me-1"></i>
                                        {{ __('requests.quantity') }}: {{ $request->quantity ?? '10' }} {{ $request->unit ?? 'kg' }}
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        {{ $request->location ?? 'Lyon' }}
                                    </small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ __('requests.needed_by') }}: {{ $request->needed_by ?? '15/12/2024' }}
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>
                                        {{ $request->user->name ?? 'Marie D.' }}
                                    </small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ __('requests.published') }} {{ $request->created_at ?? 'il y a 3 jours' }}
                                    </small>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('requests.show', $request->id ?? 1) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>{{ __('requests.view') }}
                                    </a>
                                    <button class="btn btn-primary btn-sm" onclick="respondToRequest({{ $request->id ?? 1 }})">
                                        <i class="fas fa-reply me-1"></i>{{ __('requests.respond') }}
                                    </button>
                                </div>
                            </div>

                            @if(isset($request->responses_count) && $request->responses_count > 0)
                                <div class="mt-2 pt-2 border-top">
                                    <small class="text-success">
                                        <i class="fas fa-comments me-1"></i>
                                        {{ $request->responses_count }} {{ __('requests.responses_count') }}
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>{{ __('requests.no_results') }}</h4>
                        <p class="text-muted">{{ __('requests.no_results_message') }}</p>
                        <a href="{{ route('requests.create') }}" class="btn btn-primary">
                            {{ __('requests.create') }}
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($requests) && method_exists($requests, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $requests->appends(['search' => request('search'), 'category' => request('category'), 'max_budget' => request('max_budget'), 'location' => request('location'), 'urgency' => request('urgency')])->links() }}
            </div>
        @endif
    </div>

    <script>
        function respondToRequest(requestId) {
            window.location.href = `/requests/${requestId}/respond`;
        }
    </script>
@endsection
