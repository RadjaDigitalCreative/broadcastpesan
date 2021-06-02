@extends('layouts.app')
@section('content')
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Import Excel/CSV</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('wa.import') }}" method="POST" enctype="multipart/form-data">

				<div class="modal-body">
					@csrf
					<input type="file" name="file" class="form-control">
					<br>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="submit" class="btn btn-primary">Import</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</form>

		</div>
	</div>
</div>
<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Database</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="tableExport">
								<thead>
									<tr>
										<th class="text-center">
											#
										</th>
										<th>Nama Customer</th>
										<th>No. Telepon</th>
										<th>Pesan</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@php
									$nomor = 1;
									@endphp
									@foreach ($data as $row)
									@if($row->name != 'NAMA')
									
									<tr>
										<td>{{$nomor++}}</td>
										<td>{{$row->name}}</td>
										<td>+62{{$row->number}}</td>
										<td>
											<input type="hidden"  name="text" value="{{$row->text}}" readonly="">
											<input type="hidden"   name="number" value="{{$row->number}}" readonly="">
											<input type="hidden"   name="name" value="{{$row->name}}" readonly="">
											<br>{{$row->text}}
										</td>
										<td>
											@if($row->status == 1)
											<div class="badge badge-success">Terkirim</div>
											@else
											<div class="badge badge-danger">Belum Terkirim</div>
											@endif
										</td>
									</tr>
								
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection