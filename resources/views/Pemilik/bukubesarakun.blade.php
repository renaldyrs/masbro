@extends('layouts.master')

@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Buku Besar {{ $akun->nama_akun }}</h5>
                        <div style="margin-top: -0.3rem">
                            <button onclick="history_back()" class="btn-secondary"
                                style="border-radius: 0.5rem">Kembali</button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <div class="d-flex justify-content-start">
                        <h4>Total Data : <strong>{{ $total_bukubesar }}</strong> </h4>
                    </div>

                    <table class="table table-striped text-center">

                        <thead>
                            <h3 class="text-center"> <strong>Daftar Buku Besar {{ $akun->nama_akun }}</strong></h3>
                        </thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php $i = 1 ?>
                        @foreach($daftar_akun as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ date('F Y', strtotime('1-' . $data->waktu)) }}</td>
                                <td>
                                    <a href="{{ url('buku-besar/' . $akun->id . '/' . date('Y-m-d', strtotime('1-' . $data->waktu))) }}"
                                        class="btn btn-info">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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