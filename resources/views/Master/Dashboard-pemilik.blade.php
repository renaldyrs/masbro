@extends('layouts.master')

@section('content')

@if(Session::has('alert'))

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>

@endif

<div class="row">

    <!-- Laundry Per-Hari -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <?php
$hari = DB::table('pesanan')->where('tgltransaksi', date("Y-m-d"))->get();

$count = 0;
foreach ($hari as $h) {
    $count++;
}
            ?>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laundry Per-Hari (<?php echo date('l')?>)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Proses Laundry -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <?php
$hari = DB::table('pesanan')
    ->where('statuslaundry', 'Proses Laundry')->get();

$count = 0;
foreach ($hari as $h) {
    $count++;
}
            ?>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Proses Laundry </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-sync fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Laundry Sudah Dikirim -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <?php
$hari = DB::table('pesanan')
    ->where('statuslaundry', 'Sudah Dikirim')->get();

$count = 0;
foreach ($hari as $h) {
    $count++;
}
            ?>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laundry Sudah Dikirim </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Laundry Per-Bulan  -->
    <div class="col-xl-3 col-md-4 mb-4">
        <?php
$hari = DB::table('pesanan')->whereMonth('tgltransaksi', date("m"))->get();
$count = 0;
foreach ($hari as $h) {
    $count++;
}
        ?>
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Laundry Per-Bulan (<?php echo date('F')?>)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pendapatan Perhari -->
    <div class="col-xl-3 col-md-4 mb-4">
        <?php
$pendapatan = DB::table('pesanan')->where('tgltransaksi', date("Y-m-d"))->get();
$totalhari = 0;
foreach ($pendapatan as $p) {
    $totalhari += $p->total;
}

        ?>
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pendapatan Per-Hari
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">

                            </div>
                            <div class="col">

                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalhari  ?> </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- laundry Sudah diambil -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <?php
$hari = DB::table('pesanan')
    ->where('statuslaundry', 'Sudah Diambil')->get();

$count = 0;
foreach ($hari as $h) {
    $count++;
}
            ?>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laundry Sudah diambil</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pendatapatan Perbulan -->
    <div class="col-xl-3 col-md-4 mb-4">
        <?php
$pendapatan = DB::table('pesanan')->whereMonth('tgltransaksi', date("m"))->whereYear('tgltransaksi', date("Y"))->get();
$totalhari = 0;
foreach ($pendapatan as $p) {
    $totalhari += $p->total;
}
        ?>
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pendapatan Per-Bulan (<?php echo date('F')?>)</div>
                        <div class="col">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalhari  ?></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <!-- Chart Laundry Setiap Bulan -->
    <div class="col-xl-6 col-lg-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Laundry Setiap Bulan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card">

                {!! $chart->container() !!}

            </div>
        </div>
    </div>

    <!-- Chart Pendatapatan setiap Bulan -->
    <div class="col-xl-6 col-lg-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pendapatan Setiap Bulan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card">
                {!! $chart2->container() !!}
            </div>
        </div>
    </div>

</div>

<script src="{{ $chart->cdn() }}"></script>
<script src="{{ $chart2->cdn() }}"></script>

{{ $chart->script() }}
{{ $chart2->script() }}

@endsection