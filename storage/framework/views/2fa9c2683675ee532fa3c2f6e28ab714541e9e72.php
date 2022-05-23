
<?php $__env->startSection('content'); ?>
<h2><?php echo e($new->title); ?> </h2>

<div class="articleContent">
    <?php echo $new->body; ?>

</div>


<?php $__env->stopSection(); ?>







   
<?php echo $__env->make('layouts.fronts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/front/single_new.blade.php ENDPATH**/ ?>