<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                            <img src="<?php echo e(asset('uploads/user/deflut.png')); ?>" class="user-img-style" alt="User Image" />
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="sidebar-userpic-name"> <?php echo e(auth()->user()->name); ?> </div>
                    </div>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.dashboard')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('genereal.index')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('Setting')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('sliders.index')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('sliders')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('home.index')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('Home Page')); ?></span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo e(route('about.index')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('About Page')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('news.index')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('News')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('gallery.index')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('Gallery')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('users.index')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('Users')); ?></span>
                    </a>
                </li>
  
                <li>
                    <a href="<?php echo e(route('show_translate')); ?>">
                        <i data-feather="monitor"></i>
                        <span><?php echo e(__('language')); ?></span>
                    </a>
                </li>
  
  
             
               
               
             
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    
    <!-- #END# Right Sidebar -->
</div><?php /**PATH D:\prize\resources\views/admin/partials/side.blade.php ENDPATH**/ ?>