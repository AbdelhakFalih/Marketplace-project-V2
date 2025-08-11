
<?php if(isset($breadcrumbs) && count($breadcrumbs) > 0): ?>
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/" class="text-decoration-none">
                    <i class="fas fa-home me-1"></i>
                    <span data-translate="nav.home">Accueil</span>
                </a>
            </li>
            
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->last): ?>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e($breadcrumb['name']); ?>

                    </li>
                <?php else: ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e($breadcrumb['url']); ?>" class="text-decoration-none">
                            <?php echo e($breadcrumb['name']); ?>

                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </div>
</nav>
<?php endif; ?>


<?php if(!isset($breadcrumbs)): ?>
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/" class="text-decoration-none">
                    <i class="fas fa-home me-1"></i>
                    <span data-translate="nav.home">Accueil</span>
                </a>
            </li>
            
            <?php
                $segments = request()->segments();
                $url = '';
            ?>
            
            <?php $__currentLoopData = $segments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $url .= '/' . $segment;
                    $name = ucfirst(str_replace('-', ' ', $segment));
                    
                    // Traductions personnalisées
                    $translations = [
                        'user' => 'Mon Espace',
                        'admin' => 'Administration',
                        'dashboard' => 'Tableau de bord',
                        'profile' => 'Profil',
                        'orders' => 'Commandes',
                        'products' => 'Produits',
                        'cooperatives' => 'Coopératives',
                        'categories' => 'Catégories',
                        'settings' => 'Paramètres',
                        'users' => 'Utilisateurs',
                        'create' => 'Créer',
                        'edit' => 'Modifier'
                    ];
                    
                    if(isset($translations[$segment])) {
                        $name = $translations[$segment];
                    }
                ?>
                
                <?php if($loop->last): ?>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e($name); ?>

                    </li>
                <?php else: ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e($url); ?>" class="text-decoration-none">
                            <?php echo e($name); ?>

                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </div>
</nav>
<?php endif; ?>
<?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>