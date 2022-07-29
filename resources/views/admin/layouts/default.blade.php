<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
</head>

<body>
    <!-- Start Page Loading -->
    {{-- @include('admin.includes.loader') --}}
    <!-- End Page Loading -->

    <!-- START HEADER -->
    @include('admin.includes.header')
    <!-- END HEADER -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            @include('admin.includes.sidebar')
            <!-- END LEFT SIDEBAR NAV-->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                @yield('content')
                <!--end container-->

            </section>
            <!-- END CONTENT -->

            <!-- START RIGHT SIDEBAR NAV-->
            @include('admin.includes.right-sidebar')
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->

    <!-- START FOOTER -->
    @include('admin.includes.footer')
    <!-- END FOOTER -->

    <!-- ============    Scripts    =============== -->
    @include('admin.includes.scripts')
    <!-- ============    Scripts    =============== -->

</body>

</html>
