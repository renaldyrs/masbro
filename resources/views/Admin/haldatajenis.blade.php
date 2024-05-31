@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')


<div id="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">


            <div class="col-lg-12">

                <form class="row g-4 needs-validation" action="/data-jenis/tambah" method="post" novalidate>

                    {{ csrf_field() }}

                    <div class="col-md-4">

                        <label for="validationCustom01" class="form-label">Jenis</label>
                        <input type="text" class="form-control" name="jenis" required="required" placeholder="Jenis">

                    </div>

                    <div class="col-md-4">

                        <label for="validationCustom02" class="form-label">Jenis Jasa</label>

                        <select class="form-select" aria-label="Jasa" name="jasa" required="required">

                            <option value="Cuci Basah">Cuci Basah</option>
                            <option value="Cuci Kering">Cuci Kering</option>
                            <option value="Cuci Setrika">Cuci Setrika</option>

                        </select>

                    </div>

                    <div class="col-md-4">

                        <label for="validationCustomUsername" class="form-label">Harga</label>
                        <div class="input-group has-validation">

                            <input type="text" class="form-control" name="harga" aria-describedby="inputGroupPrepend"
                                placeholder="Harga" required>
                            <span class="input-group-text" id="inputGroupPrepend">/KG</span>
                        </div>

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
                <th width="1%">Jenis</th>
                <th width="1%">Jasa</th>
                <th width="1%">Harga</th>
                <th width="1%">Aksi</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($jenis as $j)
                <tr>
                    <td>{{$j->jenis}}</td>
                    <td>{{$j->jasa}}</td>
                    <td>{{$j->harga}}</td>
                    <td>
                        <a class="btn btn-danger" href="/data-jenis/hapus/{{$j->id }}">HAPUS</a>

                        <a class="btn btn-success" href="/data-jenis/edit/{{$j->id}}">EDIT</a>
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