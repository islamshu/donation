
<?php $__env->startSection('content'); ?>
<h2>
    <?php echo app('translator')->get('Contact us'); ?> </h2>







<div class="articleContent">

    <p>&nbsp;</p>
    <p><strong><?php echo app('translator')->get('Adress'); ?></strong> :<strong><?php echo e(App\General::first()->Address); ?>&nbsp;</strong></p>
    <p><strong><?php echo app('translator')->get('Phones'); ?></strong></p>
    <p><?php echo e(App\General::first()->phone); ?></p>
    <p><strong><?php echo app('translator')->get('E-mail'); ?></strong></p>
    <p><?php echo e(App\General::first()->email); ?></p>


</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fronts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/front/contact.blade.php ENDPATH**/ ?>