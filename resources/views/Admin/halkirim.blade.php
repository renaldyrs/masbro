@extends('layouts.master')

@section('content')

@push('plugin-styles')

    <style src="{{asset('/assets/plugins/plugin.css')}}"></style>
@endpush

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-black">Pengiriman</h4>
            </div>

            <div class="card-body">

                <div class="table-responsive m-t-0">
                    <table id="myTable" class="table display table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Kode Pesanan</th>
                                <th>Pelanggan</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Status Laundry</th>
                                <th>Status Pengiriman</th>
                                <th>TGL Pengiriman</th>
                                <th>Jam </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text">
                            {{-- {{dd($order)}} --}}
                            <?php $no = 1; ?>
                            @foreach ($pengiriman as $p)


                                <tr>
                                    <td>{{$no}}</td>
                                    <input type="hidden" name="idp" value="{{$p->id}}">

                                    <td>{{$p->kode_pesanan}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->nohp}}</td>
                                    <td>{{$p->alamat}}</td>
                                    <td>{{$p->statuslaundry}}</td>
                                    <td>{{$p->statuspengiriman}}</td>
                                    <td>
                                        {{$p->tglpengiriman}}
                                    </td>
                                    <td>{{$p->jampengiriman}}</td>
                                    <td>
                                        @if ($p->statuspengiriman == 'Proses Kirim')
                                            <a href="{{url('selesaikirim/' . $p->kode_pesanan)}}" class="btn btn-primary"
                                                onclick="return confirm('Apakah sudah selesai mengantar laundry ?');"><i
                                                    class="fa fa-shipping-fast"></i></a>
                                        @endif
                                        @if ($p->statuspengiriman == 'Siap Diambil')
                                            <a href="{{url('sudahdiambil/' . $p->kode_pesanan)}}" class="btn btn-primary"
                                                onclick="return confirm('Apakah laundry sudah diambil oleh customer ?');"><i
                                                    class="fa fa-handshake"></i></a>
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