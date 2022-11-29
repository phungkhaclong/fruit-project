<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('../admin123')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{url('../admin123')}}/dist/css/adminlte.min.css">
  <!-- <link rel="stylesheet" href="{{url('../admin123')}}/dist/css/adminlte.css"> -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
  <style>
    .select2-selection__choice__display {
      background-color: blue !important;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('admin.pastial.header')
    <!-- /.navbar -->
    @include('admin.pastial.sidebar_menu')

    @yield('contentt')

    @include('admin.pastial.footer')

  </div>

  <!-- jQuery -->
  <script src="{{url('../admin123')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{url('../admin123')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{url('../admin123')}}/dist/js/adminlte.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @yield('jsadmin')
</body>

</html>