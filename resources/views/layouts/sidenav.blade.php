<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  d-flex  align-items-center">
      <a class="navbar-brand" href="{{ url('/')}}">
        <img src="/argon/assets/img/brand/logo_cea.svg" class="navbar-brand-img" alt="..." style="max-height: 3rem;">
      </a>
      <div class=" ml-auto ">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">

          <li class="nav-item">
            <a href="{{ url('/dashboard/listas/clientes')}}" class="nav-link">
              <i class="ni ni-ui-04 text-info"></i>
              <span class="sidenav-normal"> Clientes </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
              <i class="ni ni-ui-04 text-info"></i>
              <span class="nav-link-text">Interesados</span>
            </a>
            <div class="collapse" id="navbar-components">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ url('/dashboard/listas/historial')}}" class="nav-link">
                    <span class="sidenav-mini-icon"> H </span>
                    <span class="sidenav-normal"> Historial comercialización </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/dashboard/listas/interesados')}}" class="nav-link">
                    <span class="sidenav-mini-icon"> L </span>
                    <span class="sidenav-normal"> Lista interesados </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>
</nav>
