<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Laba Rugi Laundry</title>

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
        
        
        <div class="table-responsive">

            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pendapatan</th>
                        <th></th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>Pendapatan Laundry</td>
                        <td class="text-center">{{$pendapatan}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <hr>
                        </td>
                        <th></th>
                    </tr>

                    <tr>
                        <th>Total Pendapatan</th>
                        <td></td>
                        <th class="text-center">{{$total_pendapatan}}</th>
                    </tr>



                    <tr>
                        <th>Beban</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <tr>
                        <td>Gaji Pegawai</td>
                        <td class="text-center">{{$beban_gaji}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Beban Listrik </td>
                        <td class="text-center">{{$beban_listrik}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Beban Air</td>
                        <td class="text-center">{{$beban_air}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <hr>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Total Beban</th>
                        <td></td>
                        <th class="text-center">{{$total_beban}}</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <th>Laba Bersih</th>
                        <td></td>
                        <th class="text-center">{{$laba_bersih}}</th>
                    </tr>

                </tbody>


        </div>
    </div>


    </table>
    </div>
</body>

</html>