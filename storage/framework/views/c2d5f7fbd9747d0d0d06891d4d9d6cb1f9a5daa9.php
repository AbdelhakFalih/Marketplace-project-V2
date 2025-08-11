<?php $__env->startSection('title', __('transactions.history')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-4 py-6">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-primary-green"><?php echo e(__('transactions.history')); ?></h1>
                <p class="text-muted"><?php echo e(__('transactions.history_subtitle')); ?></p>
            </div>
            <div class="btn-group">
                <a href="<?php echo e(route('transactions.index')); ?>" class="btn btn-outline-primary-green">
                    <i class="fas fa-arrow-left me-2"></i><?php echo e(__('transactions.my_transactions')); ?>

                </a>
                <button class="btn btn-outline-primary-green" onclick="exportTransactions()">
                    <i class="fas fa-download me-2"></i><?php echo e(__('transactions.export')); ?>

                </button>
                <button class="btn btn-outline-primary-green" onclick="printHistory()">
                    <i class="fas fa-print me-2"></i><?php echo e(__('transactions.print')); ?>

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
                                <h4 class="mb-0"><?php echo e($stats['totalTransactions'] ?? 0); ?></h4>
                                <p class="mb-0"><?php echo e(__('transactions.total_transactions')); ?></p>
                            </div>
                            <i class="fas fa-exchange-alt fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary-green text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0"><?php echo e(number_format($stats['totalAmount'] ?? 0, 2)); ?>€</h4>
                                <p class="mb-0"><?php echo e(__('transactions.total_amount')); ?></p>
                            </div>
                            <i class="fas fa-euro-sign fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary-green-light text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0"><?php echo e(number_format($stats['avgTransaction'] ?? 0, 2)); ?>€</h4>
                                <p class="mb-0"><?php echo e(__('transactions.avg_transaction')); ?></p>
                            </div>
                            <i class="fas fa-chart-line fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary-green-dark text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0"><?php echo e($stats['thisMonth'] ?? 0); ?></h4>
                                <p class="mb-0"><?php echo e(__('transactions.this_month')); ?></p>
                            </div>
                            <i class="fas fa-calendar fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphique -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <canvas id="transactionChart"></canvas>
            </div>
        </div>

        <!-- Filtres -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('transactions.history')); ?>" class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label"><?php echo e(__('transactions.period')); ?></label>
                        <select name="period" class="form-select">
                            <option value=""><?php echo e(__('transactions.all')); ?></option>
                            <option value="30" <?php echo e(request('period') == '30' ? 'selected' : ''); ?>><?php echo e(__('transactions.last_30_days')); ?></option>
                            <option value="90" <?php echo e(request('period') == '90' ? 'selected' : ''); ?>><?php echo e(__('transactions.last_90_days')); ?></option>
                            <option value="365" <?php echo e(request('period') == '365' ? 'selected' : ''); ?>><?php echo e(__('transactions.last_year')); ?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label"><?php echo e(__('transactions.type')); ?></label>
                        <select name="type" class="form-select">
                            <option value=""><?php echo e(__('transactions.all')); ?></option>
                            <option value="purchase" <?php echo e(request('type') == 'purchase' ? 'selected' : ''); ?>><?php echo e(__('transactions.purchase')); ?></option>
                            <option value="sale" <?php echo e(request('type') == 'sale' ? 'selected' : ''); ?>><?php echo e(__('transactions.sale')); ?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label"><?php echo e(__('transactions.status')); ?></label>
                        <select name="status" class="form-select">
                            <option value=""><?php echo e(__('transactions.all')); ?></option>
                            <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>><?php echo e(__('transactions.pending')); ?></option>
                            <option value="confirmed" <?php echo e(request('status') == 'confirmed' ? 'selected' : ''); ?>><?php echo e(__('transactions.confirmed')); ?></option>
                            <option value="shipped" <?php echo e(request('status') == 'shipped' ? 'selected' : ''); ?>><?php echo e(__('transactions.shipped')); ?></option>
                            <option value="delivered" <?php echo e(request('status') == 'delivered' ? 'selected' : ''); ?>><?php echo e(__('transactions.delivered')); ?></option>
                            <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>><?php echo e(__('transactions.cancelled')); ?></option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label"><?php echo e(__('transactions.search')); ?></label>
                        <input type="text" name="search" class="form-control"
                               placeholder="<?php echo e(__('transactions.search_placeholder')); ?>"
                               value="<?php echo e(request('search')); ?>">
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="submit" class="btn btn-outline-primary-green w-100">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Liste des transactions -->
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($transaction && $transaction->offer && $transaction->buyer && $transaction->seller): ?>
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title mb-1"><?php echo e($transaction->offer->title ?? 'Offre inconnue'); ?></h5>
                                        <p class="text-muted mb-1">
                                            <i class="fas fa-hashtag me-1"></i>TXN-2024-<?php echo e(str_pad($transaction->id, 3, '0', STR_PAD_LEFT)); ?>

                                        </p>
                                        <p class="text-muted mb-0">
                                            <i class="fas fa-user me-1"></i>
                                            <?php echo e($transaction->buyer_id === auth()->id() ? ($transaction->seller->name ?? 'Vendeur inconnu') : ($transaction->buyer->name ?? 'Acheteur inconnu')); ?>

                                        </p>
                                    </div>
                                    <div class="text-end">
                                        <p class="h5 mb-1 <?php echo e($transaction->buyer_id === auth()->id() ? 'text-danger' : 'text-success'); ?>">
                                            <?php echo e($transaction->buyer_id === auth()->id() ? '-' : '+'); ?><?php echo e($transaction->amount ?? '0.00'); ?>€
                                        </p>
                                        <span class="badge bg-<?php echo e($transaction->status == 'pending' ? 'warning' : ($transaction->status == 'confirmed' ? 'info' : ($transaction->status == 'shipped' ? 'primary' : ($transaction->status == 'delivered' ? 'success' : 'danger')))); ?>">
                                    <?php echo e(__('transactions.' . ($transaction->status ?? 'unknown'))); ?>

                                </span>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-0">
                                            <i class="fas fa-calendar me-1"></i><?php echo e($transaction->created_at ? $transaction->created_at->format('d/m/Y') : 'Date inconnue'); ?>

                                        </p>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-primary-green btn-sm" onclick="viewTransaction(<?php echo e($transaction->id); ?>)">
                                            <i class="fas fa-eye me-1"></i><?php echo e(__('transactions.view')); ?>

                                        </button>
                                        <?php if($transaction->status == 'pending' && $transaction->buyer_id === auth()->id()): ?>
                                            <button class="btn btn-outline-primary-green btn-sm" onclick="continueTransaction(<?php echo e($transaction->id); ?>)">
                                                <i class="fas fa-play me-1"></i><?php echo e(__('transactions.continue')); ?>

                                            </button>
                                            <button class="btn btn-outline-danger btn-sm" onclick="cancelTransaction(<?php echo e($transaction->id); ?>)">
                                                <i class="fas fa-times me-1"></i><?php echo e(__('transactions.cancel')); ?>

                                            </button>
                                        <?php endif; ?>
                                        <?php if($transaction->status == 'delivered'): ?>
                                            <button class="btn btn-outline-primary-green btn-sm" onclick="rateTransaction(<?php echo e($transaction->id); ?>)">
                                                <i class="fas fa-star me-1"></i><?php echo e(__('transactions.rate')); ?>

                                            </button>
                                        <?php endif; ?>
                                        <button class="btn btn-outline-primary-green btn-sm" onclick="downloadInvoice(<?php echo e($transaction->id); ?>)">
                                            <i class="fas fa-file-pdf me-1"></i><?php echo e(__('transactions.invoice')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="text-danger"><?php echo e(__('transactions.invalid_transaction')); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>
                        <h4><?php echo e(__('transactions.no_results')); ?></h4>
                        <p class="text-muted"><?php echo e(__('transactions.no_results_message')); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if($transactions->hasPages()): ?>
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($transactions->appends(request()->query())->links()); ?>

            </div>
        <?php endif; ?>

        <!-- Modal de détails -->
        <div class="modal fade" id="transactionModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('transactions.details')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="transactionDetails">
                        <!-- Contenu chargé dynamiquement -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('common.close')); ?></button>
                        <button type="button" class="btn btn-primary-green" onclick="downloadInvoice(document.getElementById('transactionModal').dataset.transactionId)">
                            <i class="fas fa-download me-2"></i><?php echo e(__('transactions.invoice')); ?>

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
                        <h5 class="modal-title"><?php echo e(__('transactions.rate_transaction')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="ratingForm">
                            <div class="mb-3">
                                <label class="form-label"><?php echo e(__('transactions.rating')); ?></label>
                                <div class="rating-input">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star rating-star text-muted" data-rating="<?php echo e($i); ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <input type="hidden" id="rating" name="rating" value="0">
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label"><?php echo e(__('transactions.comment')); ?></label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"
                                          placeholder="<?php echo e(__('transactions.comment_placeholder')); ?>"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('common.cancel')); ?></button>
                        <button type="button" class="btn btn-primary-green" onclick="submitRating()"><?php echo e(__('transactions.submit')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Graphique des transactions
        const ctx = document.getElementById('transactionChart').getContext('2d');
        const transactionChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($chartData['labels'], 15, 512) ?>,
                datasets: [{
                    label: '<?php echo e(__('transactions.purchase')); ?>',
                    data: <?php echo json_encode($chartData['purchases'], 15, 512) ?>,
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    tension: 0.4
                }, {
                    label: '<?php echo e(__('transactions.sale')); ?>',
                    data: <?php echo json_encode($chartData['sales'], 15, 512) ?>,
                    borderColor: '#17a2b8',
                    backgroundColor: 'rgba(23, 162, 184, 0.2)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '€';
                            }
                        }
                    }
                }
            }
        });

        function viewTransaction(id) {
            fetch(`/transactions/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (!data || !data.created_at) {
                        alert('<?php echo e(__('transactions.invalid_transaction')); ?>');
                        return;
                    }
                    document.getElementById('transactionModal').dataset.transactionId = id;
                    document.getElementById('transactionDetails').innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <h6><?php echo e(__('transactions.general_info')); ?></h6>
                        <p><strong><?php echo e(__('transactions.reference')); ?>:</strong> #TXN-2024-${id.toString().padStart(3, '0')}</p>
                        <p><strong><?php echo e(__('transactions.date')); ?>:</strong> ${data.created_at}</p>
                        <p><strong><?php echo e(__('transactions.type')); ?>:</strong> ${data.type || 'N/A'}</p>
                        <p><strong><?php echo e(__('transactions.status')); ?>:</strong> <span class="badge bg-${data.status == 'pending' ? 'warning' : (data.status == 'confirmed' ? 'info' : (data.status == 'shipped' ? 'primary' : (data.status == 'delivered' ? 'success' : 'danger')))}">${data.status || 'unknown'}</span></p>
                    </div>
                    <div class="col-md-6">
                        <h6><?php echo e(__('transactions.product_details')); ?></h6>
                        <p><strong><?php echo e(__('transactions.product')); ?>:</strong> ${data.product_name || 'N/A'}</p>
                        <p><strong><?php echo e(__('transactions.quantity')); ?>:</strong> ${data.quantity || 'N/A'} ${data.unit || 'N/A'}</p>
                        <p><strong><?php echo e(__('transactions.unit_price')); ?>:</strong> ${data.unit_price || 'N/A'}€/${data.unit || 'N/A'}</p>
                        <p><strong><?php echo e(__('transactions.total')); ?>:</strong> ${data.amount || 'N/A'}€</p>
                    </div>
                </div>
            `;
                    new bootstrap.Modal(document.getElementById('transactionModal')).show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('<?php echo e(__('transactions.error')); ?>');
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
                        alert('<?php echo e(__('transactions.continue_error')); ?>');
                    }
                });
        }

        function cancelTransaction(id) {
            if (confirm('<?php echo e(__('transactions.cancel_confirm')); ?>')) {
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
                            alert('<?php echo e(__('transactions.cancel_error')); ?>');
                        }
                    });
            }
        }

        function downloadInvoice(id) {
            window.open(`/transactions/${id}/invoice`, '_blank');
        }

        function exportTransactions() {
            const params = new URLSearchParams(window.location.search);
            window.open(`/transactions/export?${params.toString()}`, '_blank');
        }

        function printHistory() {
            window.print();
        }

        function submitRating() {
            const form = document.getElementById('ratingForm');
            const transactionId = form.dataset.transactionId;
            const rating = document.getElementById('rating').value;
            const comment = document.getElementById('comment').value;

            if (rating == 0) {
                alert('<?php echo e(__('transactions.rating_required')); ?>');
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
                        alert('<?php echo e(__('transactions.rating_success')); ?>');
                        location.reload();
                    } else {
                        alert('<?php echo e(__('transactions.rating_error')); ?>');
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user_space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/user_space/transactions/History.blade.php ENDPATH**/ ?>