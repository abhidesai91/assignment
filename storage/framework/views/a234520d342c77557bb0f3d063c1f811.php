<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Contact List'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php if(session('success')): ?>
        <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-4">
            <?php echo e(session('success')); ?>

        </div>
        <script>
            setTimeout(function() {
                let message = document.getElementById("success-message");
                if (message) {
                    message.style.display = "none";
                }
            }, 3000);
        </script>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\assignment\resources\views/layouts/app.blade.php ENDPATH**/ ?>