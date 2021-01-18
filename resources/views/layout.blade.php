<!DOCTYPE html>
<html lang="es">
    @include('layouts.head')
<body>
    @include('layouts.sidenav')
    <div class="main-content" id="panel">
        @include('layouts.topnav')         
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                
            </div>
        </div>

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @yield('content')
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @include('layouts.script')
</body>
</html>