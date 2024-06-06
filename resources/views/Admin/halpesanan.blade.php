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


                <form action="/pesanan/tambah" method="post">
                    {{ csrf_field() }}

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
                        <select name="" id="" class="form-select" required="required">
                            <option >Nama Pelanggan</option>
                            @foreach ($pelanggan as $p)
                                <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Jenis</label>
                        <select name="" id="" class="form-select" required="required">
                            <option >Nama Pelanggan</option>
                            @foreach ($jenis as $j)
                                <option value="{{$j->id}}">{{$j->jenis}}</option>
                            @endforeach

                        </select>
                        
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Jasa</label>
                        <input type="text" class="form-control" name="jasa" required="required" placeholder="jasa">
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" required="required" placeholder="jumlah">
                    </div>

                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Total</label>
                        <input type="text" class="form-control" name="total" required="required" placeholder="total">
                    </div>

                    <div class="col-md-2">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="" id="tglmasuk" required="required"
                            placeholder="No HP">
                    </div>

                    <div class="col-md-2">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="" id="tglselesai" required="required"
                            placeholder="No HP">
                    </div>



                    <div class="col-md-4 mt-4">
                        <button type="submit" class="btn btn-primary">Simpan data</button>
                    </div>

                </form>

                <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th width="1%">kode pesanan</th>
                            <th width="1%">nama pelanggan</th>
                            <th width="1%">jenis</th>
                            <th width="1%">jasa</th>
                            <th width="1%">Jumlah</th>
                            <th width="1%">Total</th>
                            <th width="1%">tglmasuk</th>
                            <th width="1%">tglselesai</th>
                            <th width="1%">aksi</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($pesanan as $p)

                            <tr>
                                <td>{{ $p->kode_pesanan }}</td>
                                <td>{{ $p->nama_pelanggan }}</td>
                                <td>{{ $p->jenis }}</td>
                                <td>{{ $p->jasa }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->total }}</td>
                                <td>{{ $p->tglmasuk }}</td>
                                <td>{{ $p->tglselesai }}</td>
                                <td>
                                    <a class="btn btn-danger" href="/pesanan/hapus/{{ $p->id_pesanan }}">HAPUS</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    @include('layouts.partial.script')
@endpush