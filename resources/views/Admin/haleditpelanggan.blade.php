@extends('layouts.master')



@section('content')
@if(Session::has('alert'))

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>

@endif
<div>
    <div class="row">
        <div class="col-lg-12 ">

            <div class="col-lg-4">

                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-black">Form Tambah Data Pelanggan</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{url('update-pelanggan')}}" method="POST">
                            @csrf
                            @foreach ($pelanggan as $p)
                            <div class="form-body">

                                <div class="row p-t-20">
                                    <input type="hidden" name="id" value="{{$p->id}}">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Nama Pelanggan</label>
                                            <input type="text" name="nama" value="{{$p->nama}}" class="form-control"
                                                placeholder="Tambahkan Nama Pelanggan" autocomplete="off">

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Alamat Pelanggan</label>
                                            <input type="text" class="form-control " name="alamat"
                                                value="{{$p->alamat}}" placeholder="Tambahkan Alamat Pelanggan" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">No Hp</label>
                                            <input type="text"
                                                class="form-control "
                                                name="nohp" value="{{$p->nohp}}" placeholder="Tambahkan No HP" autocomplete="off">

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Jenis Kelamin</label>
                                            <select name="kelamin"
                                                class="form-control ">
                                                <option value="{{$p->kelamin}}">{{$p->kelamin}}</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>

                                            </select>

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

        </div>
    </div>

    <br>

</div>


@endsection
