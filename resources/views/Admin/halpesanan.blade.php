@extends('layouts.admin')
@section('content')
@include('layouts.partial.sidebar_admin')

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="js/bootstrap-datepicker.id.js"></script>
    <link rel="stylesheet" href="css/datepicker.css">
</head>

<div id="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">


            <div class="col-lg-12">


                <form action="/data-pelanggan/tambah" method="post">
                    {{ csrf_field() }}

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Kode Transaksi</label>
                        <input type="text" class="form-control" name="nama" id="nama" required="required"
                            placeholder="Nama">
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required="required"
                            placeholder="Alamat">
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" required="required"
                            placeholder="No HP">
                    </div>

                    <div class="col-md-2">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="nohp" id="nohp" required="required"
                            placeholder="No HP">
                    </div>

                    <div class="col-md-2">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="nohp" id="nohp" required="required"
                            placeholder="No HP">
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" required="required"
                            placeholder="No HP">
                    </div>


                    <div class="col-md-4 mt-4">
                        <button type="submit" class="btn btn-primary">Simpan data</button>
                    </div>

                </form>

                <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th width="1%">No Transaksi</th>
                            <th width="1%">Alamat</th>
                            <th width="1%">No HP</th>
                            <th width="1%">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
</div>
</div>
</div>
            <script type="text/javascript">
                $(function () {
                    $(".datepicker").datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                });
            </script>

            <script type="text/javascript">
                $(function () {
                    $(".datepicker").datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                });
            </script>

            <script>
                $(function () {
                    $("#date").datepicker({
                        dateFormat: "yy-mm-dd"
                    });
                });
            </script>

            @endsection
            @push('scripts')
                @include('layouts.partial.script')
            @endpush