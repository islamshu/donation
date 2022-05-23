
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
                    <li class="breadcrumb-item active">المستخدمين</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">إضافة مستخدم</h2>
                 
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
                                    <form class="form-horizontal" method="post" action="<?php echo e(route('users.store')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> اسم المستخدم </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="text" value="<?php echo e(old('name')); ?>" name="name" id="name" class="form-control"
                                                            placeholder="ادخل اسم المستخدم">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> البريد الإلكتروني</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="email" value="<?php echo e(old('email')); ?>" name="email" id="email_address_2" class="form-control"
                                                            placeholder="ادخل البريد الالكتروني">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone"> رقم الهاتف </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="number" value="<?php echo e(old('phone')); ?>" name="phone" id="phone" class="form-control"
                                                            placeholder="الهاتف">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="type"> نوع المستخدم</label>
                                            </div>
                                            
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select required  value="<?php echo e(old('type')); ?>" class="form-control"  name="type" id="user_type">
                                                        
                                                            <option value="" selected disabled>نوع المستخدم</option>
                                            `                     <option value="user"  >مستخدم </option>
                                                            <option value="famous"  >مشهور</option>

                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branches"> الجنس</label>
                                            </div>
                                            
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select required  value="<?php echo e(old('gender')); ?>" class="form-control"  name="gender" id="gender">
                                                            <option value="" selected disabled>الجنس</option>
                                                            <option value="1"  >ذكر</option>
                                                            <option value="2"  >انثى</option>

                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branches"> المدينة</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select required  value="<?php echo e(old('address_id')); ?>" class="form-control"  name="address_id" id="address_id">
                                                            <option value="" selected disabled>المدينة</option>
                                                            <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                          
                                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name_ar); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix" id="dateOf">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="date">تاريخ الميلاد</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div  class="form-line">
                                                        <input required name="DOB"  type="date" id="DOB" class="form-control"
                                                            placeholder="تاريخ الميلاد  ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="password_2">كلمة المرور</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div  class="form-line">
                                                        <input required name="password"  type="password" id="password_2" class="form-control"
                                                            placeholder="ادخل كلمة المرور">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <input required type="submit" value="{{ __('save') }}"  class="filled-in btn btn-info">
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/users/create.blade.php ENDPATH**/ ?>