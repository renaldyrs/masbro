@extends('layouts.master')

@push('plugin-styles')

    <style src="{{asset('/assets/plugins/plugin.css')}}"></style>
@endpush

@section('content')
@if(Session::has('alert'))

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>

@endif
<div id="content">
    <div class="d-flex">
        


            <div class="col-lg-4">
                @foreach ($beban as $b)
                    <form action="/data-beban/update" method="post">

                        {{ csrf_field() }}

                        <div class="col-md-3">

                            <label for="validationCustom01" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" required="required"
                                value="{{$b->keterangan}} " placeholder="Keterangan">

                        </div>

                        <div class="col-md-3">

                            <label for="validationCustom01" class="form-label">Biaya</label>

                            <input type="number" class="form-control" aria-label="Jasa" id="biaya" name="biaya"
                                onkeyup="sum()" required="required" value="{{$b->biaya}}" placeholder="Biaya">


                        </div>

                        <div class="col-md-3">

                            <label for="validationCustomUsername" class="form-label">Jumlah</label>

                            <input type="number" class="form-control" id="jumlah" name="jumlah" onkeyup="sum()"
                                aria-describedby="inputGroupPrepend" value="{{$b->jumlah}}" placeholder="Jumlah" required>

                        </div>

                        <div class="col-md-3">

                            <label for="validationCustomUsername" class="form-label">Total</label>

                            <input type="number" class="form-control" id="total" name="total" onkeyup="sum()"
                                aria-describedby="inputGroupPrepend" value="{{$b->total}}" placeholder="Total" required
                                readonly>

                        </div>
                      
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>



                    </form>
                @endforeach



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

@push('plugin-scripts')
    <script src="{{asset('/assets/plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

@endpush
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard.js')}}"></script>
@endpushh

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('biaya').value;
        var txtSecondNumberValue = document.getElementById('jumlah').value;
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>