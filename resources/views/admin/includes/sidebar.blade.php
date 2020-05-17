<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/avatars/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth('admin')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">Dashboard</li>

            @can('orders_list')
            <li>
              <a href="{{route('admin.orders.index')}}">
                <i class="fa fa-paperclip"></i> <span>{{ __('orders') }}</span>
              </a>
            </li>
            @endcan

            @can('products_list')
            <li>
                <a href="{{ route('admin.products.index') }}">
                    <i class="fa fa-paperclip"></i> <span>{{ __('Products') }}</span>
                </a>
            </li>
            @endcan


            @can('categories_list')
            <li>
                <a href="{{route('admin.categories.index')}}">
                    <i class="fa fa-paperclip"></i> <span>{{ __('Categories') }}</span>
                </a>
            </li>
            @endcan

            @can('customers_list')
            <li>
                <a href="{{route('admin.customers.index')}}">
                    <i class="fa fa-paperclip"></i> <span>{{ __('Customers') }}</span>
                </a>
            </li>
            @endcan
            {{-- @can('address_list')
            <li>
                <a href="{{ route('admin.address.index') }}">
                    <i class="fa fa-paperclip"></i> <span>{{ __('User Address') }}</span>
                </a>
            </li>
            @endcan --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.admin_users.index') }}">
                            <i class="fa fa-user"></i> <span>{{ __('Admins') }}</span>
                        </a>
                    </li>

                    @can('roles_list')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-user"></i> <span>{{ __('Roles') }}</span>
                        </a>
                    </li>
                    @endcan

                    <li>
                        <a href="{{route('admin.languages.index')}}">
                            <i class="fa fa-paperclip"></i> <span>{{ __('Languages') }}</span>
                        </a>
                    </li>

                    @can('countries_list')
                    <li>
                        <a href="{{route('admin.countries.index')}}">
                            <i class="fa fa-paperclip"></i> <span>{{ __('Countries') }}</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Website Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    @can('about_list')
                    <li>
                        <a href="{{ route('admin.aboutus.index') }}">
                            <i class="fa fa-home"></i> <span>{{ __('AboutUs') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('contacts_list')
                    <li>
                        <a href="{{route('admin.contacts.index')}}">
                            <i class="fa fa-paperclip"></i> <span>{{ __('Contact Us') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('sliders_list')
                    <li>
                        <a href="{{route('admin.sliders.index')}}">
                            <i class="fa fa-paperclip"></i> <span>{{ __('Header Slider') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('settings_list')
                    <li>
                        <a href="{{ route('admin.settings.index') }}">
                            <i class="fa fa-paperclip"></i> <span>{{ __('Settings') }}</span>
                        </a>
                    </li>
                    @endcan

                </ul>
    </section>
    <!-- /.sidebar -->
</aside>
