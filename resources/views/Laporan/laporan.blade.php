@extends('layouts.master')

@section('content')
<div class="content">
  <div class="row justify-content-center">
    <div class="col-lg-12   ">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between" >
            <div>
            Data Laporan
            </div>
            
            <div style="margin-top: -0.3rem">
              <button onclick="history_back()" class="btn-secondary" style="border-radius: 0.5rem">Kembali</button>
            </div>

          </div>

        </div>
        <div class="card-body">

          <div class="tabel-responsive">
            <h4>Total Data : <strong>{{ $total_jurnal }}</strong> </h4>
            <thead>
              <h3 class="text-center"> <strong>DAFTAR LAPORAN</strong></h3>
            </thead>

            <table class="table table-striped text-center">

              <tr>

                <th class="text-center">No</th>
                <th class="text-center">Waktu</th>
                <th class="text-center">Action</th>
              </tr>
              <?php $i = 1 ?>
              @foreach($daftar_jurnal as $data)
          <tr>
          <td>{{ $i++ }}</td>
          <td>{{ date('F Y', strtotime('1-' . $data->waktu)) }}</td>
          <td>
            <a href="{{ url('laporan/laba-rugi/' . date('Y-m-d', strtotime('1-' . $data->waktu))) }}" class="btn btn-info" ><i class="fa fa-eye"></i></a>
            <a href="{{url('laporan/laba-rugi/cetak/'. date('Y-m-d', strtotime('1-' . $data->waktu))) }}"
            class="btn btn-success"><i class="fa fa-print"></i></a>
            
          </td>
          </tr>
        @endforeach
            </table>

          </div>

        </div>
      </div>
    </div>
  </div>

</div>

@endsection
<script>
  function history_back() {
    window.history.back();
  } 
</script>