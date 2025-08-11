@extends('layouts.user_space')

@section('title', $request->title)

@section('content')
    <div class="container-fluid px-4 py-6">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-2 text-primary-green">{{ $request->title }}</h1>
                        <p class="text-muted">{{ __('requests.details_subtitle') }}</p>
                    </div>
                    <div>
                        <a href="{{ route('requests.index') }}" class="btn btn-outline-primary-green">
                            <i class="fas fa-arrow-left me-2"></i>{{ __('common.back') }}
                        </a>
                        @if(auth()->check() && auth()->id() === $request->user_id)
                            <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-outline-primary-green me-2">
                                <i class="fas fa-edit me-2"></i>{{ __('requests.edit') }}
                            </a>
                            <button class="btn btn-outline-danger" onclick="confirmDelete({{ $request->id }})">
                                <i class="fas fa-trash me-2"></i>{{ __('common.delete') }}
                            </button>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-2">{{ $request->title }}</h5>
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

                        <p class="card-text">{{ $request->description }}</p>

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
                                    {{ __('requests.needed_by') }}: {{ $request->needed_by }}
                                </small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>
                                    {{ $request->user->name }}
                                </small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                {{ __('requests.published') }} {{ $request->created_at }}
                            </small>
                        </div>

                        @if($request->responses_count > 0)
                            <div class="mt-3 pt-3 border-top">
                                <h6>{{ __('requests.responses') }}</h6>
                                <p class="text-muted">{{ $request->responses_count }} {{ __('requests.responses_count') }}</p>
                                <!-- Afficher les réponses si nécessaire -->
                            </div>
                        @endif

                        @if(auth()->check() && auth()->id() !== $request->user_id)
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('requests.respond', $request->id) }}" class="btn btn-primary">
                                    <i class="fas fa-reply me-2"></i>{{ __('requests.respond') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('requests.delete_confirm') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('requests.delete_message') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('common.cancel') }}</button>
                    <form method="POST" action="{{ route('requests.destroy', $request->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(requestId) {
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }
    </script>
@endsection
