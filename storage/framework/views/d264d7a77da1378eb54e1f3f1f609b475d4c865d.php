
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
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
                    <?php if( !Route::is('user.paned')): ?>

                    <li class="breadcrumb-item active">المستخدمين</li>
                    <?php else: ?>
                    <li class="breadcrumb-item active">المستخدمين المحظروين</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <?php if( !Route::is('user.paned')): ?>
                    <h2 style="display: inline">المستخدمين</h2>
                    <a class="btn btn-info" href="<?php echo e(route('users.create')); ?>">اضف مستخدم جديد</a>
                    <?php else: ?>
                    <h2 style="display: inline">المستخدمين المحظروين</h2>
                    <?php endif; ?>
                 
                <div class="body">
                    <div class="table-responsive">
                        <?php echo $__env->make('admin.partials._success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('admin.partials._error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <table id="table"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th><?php echo app('translator')->get('name'); ?></th>
                                    <th><?php echo app('translator')->get('E-mail'); ?></th>
                                    <th><?php echo app('translator')->get('status'); ?></th>
                                    
                                    <th><?php echo app('translator')->get('action'); ?></th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                <tr>
                                    <td><?php echo e($key+1); ?></td>

                                    <td><?php echo e($item->name); ?></td>   
                                    <td><?php echo e($item->email); ?></td>   
                                    <td><?php if($item->status == 0): ?>
                                        <a href="<?php echo e(route('users-update-status',$item->id)); ?>" class="btn btn-info">Approve</a>
                                        <?php else: ?>
                                        <a  class="btn btn-success">This User Approve</a>
                                        <?php endif; ?>

                                        

                                    </td> 
                                       
                                             <td>
                                    
    

                                          
                                        <form style="display: inline" method="post" action="<?php echo e(route('users.destroy',$item->id)); ?>">
                                        <?php echo method_field('delete'); ?> <?php echo csrf_field(); ?>

                                        <button class=" btn bg-red btn-circle waves-effect waves-circle waves-float delete-confirm" type="submit" > <i class="material-icons">clear</i></button>
                                    </form>
                                 
                              
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('name'); ?></th>
                                    <th><?php echo app('translator')->get('E-mail'); ?></th>
                                    <th><?php echo app('translator')->get('status'); ?></th>
                                    
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

<?php $__env->startSection('script'); ?>
    <script>
         $( document ).ready(function() {
  

  $(".update_cart").click(function(){
        
        var id = $(this).attr('naa');
          var is_ture = $(this).attr('true');
    
        var thisContext = this;
        
            if(is_ture == 0){
                 $.ajax({
            type: "post",
            url: '<?php echo e(route('users.verfy_account')); ?>',
      data: { "_token": "<?php echo e(csrf_token()); ?>",'id':id ,'status':1}, 
            success: function (data) {
                  //    AIZ.plugins.notify('success', 'متابعة');

                    $(thisContext).val("إلغاء التفعيل  ");  
                    $( thisContext ).removeClass( "btn-success" ).addClass( "btn-danger" );
                        $(thisContext).removeAttr("disabled"); 
                    $(thisContext).attr('true', 1);
                  $(thisContext).attr('disabled','disabled');
  setTimeout(function() {
      $('.update_cart').attr('disabled',false);
  },2000);
                            updateNavCart();

               
            }
        });
            }else if(is_ture == 1){
          
                swal({
title: "هل أنت متأكد من إلغاء تفعيل المشهور     ؟",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  
  var id = $(this).attr('naa');
          var is_ture = $(this).attr('true');
  
        var thisContext = this;

                 $.ajax({
            type: "post",
            url: '<?php echo e(route('users.verfy_account')); ?>',
            data: { "_token": "<?php echo e(csrf_token()); ?>",'id':id ,'status':0}, 
            success: function (data) {
      
                        $(thisContext).val("تفعيل");  
                        $( thisContext ).removeClass( "btn-danger" ).addClass( "btn-success" );
                        $(thisContext).removeAttr("disabled");
                        $(thisContext).attr('true', 0);
                             $(thisContext).attr('disabled','disabled');
  setTimeout(function() {
      $('.update_cart').attr('disabled',false);
  },2000);
          updateNavCart();

            }
        });

}
});
                
                
                
        
            }
       
    
    });

      
});
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/users/index.blade.php ENDPATH**/ ?>