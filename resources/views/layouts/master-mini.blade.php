<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->

  <link rel="stylesheet" href="assets/plugins/@mdi/font/css/materialdesignicons.min.css" >
  <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  @stack('plugin-styles')

  
  <link rel="stylesheet" href="css/style.css">


  @stack('style')

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
    @include('layouts.partial.script')
    @stack('custom-scripts')

