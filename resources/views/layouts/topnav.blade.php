<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="mb-0">
          <div>
            <div class="media-body  ml-2  d-none d-lg-block" >
              <h3 style="color: white">
                @yield('title')
              </h3>
            </div>
          </div>
        </div>

        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">

            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>

          <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
          
        <!-- ================================= PERFIL DEL USUARIO LOGUADO ============================= -->
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/argon/assets/img/theme/team-4.jpg">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="card card-profile">
                <img src="/argon/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                  <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                      <a href="#">
                        <img src="/argon/assets/img/theme/team-4.jpg" class="rounded-circle">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                  <div class="d-flex justify-content-between">
                    <a href="/dashboard/perfil" class="btn btn-sm btn-info  mr-4 ">Perfil</a>
                    <a href="/index" class="btn btn-sm btn-danger float-right">Salir</a>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col">
                      <div class="card-profile-stats d-flex justify-content-center">
                        <div>
                          <span class="heading">22</span>
                          <span class="description">Friends</span>
                        </div>
                        <div>
                          <span class="heading">10</span>
                          <span class="description">Photos</span>
                        </div>
                        <div>
                          <span class="heading">89</span>
                          <span class="description">Comments</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <h5 class="h3">
                      Jessica Jones<span class="font-weight-light">, 27</span>
                    </h5>
                    <div class="h5 font-weight-300">
                      <i class="ni location_pin mr-2"></i>Tarapoto, Perú
                    </div>
                    <div class="h5 mt-4">
                      <i class="ni business_briefcase-24 mr-2"></i>Gerente de soluciones - Oficial creativo de Tim
                    </div>
                    <div>
                      <i class="ni education_hat mr-2"></i>CeatecSoft
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- fin deep-->
          </li>
        </ul>
      </div>
    </div>
</nav>
