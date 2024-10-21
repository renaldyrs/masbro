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

        div1{
            text-align: center;
        }
        td{
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card-body">
        <div1 class="text-center">
            <h4>Laundry Masbro</h4>
            <h4>Neraca Saldo</h4>
            <h5>Periode : {{ $periode }}</h5>
        </div1>
        <table class="table text-center">

            <tr>
                
                <th class="text-center">Akun</th>
                <th class="text-center">Debet</th>
                <th class="text-center">Kredit</th>
            </tr>

            <?php $i = 1 ?>
            @foreach($data as $item)

                <tr>
                    
                    <td style="text-align: left;">{{ $item['nama_akun'] }}</td>
                    <td class="text-center">Rp. {{ number_format($item['debet'], 0, ',', '.') }},-</td>
                    <td class="text-center">Rp. {{ number_format($item['kredit'], 0, ',', '.') }},-</td>
                </tr>

            @endforeach

            <tr>
                <th class="text-center">Total</th>
                <th class="text-center">Rp. {{ number_format($total_saldo_debet, 0, ',', '.') }},-</th>
                <th class="text-center">Rp. {{ number_format($total_saldo_kredit, 0, ',', '.') }},-</th>
            </tr>

            <tr>
                {{Config::set('terbilang.locale', 'id')}}
                <th class="text-center">TERBILANG</th>
                <th class="text-center"> <em> {{ ucwords(Terbilang::make($total_saldo_debet)) }} Rupiah</em> </th>
                <th class="text-center"> <em> {{ ucwords(Terbilang::make($total_saldo_kredit)) }} Rupiah</em></th>
            </tr>

        </table>
    </div>
</body>