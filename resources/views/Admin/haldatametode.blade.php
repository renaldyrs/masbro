@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')


<div id="content">
	<div class="row">
		<div class="col-lg-12 margin-tb">


			<div class="col-lg-9">


				<form action="/data-metode/tambah" method="post">
					{{ csrf_field() }}
					

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" required="required"
							placeholder="Nama">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat" required="required"
							placeholder="Alamat">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">No HP</label>
						<input type="text" class="form-control" name="nohp" id="nohp" required="required"
							placeholder="No HP">
					</div>



					<button type="submit" class="btn btn-primary">Simpan data</button>
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
			@foreach ($metodepembayaran as $m)
				<tr>
					<!-- <td>{{$p->nama}}</td>
					<td>{{$p->alamat}}</td>
					<td>{{$p->nohp}}</td> -->
					<td>
						<a class="btn btn-danger" href="/data-metode/hapus/{{ $m->id }}">HAPUS</a>
						
						<a class="btn btn-success" href="/data-metode/edit/{{$m->id}}">EDIT</a>
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