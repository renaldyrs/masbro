@extends('layouts.master')
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

                <div class="text-center">
                    <div class="col-lg-12">
                        {!! Form::open(['url' => 'jurnal-umum/cari', 'method' => 'get', 'class' => 'form-inline text-center']) !!}

                        <div class="col-lg-4">
                            <label>Bulan</label>
                            {!! Form::selectMonth('bulan', null, ['class' => 'form-control', 'placeholder' => '-- Bulan --']) !!}

                        </div>

                        <div class="col-lg-2">
                            <label>Tahun</label>
                            {!! Form::selectRange('tahun', 2018, 2050, null, ['class' => 'form-control', 'placeholder' => '-- Tahun --']) !!}

                        </div>

                        <div class="col-lg-">

                            <button type="submit" class="btn btn-primary form-control" class="">Filter</button>
                        </div>
                        {!! Form::close() !!}
                        <br>
                    </div>
                </div>

                <div class="table-responsive m-t-0">
                    
                    <h4>Total Data : <strong>{{ $total_jurnal }}</strong> </h4>
                  
                    
                    <table class="table table-striped text-center">
                        <thead>
                            <h3 class="text-center"> <strong>DAFTAR JURNAL UMUM</strong></h3>

                        </thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php $i = 1 ?>
                        @foreach($daftar_jurnal as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ date('F Y', strtotime('1-' . $data->waktu)) }}</td>
                                <td>
                                    <a href="{{ url('jurnal-umum/detail/' . date('Y-m-d', strtotime('1-' . $data->waktu))) }}"
                                        class="btn btn-info">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
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