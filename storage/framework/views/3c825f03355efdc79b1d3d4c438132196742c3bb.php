
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
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('sliders'); ?></li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="display: inline"><?php echo app('translator')->get('sliders'); ?></h2>
                        <button style="display: inline" type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#exampleModalBranches"><?php echo app('translator')->get('add slider'); ?></button>
                        <div class="modal fade" id="exampleModalBranches" tabindex="-1" role="dialog"
                            aria-labelledby="formModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formModal"><?php echo app('translator')->get('add slider'); ?></h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?php echo e(route('sliders.store')); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <label for="title"><?php echo app('translator')->get('image'); ?></label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required type="file" id="title" class="form-control"
                                                        name="image" placeholder="upload">
                                                </div>
                                            </div>


                                            <br>
                                            <input class="btn btn-primary m-t-15 waves-effect" type="submit"value="<?php echo e(__('save')); ?>" >

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <?php echo $__env->make('admin.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.partials._error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('image'); ?> </th>
                                        <th><?php echo app('translator')->get('action'); ?></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><img width="150" height="100" src="<?php echo e(asset('uploads/'.$item->image)); ?>" alt=""></td>
                                            <td>
                                             
                                                <form style="display: inline" method="post"
                                                    action="<?php echo e(route('sliders.destroy', $item->id)); ?>">
                                                    <?php echo method_field('delete'); ?> <?php echo csrf_field(); ?>

                                                    <button
                                                        class=" btn bg-red btn-circle waves-effect waves-circle waves-float delete-confirm"
                                                        type="submit"> <i class="material-icons">clear</i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><?php echo app('translator')->get('image'); ?> </th>
                                        <th><?php echo app('translator')->get('action'); ?></th>


                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Table -->
        <!-- Striped Rows -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/sliders/index.blade.php ENDPATH**/ ?>