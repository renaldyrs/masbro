@extends('layouts.master')

@section('content')

@push('plugin-styles')

    <style src="{{asset('/assets/plugins/plugin.css')}}"></style>
@endpush

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-black">Transaksi Pesanan </h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="d-flex">

                        <div class="col-lg-6">
                            <h4 class="card-title">
                                <a href="{{url('tambah-pesanan')}}" class="btn btn-primary" data-toggle="modal"
                                    data-target="#ModalPesanan">Tambah</a>
                            </h4>
                            <br>
                        </div>

                    </div>
                </div>

                <div class="table-responsive m-t-0">
                    <table id="myTable" class="table display table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Pesanan</th>
                                
                                <th>Pelanggan</th>
                                <th>Jenis Pembayaran</th>
                                <th>Nama Bank</th>
                                <th>Status Pembayaran</th>
                                <th>Jenis Layanan</th>
                                <th>Harga</th>
                                <th>KG</th>
                                <th>Total</th>
                                <th>Status Laundry</th>
                                <th>Pengiriman</th>
                                <th>TGL Transaksi</th>
                                <th>TGL Selesai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($order)}} --}}
                            <?php $no = 1; ?>
                            @foreach ($pesanan as $p)
    
                                <tr>
                                <input type="hidden" name="idpesanan" value="{{$p->idpesanan}}">
                                <input type="hidden" name="idpelanggan" value="{{$p->id_pelanggan}}">
                            
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
                                        {{$p->harga}}
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
                                    <td class="text-center" >
                                    
                                        @if ($p->statuspembayaran == 'Belum Bayar')
                                            <a href="{{url('update-pesanan/' . $p->kode_pesanan)}}"
                                                onclick="return confirm('Apakah anda yakin sudah dibayar ?');" class="btn btn-success"><i class="fa fa-dollar-sign margin-bottom: 10px;"  ></i></a>
                                        @endif

                                        @if ($p->pengiriman == 'Ambil' && $p->statuslaundry == 'Selesai Laundry')
                                        <a href="{{url('ambillaundry/' . $p->kode_pesanan)}}" class="btn btn-success"><i class="fa fa-handshake"></i></a>
                                        
                                        @endif
                                 
                                        @if ($p->statuslaundry == 'Proses Laundry')
                                        <a href="selesailaundry/{{$p->kode_pesanan}}" class="btn btn-danger"
                                            onclick="return confirm('Anda yakin proses laundry telah selesai ?');"><i class="fa fa-check"></i></a>
                                        @endif

                                        @if ($p->pengiriman == 'Kirim' && $p->statuslaundry == 'Selesai Laundry')
                                        
                                        <a  href="updatekirim/{{$p->idpesanan}}" class="btn btn-primary"><i class="fa fa-shipping-fast"></i></a>
                                        
                                        @endif

                                    </td>
                                </tr>
                                
                                <?php    $no++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
</div>

@include('Admin.Modal.pesanan')
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