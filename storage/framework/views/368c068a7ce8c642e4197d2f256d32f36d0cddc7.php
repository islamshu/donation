
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .dropdown-trigger{
            display: none !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
               
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <i class="fas fa-home"></i> @lang('Home')</a>
                    </li>
                    <li class="breadcrumb-item active">اعدادات البريد الإلكتروني</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                 
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="card">
                            
                                <div class="body">
                                    <?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
 <ul style="text-align: center">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <li><?php echo e($error); ?></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </ul>
</div>
<?php endif; ?>
<form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="MAIL_DRIVER">
        <label class="col-md-3 col-form-label"><?php echo e(('Type')); ?></label>
        <div class="col-md-9">
            <select class="form-control aiz-selectpicker mb-2 mb-md-0" name="MAIL_DRIVER" onchange="checkMailDriver()">
                <option value="smtp" <?php if(env('MAIL_DRIVER') == "smtp"): ?> selected <?php endif; ?>><?php echo e(('SMTP')); ?></option>

            </select>
        </div>
    </div>
    <div id="smtp">
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_HOST">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAIL HOST')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_HOST" value="<?php echo e(env('MAIL_HOST')); ?>" placeholder="<?php echo e(('MAIL HOST')); ?>">
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_PORT">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAIL PORT')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_PORT" value="<?php echo e(env('MAIL_PORT')); ?>" placeholder="<?php echo e(('MAIL PORT')); ?>" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_USERNAME">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAIL USERNAME')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_USERNAME" value="<?php echo e(env('MAIL_USERNAME')); ?>" placeholder="<?php echo e(('MAIL USERNAME')); ?>" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_PASSWORD">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAIL PASSWORD')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_PASSWORD" value="<?php echo e(env('MAIL_PASSWORD')); ?>" placeholder="<?php echo e(('MAIL PASSWORD')); ?>" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAIL ENCRYPTION')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="<?php echo e(env('MAIL_ENCRYPTION')); ?>" placeholder="<?php echo e(('MAIL ENCRYPTION')); ?>" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAIL FROM ADDRESS')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="<?php echo e(env('MAIL_FROM_ADDRESS')); ?>" placeholder="<?php echo e(('MAIL FROM ADDRESS')); ?>" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAIL FROM NAME')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_FROM_NAME" value="<?php echo e(env('MAIL_FROM_NAME')); ?>" placeholder="<?php echo e(('MAIL FROM NAME')); ?>" >
            </div>
        </div>
    </div>
    <div id="mailgun">
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAILGUN DOMAIN')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAILGUN_DOMAIN" value="<?php echo e(env('MAILGUN_DOMAIN')); ?>" placeholder="<?php echo e(('MAILGUN DOMAIN')); ?>" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAILGUN_SECRET">
            <div class="col-md-3">
                <label class="col-from-label"><?php echo e(('MAILGUN SECRET')); ?></label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAILGUN_SECRET" value="<?php echo e(env('MAILGUN_SECRET')); ?>" placeholder="<?php echo e(('MAILGUN SECRET')); ?>" >
            </div>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
    </div>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
    <!-- Striped Rows -->
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $('#user_type').change(function () {    
        var value = $('#user_type :selected').val();
        if(value == 'famous'){
            $("#dateOf").css("display", "none");
        }else{
            $("#dateOf").css("display", "flex");

        }

});  
</script>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/setting/mail.blade.php ENDPATH**/ ?>