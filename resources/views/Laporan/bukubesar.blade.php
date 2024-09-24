@extends('Layouts.master')

@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        Buku Besar
                        <div style="margin-top: -0.3rem">
                            <button onclick="history_back()" class="btn-secondary"
                                style="border-radius: 0.5rem">Kembali</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="panel-body">
                        <h4>Daftar Akun : <strong></strong> </h4>
                        <div class="row">
                            @foreach($daftar_akun as $data)						
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><a
                                                href="{{ url('buku-besar/' . $data->id) }}"
                                                class="btn card border-left-primary"
                                                style="color: black; border-color: black; ">{{ $data->nama_akun }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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