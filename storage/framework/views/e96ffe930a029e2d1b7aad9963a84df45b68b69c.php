

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
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('add news'); ?></li>


                    </ul>
                </div>
            </div>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
                <div class="card">
                    <div class="header">
                        <h2 style="display: inline"><?php echo app('translator')->get('add news'); ?></h2>

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
                                        <form class="form-horizontal" method="post" action="<?php echo e(route('news.store')); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="title"> <?php echo app('translator')->get('title'); ?> </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input required type="text" value="<?php echo e(old('title')); ?>"
                                                                name="title" id="title" class="form-control"
                                                                placeholder="<?php echo app('translator')->get('title'); ?> ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en"> <?php echo app('translator')->get('content'); ?>   </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea name="body" placeholder="<?php echo app('translator')->get('content'); ?>  " class="form-control ckeditor" id="ckeditor" cols="30"
                                                                rows="10"><?php echo e(old('body')); ?></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      


                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <input type="submit"value="<?php echo e(__('save')); ?>"  class="filled-in btn btn-info">
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/news/create.blade.php ENDPATH**/ ?>