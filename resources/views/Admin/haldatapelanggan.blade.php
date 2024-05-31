@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')


<div id="content">
	<div class="row">
		<div class="col-lg-12 margin-tb">


			<div class="col-lg-12">


				<form action="/data-pelanggan/tambah" method="post">
					{{ csrf_field() }}

					<div class="col-md-4">
						<label for="exampleFormControlInput1" class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" required="required"
							placeholder="Nama">
					</div>

					<div class="col-md-4">
						<label for="exampleFormControlInput1" class="form-label">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat" required="required"
							placeholder="Alamat">
					</div>

					<div class="col-md-4">
						<label for="exampleFormControlInput1" class="form-label">No HP</label>
						<input type="text" class="form-control" name="nohp" id="nohp" required="required"
							placeholder="No HP">
					</div>

					<div class="col-md-4 mt-4">
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
				<th width="1%">Nama</th>
				<th width="1%">Alamat</th>
				<th width="1%">No HP</th>
				<th width="1%">Aksi</th>
			</tr>

		</thead>
		<tbody>
			@foreach ($pelanggan as $p)
				<tr>
					<td>{{$p->nama}}</td>
					<td>{{$p->alamat}}</td>
					<td>{{$p->nohp}}</td>
					<td>
						<a class="btn btn-danger" href="/data-pelanggan/hapus/{{ $p->id }}">HAPUS</a>
						
						<a class="btn btn-success" href="/data-pelanggan/edit/{{$p->id}}">EDIT</a>
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