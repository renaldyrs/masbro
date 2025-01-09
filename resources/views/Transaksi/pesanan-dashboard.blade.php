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


<div class="" style="margin-left: 10%; margin-right: 10%; margin-bottom: 10px;">
    <div class="row">

        <!-- Laundry Per-Hari -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-auto py-2">
                <?php
$tgl1 = date('D', strtotime(date("Y-m-d")));

switch ($tgl1) {
    case 'Sun':
        $hariii = 'Minggu';
        break;
    case 'Mon':
        $hariii = 'Senin';
        break;
    case 'Tue':
        $hariii = 'Selasa';
        break;
    case 'Wed':
        $hariii = 'Rabu';
        break;
    case 'Thu':
        $hariii = 'Kamis';
        break;
    case 'Fri':
        $hariii = 'Jumat';
        break;
    case 'Sat':
        $hariii = 'Sabtu';
        break;
}
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
                                Laundry Per-Hari (<?php echo $hariii?>)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pendapatan Laundry Per-Hari -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-auto py-2">
                <?php
$totalpendapatan = DB::table('pesanan')->where('tgltransaksi', date("Y-m-d"))->sum('total');

            ?>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pendapatan Per-Hari (<?php echo $hariii?>)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalpendapatan?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Berat Laundry Per-Hari -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-auto py-2">
                <?php
$berat = DB::table('pesanan')->where('tgltransaksi', date("Y-m-d"))->sum('jumlah');

            ?>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Berat Laundry Per-Hari (<?php echo $hariii?>)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $berat?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pendapatan Laundry Per-Hari -->
        <div class="col-xl-3">
            <div class="card border-left-primary shadow h-auto py-2">
                <?php

$jenis = DB::table('jenis')->get();
            ?>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jenis Laundry Per-Hari (<?php echo $hariii?>)</div>
                            @foreach ($jenis as $j)
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php    echo "- " . $j->jenis?>
                                                            <?php 
                                                                                                                                                                                                                                                                                                                                                                                            $totalpendapatan = DB::table('pesanan')->where('id_jenis', $j->id)->where('tgltransaksi', date("Y-m-d"))->sum('total');
                                echo " : " . $totalpendapatan?>
                                                        </div>
                            @endforeach


                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="text-center ">
    <h3>Pesanan Perhari</h3>
</div>

<div class="card" style="margin-bottom: 20px">
    <div class="table-responsive-sm " style="margin-left: 15px; margin-right: 15px">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Pesanan</th>
                    <th>Jumlah /KG</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
$totalpendapatan = DB::table('pesanan')->where('tgltransaksi', date("Y-m-d"))->sum('total');
                
                ?>
                @foreach ($pesanan as $p)

                                <?php 
                                                                                                    $tgl = date('D', strtotime($p->tgltransaksi));
                    $totalpendapatan = DB::table('pesanan')->where('tgltransaksi', 'like', $p->tgltransaksi)->sum('total');
                    $kg = DB::table('pesanan')->where('tgltransaksi', 'like', $p->tgltransaksi)->sum('jumlah');
                    $count = DB::table('pesanan')->select('tgltransaksi')->where('tgltransaksi', 'like', $p->tgltransaksi)->count();

                    switch ($tgl) {
                        case 'Sun':
                            $harii = 'Minggu';
                            break;
                        case 'Mon':
                            $harii = 'Senin';
                            break;
                        case 'Tue':
                            $harii = 'Selasa';
                            break;
                        case 'Wed':
                            $harii = 'Rabu';
                            break;
                        case 'Thu':
                            $harii = 'Kamis';
                            break;
                        case 'Fri':
                            $harii = 'Jumat';
                            break;
                        case 'Sat':
                            $harii = 'Sabtu';
                            break;
                    } 

                                    ?>

                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$p->tgltransaksi}}</td>
                                    <td>{{$harii}}</td>
                                    <td>{{$count}}</td>
                                    <td>{{$kg}} KG</td>
                                    <td>{{$totalpendapatan}}</td>
                                    <td>
                                        <a href=""><i class="fas fa-eye"></i></a>
                                        <a data-toggle="modal" id="smallButton" data-target="#mediumModal" data-attr="" title="show">
                                            <i class="fas fa-eye text-success  fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

</div>
<!-- medium modal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">
                <div>
                    <header>Pesanan Hari {{$p->tgltransaksi}}</header>
                    <table>
                         
                    </table>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // display a modal (medium modal)
    $(document).on('click', '#mediumButton', function (event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            // return the result
            success: function (result) {
                $('#mediumModal').modal("show");
                $('#mediumBody').html(result).show();
            },
            complete: function () {
                $('#loader').hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });
</script>

@endsection