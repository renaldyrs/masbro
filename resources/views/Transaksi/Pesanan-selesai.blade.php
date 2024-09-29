@extends('layouts.master')

@section('content')

@push('plugin-styles')

    <style src="{{asset('/assets/plugins/plugin.css')}}"></style>
@endpush

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="m-b-0 text-black">Pesanan Laundry Selesai </h5>
                    </div>
                    <div class="col-md-9" style="text-align: right">

                    </div>

                </div>

            </div>

            <div class="card-body">

                <form action="" method="get">
                    <div class="row" style="margin-top: 0.7rem; margin-bottom: 15px">

                        <div class="col-md-2">
                            Total Pesanan Selesai : {{ $pesanan->total() }}
                        </div>


                        <div class="col-md-2" style="text-align: center">

                        </div>

                        <div class="col-md-2" style="text-align: center">

                            <select name="status" class="form-control ">
                                <option value="">Status Laundry</option>
                                <option value="Sudah Dikirim">Sudah Dikirim</option>
                                <option value="Sudah Diambil">Sudah Diambil</option>

                            </select>
                        </div>

                        <div class="col-sm-2" style="text-align: center">

                            <input type="date" name="tgl" class="form-control">
                            </select>
                        </div>
                        <div class="col-sm-2">
                        <button type="submit" class=" btn btn-link" style="margin-top:0.4rem; width: 5%; color:black"><i class="fa fa-search"></i></button>
                        </div>

                    </div>

                    <div class="table-responsive-sm " style="margin-left: 15px; margin-right: 15px">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Pesanan</th>

                                    <th>Pelanggan</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Nama Bank</th>
                                    <th>Status Pembayaran</th>
                                    <th>Jenis Layanan</th>

                                    <th>KG</th>
                                    <th>Total</th>
                                    <th>Status Laundry</th>
                                    <th>Pengiriman</th>
                                    <th>TGL Transaksi</th>
                                    <th>TGL Selesai</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{dd($order)}} --}}
                                <?php $no = 1; ?>
                                @foreach ($pesanan as $p)

                                    <tr>

                                        <td>{{$no}}</td>

                                        <td style="font-weight:bold; font-color:black">
                                            {{$p->kode_pesanan}}
                                        </td>

                                        <td>
                                            {{$p->nama}}
                                        </td>

                                        <td>
                                            {{$p->jenisbayar}}
                                        </td>
                                        <td>
                                            {{$p->namabank}}
                                        </td>
                                        <td>
                                            {{$p->statuspembayaran}}
                                        </td>
                                        <td>
                                            {{$p->jenis}}
                                        </td>

                                        <td>
                                            {{$p->jumlah}}
                                        </td>
                                        <td>
                                            {{$p->total}}

                                        </td>

                                        <td>
                                            {{$p->statuslaundry}}
                                        </td>
                                        <td>
                                            {{$p->pengiriman}}
                                        </td>
                                        <td>
                                            {{carbon\carbon::parse($p->tgltransaksi)->format('d-m-y')}}
                                        </td>
                                        <td>
                                            {{carbon\carbon::parse($p->tglselesai)->format('d-m-y')}}
                                        </td>

                                    </tr>

                                    <?php    $no++; ?>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{$pesanan->links()}}
            </div>
        </div>
        </form>
    </div>
</div>
</div>

@include('Transaksi.Modal.pesanan')
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