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
                    <h5 class="m-b-0 text-black">Form Tambah Data Akun</h5>
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
                                            value="" placeholder="Nama Akun" autocomplete="off">
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
                    <h5 class="m-b-0 text-black">Daftar Akun</h5>
                </div>
                <div class="card-body">
                    <div>
                        Total Data : {{ $akun->total() }}
                    </div>
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
                                            <a class="btn btn-danger" href="hapus-akun/{{$a->id }}"><i
                                                    class="fa fa-trash"></i></a>

                                            <a class="btn btn-success" type="button" data-toggle="modal"
                                                data-target="#ModalEdit<?= $a->id?>"><i class="fas fa-pen"></i></a>
                                        </td>

                                    </tr>

                                    <form action="{{url('update-akun')}}" method="POST">
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEdit<?= $a->id ?>" tabindex="-1"
                                            role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="myModalLabel">Jenis : {{$a->nama_akun}}
                                                        </h3>
                                                        <button type="button" class="close"
                                                            onclick="javascript:window.location.reload()"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="{{$a->id}}">
                                                                <div class="col-md-4">

                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Kode Akun</label>
                                                                        <input type="text" name="kodeakun" value="{{$a->kode_akun}}"
                                                                            class="form-control @error('nama') is-invalid @enderror"
                                                                            placeholder="Kode Akun" autocomplete="off">
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group has-success">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label">Nama Akun</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-danger"
                                                                                name="namaakun" value="{{$a->nama_akun}}"
                                                                                placeholder="Nama Akun" autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>

                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-success"> <i
                                                                    class="fa fa-check"></i>
                                                                Update Data</button>
                                                            <button type="reset" class="btn btn-danger">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{$akun->links()}}
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