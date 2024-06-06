@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')


<div id="content">
	<div class="row">
		<div class="col-lg-12 margin-tb">


			<div class="col-lg-12">


				<form class="row g-4 needs-validation" action="/data-metode/tambah" method="post">
					{{ csrf_field() }}
					

					<div class="col-md-3">
						<label for="exampleFormControlInput1" class="form-label">Jenis Pembayaran</label>
						<input type="text" class="form-control" name="jenispem" required="required"
							placeholder="Jenis">
					</div>

					<div class="col-md-3">
						<label for="exampleFormControlInput1" class="form-label">Nama Pemabayaran</label>
						<input type="text" class="form-control" name="namapem"  required="required"
							placeholder="Nama Pemabayaran">
					</div>

					<div class="col-md-3">
						<label for="exampleFormControlInput1" class="form-label">Kode</label>
						<input type="text" class="form-control" name="kodepem"  required="required"
							placeholder="Kode atau No rekening">
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
				<th width="1%">Jenis Pembayaran</th>
				<th width="1%">Nama Pembayaran</th>
				<th width="1%">Kode</th>
				<th width="1%">Aksi</th>
			</tr>

		</thead>
		<tbody>
			@foreach ($metodepembayaran as $m)
				<tr>
					<td>{{$m->jenispem}}</td>
					<td>{{$m->namapem}}</td>
					<td>{{$m->kodepem}}</td>
					<td>
						<a class="btn btn-danger" href="/data-metode/hapus/{{ $m->idpem }}">HAPUS</a>
						
						<a class="btn btn-success" href="/data-metode/edit/{{ $m->idpem }}">EDIT</a>
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