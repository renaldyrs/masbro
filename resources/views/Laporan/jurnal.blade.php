@extends('layouts.master')
@section('content')


<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<div class="content">

    <div class="col-lg-12">

        <div class="card card-outline-info">
            <div class="card-header">
                <div>
                    <h5 class="m-b-0 " > Data Jurnal Umum</h5>
                </div>


                <div style="margin-top: -2.6rem;">
                    <a href="{{ url("tambah-jurnal") }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i></a>
                </div>

            </div>
            
            <div class="card-body">
   
                <div class="table-responsive m-t-0">

                    <h4>Total Data : <strong>{{ $total_jurnal }}</strong> </h4>

                    <table class="table table-striped text-center">
                        <thead>
                            <h3 class="text-center"> <strong>DAFTAR JURNAL UMUM</strong></h3>

                        </thead>
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
                                    <a href="{{ url('jurnal-detail/' . date('Y-m-d', strtotime('1-' . $data->waktu))) }}"
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
@section('script')
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
@endsection
@push('scripts')
    @include('layouts.partial.script')
@endpush