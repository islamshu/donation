<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse"
                data-bs-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" onClick="return false;" class="bars"></a>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                {{-- <img src="https://madares-abqary.com/uploads/site_logo/7KlIYLEG6UbFTU8N08bl2UR0uwhliCilmAbT9IB9.png" alt="" /> --}}
                <span class="logo-name">Prize</span>
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
                        <img src="{{ asset('uploads/user/deflut.png') }}" width="32" height="32" alt="User">
                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                              
                                
                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        <i class="material-icons">power_settings_new</i>تسجيل خروج
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
</nav>