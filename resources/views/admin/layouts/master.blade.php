<!DOCTYPE html>
<html>

@include('admin.includes.head')


<body class="hold-transition skin-black sidebar-mini">


{{-- facebook share --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=933161633805146&autoLogAppEvents=1"></script>
{{-- face book end --}}
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('admin.includes.header')

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        @include('admin.includes.sidebar')

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <x-breadcrumb :breadcrumb="$breadcrumb ?? null" :breadcrumbModel="$breadcrumbModel ?? null"/>

            <!-- Main content -->
            <section class="content">
                @include('admin.partials.alerts')
                @yield('content')

            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->

        @include('admin.includes.footer')
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('js/admin_main.js?'.rand()) }}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ec20e155979ee47"></script>

</body>

</html>
