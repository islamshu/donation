
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
                    <li class="breadcrumb-item active"><?php echo app('translator')->get('News'); ?></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info" href="<?php echo e(route('news.create')); ?>"><?php echo app('translator')->get('add news'); ?>  </a>
                 
                <div class="body">
                    <div class="table-responsive">
                        <?php echo $__env->make('admin.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('admin.partials._error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <table
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th><?php echo app('translator')->get('title'); ?></th>

                                    <th><?php echo app('translator')->get('action'); ?></th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                <tr>
                                    <td><?php echo e($key+1); ?></td>

                                    <td><?php echo e($item->title); ?></td>   
                             
                                      

                        
                                    <td>
                                      
                                        <a  href="<?php echo e(route('news.edit',$item->id)); ?>" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form style="display: inline" method="post"
                                        action="<?php echo e(route('news.destroy', $item->id)); ?>">
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
                                    <th># </th>
                                    <th><?php echo app('translator')->get('title'); ?></th>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/news/index.blade.php ENDPATH**/ ?>