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
                        <h4 class="m-b-0 text-black">Transaksi Pesanan Laundry </h4>
                    </div>
                    <div class="col-md-9" style="text-align: right">
                        <a href="{{url('tambah-pesanan')}}" class="btn btn-primary" data-toggle="modal"
                            data-target="#ModalPesanan" style="margin-bottom: 10px">Tambah</a>
                    </div>

                </div>

            </div>

            <div class="card-body">
                <form action="" method="get">
                    <div>
                        <h5>Filter Transaksi Laundry :</h5>
                    </div>
                    <hr>
                    <div class="row" style="margin-bottom: 15px">

                    <div class="col-md-2" style="text-align: center">

                    </div>

                        <div class="col-md-2" style="text-align: center">
                            <label for="">Pembayaran</label>
                            <select name="pembayaran" class="form-control ">
                                <option value=""></option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="text-align: center">
                            <label for="">Laundry</label>
                            <select name="laundry" class="form-control ">
                                <option value=""></option>
                                <option value="">Proses Laundry</option>
                                <option value="Proses Laundry">Selesai Laundry</option>
                                <option value="Proses Kirim">Proses Kirim</option>
                                <option value="Sudah Dikirim">Sudah Dikirim</option>
                                <option value="Sudah Diambil">Sudah Diambil</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="text-align: center">
                            <label for="">Pengiriman</label>
                            <select name="pengiriman" class="form-control ">
                                <option value=""></option>
                                <option value="Proses Kirim">Proses Kirim</option>
                                <option value="Sudah Kirim">Sudah Kirim</option>

                            </select>
                        </div>
                        <div class="col-sm-2" style="text-align: center">
                            <label for="">Tanggal</label>
                            <input type="date" class="form-control" name="tgl" id="">
                            </select>
                        </div>

                        <div class="col-md-1" style="text-align: center">
                            
                            <button type="submit" class="btn btn-primary fas fa-search" style="margin-top: 30px"></button>

                        </div>
                </form>

            </div>

            <hr>

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
                                <td class="text-center">

                                    @if ($p->statuspembayaran == 'Belum Bayar')
                                        <a href="{{url('update-pesanan/' . $p->kode_pesanan)}}"
                                            onclick="return confirm('Apakah anda yakin sudah dibayar ?');"
                                            class="btn btn-success"><i
                                                class="fas fa-money-bill-wave margin-bottom: 10px;"></i></a>
                                    @endif

                                    @if ($p->pengiriman == 'Ambil' && $p->statuslaundry == 'Selesai Laundry')
                                        <a href="{{url('ambillaundry/' . $p->kode_pesanan)}}" class="btn btn-success"><i
                                                class="fa fa-handshake"></i></a>

                                    @endif

                                    @if ($p->statuslaundry == 'Proses Laundry')
                                        <a href="selesailaundry/{{$p->kode_pesanan}}" class="btn btn-danger"
                                            onclick="return confirm('Anda yakin proses laundry telah selesai ?');"><i
                                                class="fa fa-check"></i></a>
                                    @endif

                                    @if ($p->pengiriman == 'Kirim' && $p->statuslaundry == 'Selesai Laundry')

                                        <a href="updatekirim/{{$p->idpesanan}}" class="btn btn-primary"><i
                                                class="	fas fa-box"></i></a>

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