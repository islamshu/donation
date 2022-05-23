
<?php $__env->startSection('content'); ?>
<div class="gallery">

    <?php $__currentLoopData = json_decode($gal->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
    
    <div class="jg_row sectiontableentry1" style="text-align: center">
        <div class="jg_element_cat">
            <div class="jg_imgalign_catimgs">
                <img src="<?php echo e(asset('uploads/'.$item)); ?>" class="jg_photo" width="200" height="100" alt="15.11.2013">
            </div>
          </div>
      
      <div class="jg_clearboth"></div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
   

    <div class="jg_back">
      <a href="/gallery">
        Back to Gallery Overview</a>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fronts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/front/gallery_single.blade.php ENDPATH**/ ?>