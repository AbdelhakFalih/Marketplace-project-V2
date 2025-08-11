<?php $__env->startSection('title', 'Vérification d\'adresse email'); ?>
<?php $__env->startSection('header', 'Vérification d\'adresse email'); ?>

<?php $__env->startSection('content'); ?>
<h2><?php echo e(__('Bonjour')); ?> <?php echo e($user->name); ?>,</h2>

<p><?php echo e(__('Merci de vous être inscrit sur')); ?> <strong><?php echo e(config('app.name')); ?></strong> !</p>

<p><?php echo e(__('Pour finaliser votre inscription et sécuriser votre compte, veuillez vérifier votre adresse email en cliquant sur le bouton ci-dessous :')); ?></p>

<div class="text-center">
    <a href="<?php echo e($verificationUrl); ?>" class="btn">
        <?php echo e(__('Vérifier mon adresse email')); ?>

    </a>
</div>

<div class="alert alert-info">
    <strong><?php echo e(__('Important :')); ?></strong> <?php echo e(__('Ce lien de vérification expirera dans 24 heures.')); ?>

</div>

<p><?php echo e(__('Si le bouton ne fonctionne pas, vous pouvez copier et coller le lien suivant dans votre navigateur :')); ?></p>
<p style="word-break: break-all; color: #007bff;"><?php echo e($verificationUrl); ?></p>

<hr style="margin: 30px 0; border: none; border-top: 1px solid #e9ecef;">

<p class="text-muted">
    <?php echo e(__('Si vous n\'avez pas créé de compte sur')); ?> <?php echo e(config('app.name')); ?>, <?php echo e(__('vous pouvez ignorer cet email.')); ?>

</p>

<p><?php echo e(__('Cordialement,')); ?><br>
<?php echo e(__('L\'équipe')); ?> <?php echo e(config('app.name')); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/emails/verification.blade.php ENDPATH**/ ?>