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
    <div class="row">
        <div class="col-lg-12 ">

            <div class="col-lg-4">

                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-black">Form Tambah Data Metode Pemabayaran</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{url('update-metode')}}" method="POST">
                            @csrf
                            @foreach ($metodepembayaran as $m)
                                <div class="form-body">

                                    <div class="row p-t-20">
                                        <input type="hidden" name="id" value="{{$m->id}}">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group has-success">
                                                <label class="control-label">Nama Bank</label>
                                                <input type="text" name="namabank" value="{{$m->namabank}}"
                                                    class="form-control " placeholder="Tambahkan Nama Pelanggan"
                                                    autocomplete="off">

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group has-success">
                                                <label class="control-label">Kode Bank</label>
                                                <input type="text" class="form-control form-control-danger" name="kodebank"
                                                    value="{{$m->kodebank}}" placeholder="Tambahkan Kode Bank"
                                                    autocomplete="off">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

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
                        <h4 class="m-b-0 text-black">Data Metode Pemabayaran</h4>
                    </div>
                    <div class="card-body">

                        <div class="table">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="1%">Nama Bank</th>
                                        <th width="1%">Kode Bank</th>
                                        <th width="1%">Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($metodepembayaran as $m)
                                        <tr>
                                            <td>{{$m->namabank}}</td>
                                            <td>{{$m->kodebank}}</td>

                                            <td>
                                                <a class="btn btn-danger" href="hapus-pelanggan/{{$m->id }}">HAPUS</a>

                                                <a class="btn btn-success" href="edit-pelanggan/{{$m->id}}">EDIT</a>
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

@push('plugin-scripts')
    <script src="{{asset('/assets/plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

@endpush
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard.js')}}"></script>
@endpush