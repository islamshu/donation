
<?php $__env->startSection('content'); ?>
    <div class="gallery">

        <?php $__currentLoopData = $gals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="jg_row sectiontableentry2"  style="text-align: center">
                <div class="jg_element_gal">
                    <div class="jg_imgalign_gal">
                        <div class="jg_photo_container">
                            <a href="<?php echo e(route('gallery_single',$item->id)); ?>">
                                <img src="<?php echo e(asset('uploads/'.json_decode($item->images)[0] )); ?>"
                                    class="jg_photo" alt="<?php echo e($item->title); ?> " >
                                  </a>
                                </div>
                              </div>
                              <div class="   jg_element_txt">
                                <ul>
                                    <li>
                                        <a
                                            href="<?php echo e(route('gallery_single',$item->id)); ?>">
                                            <b><?php echo e($item->title); ?> </b>
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="pagination">
            <?php echo e($gals->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fronts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/front/gallery.blade.php ENDPATH**/ ?>