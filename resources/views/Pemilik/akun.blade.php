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
                        <h4 class="m-b-0 text-black">Form Tambah Data Akun</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{url('tambah-akun')}}" method="POST">
                            @csrf
                            <div class="form-body">

                                <div class="row p-t-20">

                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Kode Akun</label>
                                            <input type="text" name="kodeakun" value=""
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Kode Akun" autocomplete="off">

                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group has-success">
                                            <label class="control-label">Nama Akun</label>
                                            <input type="text" class="form-control form-control-danger" name="namaakun"
                                                value="" placeholder="Nama Akun"  autocomplete="off">
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
                        <h4 class="m-b-0 text-black">Daftar Akun</h4>
                    </div>
                    <div class="card-body">

                        <div class="table">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th width="1%">Nama</th>
                                        <th width="1%">Kode</th>
                                        <th width="1%">Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($akun as $a)
                                        <tr>
                                            <td>{{ $no++ }}</td>
											<td>{{ $a->nama_akun }}</td>
											<td>{{ $a->kode_akun }}</td>
											
                                            <td>
                                                <a class="btn btn-danger" href="hapus-akun/{{$a->id }}">HAPUS</a>

                                                <a class="btn btn-success" href="edit-akun/{{$a->id}}">EDIT</a>
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