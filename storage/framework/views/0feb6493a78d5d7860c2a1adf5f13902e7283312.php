<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin - <?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
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
                        user: { 50: '#f8fafc', 500: '#6366f1', 600: '#4f46e5', 700: '#4338ca' }
                    }
                }
            }
        }
    </script>
    <style>
        [data-theme="dark"] {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        .bg-primary-green { background-color: #28a745; }
        .bg-secondary-green { background-color: #17a2b8; }
        .bg-primary-green-light { background-color: #48c78e; }
        .bg-primary-green-dark { background-color: #1e7e34; }
        .bg-user-50 { background-color: #f8f9fa; }
        .text-user-600 { color: #343a40; }
        .bg-user-500 { background-color: #6c757d; }
        .btn-primary-green { background-color: #28a745; border-color: #28a745; color: #fff; }
        .btn-primary-green:hover { background-color: #218838; border-color: #1e7e34; }
        .btn-outline-primary-green { border-color: #28a745; color: #28a745; }
        .btn-outline-primary-green:hover { background-color: #28a745; color: #fff; }
        .btn-primary-yellow { background-color: #ffc107; border-color: #ffc107; color: #000; }
        .btn-primary-yellow:hover { background-color: #e0a800; border-color: #d39e00; }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
<div class="flex h-screen">
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="flex-1 ml-64">
        <?php echo $__env->make('components.admin-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/translations.js')); ?>"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/layouts/admin.blade.php ENDPATH**/ ?>