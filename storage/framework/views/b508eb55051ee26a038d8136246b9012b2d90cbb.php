<?php $__env->startSection('title', __('Création de demande')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-4 py-6">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-2 text-primary-green"><?php echo e(__('Création de demande')); ?></h1>
                        <p class="text-muted"><?php echo e(__('Crée votre propre demande')); ?></p>
                    </div>
                    <a href="<?php echo e(route('requests.index')); ?>" class="btn btn-outline-primary-green">
                        <i class="fas fa-arrow-left me-2"></i><?php echo e(__('retour')); ?>

                    </a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('requests.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label"><?php echo e(__('titre')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="title" name="title" value="<?php echo e(old('title')); ?>" required>
                                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category" class="form-label"><?php echo e(__('categorie')); ?> <span class="text-danger">*</span></label>
                                        <select class="form-select <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="category" name="category" required>
                                            <option value=""><?php echo e(__('Sélectionner une catégorie')); ?></option>
                                            <option value="fruits" <?php echo e(old('category') == 'fruits' ? 'selected' : ''); ?>><?php echo e(__('fruits')); ?></option>
                                            <option value="legumes" <?php echo e(old('category') == 'legumes' ? 'selected' : ''); ?>><?php echo e(__('légumes')); ?></option>
                                            <option value="cereales" <?php echo e(old('category') == 'cereales' ? 'selected' : ''); ?>><?php echo e(__('céréale')); ?></option>
                                            <option value="produits-laitiers" <?php echo e(old('category') == 'produits-laitiers' ? 'selected' : ''); ?>><?php echo e(__('produits-laitiers')); ?></option>
                                            <option value="viandes" <?php echo e(old('category') == 'viandes' ? 'selected' : ''); ?>><?php echo e(__('viande')); ?></option>
                                            <option value="autres" <?php echo e(old('category') == 'autres' ? 'selected' : ''); ?>><?php echo e(__('autre')); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label"><?php echo e(__('description')); ?> <span class="text-danger">*</span></label>
                                <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          id="description" name="description" rows="4" required><?php echo e(old('description')); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="budget" class="form-label"><?php echo e(__('Budget maximum')); ?> <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control <?php $__errorArgs = ['budget'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="budget" name="budget" value="<?php echo e(old('budget')); ?>" step="0.01" min="0" required>
                                            <span class="input-group-text">DH</span>
                                        </div>
                                        <?php $__errorArgs = ['budget'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label"><?php echo e(__('Quantité')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="quantity" name="quantity" value="<?php echo e(old('quantity')); ?>" min="1" required>
                                        <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="unit" class="form-label"><?php echo e(__('Unité')); ?> <span class="text-danger">*</span></label>
                                        <select class="form-select <?php $__errorArgs = ['unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="unit" name="unit" required>
                                            <option value=""><?php echo e(__('Selectionner unité')); ?></option>
                                            <option value="kg" <?php echo e(old('unit') == 'kg' ? 'selected' : ''); ?>><?php echo e(__('kg')); ?></option>
                                            <option value="g" <?php echo e(old('unit') == 'g' ? 'selected' : ''); ?>><?php echo e(__('g')); ?></option>
                                            <option value="l" <?php echo e(old('unit') == 'l' ? 'selected' : ''); ?>><?php echo e(__('l')); ?></option>
                                            <option value="piece" <?php echo e(old('unit') == 'piece' ? 'selected' : ''); ?>><?php echo e(__('piece')); ?></option>
                                            <option value="botte" <?php echo e(old('unit') == 'botte' ? 'selected' : ''); ?>><?php echo e(__('botte')); ?></option>
                                            <option value="panier" <?php echo e(old('unit') == 'panier' ? 'selected' : ''); ?>><?php echo e(__('panier')); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="location" class="form-label"><?php echo e(__('destination')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="location" name="location" value="<?php echo e(old('location')); ?>" required>
                                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="urgency" class="form-label"><?php echo e(__('Priorité')); ?> <span class="text-danger">*</span></label>
                                        <select class="form-select <?php $__errorArgs = ['urgency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="urgency" name="urgency" required>
                                            <option value=""><?php echo e(__('Sélectionner urgence de votre demande')); ?></option>
                                            <option value="low" <?php echo e(old('urgency') == 'low' ? 'selected' : ''); ?>><?php echo e(__('pas urgente')); ?></option>
                                            <option value="medium" <?php echo e(old('urgency') == 'medium' ? 'selected' : ''); ?>><?php echo e(__('moins urgente')); ?></option>
                                            <option value="high" <?php echo e(old('urgency') == 'high' ? 'selected' : ''); ?>><?php echo e(__('urgente')); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['urgency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="needed_by" class="form-label"><?php echo e(__('Besion en')); ?> <span class="text-danger">*</span></label>
                                <input type="date" class="form-control <?php $__errorArgs = ['needed_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="needed_by" name="needed_by" value="<?php echo e(old('needed_by')); ?>" required>
                                <?php $__errorArgs = ['needed_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary-green">
                                    <i class="fas fa-check me-2"></i><?php echo e(__('Publier demande')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user_space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/user_space/requests/create.blade.php ENDPATH**/ ?>