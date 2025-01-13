<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Pesanan</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Untuk load bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4
        }

        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 ">

    <div class="card-body">
        <div class="row">
            <div class="col-2" style="">
                <img src="{{asset('/assets/images/MABRO.png')}}" alt="" style="width: 6rem">

            </div>

            <div class="col-8" style="text-align: center">
                <H4><strong>Laporan Pesanan MASBRO</strong> </H4>
                <h6><strong>Periode : {{ $periode }}</strong></h6>
            </div>
            <div class="col-2">
                <br>
                <h6><strong>{{ date('d F Y')}}</strong></h6>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-3">
                <h5>Pendapatan</h5>
            </div>
            <div class="col-md-1.5">
                <h5>Cuci Basah</h5>
                <h5>Cuci Kering</h5>
                <h5>Cuci Setrika</h5>
                <h5>Setrika</h5>
                <h5>Karpet</h5>
            </div>
            <div class="col-md-1.5">
                <h5>: {{$cucibasah}}</h5>
                <h5>: {{$cucikering}}</h5>
                <h5>: {{$cucisetrika}}</h5>
                <h5>: {{$setrika}}</h5>
                <h5>: {{$karpet}}</h5>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-2">
                <h5>Jumlah</h5>
            </div>
            <div class="col-md-1.5">
                <h5>Cuci Basah</h5>
                <h5>Cuci Kering</h5>
                <h5>Cuci Setrika</h5>
                <h5>Setrika</h5>
                <h5>Karpet</h5>
            </div>
            <div class="col-md-1">
                <h5>: {{$countcucibasah}}</h5>
                <h5>: {{$countcucikering}}</h5>
                <h5>: {{$countcucisetrika}}</h5>
                <h5>: {{$countsetrika}}</h5>
                <h5>: {{$countkarpet}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h5>Total Pendapatan </h5>
            </div>
            <div class="col-md-3">
                <h5>: {{$pendapatan}}</h5>
            </div>
            <div class="col-md-4">
                <h5>Total Pesanan </h5>
            </div>
            <div class="col-md-1">
                <h5>: {{$countpesanan}}</h5>
            </div>
        </div>
        <h5>Pesanan Kirim : {{$countkirim}}</h5>
        <h5>Pesanan Ambil : {{$countambil}}</h5>
        <hr>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-7">
            </div>
            <div class="col-3" style="text-align: center">
                <br>
                Mengetahui
                <br>
                <br>
                <br>
                <strong>{{Auth::user()->name}}</strong>
                <strong>
                    <hr>
                </strong>
            </div>
        </div>
    </div>
</body>

</html>