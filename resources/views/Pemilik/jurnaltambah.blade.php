@extends('layouts.master')
@section('content')


<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<div class="container main">

    <div class="col-md-12">

        <div class="card card-outline-info">
            <div class="card-header">


                <h4 class="m-b-0 ">
                    Input Data
                    <a href="{{url('tambah-pesanan')}}" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#ModalPesanan">Tambah</a>
                </h4>
            </div>

            <div class="card-body">



                {!! Form::open(['url' => 'simpan-jurnal', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="name">Waktu</label>
                            {!! Form::date('waktu_transaksi', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="name">Akun</label>

                            {!! Form::select('id_akun', $daftar_akun, null, ['class' => 'form-control', 'placeholder' => '-- Daftar Akun --']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="name">Tipe</label>

                        <select name="tipe" class="form-control">
                            <option>-- TIPE --</option>
                            <option value="d">DEBET</option>
                            <option value="k">KREDIT</option>
                        </select>

                    </div>

                    <div class="form-group col-lg-6">
                        <label for="name">Nominal Rp.</label>

                        {!! Form::number('nominal', null, ['class' => 'form-control']) !!}

                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-md-3 control-label" for="name">Keterangan</label>
                    <div class="col-lg-12">
                        {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 widget-right">
                        <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                    </div>
                </div>
                {!! Form::close() !!}

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