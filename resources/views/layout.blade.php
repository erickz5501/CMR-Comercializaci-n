<!DOCTYPE html>
<html lang="es">
    @include('layouts.head')
<body>
    <!-- gola pading -->
    @include('layouts.sidenav')
    <div class="main-content" id="panel">
        @include('layouts.topnav')
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- MIGAJA DE PAN  -->
                    <div class="row align-items-center py-2" style="display: none; padding-bottom: .9rem !important;" id="migaja_de_pan">

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt--6">
            @yield('content')

            @include('layouts.footer')

        </div>
    </div>
    <!-- =================== YIELD MODAL =================== -->
    {{-- @yield('hola') --}}

    @include('layouts.script')
</body>
</html>
