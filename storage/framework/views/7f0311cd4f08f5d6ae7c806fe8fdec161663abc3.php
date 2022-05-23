
<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">

                        <li class="breadcrumb-item bcrumb-1">
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="fas fa-home"></i> <?php echo app('translator')->get('Home'); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo e(__('Setting')); ?></li>

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
                                        <form class="form-horizontal" method="post" action="<?php echo e(route('genereal.store')); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row clearfix">

                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en"> <?php echo e(__('System name')); ?> </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="<?php echo e($general->name_en); ?>"
                                                                name="name_en" id="name_en" class="form-control"
                                                                placeholder=" <?php echo e(__('System name')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="logo"> <?php echo e(__('Big logo')); ?> </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" name="big_logo"
                                                                class="custom-file-input image header_logo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo e(asset('uploads/' . $general->big_logo)); ?>" style="width: 100px"
                                                    class="img-thumbnail image-preview" data-preview="image" alt="">
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="logo"> <?php echo e(__('Big logo')); ?> </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" name="logo"
                                                                class="custom-file-input image header_logo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo e(asset('uploads/' . $general->logo)); ?>" style="width: 100px"
                                                    class="img-thumbnail image-preview" data-preview="image" alt="">
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en"><?php echo app('translator')->get('E-mail'); ?></label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="<?php echo e($general->email); ?>"
                                                                name="email" id="email" class="form-control"
                                                                placeholder=" <?php echo app('translator')->get('E-mail'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en"><?php echo app('translator')->get('Address'); ?></label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="<?php echo e($general->Address); ?>"
                                                                name="Address" id="Address" class="form-control"
                                                                placeholder=" <?php echo app('translator')->get('Address'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en"><?php echo app('translator')->get('President Name'); ?></label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="<?php echo e($general->President); ?>"
                                                                name="President" id="President" class="form-control"
                                                                placeholder=" <?php echo app('translator')->get('President Name'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en"><?php echo app('translator')->get('Phone '); ?></label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="<?php echo e($general->phone); ?>"
                                                                name="phone" id="phone" class="form-control"
                                                                placeholder=" <?php echo app('translator')->get('Phone '); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            




                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <input type="submit" value="<?php echo e(__('save')); ?>" class="filled-in btn btn-info">
                                                </div>
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
                $('#user_type').change(function() {
                    var value = $('#user_type :selected').val();
                    if (value == 'famous') {
                        $("#dateOf").css("display", "none");
                    } else {
                        $("#dateOf").css("display", "flex");

                    }

                });
            </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/general.blade.php ENDPATH**/ ?>