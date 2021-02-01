<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  d-flex  align-items-center">
      <a class="navbar-brand" href="{{ url('/dashboard')}}">
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
            <a class="nav-link" href="{{ url('/dashboard/listas/historial')}}" >
              <i class="fas fa-home text-blue"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
              <i class="fas fa-list-alt text-purple"></i>
              <span class="nav-link-text">Listas</span>
            </a>
            <div class="collapse" id="navbar-components">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ url('/dashboard/listas/interesados')}}" class="nav-link">
                    <span class="sidenav-mini-icon"> L </span>
                    <span class="sidenav-normal"> interesados </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/dashboard/listas/clientes')}}" class="nav-link">
                    <span class="sidenav-mini-icon"> C </span>
                    <span class="sidenav-normal"> Clientes </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
              <i class="fas fa-cogs"></i>
              <span class="nav-link-text">Configuración</span>
            </a>
            <div class="collapse" id="navbar-components">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href=" {{ url('/dashboard/configuracion/eventos') }} " class="nav-link">
                    <span class="sidenav-mini-icon"> E </span>
                    <span class="sidenav-normal"> Eventos </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href=" {{  url('/dashboard/configuracion/medios') }} " class="nav-link">
                    <span class="sidenav-mini-icon"> M </span>
                    <span class="sidenav-normal"> Medios </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{  url('/dashboard/configuracion/personal') }}" class="nav-link">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal"> Personal </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{  url('/dashboard/configuracion/modulos') }}" class="nav-link">
                    <span class="sidenav-mini-icon"> M </span>
                    <span class="sidenav-normal"> Modulos </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{  url('/dashboard/configuracion/users') }}" class="nav-link">
                    <span class="sidenav-mini-icon"> U </span>
                    <span class="sidenav-normal"> Users </span>
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
