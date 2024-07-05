@extends('layouts.master-pemilik')
@section('content')

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">


                <h4 class="m-b-0 ">
                    Data Jurnal Umum
                    <a href="{{ url("tambah-jurnal") }}" class="btn btn-primary float-right">Tambah</a>
                </h4>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Detail Jurnal Umum
                                <a href="{{ url('jurnal-umum/create') }}" class="btn btn-primary pull-right">Tambah</a>
                            </div>
                            <div class="panel-body">
                                <h4 class="pull-left">Total Data : <strong>{{ $total_jurnal }}</strong> </h4>
                                <h4 class="pull-right">Periode : <strong>{{ $periode }}</strong> </h4>
                                <table class="table table-striped text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Waktu</th>
                                        <th class="text-center">Akun</th>
                                        <th class="text-center">Debet</th>
                                        <th class="text-center">Kredit</th>
                                        <th class="text-center">Action</th>
                                    </tr>
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
                                                {!! Form::open(['url' => 'jurnal-umum/' . $data->id, 'method' => 'delete', 'class' => 'form', 'style' => 'display:inline-block']) !!}
                                                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <th colspan="3" class="text-center">TOTAL</th>
                                        <th class="text-center">Rp. {{ number_format($total_debet, 0, ',', '.') }},-
                                        </th>
                                        <th class="text-center">Rp. {{ number_format($total_kredit, 0, ',', '.') }},-
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
                                        <th colspan="3" class="text-center">TERBILANG</th>
                                        <th class="text-center"> 'terbilang'<em> {{ ($total_debet)}} Rupiah</em>
                                        </th>
                                        <th class="text-center"> 'terbilang' <em>{{($total_kredit) }}
                                                Rupiah</em></th>
                                    </tr>

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
@section('script')
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
@endsection
@push('scripts')
    @include('layouts.partial.script')
@endpush