@extends('layouts.master')

@push('plugin-styles')

    <style src="{{asset('/assets/plugins/plugin.css')}}"></style>
@endpush

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

<div id="content">
    <div class="d-flex">
        

            <div class="col-4 p-2">

                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-black">Form Tambah Data Pelanggan</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{url('tambah-pelanggan')}}" method="POST">
                            @csrf
                            <div class="form-body">

                                <div class="row p-t-20">

                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Nama Pelanggan</label>
                                            <input type="text" name="nama" value=""
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Tambahkan Nama Pelanggan" autocomplete="off">

                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Alamat Pelanggan</label>
                                            <input type="text" class="form-control form-control-danger" name="alamat"
                                                value="" placeholder="Tambahkan Alamat Pelanggan"  autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">No Hp</label>
                                            <input type="text"
                                                class="form-control form-control-danger @error('harga') is-invalid @enderror format_harga"
                                                name="nohp" value="" placeholder="Tambahkan No HP"
                                                autocomplete="off">

                                        </div>
                                    </div>

									<div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Jenis Kelamin</label>
                                            <select name="kelamin"
                                                class="form-control @error('user_id') is-invalid @enderror">
                                                <option value="">-- Jenis Kelamin --</option>
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>

                                            </select>
                
                                        </div>
                                    </div>

                                    
                                </div>
                                <!--/row-->

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                    Tambah Data</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>



                        </form>
                    </div>
                </div>

            </div>

            <div class="col-8 p-2">
                <div class="card card-outline-info">
                    <div class="card-header ">
                        <h4 class="m-b-0 text-black">Data Pelanggan</h4>
                    </div>
                    <div class="card-body">

                        <div class="table">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="1%">Nama Pelanggan</th>
                                        <th width="1%">Alamat</th>
                                        <th width="1%">No HP</th>
                                        <th width="1%">Kelamin</th>
                                        <th width="1%">Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $p)
                                        <tr>
                                            <td>{{$p->nama}}</td>
											<td>{{$p->alamat}}</td>
											<td>{{$p->nohp}}</td>
											<td>{{$p->kelamin}}</td>
                                            <td>
                                                <a class="btn btn-danger" href="hapus-pelanggan/{{$p->id }}">HAPUS</a>

                                                <a class="btn btn-success" href="edit-pelanggan/{{$p->id}}">EDIT</a>
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

    <br>

</div>


@endsection

@push('plugin-scripts')
    <script src="{{asset('/assets/plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

@endpush
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard.js')}}"></script>
@endpush
@push('scripts')
    @include('layouts.partial.script')
@endpush