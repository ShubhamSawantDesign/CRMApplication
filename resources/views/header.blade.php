<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Administrator Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?v=1'); }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css?v=1'); }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('plugins/jqvmap/jqvmap.min.css?v=1'); }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css?v=1'); }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css?v=1'); }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css?v=1'); }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css?v=1'); }}">
  <!-- Common Css -->
  <link rel="stylesheet" href="{{ url('css/common.css') }}">
  <!-- Dropdown Multiselect List -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- End Of Multiselect dropdown list -->
  <style>
  .logo-text {
    font-size: 10px;
    margin-left: 10px;
    margin-bottom: 0;
    letter-spacing: 1px;
    color: #323095;
    font-weight: 600;
}
  </style>
</head>
<script src="{{ url('plugins/jquery/jquery.min.js'); }}"></script>
<body class="hold-transition sidebar-mini layout-fixed">
@include('sidebar')

@yield('content')

</body>
<!-- jQuery -->


<script src="{{ url('plugins/jquery-ui/jquery-ui.min.js?v=1'); }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Data Table JQuery Files -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js'); }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); }}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js'); }}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js'); }}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js'); }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js'); }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js'); }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js'); }}"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js?v=1'); }}"></script>
<!-- ChartJS -->
<script src="{{ url('plugins/chart.js/Chart.min.js?v=1'); }}"></script>
<!-- Sparkline -->
<script src="{{ url('plugins/sparklines/sparkline.js?v=1'); }}"></script>
<!-- JQVMap -->
<!-- <script src="{{ url('admin/plugins/jqvmap/jquery.vmap.min.js?v=1'); }}"></script> -->
<!-- <script src="{{ url('admin/plugins/jqvmap/maps/jquery.vmap.usa.js?v=1'); }}"></script> -->
<!-- jQuery Knob Chart -->
<script src="{{ url('plugins/jquery-knob/jquery.knob.min.js?v=1'); }}"></script>
<!-- daterangepicker -->
<script src="{{ url('plugins/moment/moment.min.js?v=1'); }}"></script>
<script src="{{ url('plugins/daterangepicker/daterangepicker.js?v=1'); }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js?v=1'); }}"></script>
<!-- Summernote -->
<script src="{{ url('plugins/summernote/summernote-bs4.min.js?v=1'); }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js?v=1'); }}"></script>
<!-- AdminLTE App -->

<!-- FLOT CHARTS -->
<script src="{{ url('plugins/flot/jquery.flot.js'); }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ url('plugins/flot/plugins/jquery.flot.resize.js'); }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ url('plugins/flot/plugins/jquery.flot.pie.js'); }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer">

</script> 

<script src="{{ url('dist/js/adminlte.js?v=1'); }}"></script>
@include('sweetalert::alert')
<script src="{{ url('customJS/popupmodal.js'); }}"></script>
<script src="{{ url('js/changePassword.js'); }}"></script>
<script src="{{ url('plugins/select2/js/select2.min.js'); }}"></script>
<script src="{{ url('customJS/function.js'); }}"></script>
<!-- Data Table Script -->
</html>