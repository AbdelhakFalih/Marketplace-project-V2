@extends('layouts.user_space')

@section('title', __('transactions.my_transactions'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-primary-green">{{ __('transactions.my_transactions') }}</h1>
                <p class="text-muted">{{ __('transactions.my_transactions_subtitle') }}</p>
            </div>
            <div class="btn-group">
                <a href="{{ route('transactions.history') }}" class="btn btn-outline-primary-green">
                    <i class="fas fa-history me-2"></i>{{ __('transactions.history') }}
                </a>
                <button class="btn btn-outline-primary-green" onclick="exportTransactions()">
                    <i class="fas fa-download me-2"></i>{{ __('transactions.export') }}
                </button>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary-green text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $stats['activeTransactions'] ?? 0 }}</h4>
                                <p class="mb-0">{{ __('transactions.active') }}</p>
                            </div>
                            <i class="fas fa-clock fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary-green text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $stats['completedTransactions'] ?? 0 }}</h4>
                                <p class="mb-0">{{ __('transactions.completed') }}</p>
                            </div>
                            <i class="fas fa-check-circle fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary-green-light text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $stats['pendingPayments'] ?? 0 }}</h4>
                                <p class="mb-0">{{ __('transactions.pending_payments') }}</p>
                            </div>
                            <i class="fas fa-credit-card fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary-green-dark text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $stats['monthlyTotal'] ?? 0 }}€</h4>
                                <p class="mb-0">{{ __('transactions.monthly_total') }}</p>
                            </div>
                            <i class="fas fa-euro-sign fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onglets -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-primary-green" data-bs-toggle="tab" href="#active">
                    {{ __('transactions.active') }} <span class="badge bg-primary-green ms-2">{{ $stats['activeTransactions'] ?? 0 }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary-green" data-bs-toggle="tab" href="#completed">
                    {{ __('transactions.completed') }} <span class="badge bg-secondary-green ms-2">{{ $stats['completedTransactions'] ?? 0 }}</span>
                </a>
            </li>
        </ul>

        <!-- Contenu des onglets -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="active">
                @forelse($transactions->filter(fn($t) => in_array($t->status, ['pending', 'confirmed', 'shipped'])) as $transaction)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1">{{ $transaction->offer->title }}</h5>
                                    <p class="text-muted mb-1">
                                        <i class="fas fa-hashtag me-1"></i>TXN-2024-{{ str_pad($transaction->id, 3, '0', STR_PAD_LEFT) }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-user me-1"></i>
                                        {{ $transaction->buyer_id === auth()->id() ? $transaction->seller->name : $transaction->buyer->name }}
                                    </p>
                                </div>
                                <div class="text-end">
                                    <p class="h5 mb-1 {{ $transaction->buyer_id === auth()->id() ? 'text-danger' : 'text-success' }}">
                                        {{ $transaction->buyer_id === auth()->id() ? '-' : '+' }}{{ $transaction->amount }}€
                                    </p>
                                    <span class="badge bg-{{ $transaction->status == 'pending' ? 'warning' : ($transaction->status == 'confirmed' ? 'info' : 'primary') }}">
                                {{ __('transactions.' . $transaction->status) }}
                            </span>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-calendar me-1"></i>{{ $transaction->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary-green btn-sm" onclick="viewTransaction({{ $transaction->id }})">
                                        <i class="fas fa-eye me-1"></i>{{ __('transactions.view') }}
                                    </button>
                                    @if($transaction->status == 'pending' && $transaction->buyer_id === auth()->id())
                                        <button class="btn btn-outline-primary-green btn-sm" onclick="continueTransaction({{ $transaction->id }})">
                                            <i class="fas fa-play me-1"></i>{{ __('transactions.continue') }}
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" onclick="cancelTransaction({{ $transaction->id }})">
                                            <i class="fas fa-times me-1"></i>{{ __('transactions.cancel') }}
                                        </button>
                                    @endif
                                    <button class="btn btn-outline-primary-green btn-sm" onclick="downloadInvoice({{ $transaction->id }})">
                                        <i class="fas fa-file-pdf me-1"></i>{{ __('transactions.invoice') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>
                        <h4>{{ __('transactions.no_results') }}</h4>
                        <p class="text-muted">{{ __('transactions.no_results_message') }}</p>
                    </div>
                @endforelse
            </div>
            <div class="tab-pane fade" id="completed">
                @forelse($transactions->filter(fn($t) => $t->status == 'delivered') as $transaction)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1">{{ $transaction->offer->title }}</h5>
                                    <p class="text-muted mb-1">
                                        <i class="fas fa-hashtag me-1"></i>TXN-2024-{{ str_pad($transaction->id, 3, '0', STR_PAD_LEFT) }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-user me-1"></i>
                                        {{ $transaction->buyer_id === auth()->id() ? $transaction->seller->name : $transaction->buyer->name }}
                                    </p>
                                </div>
                                <div class="text-end">
                                    <p class="h5 mb-1 {{ $transaction->buyer_id === auth()->id() ? 'text-danger' : 'text-success' }}">
                                        {{ $transaction->buyer_id === auth()->id() ? '-' : '+' }}{{ $transaction->amount }}€
                                    </p>
                                    <span class="badge bg-success">
                                {{ __('transactions.delivered') }}
                            </span>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-calendar me-1"></i>{{ $transaction->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary-green btn-sm" onclick="viewTransaction({{ $transaction->id }})">
                                        <i class="fas fa-eye me-1"></i>{{ __('transactions.view') }}
                                    </button>
                                    <button class="btn btn-outline-primary-green btn-sm" onclick="rateTransaction({{ $transaction->id }})">
                                        <i class="fas fa-star me-1"></i>{{ __('transactions.rate') }}
                                    </button>
                                    <button class="btn btn-outline-primary-green btn-sm" onclick="downloadInvoice({{ $transaction->id }})">
                                        <i class="fas fa-file-pdf me-1"></i>{{ __('transactions.invoice') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>
                        <h4>{{ __('transactions.no_results') }}</h4>
                        <p class="text-muted">{{ __('transactions.no_results_message') }}</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal de détails -->
        <div class="modal fade" id="transactionModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('transactions.details') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="transactionDetails">
                        <!-- Contenu chargé dynamiquement -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('common.close') }}</button>
                        <button type="button" class="btn btn-primary-green" onclick="downloadInvoice(document.getElementById('transactionModal').dataset.transactionId)">
                            <i class="fas fa-download me-2"></i>{{ __('transactions.invoice') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal d'évaluation -->
        <div class="modal fade" id="ratingModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('transactions.rate_transaction') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="ratingForm">
                            <div class="mb-3">
                                <label class="form-label">{{ __('transactions.rating') }}</label>
                                <div class="rating-input">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star rating-star text-muted" data-rating="{{ $i }}"></i>
                                    @endfor
                                </div>
                                <input type="hidden" id="rating" name="rating" value="0">
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">{{ __('transactions.comment') }}</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"
                                          placeholder="{{ __('transactions.comment_placeholder') }}"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('common.cancel') }}</button>
                        <button type="button" class="btn btn-primary-green" onclick="submitRating()">{{ __('transactions.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewTransaction(id) {
            fetch(`/transactions/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('transactionModal').dataset.transactionId = id;
                    document.getElementById('transactionDetails').innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <h6>{{ __('transactions.general_info') }}</h6>
                        <p><strong>{{ __('transactions.reference') }}:</strong> #TXN-2024-${id.toString().padStart(3, '0')}</p>
                        <p><strong>{{ __('transactions.date') }}:</strong> ${data.created_at}</p>
                        <p><strong>{{ __('transactions.type') }}:</strong> ${data.type}</p>
                        <p><strong>{{ __('transactions.status') }}:</strong> <span class="badge bg-${data.status == 'pending' ? 'warning' : (data.status == 'confirmed' ? 'info' : (data.status == 'shipped' ? 'primary' : (data.status == 'delivered' ? 'success' : 'danger')))}">${data.status}</span></p>
                    </div>
                    <div class="col-md-6">
                        <h6>{{ __('transactions.product_details') }}</h6>
                        <p><strong>{{ __('transactions.product') }}:</strong> ${data.product_name}</p>
                        <p><strong>{{ __('transactions.quantity') }}:</strong> ${data.quantity} ${data.unit}</p>
                        <p><strong>{{ __('transactions.unit_price') }}:</strong> ${data.unit_price}€/${data.unit}</p>
                        <p><strong>{{ __('transactions.total') }}:</strong> ${data.amount}€</p>
                    </div>
                </div>
            `;
                    new bootstrap.Modal(document.getElementById('transactionModal')).show();
                });
        }

        function rateTransaction(transactionId) {
            document.getElementById('ratingForm').dataset.transactionId = transactionId;
            new bootstrap.Modal(document.getElementById('ratingModal')).show();
        }

        function continueTransaction(id) {
            fetch(`/transactions/${id}/continue`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('{{ __('transactions.continue_error') }}');
                    }
                });
        }

        function cancelTransaction(id) {
            if (confirm('{{ __('transactions.cancel_confirm') }}')) {
                fetch(`/transactions/${id}/cancel`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('{{ __('transactions.cancel_error') }}');
                        }
                    });
            }
        }

        function downloadInvoice(id) {
            window.open(`/transactions/${id}/invoice`, '_blank');
        }

        function exportTransactions() {
            window.open('/transactions/export', '_blank');
        }

        function submitRating() {
            const form = document.getElementById('ratingForm');
            const transactionId = form.dataset.transactionId;
            const rating = document.getElementById('rating').value;
            const comment = document.getElementById('comment').value;

            if (rating == 0) {
                alert('{{ __('transactions.rating_required') }}');
                return;
            }

            fetch(`/transactions/${transactionId}/rate`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ rating, comment })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        bootstrap.Modal.getInstance(document.getElementById('ratingModal')).hide();
                        alert('{{ __('transactions.rating_success') }}');
                        location.reload();
                    } else {
                        alert('{{ __('transactions.rating_error') }}');
                    }
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.rating-star');
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.dataset.rating;
                    document.getElementById('rating').value = rating;
                    stars.forEach((s, index) => {
                        if (index < rating) {
                            s.classList.add('text-warning');
                            s.classList.remove('text-muted');
                        } else {
                            s.classList.add('text-muted');
                            s.classList.remove('text-warning');
                        }
                    });
                });
            });
        });
    </script>
@endsection
