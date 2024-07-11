@include('layouts.partial.script')

<table class="table table-borderless text-center">
    <thead class="thead-dark">
        <th class="text-center">No</th>
        <th class="text-center">Akun</th>
        <th class="text-center">Debet</th>
        <th class="text-center">Kredit</th>
    </thead>

    <tbody>
        <?php $i = 1 ?>
        @foreach($data as $item)
            <tr>
                <th class="text-center">{{ $i++ }}</th>
                <th class="text-center">{{ $item['nama_akun'] }}</th>
                <th>
                    Rp. {{ number_format($item['debet'], 0, ',', '.') }},-
                </t>
                <th>
                    Rp. {{ number_format($item['kredit'], 0, ',', '.') }},-
                </t>
            </tr>

            

        @endforeach
        <tr>
            <th colspan="2" class="text-center table-dark">Total</th>
            <th class="text-center table-dark">Rp.
                {{ number_format($total_saldo_debet, 0, ',', '.') }},-
            </th>
            <th class="text-center table-dark">Rp.
                {{ number_format($total_saldo_kredit, 0, ',', '.') }},-
            </th>
        </tr>

        <tr>
            {{Config::set('terbilang.locale', 'id')}}
            <th colspan="2" class="text-center table-dark">TERBILANG</th>
            <th class="text-center table-dark"> <em>
                    {{ ucwords(Terbilang::make($total_saldo_debet)) }}
                    Rupiah</em>
            </th>
            <th class="text-center table-dark"> <em>
                    {{ ucwords(Terbilang::make($total_saldo_kredit)) }}
                    Rupiah</em>
            </th>
        </tr>

    </tbody>

</table>