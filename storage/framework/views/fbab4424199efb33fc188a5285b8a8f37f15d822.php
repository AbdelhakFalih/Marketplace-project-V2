<?php $__env->startSection('title', 'Inscription'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center py-5">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-cooperative-500 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-handshake text-white text-2xl"></i>
                        </div>
                        <h2 class="h4 text-gray-900 mb-2">Créer un compte</h2>
                        <p class="text-muted">Rejoignez notre communauté coopérative</p>
                    </div>

                    <!-- Registration Form -->
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Account Type -->
                        <div class="mb-4">
                            <label class="form-label">Type de compte</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-2 border-primary account-type-card" onclick="selectAccountType('individual')">
                                        <div class="card-body text-center py-3">
                                            <i class="fas fa-user fa-2x text-primary mb-2"></i>
                                            <h6 class="card-title mb-1">Particulier</h6>
                                            <p class="card-text small text-muted">Acheteur/Vendeur individuel</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-2 account-type-card" onclick="selectAccountType('cooperative')">
                                        <div class="card-body text-center py-3">
                                            <i class="fas fa-handshake fa-2x text-cooperative-500 mb-2"></i>
                                            <h6 class="card-title mb-1">Coopérative</h6>
                                            <p class="card-text small text-muted">Organisation coopérative</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="account_type" id="account_type" value="individual">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Prénom</label>
                                <input type="text"
                                       class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="first_name"
                                       name="first_name"
                                       value="<?php echo e(old('first_name')); ?>"
                                       required
                                       autocomplete="given-name"
                                       placeholder="Votre prénom">
                                <?php $__errorArgs = ['first_name'];
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
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Nom</label>
                                <input type="text"
                                       class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="last_name"
                                       name="last_name"
                                       value="<?php echo e(old('last_name')); ?>"
                                       required
                                       autocomplete="family-name"
                                       placeholder="Votre nom">
                                <?php $__errorArgs = ['last_name'];
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

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email"
                                       class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="email"
                                       name="email"
                                       value="<?php echo e(old('email')); ?>"
                                       required
                                       autocomplete="email"
                                       placeholder="votre@email.com">
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-phone text-muted"></i>
                                </span>
                                <input type="tel"
                                       class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="phone"
                                       name="phone"
                                       value="<?php echo e(old('phone')); ?>"
                                       required
                                       placeholder="+212 123 456 789">
                            </div>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="city" class="form-label">Ville</label>
                                <input type="text"
                                       class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="city"
                                       name="city"
                                       value="<?php echo e(old('city')); ?>"
                                       required
                                       placeholder="Votre ville">
                                <?php $__errorArgs = ['city'];
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
                            <div class="col-md-6">
                                <label for="region" class="form-label">Région</label>
                                <select class="form-select <?php $__errorArgs = ['region'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="region" name="region" required>
                                    <option value="">Choisir une région</option>
                                    <option value="casablanca-settat">Casablanca-Settat</option>
                                    <option value="rabat-sale-kenitra">Rabat-Salé-Kénitra</option>
                                    <option value="marrakech-safi">Marrakech-Safi</option>
                                    <option value="fes-meknes">Fès-Meknès</option>
                                    <option value="tanger-tetouan-al-hoceima">Tanger-Tétouan-Al Hoceïma</option>
                                </select>
                                <?php $__errorArgs = ['region'];
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

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password"
                                       class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="password"
                                       name="password"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Choisir un mot de passe">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password"
                                       class="form-control"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Confirmer le mot de passe">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       type="checkbox"
                                       name="terms"
                                       id="terms"
                                       required>
                                <label class="form-check-label" for="terms">
                                    J'accepte les <a href="/terms" target="_blank">conditions d'utilisation</a>
                                    et la <a href="/privacy" target="_blank">politique de confidentialité</a>
                                </label>
                                <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Je souhaite recevoir la newsletter et les offres spéciales
                                </label>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-user-plus me-2"></i>Créer mon compte
                            </button>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <div class="text-center">
                        <p class="text-muted">
                            Déjà un compte ?
                            <a href="<?php echo e(route('login')); ?>" class="text-decoration-none fw-bold">
                                Se connecter
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = field.nextElementSibling;
    const icon = button.querySelector('i');

    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function selectAccountType(type) {
    // Remove active class from all cards
    document.querySelectorAll('.account-type-card').forEach(card => {
        card.classList.remove('border-primary', 'border-cooperative-500');
        card.classList.add('border-gray-200');
    });

    // Add active class to selected card
    const selectedCard = event.currentTarget;
    if (type === 'individual') {
        selectedCard.classList.add('border-primary');
        selectedCard.classList.remove('border-gray-200');
    } else {
        selectedCard.classList.add('border-cooperative-500');
        selectedCard.classList.remove('border-gray-200');
    }

    // Update hidden input
    document.getElementById('account_type').value = type;
}

// Initialize first card as selected
document.addEventListener('DOMContentLoaded', function() {
    selectAccountType('individual');
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/auth/register.blade.php ENDPATH**/ ?>