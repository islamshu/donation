
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                   
                    
                    <i class="fas fa-home"></i> <?php echo app('translator')->get('Home'); ?></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-red">
           
                <div class="text m-t-10 m-b-10" style="font-size: 20px"><?php echo e(__('Donation amount')); ?></div>
                <h2 class="m-b-0"><?php echo e(App\Donation::sum('donation')); ?>

                </h2>
            </div>
        </div>
      
    </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/index.blade.php ENDPATH**/ ?>