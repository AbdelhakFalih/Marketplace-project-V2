<?php $__env->startSection('title'); ?>
<span data-translate="offers.my_offers">Mes offres</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-6">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-2 text-primary-green" data-translate="offers.my_offers">Mes offres</h1>
            <p class="text-muted">Gérez vos offres publiées</p>
        </div>
        <a href="<?php echo e(route('offers.create')); ?>" class="btn btn-primary-green">
            <i class="fas fa-plus me-2"></i><span data-translate="offers.create">Publier une offre</span>
        </a>
    </div>

    <!-- Statistiques personnelles -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary-green text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($myOffers ?? 12); ?></h4>
                            <p class="mb-0">Offres actives</p>
                        </div>
                        <i class="fas fa-shopping-bag fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary-green text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($totalViews ?? 245); ?></h4>
                            <p class="mb-0">Vues totales</p>
                        </div>
                        <i class="fas fa-eye fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary-green-light text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($totalSales ?? 8); ?></h4>
                            <p class="mb-0">Ventes réalisées</p>
                        </div>
                        <i class="fas fa-handshake fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary-green-dark text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0"><?php echo e($totalRevenue ?? '420'); ?>€</h4>
                            <p class="mb-0">Revenus totaux</p>
                        </div>
                        <i class="fas fa-euro-sign fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Statut</label>
                    <select name="status" class="form-select">
                        <option value="">Tous les statuts</option>
                        <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Actif</option>
                        <option value="inactive" <?php echo e(request('status') == 'inactive' ? 'selected' : ''); ?>>Inactif</option>
                        <option value="sold_out" <?php echo e(request('status') == 'sold_out' ? 'selected' : ''); ?>>Épuisé</option>
                        <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>Brouillon</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Catégorie</label>
                    <select name="category" class="form-select">
                        <option value="">Toutes</option>
                        <option value="fruits" <?php echo e(request('category') == 'fruits' ? 'selected' : ''); ?>>Fruits</option>
                        <option value="legumes" <?php echo e(request('category') == 'legumes' ? 'selected' : ''); ?>>Légumes</option>
                        <option value="cereales" <?php echo e(request('category') == 'cereales' ? 'selected' : ''); ?>>Céréales</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tri par</label>
                    <select name="sort" class="form-select">
                        <option value="created_at" <?php echo e(request('sort') == 'created_at' ? 'selected' : ''); ?>>Plus récent</option>
                        <option value="views" <?php echo e(request('sort') == 'views' ? 'selected' : ''); ?>>Plus vues</option>
                        <option value="sales" <?php echo e(request('sort') == 'sales' ? 'selected' : ''); ?>>Plus vendues</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary-green w-100">
                        <i class="fas fa-filter me-2"></i>Filtrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Liste des offres -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $offers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo e($offer->image ?? '/placeholder.svg?height=120&width=160&text=Produit'); ?>" 
                                 class="img-fluid rounded" style="height: 120px; object-fit: cover; width: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="card-title mb-0"><?php echo e($offer->title ?? 'Tomates bio de saison'); ?></h6>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo e(route('offers.show', $offer->id ?? 1)); ?>">
                                            <i class="fas fa-eye me-2"></i>Voir
                                        </a></li>
                                        <li><a class="dropdown-item" href="<?php echo e(route('offers.edit', $offer->id ?? 1)); ?>">
                                            <i class="fas fa-edit me-2"></i>Modifier
                                        </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#" onclick="confirmDelete(<?php echo e($offer->id ?? 1); ?>)">
                                            <i class="fas fa-trash me-2"></i>Supprimer
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-<?php echo e($offer->status == 'active' ? 'success' : ($offer->status == 'draft' ? 'secondary' : 'warning')); ?> me-2">
                                    <?php echo e($offer->status == 'active' ? 'Actif' : ($offer->status == 'draft' ? 'Brouillon' : 'Inactif')); ?>

                                </span>
                                <span class="badge bg-primary-green"><?php echo e($offer->category ?? 'Légumes'); ?></span>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-6">
                                    <span class="h6 text-primary-green"><?php echo e($offer->price ?? '3.50'); ?>€</span>
                                    <small class="text-muted">/<?php echo e($offer->unit ?? 'kg'); ?></small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Stock: <?php echo e($offer->quantity ?? '50'); ?> <?php echo e($offer->unit ?? 'kg'); ?></small>
                                </div>
                            </div>
                            
                            <div class="row text-muted small">
                                <div class="col-4">
                                    <i class="fas fa-eye me-1"></i><?php echo e($offer->views ?? 23); ?> vues
                                </div>
                                <div class="col-4">
                                    <i class="fas fa-heart me-1"></i><?php echo e($offer->favorites ?? 5); ?> favoris
                                </div>
                                <div class="col-4">
                                    <i class="fas fa-shopping-cart me-1"></i><?php echo e($offer->orders ?? 2); ?> commandes
                                </div>
                            </div>
                            
                            <div class="mt-2 pt-2 border-top">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>
                                    Publié <?php echo e($offer->created_at ?? 'il y a 3 jours'); ?>

                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                <h4>Aucune offre publiée</h4>
                <p class="text-muted">Commencez par publier votre première offre</p>
                <a href="<?php echo e(route('offers.create')); ?>" class="btn btn-primary-green">
                    <i class="fas fa-plus me-2"></i>Publier une offre
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link text-primary-green" href="#">Précédent</a></li>
                <li class="page-item active"><a class="page-link bg-primary-green border-primary-green" href="#">1</a></li>
                <li class="page-item"><a class="page-link text-primary-green" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-primary-green" href="#">3</a></li>
                <li class="page-item"><a class="page-link text-primary-green" href="#">Suivant</a></li>
            </ul>
        </nav>
    </div>
</div>

<script>
function confirmDelete(offerId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')) {
        // Logique de suppression
        fetch(`/offers/${offerId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/user_space/offers/MyOffers.blade.php ENDPATH**/ ?>