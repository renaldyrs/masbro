@extends('layouts.masteradmin')

@section('content')

@push('plugin-styles')

  <style src="{{asset('/assets/plugins/plugin.css')}}"></style>
@endpush

<div class="content">
  <div class="row justify-content-center">
    <div class="col-lg-8 ">

      <div class="card card-outline-info">
        <div class="card-header">
          <div class="row">
            <div class="col-md-3">
              <h5 class="m-b-0 text-black">Laporan </h5>
            </div>
            <div class="col-md-9" style="text-align: right">

              <button onclick="history_back()" class="btn-secondary"
                style="border-radius: 0.5rem; margin-top: -5.5rem">Kembali</button>
              
              <a href="{{url('laporan/laba-rugi/cetak/' . date('Y-m-d', strtotime('1-' . $periode))) }}"
                class="btn btn-success" style="border-radius: 0.5rem; margin-top: -0.5rem"><i
                  class="fa fa-print">Print</i></a>
            </div>

          </div>

        </div>

        <div class="card-body">
          <div class="text-center">
            <h4><strong>Laundry MASBRO</strong></h4>
            <h4><strong>Laporan Laba Rugi</strong></h4>
            <h6><strong>Periode : {{ $periode }}</strong></h6>
            <hr>

          </div>
          <div class="table-responsive">

            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Pendapatan</th>
                  <th></th>
                  <th></th>
                </tr>

              </thead>
              <tbody>
                <tr>
                  <td>Pendapatan Laundry</td>
                  <td class="text-center">{{$pendapatan}}</td>
                  <td></td>
                </tr>
                <tr>
                  <th></th>
                  <td>
                    <hr>
                  </td>
                  <th></th>
                </tr>

                <tr>
                  <th>Total Pendapatan</th>
                  <td></td>
                  <th class="text-center">{{$total_pendapatan}}</th>
                </tr>



                <tr>
                  <th>Beban</th>
                  <th></th>
                  <th></th>
                </tr>

                <tr>
                  <td>Gaji Pegawai</td>
                  <td class="text-center">{{$beban_gaji}}</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Beban Listrik </td>
                  <td class="text-center">{{$beban_listrik}}</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Beban Air</td>
                  <td class="text-center">{{$beban_air}}</td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <hr>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <th>Total Beban</th>
                  <td></td>
                  <th class="text-center">{{$total_beban}}</th>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <hr>
                  </td>
                </tr>

                <tr>
                  <th>Laba Bersih</th>
                  <td></td>
                  <th class="text-center">{{$laba_bersih}}</th>
                </tr>

              </tbody>


          </div>
        </div>


        </table>
      </div>

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

@push('custom-scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('/assets/js/dashboard.js')}}"></script>
@endpush
<script>
  function history_back() {
    window.history.back();
  } 
</script>
@push('scripts')
  @include('layouts.partial.script')
@endpush