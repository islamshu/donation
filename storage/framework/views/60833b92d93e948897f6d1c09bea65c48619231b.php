<?php if(Session::get('error') != null): ?>
<div class="alert alert-danger" style="text-align: center;">
    <?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
 <ul style="text-align: center">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <li><?php echo e($error); ?></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </ul>
</div>
<?php endif; ?><?php /**PATH D:\prize\resources\views/admin/partials/_error.blade.php ENDPATH**/ ?>