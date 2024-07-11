@extends('layouts.master-pemilik')



@section('content')

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-black">Trnsaksi Pesanan </h4>
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

                        <!-- <div class="col-lg-4 float-right">
                            <label>Filter By Date</label>
                            <input type="date" name="tgltransaksi" value="{{date('Y-m-d')}}" class="form-control">

                        </div>

                        <div class="col-lg-4">
                            <label>Filter By Date</label>
                            <select name="statuspembayaran" id="" class="form-control">\
                                <option value="">Select Status</option>
                                <option value="Sudah Bayar">Belum Bayar</option>
                                <option value="Belum Bayar">Sudah Bayar</option>

                            </select>

                        </div>

                        <div class="col-lg-3 mt-4">
                          
    
                            <button type="submit" class="btn btn-primary form-control" class="">Filter</button>
                        </div> -->

                    </div>
                </div>

                <div class="table-responsive m-t-0">
                    <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Pesanan</th>
                                <th>TGL Transaksi</th>
                                <th>Pelanggan</th>
                                <th>Jenis Pembayaran</th>
                                <th>Nama Bank</th>
                                <th>Status Pembayaran</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>jumlah</th>
                                <th>Total</th>
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
                                        {{carbon\carbon::parse($p->tgltransaksi)->format('d-m-y')}}
                                    </td>

                                    <td>
                                        {{$p->nama}}
                                    </td>

                                    <td>
                                        {{$p->status}}
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
                                        {{carbon\carbon::parse($p->tglselesai)->format('d-m-y')}}
                                    </td>
                                    <td>
                                        <!-- <a href="{{url('update-pesanan/'.$p->id)}}" class="btn btn-primary">Edit</a> -->
                                        <a href="{{url('hapus-pesanan/' . $p->id)}}" class="btn btn-danger">Delete</a>
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

@include('Admin.Modal.pesanan')
@endsection
@section('script')
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
@endsection
@push('scripts')
    @include('layouts.partial.script')
@endpush