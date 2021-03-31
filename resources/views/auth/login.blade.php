<!DOCTYPE html>
<html lang="en">
    <head>
        @section('pagina', 'Iniciar Sesión')
        @include('layouts.head')

    </head>
    <body class="bg-default g-sidenav-show g-sidenav-pinned">
        <!-- Navbar -->
        <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
            <div class="container">
                <span class="navbar-brand"  >
                    <img src="/img/LogoCea.svg" />
                </span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <span  >
                                    <img src="/img/LogoCea.svg" />
                                </span>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr class="d-lg-none" />
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Visitanos en Facebook">
                                <i class="fab fa-facebook-square"></i>
                                <span class="nav-link-inner--text d-lg-none">Facebook</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Visitanos en Instagram">
                                <i class="fab fa-instagram"></i>
                                <span class="nav-link-inner--text d-lg-none">Instagram</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Visitanos en Twitter">
                                <i class="fab fa-twitter-square"></i>
                                <span class="nav-link-inner--text d-lg-none">Twitter</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="Visitanos en Github">
                                <i class="fab fa-github"></i>
                                <span class="nav-link-inner--text d-lg-none">Github</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header bg-gradient-primary py-5 py-lg-5 pt-lg-5" style="background: linear-gradient(87deg, #c5b5ae 0, #10264a 100%) !important;">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                                <h1 class="text-white">Bienvenido!</h1>
                                <p class="text-lead text-white">Sientase comodo usando nuestra plataforma.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
            <!-- Page content -->
            <div class="container mt--8 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-transparent ">
                                <div class="text-muted text-center ">Ingresar al sistema</div>

                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Tus credenciales</small>
                                </div>
                                <form role="form" id="formulario_login">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Email" type="email" name="email" id="email"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Password" type="password" name="password" id="password"/>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="remember" name="remember" type="checkbox" />
                                        <label class="custom-control-label" for="remember">
                                            <span class="text-muted">Recuerdame</span>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">Ingresar</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-xl-12" >
                                            <div class="form-group">
                                                <div  class="progress" id="div_barra_progress_login" style="height: 12px !important;">
                                                    <div id="barra_progress_login" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <div id="contenedor_de_errores_login"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <a href="#" class="text-light"><small>Olvidate tu contraceña?</small></a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#" class="text-light"><small>Crea nueva cuenta</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.script')


        <script src="{{ asset('ajax_web/login.js')}}"></script>
        <script src="{{ asset('funciones/crud.js')}}"></script>

    </body>
</html>
