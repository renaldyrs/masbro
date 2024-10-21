@extends('layouts.master')

@section('content')

<div class="content">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            
            <button onclick="history_back()" class="btn-secondary btn-sm">Kembali</button>
            <a href="{{ url('neraca-saldo/cetak/' . date('Y-m-d', strtotime('1-' . $periode))) }}"
              class="btn btn-warning"><i class="fa fa-print">Print</i>
              
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="text-center">
            <h4>Laundry Masbro</h4>
            <h4>Neraca Saldo</h4>
            <h5>Periode : {{ $periode }}</h5>
          </div>
          <table class="table table-striped text-center">

            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Akun</th>
              <th class="text-center">Debet</th>
              <th class="text-center">Kredit</th>
            </tr>

            <?php $i = 1 ?>
            @foreach($data as $item)

        <tr>
          <td class="text-center">{{ $i++ }}</td>
          <td class="text-center">{{ $item['nama_akun'] }}</td>
          <td>Rp. {{ number_format($item['debet'], 0, ',', '.') }},-</td>
          <td>Rp. {{ number_format($item['kredit'], 0, ',', '.') }},-</td>
        </tr>

      @endforeach

            <tr>
              <th colspan="2" class="text-center">Total</th>
              <th class="text-center">Rp. {{ number_format($total_saldo_debet, 0, ',', '.') }},-</th>
              <th class="text-center">Rp. {{ number_format($total_saldo_kredit, 0, ',', '.') }},-</th>
            </tr>

            <tr>
              {{Config::set('terbilang.locale', 'id')}}
              <th colspan="2" class="text-center">TERBILANG</th>
              <th class="text-center"> <em> {{ ucwords(Terbilang::make($total_saldo_debet)) }} Rupiah</em> </th>
              <th class="text-center"> <em> {{ ucwords(Terbilang::make($total_saldo_kredit)) }} Rupiah</em></th>
            </tr>

          </table>
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