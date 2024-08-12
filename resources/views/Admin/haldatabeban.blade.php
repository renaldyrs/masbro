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
        <div class="col-lg-4">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-black">Form Tambah Data Beban</h4>
                </div>
                <div class="card-body">
                    <form class="row g-4 needs-validation" action="/data-beban/tambah" method="post" novalidate>

                        @csrf
                        <div class="form-body">

                            <div class="row p-t-20">

                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-group has-success">
                                        <label class="control-label">Nama Akun</label>
                                        <select name="idakun" id="kode" class="form-control ">
                                            <option value="">-Akun-</option>
                                            @foreach ($akun as $a)

                                                <option value="{{$a->id}}">{{ $a->kode_akun }} - {{ $a->nama_akun }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-group has-success">
                                        <label class="control-label">Kode</label>
                                        <input type="text" name="kode" id="kodeakun" value="" class="form-control " placeholder="Kode"
                                            autocomplete="off" readonly>

                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-group has-success">
                                        <label class="control-label">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" value="" class="form-control "
                                            placeholder="Tambahkan Keterangan" autocomplete="off" readonly>

                                    </div>
                                </div>



                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-group has-success">
                                        <label class="control-label">Biaya</label>
                                        <input type="text" class="form-control form-control-danger" name="biaya"
                                            value="" placeholder="biaya" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-group has-success">
                                        <label class="control-label">Jumlah</label>
                                        <input type="text" class="form-control form-control-danger" name="jumlah"
                                            value="" placeholder="jumlah" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-group has-success">
                                        <label class="control-label">Total</label>
                                        <input type="text" class="form-control form-control-danger" name="total"
                                            id="total" value="" placeholder="Total" autocomplete="off">
                                    </div>
                                </div>

                            </div>

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

        <div class="col-lg-8">
            <div class="card card-outline-info">
                <div class="card-header ">
                    <h4 class="m-b-0 text-black">Data Beban</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="1%">Kode</th>
                                <th width="1%">Keterangan</th>
                                <th width="1%">Biaya</th>
                                <th width="1%">Jumlah</th>
                                <th width="1%">Total</th>
                                <th width="1%">Aksi</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($beban as $b)
                                <tr>
                                    <td>{{$b->kode}}</td>
                                    <td>{{$b->keterangan}}</td>
                                    <td>{{$b->biaya}}</td>
                                    <td>{{$b->jumlah}}</td>
                                    <td>{{$b->total}}</td>
                                    <td>
                                        <a class="btn btn-danger" href="/data-beban/hapus/{{$b->idbeban}}">HAPUS</a>

                                        <a class="btn btn-success" href="/data-beban/edit/{{$b->idbeban}}">EDIT</a>
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

@endsection

@push('plugin-scripts')
    <script src="{{asset('/assets/plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

@endpush
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard.js')}}"></script>
@endpush

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('biaya').value;
        var txtSecondNumberValue = document.getElementById('jumlah').value;
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }

    $(document).ready(function () {
        $(document).on('change', '#kode', function () {

            var id = $(this).val();
            console.log(id);

            $.ajax({
                type: "get",
                url: '{!!URL::to('getakunbeban')!!}',
                data: { 'id': id, },
                dataType: 'json',
                success: function (akun) {

                    console.log(akun);

                    $("#kodeakun").val(akun.kode_akun);
                    $("#keterangan").val(akun.nama_akun);

                },
                error: function (data) {

                }
            });
        });
    });
</script>