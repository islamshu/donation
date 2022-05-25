<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.com/templates/admin/lorax/source/rtl/pages/examples/login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Sep 2021 07:11:38 GMT -->
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
    <title> <?php echo e(App\General::first()->name_ar); ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(asset('uploads/'. App\General::first()->logo)); ?>" type="image/x-icon">
	<!-- Plugins Core Css -->
	<link href="<?php echo e(asset('assets/css/app.min.css')); ?>" rel="stylesheet">
	<!-- Custom Css -->
	<link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('assets/css/pages/extra_pages.css')); ?>" rel="stylesheet" />
</head>

<body class="login-page" style="direction: rtl">
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
                <form class="login100-form " method="POST" action="<?php echo e(route('get_login')); ?>">
                    <?php echo csrf_field(); ?>
		
					<span class="login100-form-logo">
						<img alt="" src="<?php echo e(asset('assets/images/loading.png')); ?>">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						<?php echo e(__('login')); ?>

					</span>
					<?php echo $__env->make('admin.partials._error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="useremail" placeholder="<?php echo e(__('E-mail')); ?>">
						<i class="material-icons focus-input1001">person</i>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="userpass" placeholder="<?php echo e(__('password')); ?>">
						<i class="material-icons focus-input1001">lock</i>
					</div>
				
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							تسجيل الدخول
						</button>
					</div>
				
				</form>
			</div>
		</div>
	</div>
	<!-- Plugins Js -->
	<script src="../../assets/js/app.min.js"></script>
	<!-- Extra page Js -->
	<script src="../../assets/js/pages/examples/pages.js"></script>
</body>


<!-- Mirrored from www.radixtouch.com/templates/admin/lorax/source/rtl/pages/examples/login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Sep 2021 07:11:38 GMT -->
</html><?php /**PATH D:\prize\resources\views/admin/partials/login.blade.php ENDPATH**/ ?>