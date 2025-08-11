<div class="position-relative">
    <img src="<?php echo e($offer->image ?? '/placeholder.svg?height=200&width=300&text=Offre'); ?>"
         class="card-img-top" alt="<?php echo e($offer->title ?? 'Offre'); ?>" style="height: 200px; object-fit: cover;">
    <div class="position-absolute top-0 end-0 m-2">
        <span class="badge bg-secondary-green"><?php echo e($offer->status ?? 'Disponible'); ?></span>
    </div>
    <div class="position-absolute bottom-0 start-0 m-2">
        <span class="badge bg-primary-green"><?php echo e($offer->category ?? 'Non spécifié'); ?></span>
    </div>
</div>
<div class="card-body d-flex flex-column">
    <h5 class="card-title"><?php echo e($offer->title ?? 'Offre sans titre'); ?></h5>
    <p class="text-muted small mb-2">
        <i class="fas fa-map-marker-alt me-1"></i>
        <?php echo e($offer->cooperative->name ?? 'Coopérative inconnue'); ?> - <?php echo e($offer->location ?? 'Non spécifié'); ?>

    </p>
    <p class="card-text flex-grow-1"><?php echo e(Str::limit($offer->description ?? 'Aucune description disponible.', 100)); ?></p>
    <div class="row align-items-center mt-auto">
        <div class="col-6">
            <div class="d-flex align-items-center">
                <span class="h5 mb-0 text-primary-green"><?php echo e(number_format($offer->price ?? 0, 2)); ?> DH</span>
                <small class="text-muted ms-1">/<?php echo e($offer->unit ?? 'N/A'); ?></small>
            </div>
            <small class="text-muted">Quantité: <?php echo e($offer->quantity ?? 'N/A'); ?> <?php echo e($offer->unit ?? 'N/A'); ?></small>
        </div>
        <div class="col-6 text-end">
            <div class="btn-group" role="group">
                <a href="<?php echo e(route('offers.detail', $offer->id)); ?>" class="btn btn-outline-primary-green btn-sm">
                    <i class="fas fa-eye"></i>
                </a>
                <button class="btn btn-outline-danger btn-sm" onclick="addToWishlist(<?php echo e($offer->id); ?>)">
                    <i class="fas fa-heart"></i>
                </button>
                <?php if(auth()->check() && $offer->user_id === auth()->id()): ?>
                    <a href="<?php echo e(route('offers.edit', $offer->id)); ?>" class="btn btn-primary-yellow btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="<?php echo e(route('offers.destroy', $offer->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                <?php endif; ?>
                <?php if(auth()->check() && $offer->user_id !== auth()->id()): ?>
                    <a href="<?php echo e(route('transactions.create', $offer->id)); ?>" class="btn btn-primary-green btn-sm">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">
                <i class="fas fa-clock me-1"></i>
                Publié le <?php echo e($offer->created_at->format('d/m/Y')); ?>

            </small>
            <div class="rating">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <i class="fas fa-star <?php echo e($i <= ($offer->rating ?? 0) ? 'text-warning' : 'text-muted'); ?>"></i>
                <?php endfor; ?>
                <small class="text-muted ms-1">(<?php echo e($offer->reviews_count ?? 0); ?>)</small>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/components/offer-card.blade.php ENDPATH**/ ?>