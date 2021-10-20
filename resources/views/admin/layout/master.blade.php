<!DOCTYPE html>
<html>
    <body class="hold-transition sidebar-mini skin-black-light">
        <div class="wrapper">
            <!-- header -->
            @include('admin.layout.header')
            <!-- color for side bar -->

            <!-- Nav Bar -->
            @include('admin.layout.nav')
            <!-- Content -->
            <div class="content-wrapper">
                <section class="content">
                    
                        @includeIf('admin.layout.errors')

                    @yield('content')

                </section>
            </div>
            <!-- End Content -->
            <!-- Footer -->
            @include('admin.layout.footer')
            @yield('script')
            <!-- End Footer -->
        </div>
    </body>
</html>