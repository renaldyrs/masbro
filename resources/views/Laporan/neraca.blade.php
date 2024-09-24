@extends('layouts.master')

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-12   ">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        Data Neraca Saldo
                        <div style="margin-top: -0.3rem">
                            <button onclick="history_back()" class="btn-secondary"
                                style="border-radius: 0.5rem">Kembali</button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <div class="tabel-responsive">
                        <h4>Total Data : <strong>{{ $total_neraca }}</strong> </h4>
                        
                        <table class="table table-striped text-center">
                            <thead>
                                <h3 class="text-center"><strong>DAFTAR NERACA SALDO</strong></h3>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                @foreach($daftar_neraca as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ date('F Y', strtotime('1-' . $data->waktu)) }}</td>
                                        <td>
                                            <a href="{{ url('neraca-detail/' . date('Y-m-d', strtotime('1-' . $data->waktu))) }}"
                                                class="btn btn-info">
                                                Detail
                                            </a>
                                            <a href="{{ url('neraca-saldo/cetak/' . date('Y-m-d', strtotime('1-' . $data->waktu))) }}"
                                                class="btn btn-warning">
                                                Cetak
                                            </a>
                                    </tr>
                                @endforeach

                            </tbody>


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