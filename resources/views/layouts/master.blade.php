<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laundry MASBRO</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman-admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Laundry<sup>MASBRO</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active mb-0">
                @if (Auth::user()->role == '0')
                    <a class="nav-link" href="halaman-pemilik">
                        <i class="fas fa-landmark"></i>
                        <span>Dashboard</span></a>
                @elseif (Auth::user()->role == '1')
                    <a class="nav-link" href="halaman-admin">
                        <i class="fas fa-landmark"></i>
                        <span>Dashboard</span></a>
                @endif

            </li>

            <li class="nav-item mb-0">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="	fas fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master:</h6>
                        <a class="collapse-item" href="data-pelanggan">Pelanggan</a>
                        <a class="collapse-item" href="data-jenis">Jenis</a>
                        <a class="collapse-item" href="data-metode">Metode Pembayaran</a>
                        @if (Auth::user()->role == '0')
                            <a class="collapse-item" href="data-akun">Akun</a>
                            <a class="collapse-item" href="data-beban">Beban</a>

                        @endif
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesanan"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pesanan</span>
                </a>
                <div id="collapsePesanan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pesanan :</h6>
                        <a class="collapse-item" href="pesanan">Pesanan</a>

                        <a class="collapse-item" href="pesanan-selesai">Pesanan Selesai</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="halaman-kirim">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Pengiriman</span></a>
            </li>

            @if (Auth::user()->role == '0')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Laporan:</h6>
                            <a class="collapse-item" href="jurnal-umum">Jurnal Umum</a>
                            <a class="collapse-item" href="buku-besar">Buku Besar</a>
                            <a class="collapse-item" href="neraca-saldo">Neraca Saldo</a>
                            <a class="collapse-item" href="laporan-laba-rugi">Laporan</a>
                        </div>
                    </div>
                </li>
            @endif

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <div class="container-fluid">


                        @php
                            $pesan = DB::table('pesanan')
                                ->select('pesanan.*', 'pelanggan.*', 'pengiriman.*', 'pelanggan.nama as namapelanggan')
                                ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
                                ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
                                ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
                                ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')
                                ->where([['statuslaundry', '!=', 'Sudah Diambil'], ['statuslaundry', '!=', 'Sudah Dikirim']])
                                ->get();
                            $notifpesanan = count($pesan);

                            $proses = DB::table('pesanan')
                                ->select('pesanan.*', 'pelanggan.*', 'pengiriman.*', 'pelanggan.nama as namapelanggan')
                                ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
                                ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
                                ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
                                ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')
                                ->where('statuslaundry', 'Proses Laundry')
                                ->get();
                            $notifproses = count($proses);

                            $kirim = DB::table('pesanan')
                                ->select('pesanan.*', 'pelanggan.*', 'pengiriman.*', 'pelanggan.nama as namapelanggan')
                                ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
                                ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
                                ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
                                ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')
                                ->where('statuspengiriman', 'Siap Dikirim')
                                ->orWhere('statuspengiriman', 'Siap Diambil')
                                ->get();
                            $notifkirim = count($kirim);

                            $pesanan = DB::table('pesanan')
                                ->select('pesanan.*', 'pelanggan.*', 'pengiriman.*', 'pelanggan.nama as namapelanggan')
                                ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
                                ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
                                ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
                                ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')
                                ->where('statuspembayaran', 'Belum Bayar')
                                ->orderBy('pesanan.kode_pesanan', 'ASC')
                                ->get();

                            $notifbelum = count($pesanan);   

                        @endphp
                        <ul class="navbar-nav ml-auto">
                            <!-- Alert Belum Bayar -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-money-bill-wave fa-fw"></i>

                                    <span class="badge badge-danger badge-counter">{{ $notifbelum }}</span>
                                </a>

                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Belum Bayar
                                    </h6>

                                    @foreach ($pesanan as $p)
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{url('update-pesanan/' . $p->kode_pesanan)}}"
                                            onclick="return confirm('Apakah anda yakin sudah dibayar ?');">

                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-money-bill-wave text-white"></i>
                                                </div>
                                            </div>
                                            <div class="mr-3">

                                                <div class=" font-weight-bold">{{$p->kode_pesanan}}</div>
                                                <div class=" font-weight-bold">{{$p->namapelanggan}}</div>
                                                <div class=" font-weight-bold">Total yang harus dibayar: {{$p->total}}</div>

                                            </div>

                                        </a>
                                    @endforeach

                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                        Alerts</a>
                                </div>
                            </li>

                            <!-- Alert Proses Laundry -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-clock fa-fw"></i>

                                    <span class="badge badge-danger badge-counter">{{ $notifproses }}</span>
                                </a>

                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Proses Laundry
                                    </h6>

                                    @foreach ($proses as $p)
                                        <a class="dropdown-item d-flex align-items-center" href=""
                                            onclick="return confirm('Apakah anda yakin sudah dibayar ?');">

                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fa fa-clock text-white"></i>
                                                </div>
                                            </div>
                                            <div class="mr-3">

                                                <div class=" font-weight-bold">{{$p->kode_pesanan}}</div>
                                                <div class=" font-weight-bold">{{$p->namapelanggan}}</div>
                                                <div class=" font-weight-bold">Status laundry : {{$p->statuslaundry}}</div>

                                            </div>

                                        </a>
                                    @endforeach

                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                        Alerts</a>
                                </div>
                            </li>

                            <!-- Alert Pesanan Laundry -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-shopping-cart fa-fw"></i>

                                    <span class="badge badge-danger badge-counter">{{ $notifpesanan }}</span>
                                </a>

                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Pesanan Laundry
                                    </h6>

                                    @foreach ($pesan as $p)
                                        <a class="dropdown-item d-flex align-items-center" href=""
                                            onclick="return confirm('Apakah anda yakin sudah dibayar ?');">

                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fa fa-shopping-cart text-white"></i>
                                                </div>
                                            </div>
                                            <div class="mr-3">

                                                <div class=" font-weight-bold">{{$p->kode_pesanan}}</div>
                                                <div class=" font-weight-bold">{{$p->namapelanggan}}</div>
                                                <div class=" font-weight-bold">Status laundry : {{$p->statuslaundry}}</div>


                                            </div>

                                        </a>
                                    @endforeach

                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                        Alerts</a>
                                </div>
                            </li>

                            <!-- Alert Sudah Siap Ambil Dan Kirim -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-shipping-fast fa-fw"></i>

                                    <span class="badge badge-danger badge-counter">{{ $notifkirim }}</span>
                                </a>

                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Perlu Dikirim dan diambil
                                    </h6>

                                    @foreach ($kirim as $k)
                                        <a class="dropdown-item d-flex align-items-center" href=""
                                            onclick="return confirm('Apakah anda yakin sudah dibayar ?');">

                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fa fa-shipping-fast text-white"></i>
                                                </div>
                                            </div>
                                            <div class="mr-3">

                                                <div class=" font-weight-bold">{{$k->kode_pesanan}}</div>
                                                <div class=" font-weight-bold">{{$k->namapelanggan}}</div>
                                                <div class=" font-weight-bold">Status laundry : {{$k->statuslaundry}}</div>

                                            </div>

                                        </a>
                                    @endforeach

                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                        Alerts</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown no-arrow">

                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" data-target="#collapseMenu"
                                    aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome,
                                        {{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="assets/images/faces/face8.jpg">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">

                                    <a class="dropdown-item" href="logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
<style>
    .badge:after {
        content: attr(value);
        font-size: 12px;
        color: #fff;
        border-radius: 50%;
        left: -8px;
        top: -10px;
        opacity: 0.9;
    }

    .card-header {
        height: 2.7rem;

    }

    .card-body {
        margin-top: -0.6rem;
        margin-bottom: -1.5rem;
    }

    .card-footer {
        text-align: center;
        border-top: none;
        margin-bottom: -0.5rem;
    }
</style>

</html>