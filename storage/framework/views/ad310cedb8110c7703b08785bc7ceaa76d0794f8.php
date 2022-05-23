
<?php $__env->startSection('content'); ?>
<h2><?php echo e(__('About us')); ?> </h2>

<div class="articleContent">
    <?php echo $about->body; ?>

</div>


<?php $__env->stopSection(); ?>







   
<?php echo $__env->make('layouts.fronts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/front/about.blade.php ENDPATH**/ ?>