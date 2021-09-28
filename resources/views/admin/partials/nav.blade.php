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
                <li class="dropdown dropdown-notifications">
                    @php
                        $notifications = auth()->user()->unreadNotifications;
                        $count = auth()->user()->unreadNotifications->count();

                    @endphp
                    <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"data-toggle="dropdown"
                        role="button">
                        <i class="far fa-bell"></i>
                        <span class="notif-count"  data-count="{{ $count }}">{{ $count }}</span>
                    </a>
                    <ul class="dropdown-menu pullDown" style="
                    height: auto;
                " >
                        <li class="header">الاشعارات</li>
                        <li class="body" style="width: 100%">

                            <ul class="menu" >
                                  
                         
                                <li class="scrollable-container">
                                    @forelse  ($notifications as $item)

                                    <a href="{{ route('show_notify',$item->id) }}" >
                                        <span class="table-img msg-user">
                                            <img src="{{ asset('uploads/user/deflut.png') }}" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">{{$item->data['title'] }}</span>
                                            <span class="menu-desc">
                                                <i class="material-icons"></i> 
                                            </span>
                                        </span>
                                    </a>
                                    @empty
                                    <a class="delll" style="color: black;text-align: center" href="#" onClick="return false;">لا يوجد اشعارات</a>
                                    @endforelse
                                </li>
                          

                              
                            </ul>

                        </li>
                       
                    </ul>
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
                                    <a href="{{ route('admin.show') }}">
                                        <i class="material-icons">settings</i>الملف الشخصي 
                                    </a>
                                </li>
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