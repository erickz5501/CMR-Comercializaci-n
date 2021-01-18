<!--
=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

@include('layouts/head')

<body class="bg-default">
  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Escoje tu plan ideal</h1>
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
        <div class="col-lg-10">
          <div class="pricing card-group flex-column flex-md-row mb-3">
            <div class="card card-pricing border-0 text-center mb-4">
              <div class="card-header bg-transparent">
                <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">Simple pack</h4>
              </div>
              <div class="card-body px-lg-7">
                <div class="display-2">S/.100.00</div>
                <span class="text-muted">por mes</span>
                <ul class="list-unstyled my-4">
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                          <i class="fas fa-terminal"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2">Complete documentation</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                          <i class="fas fa-pen-fancy"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2">Working materials in Sketch</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                          <i class="fas fa-hdd"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2">12GB cloud storage</span>
                      </div>
                    </div>
                  </li>
                </ul>
                <button type="button" class="btn btn-primary mb-3">Obtener producto</button>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-block btn-secondary mb-3" data-toggle="modal" data-target="#modal-default">Mas informacion</button>
                  <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Acerca de este producto</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card card-pricing bg-gradient-success zoom-in shadow-lg rounded border-0 text-center mb-4">
              <div class="card-header bg-transparent">
                <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Complete pack</h4>
              </div>
              <div class="card-body px-lg-7">
                <div class="display-1 text-white">S/.300.00</div>
                <span class="text-white">por mes</span>
                <ul class="list-unstyled my-4">
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                          <i class="fas fa-terminal"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2 text-white">Complete documentation</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                          <i class="fas fa-pen-fancy"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2 text-white">Working materials in Sketch</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                          <i class="fas fa-hdd"></i>
                        </div>
                      </div>
                      <div>
                        <span class="pl-2 text-white">Ilimitado cloud storage</span>
                      </div>
                    </div>
                  </li>
                </ul>
                <button type="button" class="btn btn-secondary mb-3">Obtener producto</button>
              </div>
              <div class="card-footer bg-transparent">
                <a type="button" class="btn btn-block btn-secondary mb-3" data-toggle="modal" data-target="#modal-default" >Contact sales</a>
                  <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Type your modal title</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Save changes</button>
                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-grid justify-content-center">
        <div class="col-lg-10">
          <div class="table-responsive">
            <table class="table table-dark mt-5">
              <thead>
                <tr>
                  <th class="px-0 bg-transparent" scope="col">
                    <span class="text-light font-weight-700">Caracteristicas</span>
                  </th>
                  <th class="text-center bg-transparent" scope="col">Simple Pack</th>
                  <th class="text-center bg-transparent" scope="col">Complete Pack</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-0">IMAP/POP Support</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">Email Forwarding</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">Active Sync</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">Multiple domain hosting</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center">
                    <span class="text-sm text-light">Limited to 1 domain only</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">Additional storage upgrade</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">30MB Attachment Limit</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td class="px-0">Password protected / Expiry links</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td class="px-0">Unlimited Custom Apps</td>
                  <td class="text-center"><i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center">-</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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
  @include('layouts/script')
</body>

</html>