@extends('layouts.user_space')

@section('title', __('requests.my_requests'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-primary-green">{{ __('requests.my_requests') }}</h1>
                <p class="text-muted">{{ __('requests.my_requests_subtitle') }}</p>
            </div>
            <a href="{{ route('requests.create') }}" class="btn btn-primary-green">
                <i class="fas fa-plus me-2"></i>{{ __('requests.create') }}
            </a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($requests as $request)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-2">{{ $request->title }}</h5>
                                    <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-{{ $request->urgency == 'high' ? 'danger' : ($request->urgency == 'medium' ? 'warning' : 'secondary') }} me-2">
                                    {{ $request->urgency == 'high' ? __('requests.urgent') : ($request->urgency == 'medium' ? __('requests.medium') : __('requests.normal')) }}
                                </span>
                                        <span class="badge bg-primary">{{ $request->category }}</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="h5 text-success mb-0">{{ $request->budget }}€</div>
                                    <small class="text-muted">{{ __('requests.max_budget') }}</small>
                                </div>
                            </div>

                            <p class="card-text">{{ Str::limit($request->description, 120) }}</p>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-weight me-1"></i>
                                        {{ __('requests.quantity') }}: {{ $request->quantity }} {{ $request->unit }}
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        {{ $request->location }}
                                    </small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ __('requests.needed_by') }}: {{ $request->created_at }}
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>
                                        {{ $request->user->name }}
                                    </small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ __('requests.published') }} {{ $request->created_at }}
                                    </small>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('requests.show', $request->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>{{ __('requests.view') }}
                                    </a>
                                    <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit me-1"></i>{{ __('requests.edit') }}
                                    </a>
                                    <button class="btn btn-outline-danger btn-sm" onclick="confirmDelete({{ $request->id }})">
                                        <i class="fas fa-trash me-1"></i>{{ __('common.delete') }}
                                    </button>
                                </div>
                            </div>

                            @if($request->responses_count > 0)
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
                        <p class="text-muted">{{ __('requests.no_results_my_requests') }}</p>
                        <a href="{{ route('requests.create') }}" class="btn btn-primary-green">
                            {{ __('requests.create') }}
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($requests) && method_exists($requests, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $requests->links() }}
            </div>
        @endif
    </div>

    <script>
        function confirmDelete(requestId) {
            if (confirm('{{ __('requests.delete_confirm') }}')) {
                fetch(`/requests/${requestId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('{{ __('requests.delete_error') }}');
                        }
                    });
            }
        }
    </script>
@endsection
