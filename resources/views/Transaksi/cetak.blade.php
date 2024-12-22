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
        <div class="text-center">
            <h4><strong>Laundry MASBRO</strong></h4>
            <h4><strong>Laporan Pesanan</strong></h4>
            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td>
                        <h6><strong>Periode : {{ $periode }}</strong></h6>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <h5>{{ Auth::user()->name }}</h5>
                    </td>
                </tr>
            </table>


            <hr>

        </div>
        <div class="table-responsive">

            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                <thead>


                </thead>
                <tbody>
                    <tr>
                        <th>Pendapatan Laundry</th>
                        <td>Cuci Basah
                            <br>
                            Cuci Kering
                            <br>
                            Cuci Setrika
                            <br>
                            Setrika
                            <br>
                            Karpet
                        </td>
                        <td>
                            : {{$cucibasah}}
                            <br>
                            : {{$cucikering}}
                            <br>
                            : {{$cucisetrika}}
                            <br>
                            : {{$setrika}}
                            <br>
                            : {{$karpet}}

                        </td>
                        <th>Jumlah</th>
                        <td>Cuci Basah
                            <br>
                            Cuci Kering
                            <br>
                            Cuci Setrika
                            <br>
                            Setrika
                            <br>
                            Karpet
                        </td>
                        <td>
                            : {{$countcucibasah}}
                            <br>
                            : {{$countcucikering}}
                            <br>

                            : {{$countcucisetrika}}
                            <br>
                            : {{$countsetrika}}
                            <br>
                            : {{$countkarpet}}
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <hr>
                        </td>
                        <td>
                            <hr>
                        </td>
                        <td></td>
                        <td>
                            <hr>
                        </td>
                        <td>
                            <hr>
                        </td>
                        <th></th>
                    </tr>

                    <tr>
                        <th>Total Pendapatan</th>
                        <td></td>
                        <th class="text-center">: {{$pendapatan}}</th>
                        <th>Total Pesanan</th>
                        <td></td>
                        <th>: {{$countpesanan}}</th>
                    </tr>

                    <tr>
                        <th>Pesanan Kirim : {{$countkirim}}
                            <br>
                            Pesanan Ambil : {{$countambil}}
                        </th>
                    </tr>
                </tbody>


        </div>
    </div>


    </table>
    </div>



</body>

</html>