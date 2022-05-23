
<?php $__env->startSection('content'); ?>
<div class="blog">
    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
    <div class="items-row cols-1 row-0">
        <div class="item column-1">


            <h2>
               <?php echo e($item->title); ?> </h2>





            <dl class="article-info">
                <dt class="article-info-term">Details</dt>
                <dd class="create">
                   <?php echo e($item->created_at); ?></dd>

            </dl>
            <?php echo Str::limit($item->body , 50, ' ...'); ?>

            <p class="readmore">
				<a href="<?php echo e(route('single_new',$item->id)); ?>">
					<?php echo e(__('Read more')); ?>:  <?php echo e($item->title); ?>  </a>
		</p>
         


            <div class="item-separator"></div>



        </div>
        <span class="row-separator"></span>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






    <div class="cat-children">
        <h3>
            Subcategories</h3>

        <ul>
        </ul>
    </div>
    <div class="pagination">
    <?php echo e($news->links()); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fronts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/front/news.blade.php ENDPATH**/ ?>