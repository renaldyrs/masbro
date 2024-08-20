@extends('Layouts.master')

@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        Buku Besar
                        <button onclick="history_back()" class="btn-secondary btn-sm">Kembali</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="panel-body">
                        <h4>Daftar Akun : <strong></strong> </h4>
                        <di class="row">
                        @foreach($daftar_akun as $data)						
                            <div class="col-lg-4">
                                <a href="{{ url('buku-besar/' . $data->id) }}" class="btn btn-outline-dark btn-lg btn-block">{{ $data->nama_akun }}</a>
                            </div>
                        @endforeach
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