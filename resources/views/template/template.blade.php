<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('template.partials.header')

<body class="sb-nav-fixed">
    @include('template.partials.navbar')
    <div id="layoutSidenav">
        @include('template.partials.sideNavbar')
        @include('sweetalert::alert')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('template.partials.footer')
    @stack('scripts')
</body>

</html>