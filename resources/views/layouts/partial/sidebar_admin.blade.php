<head>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>


<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand" href="Admin/halaman-admin">Laundry MASBRO</a>
                <ul class="nav navbar-nav ml-auto">

                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">Data</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="data-pelanggan">Data Pelanggan</a></li>
                                    <li><a class="dropdown-item" href="data-jenis">Data Jenis</a></li>
                                    <li><a class="dropdown-item" href="data-beban">Data Beban</a></li>
                                    <li><a class="dropdown-item" href="data-metode">Data Metode</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">Pesanan</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="pesanan">Pesanan</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">Laporan</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Link</a></li>
                                </ul>
                            </li>
                        
                        </ul>
                    </div>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Selamat datang Admin, </a>
                    </li>
                    <li class="nav-item active">

                        <a class="dropdown-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off mr-3 ml-1"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Bootstrap core JavaScript-->
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

</body>