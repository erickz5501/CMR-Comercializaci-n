  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('/argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

  <!-- Optional JS -->
  <script src="{{ asset('/argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>

  <script src="{{ asset('/argon/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

  <script src="{{ asset('/argon/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/moment.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/bootstrap-datetimepicker.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/quill/dist/quill.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script src="{{ asset('/argon/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src={{ asset('/argon/assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}></script>
  <script src="{{ asset('/summernote/summernote-bs4.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker1').datetimepicker({
        icons: {
          time: "fa fa-clock",
          date: "fa fa-calendar-day",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }
      });
    });
  </script>
  <!-- Argon JS -->
  <script src="{{ asset('/argon/assets/js/argon.js?v=1.2.0')}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{ asset('/argon/assets/js/demo.min.js')}}"></script>

  @yield('js')