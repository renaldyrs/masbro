@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')


<div id="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">


            <div class="col-lg-12">

                <form class="row g-4 needs-validation" action="/data-beban/tambah" method="post" novalidate>

                    {{ csrf_field() }}

                    <div class="col-md-3">

                        <label for="validationCustom01" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" required="required"
                            placeholder="Keterangan">

                    </div>

                    <div class="col-md-3">

                        <label for="validationCustom01" class="form-label">Biaya</label>

                        <input type="number" class="form-control" aria-label="Jasa" id="biaya" name="biaya" onkeyup="sum()" required="required"
                            placeholder="Biaya">


                    </div>

                    <div class="col-md-3">

                        <label for="validationCustomUsername" class="form-label">Jumlah</label>
            
                            <input type="number" class="form-control" id="jumlah" name="jumlah" onkeyup="sum()" aria-describedby="inputGroupPrepend"
                                placeholder="Jumlah" required>
                            
                    </div>

                    <div class="col-md-3">

                        <label for="validationCustomUsername" class="form-label">Total</label>
            
                            <input type="number" class="form-control" id="total" name="total" onkeyup="sum()" aria-describedby="inputGroupPrepend"
                                placeholder="Total" required readonly>
                            
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Simpan data</button>
                    </div>

                    

                </form>


            </div>
        </div>
    </div>

    <br>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="1%">Keterangan</th>
                <th width="1%">Biaya</th>
                <th width="1%">Jumlah</th>
                <th width="1%">Total</th>
                <th width="1%">Aksi</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($beban as $b)
                <tr>
                    <td>{{$b->keterangan}}</td>
                    <td>{{$b->biaya}}</td>
                    <td>{{$b->jumlah}}</td>
                    <td>{{$b->total}}</td>
                    <td>
                        <a class="btn btn-danger" href="/data-beban/hapus/{{$b->id }}">HAPUS</a>

                        <a class="btn btn-success" href="/data-beban/edit/{{$b->id}}">EDIT</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection
@push('scripts')
    @include('layouts.partial.script')


@endpush

<script>
    function sum(){
        var txtFirstNumberValue = document.getElementById('biaya').value;
        var txtSecondNumberValue =document.getElementById('jumlah').value;
        var result =parseInt(txtFirstNumberValue) *parseInt(txtSecondNumberValue);
        if(!isNaN(result)){
            document.getElementById('total').value=result;
        }
    }
</script>