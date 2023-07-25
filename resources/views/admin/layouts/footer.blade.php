    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2018-{{ date('Y') }} <a href="https://adminlte.io">RAPSUM FAM</a>.</strong>
      All Rights Reserved
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('templates/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('templates/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('templates/plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('templates/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('templates/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('templates/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('templates/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('templates/dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('templates/dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('templates/dist/js/pages/dashboard.js') }}"></script>
  <!-- Custom Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <!-- DataTables & Plugins -->
  <script src="{{ asset('templates/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
</body>
</html>