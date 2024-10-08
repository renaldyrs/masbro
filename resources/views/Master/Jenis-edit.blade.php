@extends('layouts.master')

@section('content')

<div id="content">
    <div class="row">
        <div class="col-lg-12 ">

            <div class="col-lg-4">

                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-black">Form Tambah Data Jenis</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{url('update-jenis')}}" method="POST">
                            @csrf
                            
                            @foreach ($jenis as $j )
                            <div class="form-body">

                                <div class="row p-t-20">

                                    <!-- <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Cabang</label>
                                            <select name="user_id"
                                                class="form-control @error('user_id') is-invalid @enderror">
                                                <option value="">-- Pilih Cabang --</option>

                                            </select>
                                            @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="id" value="{{ $j->id }}">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Jenis Jasa</label>
                                            <input type="text" name="jenis" value="{{ $j->jenis }}"
                                                class="form-control @error('jenis') is-invalid @enderror"
                                                placeholder="Tambahkan Jenis Jasa" autocomplete="off">

                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Berat Per-Kg</label>
                                            <input type="text" class="form-control form-control-danger" name="kg"
                                                value="1000 gram" placeholder="Berat" readonly autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Harga Per-Kg</label>
                                            <input type="text"
                                                class="form-control form-control-danger @error('harga') is-invalid @enderror format_harga"
                                                name="harga" value="{{$j->harga}}" placeholder="Harga Per-Kg"
                                                autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Lama Pengerjaan</label>
                                            <input type="number" name="hari" value="{{ $j->hari }}"
                                                class="form-control @error('hari') is-invalid @enderror"
                                                placeholder="Lama Pengerjaan" autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                                <!--/row-->

                            </div>
                            @endforeach
                            
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                    Update Data</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card card-outline-info">
                    <div class="card-header ">
                        <h4 class="m-b-0 text-black">Data Jenis</h4>
                    </div>
                    <div class="card-body">

                        <div class="table">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="1%">Jenis</th>
                                        <th width="1%">Satuan</th>
                                        <th width="1%">Harga</th>
                                        <th width="1%">Hari</th>
                                        <th width="1%">Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($jenis as $j)
                                        <tr>
                                            <td>{{$j->jenis}}</td>
                                            <td>{{$j->kg}}</td>
                                            <td>{{$j->harga}}</td>
                                            <td>{{$j->hari}}</td>
                                            <td>
                                                <a class="btn btn-danger" href="hapus-jenis/{{$j->id }}">HAPUS</a>

                                                <a class="btn btn-success" href="edit-jenis/{{$j->id}}">EDIT</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>



        </div>
    </div>

    <br>

</div>


@endsection


