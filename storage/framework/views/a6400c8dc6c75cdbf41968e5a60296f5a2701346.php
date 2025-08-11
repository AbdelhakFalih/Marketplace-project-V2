<?php $__env->startSection('title', __('nav.offers')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-4 py-6">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2 text-primary-green"><?php echo e(__('Les offres récentes')); ?></h1>
                <p class="text-muted"><?php echo e(__('Découvrir de nouveaux offres')); ?></p>
            </div>
            <div class="btn-group">
                <a href="<?php echo e(route('offers.create')); ?>" class="btn btn-primary-green">
                    <i class="fas fa-plus me-2"></i><?php echo e(__('Crée une nouvelle offre')); ?>

                </a>
                <a href="<?php echo e(route('offers.myoffers')); ?>" class="btn btn-outline-primary-green">
                    <i class="fas fa-user me-2"></i><?php echo e(__('Mes Offres')); ?>

                </a>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary-green text-white">
                    <div class="card-body">
                        <h4 class="mb-0"><?php echo e($totalOffers); ?></h4>
                        <p class="mb-0"><?php echo e(__('Total des offres')); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary-green text-white">
                    <div class="card-body">
                        <h4 class="mb-0"><?php echo e($newToday); ?></h4>
                        <p class="mb-0"><?php echo e(__("Nouveaux offres d'/aujourd'/hui")); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('offers.index')); ?>" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="<?php echo e(__('Entrer un mot de passe')); ?>"
                               value="<?php echo e(request('search')); ?>">
                    </div>
                    <div class="col-md-2">
                        <select name="category" class="form-select">
                            <option value=""><?php echo e(__('Catégories')); ?></option>
                            <!-- Ajouter les catégories dynamiquement -->
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="max_price" class="form-control" placeholder="<?php echo e(__('Prix max')); ?>"
                               value="<?php echo e(request('max_price')); ?>">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="location" class="form-control" placeholder="<?php echo e(__('localisation')); ?>"
                               value="<?php echo e(request('location')); ?>">
                    </div>
                    <div class="col-md-2">
                        <select name="sort" class="form-select">
                            <option value=""><?php echo e(__('Trier par')); ?></option>
                            <option value="price_asc" <?php echo e(request('sort') == 'price_asc' ? 'selected' : ''); ?>><?php echo e(__('Plus petit au plus grand')); ?></option>
                            <option value="price_desc" <?php echo e(request('sort') == 'price_desc' ? 'selected' : ''); ?>><?php echo e(__('Plus grand au plus petit')); ?></option>
                            <option value="quantity" <?php echo e(request('sort') == 'quantity' ? 'selected' : ''); ?>><?php echo e(__('Quantité')); ?></option>
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
            <?php $__empty_1 = true; $__currentLoopData = $offers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm hover-shadow transition-all">
                        <?php echo $__env->make('components/offer-card', ['offer' => $offer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4 data-translate="common.no_results">Aucune offre trouvée</h4>
                        <p class="text-muted">Essayez de modifier vos critères de recherche</p>
                        <a href="<?php echo e(route('offers.create')); ?>" class="btn btn-primary-green">
                            <span data-translate="offers.create">Publier la première offre</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if(isset($offers) && method_exists($offers, 'links')): ?>
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($offers->links()); ?>

            </div>
        <?php endif; ?>
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
                        alert(data.error || '<?php echo e(__('wishlist.error')); ?>');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('<?php echo e(__('wishlist.error')); ?>');
                });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user_space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/user_space/offers/index.blade.php ENDPATH**/ ?>