<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>E</b>C</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>  
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>




            {{-- end notifiacation--}}

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @auth
                <li class="dropdown dropdown-notification nav-item  dropdown-notifications" >
                    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                        <i class="fa fa-bell"> </i>
                        <span
                            class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count"
                            data-count="9">9</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <h6 class="dropdown-header m-0 text-center">
                                <span class="grey darken-2 text-center"> الرسائل</span>
                            </h6>
                        </li>
                        <li class="scrollable-container ps-container ps-active-y media-list w-100">
                            <a href="">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="media-heading text-right ">عنوان الاشعار </h6>
                                        <p class="notification-text font-small-3 text-muted text-right"> نص الاشعار</p>
                                        <small style="direction: ltr;">
                                            <p class=" text-muted text-right"
                                                  style="direction: ltr;"> 20-05-2020 - 06:00 pm
                                            </p>
                                            <br>
        
                                        </small>
                                    </div>
                                </div>
                            </a>
        
                        </li>
                        <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                            href=""> جميع الاشعارات </a>
                        </li>
                    </ul>
                </li>
            @endauth

            {{-- end notifiacation--}}

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @auth
                            <img src="{{ asset('images/avatars/avatar.png') }}" class="user-image">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                        @endauth
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('images/avatars/avatar.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {{ auth()->user()->name }}
                                <small>{{ auth()->user()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                {{-- <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">الحساب الشخصي</a> --}}
                            </div>
                            <div class="pull-left">
                                <a href="javascript:;" class="btn btn-default btn-flat" onclick="getElementById('logout').submit();">Logout</a>
                                <form action="{{ route('admin.logout') }}" method="POST" id="logout">
                                    @csrf
                                </form>
                            </div>


                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
