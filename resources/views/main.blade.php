<!DOCTYPE html>
<html>

@include('layouts.head')
<body>
  <!-- Navabr -->
  @include('layouts/navbar')
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-primary pt-5 pb-7">
      <div class="container">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="pr-5">
                <h1 class="display-2 text-white font-weight-bold mb-0">Sistema CeaTec PRO</h1>
                <h2 class="display-4 text-white font-weight-light">A beautiful premium dashboard for Bootstrap 4.</h2>
                <p class="text-white mt-4">Argon perfectly combines reusable HTML and modular CSS with a modern styling and beautiful markup throughout each HTML template in the pack.</p>
                <div class="mt-5">
                  <a href="{{ url('/main/precios')}}" class="btn btn-default my-2">Comprar ahora</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row pt-5">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-4">
                        <i class="ni ni-active-40"></i>
                      </div>
                      <h5 class="h3">Atributo 1</h5>
                      <p>Argon comes with over 70 handcrafted components.</p>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow mb-4">
                        <i class="ni ni-active-40"></i>
                      </div>
                      <h5 class="h3">Atributo 2</h5>
                      <p>Fully integrated and extendable third-party plugins that you will love.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pt-lg-5 pt-4">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow mb-4">
                        <i class="ni ni-active-40"></i>
                      </div>
                      <h5 class="h3">Atributo 3</h5>
                      <p>From simple to complex, you get a beautiful set of 15+ page examples.</p>
                    </div>
                  </div>
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow mb-4">
                        <i class="ni ni-active-40"></i>
                      </div>
                      <h5 class="h3">Atributo 4</h5>
                      <p>You will love how easy is to to work with Argon.</p>
                    </div>
                  </div>
                </div>
              </div>
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
    <section class="py-6 pb-9 bg-default">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-8">
            <h2 class="display-3 text-white">A complete solution</h3>
              <p class="lead text-white">
                Argon is a completly new product built on our newest re-built from scratch framework structure that is meant to make our products more intuitive,
                more adaptive and, needless to say, so much easier to customize. Let Argon amaze you with its cool features and build tools and get your project to a whole new level.
              </p>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-lg pt-lg-0 mt--7">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                      <i class="ni ni-check-bold"></i>
                    </div>
                    <h4 class="h3 text-primary text-uppercase">Desarrollado por CeaTec</h4>
                    <p class="description mt-3">Argon is built on top of the most popular open source toolkit for developing with HTML, CSS, and JS.</p>
                    <div>
                      <span class="badge badge-pill badge-primary">bootstrap 4</span>
                      <span class="badge badge-pill badge-primary">dashboard</span>
                      <span class="badge badge-pill badge-primary">template</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape bg-gradient-success text-white rounded-circle mb-4">
                      <i class="ni ni-istanbul"></i>
                    </div>
                    <h4 class="h3 text-success text-uppercase">Sin instalacion</h4>
                    <p class="description mt-3">Use Argons's included npm and gulp scripts to compile source code, run tests, and more with just a few simple commands.</p>
                    <div>
                      <span class="badge badge-pill badge-success">npm</span>
                      <span class="badge badge-pill badge-success">gulp</span>
                      <span class="badge badge-pill badge-success">build tools</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape bg-gradient-warning text-white rounded-circle mb-4">
                      <i class="ni ni-planet"></i>
                    </div>
                    <h4 class="h3 text-warning text-uppercase">Soporte 24/7</h4>
                    <p class="description mt-3">Argon makes customization easier than ever before. You get all the tools to make your website building process a breeze.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">sass</span>
                      <span class="badge badge-pill badge-warning">design</span>
                      <span class="badge badge-pill badge-warning">customize</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-6">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-md-2">
            <img src="/argon/assets/img/theme/landing-1.png" class="img-fluid">
          </div>
          <div class="col-md-6 order-md-1">
            <div class="pr-md-5">
              <h1>Increibles caracteristicas</h1>
              <p>This dashboard comes with super cool features that are meant to help in the process. Handcrafted components, page examples and functional widgets are just a few things you will see and love at first sight.</p>
              <ul class="list-unstyled mt-5">
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-settings-gear-65"></i>
                      </div>
                    </div>
                    <div>
                      <h4 class="mb-0">Carefully crafted components</h4>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-html5"></i>
                      </div>
                    </div>
                    <div>
                      <h4 class="mb-0">Amazing page examples</h4>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-satisfied"></i>
                      </div>
                    </div>
                    <div>
                      <h4 class="mb-0">Super friendly support team</h4>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-6">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6">
            <img src="/argon/assets/img/theme/landing-2.png" class="img-fluid">
          </div>
          <div class="col-md-6">
            <div class="pr-md-5">
              <h1>Diseño amigable</h1>
              <p>If you want to get inspiration or just show something directly to your clients, you can jump start your development with our pre-built example pages.</p>
              <a href="/argon/pages/examples/profile.html" class="font-weight-bold text-warning mt-5">Explore pages</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-6">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-md-2">
            <img src="/argon/assets/img/theme/landing-3.png" class="img-fluid">
          </div>
          <div class="col-md-6 order-md-1">
            <div class="pr-md-5">
              <h1>Estadisticas en tiempo real</h1>
              <p>We love cards and everybody on the web seems to. We have gone above and beyond with options for you to organise your information. From cards designed for content, to pricing cards or user profiles, you will have many options to choose from.</p>
              <a href="./pages/widgets.html" class="font-weight-bold text-info mt-5">Explore widgets</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-7">
      <div class="container">
        <div class="row row-grid justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="display-3">Obten el sistema de empresas <span class="text-success">¿Listo para dar el siguiente paso?</span></h2>
            <p class="lead">Cause if you do, it can be yours now. Hit the button below to navigate to get the free version or purchase a license for your next project. Build a new web app or give an old Bootstrap project a new look!</p>
            <div class="btn-wrapper">
              <a href="https://www.creative-tim.com/product/argon-dashboard-pro" class="btn btn-primary btn-icon mb-3 mb-sm-0">
                <span class="btn-inner--icon"><i class="ni ni-basket"></i></span>
                <span class="btn-inner--text">Purchase now</span>
              </a>
            </div>
            <div class="text-center">
              <h4 class="display-4 mb-5 mt-5">Desarrollado con estas tecnologias</h4>
              <div class="row justify-content-center">
                <div class="col-md-2 col-3 my-2">
                  <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank" data-toggle="tooltip" data-original-title="Bootstrap 4 - Most popular front-end component library">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/bootstrap.jpg" class="img-fluid rounded-circle shadow shadow-lg--hover">
                  </a>
                </div>
                <div class="col-md-2 col-3 my-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard-react" target="_blank" data-toggle="tooltip" data-original-title="React - A JavaScript library for building user interfaces">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/react.jpg" class="img-fluid rounded-circle">
                  </a>
                </div>
                <div class="col-md-2 col-3 my-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard-laravel" target="_blank" data-toggle="tooltip" data-original-title="Laravel - The PHP Framework For Web Artisans">
                    <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/laravel_logo.png" class="img-fluid rounded-circle">
                  </a>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-2 col-3 my-2">
                  <a href=" https://www.creative-tim.com/product/argon-dashboard-nodejs" target="_blank" data-toggle="tooltip" data-original-title="Node.js - a JavaScript runtime built on Chrome's V8 JavaScript engine">
                    <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/logos/nodejs-logo.jpg" class="img-fluid rounded-circle">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://ceatec.com.pe/" class="nav-link" target="_blank">CeatecSoft</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">Acerca de nosotros</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('layouts.script')
</body>

</html>