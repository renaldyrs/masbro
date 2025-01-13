@extends('layouts.master')


@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        Detail Buku Besar
                        <div style="margin-top: -0.3rem">
                            <a href="{{url('pesanan/cetak/' . date('Y-m-d', strtotime('1-' . $periode))) }}"
                                class="btn btn-success"><i class="fa fa-print"></i></a>
                            <button onclick="history_back()" class="btn-secondary"
                                style="border-radius: 0.5rem">Kembali</button>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-2" style="">
                            <img src="{{asset('/assets/images/MABRO.png')}}" alt="" style="width: 6rem">

                        </div>

                        <div class="col-8" style="text-align: center">
                            <H4><strong>Laporan Pesanan MASBRO</strong> </H4>
                            <h6><strong>Periode : {{ $periode }}</strong></h6>
                        </div>
                        <div class="col-2">
                            <br>
                            <h6><strong>{{ date('d F Y')}}</strong></h6>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <h5>Pendapatan</h5>
                        </div>
                        <div class="col-md-1.5">
                            <h5>Cuci Basah</h5>
                            <h5>Cuci Kering</h5>
                            <h5>Cuci Setrika</h5>
                            <h5>Setrika</h5>
                            <h5>Karpet</h5>
                        </div>
                        <div class="col-md-1.5">
                            <h5>: {{$cucibasah}}</h5>
                            <h5>: {{$cucikering}}</h5>
                            <h5>: {{$cucisetrika}}</h5>
                            <h5>: {{$setrika}}</h5>
                            <h5>: {{$karpet}}</h5>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-2">
                            <h5>Jumlah</h5>
                        </div>
                        <div class="col-md-1.5">
                            <h5>Cuci Basah</h5>
                            <h5>Cuci Kering</h5>
                            <h5>Cuci Setrika</h5>
                            <h5>Setrika</h5>
                            <h5>Karpet</h5>
                        </div>
                        <div class="col-md-1">
                            <h5>: {{$countcucibasah}}</h5>
                            <h5>: {{$countcucikering}}</h5>
                            <h5>: {{$countcucisetrika}}</h5>
                            <h5>: {{$countsetrika}}</h5>
                            <h5>: {{$countkarpet}}</h5>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4">

                            <h5>Total Pendapatan </h5>
                        </div>

                        <div class="col-md-3">

                            <h5>: {{$pendapatan}}</h5>

                        </div>

                        <div class="col-md-4">

                            <h5>Total Pesanan </h5>
                        </div>

                        <div class="col-md-1">

                            <h5>: {{$countpesanan}}</h5>

                        </div>
                    </div>

                    <h5>Pesanan Kirim : {{$countkirim}}</h5>
                    <h5>Pesanan Ambil : {{$countambil}}</h5>

                    <hr>
                    <div class="row">
                        <div class="col-2">

                        </div>
                        <div class="col-7">

                        </div>
                        <div class="col-3" style="text-align: center">

                            <br>
                            Mengetahui
                            <br>
                            <br>
                            <br>
                            <strong>{{Auth::user()->name}}</strong>
                            <strong>
                                <hr>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('layouts.partial.script')
<script>
    function history_back() {
        window.history.back();
    } 
</script>