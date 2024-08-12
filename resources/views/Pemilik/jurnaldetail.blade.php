@extends('layouts.master')
@section('content')
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">

                <div class="d-flex justify-content-between">
                    <h4 class="m-b-0 "> Data Jurnal Umum</h4>
                    <button onclick="history_back()" class="btn-secondary btn-sm ">Kembali</button>
                </div>


            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading d-flex justify-content-between">

                                Detail Jurnal Umum
                                <a href="{{ url('jurnal-umum/create') }}" class="btn btn-primary ">Tambah</a>
                            </div>
                            <div class="panel-body">
                                <h4 class="pull-left">Total Data : <strong>{{ $total_jurnal }}</strong> </h4>
                                <h4 class="pull-right">Periode : <strong>{{ $periode }}</strong> </h4>
                                <table class="table table-light text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Waktu</th>
                                            <th class="text-center">Akun</th>
                                            <th class="text-center">Debet</th>
                                            <th class="text-center">Kredit</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php $i = 1 ?>
                                        @foreach($daftar_jurnal as $data)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->waktu_transaksi }}</td>
                                                <td>{{ $data->akun->nama_akun }}</td>
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
                                                <td>
                                                    <a href="{{ url('jurnal-umum/' . $data->id . '/edit') }}"
                                                        class="btn btn-info">EDIT</a>
                                                    <a href="hapus/{{ $data->id }}" class="btn btn-danger">HAPUS</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <thead class="table-dark">
                                        <tr>
                                            <th colspan="3" class="text-center">TOTAL</th>
                                            <th class="text-center">Rp. {{ number_format($total_debet, 0, ',', '.') }},-
                                            </th>
                                            <th class="text-center">Rp.
                                                {{ number_format($total_kredit, 0, ',', '.') }},-
                                            </th>

                                            @if($total_debet === $total_kredit)
                                                <th class="text-center alert alert-success">
                                                    BALANCE
                                                </th>
                                            @else
                                                <th class="text-center alert alert-danger">
                                                    NOT BALANCE
                                                </th>
                                            @endif
                                        </tr>

                                        <tr>
                                            {{Config::set('terbilang.locale', 'id')}}
                                            <th colspan="3" class="text-center">TERBILANG</th>
                                            <th class="text-center"> <em> {{ ucwords(Terbilang::make($total_debet))}}
                                                    Rupiah</em>
                                            </th>
                                            <th class="text-center"> <em>{{ucwords(Terbilang::make($total_kredit))}}
                                                    Rupiah</em>
                                            </th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection

@include('layouts.partial.script')
<script>
    function history_back() {
        window.history.back();
    } 
</script>
