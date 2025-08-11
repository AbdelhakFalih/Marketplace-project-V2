<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" data-theme="light" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="<?php echo e(config('app.description', 'Marketplace pour les coopératives')); ?>">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="<?php echo e(asset('js/translations.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <title><?php echo e(config('app.name', 'Marketplace')); ?> - <?php echo $__env->yieldContent('title', 'Accueil'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#f0f9ff', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' },
                        cooperative: { 50: '#f0fdf4', 500: '#22c55e', 600: '#16a34a', 700: '#15803d' }
                    }
                }
            }
        }
    </script>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/translations.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <style>
        [data-theme="dark"] {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        [data-theme="dark"] .bg-white {
            background-color: #2d3748;
        }
        [data-theme="dark"] .text-gray-600 {
            color: #a0aec0;
        }
        [data-theme="dark"] .text-gray-700 {
            color: #cbd5e0;
        }
        [data-theme="dark"] .bg-gray-50 {
            background-color: #4a5568;
        }
        [data-theme="dark"] .card {
            background-color: #2d3748;
            color: #e2e8f0;
        }
        [data-theme="dark"] .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }
        [data-theme="dark"] .btn-outline-primary {
            border-color: #4a90e2;
            color: #4a90e2;
        }
        [data-theme="dark"] .bg-blue-100 {
            background-color: #2b6cb0;
        }
        [data-theme="dark"] .bg-green-100 {
            background-color: #2f855a;
        }
    </style>
    <!--Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<!-- Navbar -->
<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main Content -->
<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>

<!-- Footer -->
<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('js/translations.js')); ?>"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/layouts/app.blade.php ENDPATH**/ ?>