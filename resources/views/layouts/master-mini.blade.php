<!DOCTYPE html>
<html>
<head>
  <title>Laundry MASBRO</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->

  <link rel="stylesheet" href="assets/plugins/@mdi/font/css/materialdesignicons.min.css" >
  <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- end plugin css -->

  <!-- plugin css -->
  @stack('plugin-styles')
  <!-- end plugin css -->

  <!-- common css -->
  
  <link rel="stylesheet" href="css/style.css">
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      @yield('content')
    </div>
  </div>

    <!-- base js -->
   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    @stack('custom-scripts')
</body>
</html>