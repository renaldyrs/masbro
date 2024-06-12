@extends('layouts.admin')
@section('content')
@include('layouts.partial.sidebar_admin')

<head>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-black">Form Tambah Data Metode Pemabayaran</h4>
            </div>

            <div class="card-body">
                <form action="{{url('tambah-pesanan')}}" method="POST">
                    @csrf

                    <div class="form-body">

                        <div class="row p-t-18">

                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label">Nama Pelanggan</label>
                                    <select name="nama" class="form-control ">
                                        <option value="">--Nama Pelanggan--</option>
                                        @foreach ($pelanggan as $p)

                                            <option value="$p->id">{{ $p->nama }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label">Jenis Pembayaran</label>
                                    <select name="jenisbayar" class="form-control" id="">
                                        <option value="">--Jenis Pemabayaran--</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label">Status Pembayaran</label>
                                    <select name="statuspembayaran" class="form-control" id="">
                                        <option value="">--Status Pemabayaran--</option>
                                        <option value="Belum Bayar">Belum Bayar</option>
                                        <option value="Sudah Bayar">Sudah Bayar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label">Jenis</label>
                                    <select name="id" id="id" onChange="pilihjenis()" class="form-control ">
                                        <option value="">--Jenis Jasa--</option>
                                        @foreach ($jenis as $j)
                                            <option value="{{$j->id}}">{{ $j->jenis }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group has-success">
                                    <label class="control-label">harga</label>
                                    <input type="text" name="harga" id="harga" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group has-success">
                                    <label class="control-label">Berat Pakaian</label>
                                    <input type="text" name="kg" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group has-success">
                                    <label class="control-label">Total Bayar</label>
                                    <input type="text" name="total" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group has-success">
                                    <label class="control-label">Berat Pakaian</label>
                                    <input type="date" name="kg" class="form-control">
                                </div>
                            </div>






                        </div>

                        <div class="row">

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

    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{url('tambah-pesanan')}}" class="btn btn-primary">Tambah</a>
                </h4>
                <h6>Info :
                    <code> Untuk Mengubah Status Order & Pembayaran Klik Pada Bagian 'Action' Masing-masing.</code>
                </h6>
                <div class="table-responsive m-t-0">
                    <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Resi</th>
                                <th>TGL Transaksi</th>
                                <th>Customer</th>
                                <th>Status Laundry</th>
                                <th>Payment</th>
                                <th>Jenis</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($order)}} --}}
                            <?php $no = 1; ?>
                            @foreach ($pesanan as $p)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td style="font-weight:bold; font-color:black">{{$item->invoice}}</td>
                                    <td>{{carbon\carbon::parse($item->tgl_transaksi)->format('d-m-y')}}</td>
                                    <td>{{$item->customer}}</td>
                                    <td>
                                        @if ($item->status_order == 'Done')
                                            <span class="label label-success">Selesai</span>
                                        @elseif($item->status_order == 'Delivery')
                                            <span class="label label-primary">Diambil</span>
                                        @elseif($item->status_order == 'Process')
                                            <span class="label label-info">Diproses</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status_payment == 'Success')
                                            <span class="label label-success">Lunas</span>
                                        @elseif($item->status_payment == 'Pending')
                                            <span class="label label-info">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{$item->price->jenis}}</td>
                                    <td>
                                        {{Rupiah::getRupiah($item->harga_akhir)}}
                                    </td>
                                    <td>
                                        @if ($item->status_payment == 'Pending')
                                            <a class="btn btn-sm btn-danger" style="color:white" data-id-update="{{$item->id}}"
                                                id="updateStatus">Bayar</a>
                                            <a href="{{url('invoice-kar', $item->id)}}" class="btn btn-sm btn-warning"
                                                style="color:white">Invoice</a>
                                        @elseif($item->status_payment == 'Success')
                                            @if ($item->status_order == 'Process')
                                                <a class="btn btn-sm btn-info" style="color:white" data-id-update="{{$item->id}}"
                                                    id="updateStatus">Selesai</a>
                                                <a href="{{url('invoice-kar', $item->id)}}" class="btn btn-sm btn-warning"
                                                    style="color:white">Invoice</a>
                                            @elseif($item->status_order == 'Done')
                                                <a class="btn btn-sm btn-info" style="color:white" data-id-update="{{$item->id}}"
                                                    id="updateStatus">Diambil</a>
                                                <a href="{{url('invoice-kar', $item->id)}}" class="btn btn-sm btn-warning"
                                                    style="color:white">Invoice</a>
                                            @elseif($item->status_order == 'Delivery')
                                                <a href="{{url('invoice-kar', $item->id)}}" class="btn btn-sm btn-warning"
                                                    style="color:white">Invoice</a>
                                            @endif
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


@endsection
@section('script')
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $document.ready(function() {
        function pilihjenis() {
        var id_jenis = document.getElementById('id').value;
        $.ajax({
            url: "PesananController/pilih_jenis",
            data:"id_jenis="+id_jenis,
            method: "post",
            dataType: "json",
            success: function(data) {
                $("#harga").val(data.harga_a);
            }
        });
        }
    $('#id').on("change",pilihjenis);
    })
    
    

</script>
@endsection
@push('scripts')
    @include('layouts.partial.script')
@endpush