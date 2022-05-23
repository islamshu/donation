<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse"
                data-bs-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" onClick="return false;" class="bars"></a>
            <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>">
                
                <span class="logo-name"><?php echo e(App\General::first()->name_en); ?></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="pull-left">
                <li>
                    <a href="#" onClick="return false;" class="sidemenu-collapse">
                        <i class="material-icons">reorder</i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="fas fa-expand"></i>
                    </a>
                </li>
                
                <!-- #END# Full Screen Button -->
                <!-- #START# Notifications-->
                
                    




                  





                   
                </li>
                <!-- #END# Notifications-->
                <li class="dropdown user_profile">
                    <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                        role="button">
                        <img src="<?php echo e(asset('uploads/user/deflut.png')); ?>" width="32" height="32" alt="User">
                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                              
                                <li>
                                    <a href="<?php echo e(route('admin.show')); ?>">
                                        <i class="material-icons">settings</i><?php echo app('translator')->get('profile'); ?> 
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin.logout')); ?>">
                                        <i class="material-icons">power_settings_new</i><?php echo app('translator')->get('logout'); ?> 
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right">
                    <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                        <i class="fas fa-cog"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH D:\prize\resources\views/admin/partials/nav.blade.php ENDPATH**/ ?>