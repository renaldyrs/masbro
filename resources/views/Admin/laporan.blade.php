

<a class="btn btn-primary" href="cetak">cetak</a>

<div class="table-responsive m-t-0">
    <table id="myTable" class="table display table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Pesanan</th>
                <th>TGL Transaksi</th>
                <th>Pelanggan</th>
                <th>Jenis Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>jumlah</th>
                <th>Total</th>
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
                        {{carbon\carbon::parse($p->tgltransaksi)->format('d-m-y')}}
                    </td>

                    <td>
                        {{$p->nama_pelanggan}}
                    </td>

                    <td>
                        {{$p->status}}
                    </td>
                    <td>
                        {{$p->statuspembayaran}}
                    </td>
                    <td>{{$p->jenis}}</td>
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
                    
                </tr>
                <?php    $no++; ?>
            @endforeach
        </tbody>
    </table>
</div>