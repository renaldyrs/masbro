@extends('layouts.admin')
@section('content')
@include('layouts.partial.sidebar_admin')

<div id="content">
	<div class="row">
		<div class="col-lg-12 ">

			<div class="col-lg-4">

				<div class="card card-outline-info">
					<div class="card-header">
						<h4 class="m-b-0 text-black">Form Tambah Data Metode Pemabayaran</h4>
					</div>

					<div class="card-body">
						<form action="{{url('tambah-metode')}}" method="POST">
							@csrf
							
								<div class="form-body">

									<div class="row p-t-20">

										<div class="col-lg-12 col-xl-12">
											<div class="form-group has-success">
												<label class="control-label">Nama Bank</label>
												<input type="text" name="namabank" value="" class="form-control "
													placeholder="Tambahkan Nama Pelanggan" autocomplete="off">

											</div>
										</div>

										<div class="col-lg-12 col-xl-12">
											<div class="form-group has-success">
												<label class="control-label">Kode Bank</label>
												<input type="text" class="form-control form-control-danger" name="kodebank"
													value="" placeholder="Tambahkan Kode Bank" autocomplete="off">
											</div>
										</div>

									</div>

									<div class="row">

									</div>

								</div>
							


							<div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
									Tambah Data</button>
								<button type="reset" class="btn btn-danger">Cancel</button>
							</div>

						</form>
					</div>
				</div>

			</div>

			<div class="col-lg-8">
				<div class="card card-outline-info">
					<div class="card-header ">
						<h4 class="m-b-0 text-black">Data Metode Pemabayaran</h4>
					</div>
					<div class="card-body">

						<div class="table">
							<table class="table ">
								<thead>
									<tr>
										<th width="1%">Nama Bank</th>
										<th width="1%">Kode Bank</th>
										<th width="1%">Aksi</th>
									</tr>

								</thead>
								<tbody>
									@foreach ($metodepembayaran as $m)
										<tr>
											<td>{{$m->namabank}}</td>
											<td>{{$m->kodebank}}</td>

											<td>
												<a class="btn btn-danger" href="hapus-metode/{{$m->id }}">HAPUS</a>

												<a class="btn btn-success" href="edit-metode/{{$m->id}}">EDIT</a>
											</td>

										</tr>
									@endforeach
								</tbody>
							</table>
						</div>


					</div>
				</div>
			</div>



		</div>
	</div>

	<br>

</div>


@endsection
@push('scripts')
	@include('layouts.partial.script')
@endpush