@extends('layouts.master-pemilik')


@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        Detail Buku Besar
                        <button onclick="history_back()" class="btn-secondary btn-sm">Kembali</button>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between">
                            <h4 class="text">Nama Akun : <strong>{{ $akun->nama_akun }}</strong> </h4>
                            <h4 class="text">Kode Akun : <strong>{{ $akun->kode_akun }}</strong> </h4>
                        </div>

                        <h4 class="text-center">Periode : <strong>{{ $periode }}</strong> </h4>
                        <table class="table text-center">
                            <thead>
                                <th class="text-center" colspan="3">Transaksi</th>
                                <th class="text-center" colspan="2">Saldo</th>
                            </thead>

                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Waktu Transaksi</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Debet</th>
                                    <th class="text-center">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 ?>
                        @foreach($daftar_buku as $data)
                          <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $data->waktu_transaksi }}</td>
                            <td class="text-center">{{ $data->keterangan }}</td>
                            <td>
                            @if($data->tipe === 'd')
                              Rp. {{ number_format($data->nominal, 0, ',', '.') }},-
                            @else
                              -
                            @endif
                            </td>
                            <td>
                            @if($data->tipe === 'k')
                              Rp. {{ number_format($data->nominal, 0, ',', '.') }},-
                            @else
                              -
                            @endif
                            </td>
                          </tr>
                        @endforeach

                        <tr>
                          <th colspan="3" class="text-center table-dark">Jumlah</th>
                          <th class="text-center table-dark">Rp. {{ number_format($total_debet, 0, ',', '.') }},-</th>
                            <th class="text-center table-dark">Rp. {{ number_format($total_kredit, 0, ',', '.') }},-</th>
                        </tr>

                        <tr>
                            <th colspan="3" class="text-center table-dark">Saldo</th>
                            <th colspan="2" class="text-center table-dark">
                            @if(substr($akun->kode_akun, 0, 1) === '1' ||  substr($akun->kode_akun, 0, 1) === '4' )
                            
                            Rp. {{ number_format($total_debet - $total_kredit, 0, ',', '.') }},-
                            
                            @elseif(substr($akun->kode_akun, 0, 1) === '2' ||  substr($akun->kode_akun, 0, 1) === '3' || substr($akun->kode_akun, 0, 1) === '5' )
                            
                            Rp. {{ number_format($total_kredit - $total_debet, 0, ',', '.') }},-
                            
                            @endif
                            </th>
                        </tr>

                        <tr>
                            <th colspan="3" class="text-center table-dark">Terbilang</th>
                            <th colspan="2" class="text-center table-dark">
                            <em>
                            {{Config::set('terbilang.locale', 'id')}}
                            @if(substr($akun->kode_akun, 0, 1) === '1' ||  substr($akun->kode_akun, 0, 1) === '4')
                            {{ ucwords(Terbilang::make($total_debet - $total_kredit,' rupiah')) }}
                            @elseif(substr($akun->kode_akun, 0, 1) === '2' ||  substr($akun->kode_akun, 0, 1) === '3' || substr($akun->kode_akun, 0, 1) === '5')
                             {{ ucwords(Terbilang::make($total_kredit - $total_debet)) }}
                            @endif
                            </em>
                            </th>
                        </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection

<script>
    function history_back() {
        window.history.back();
    } 
</script>