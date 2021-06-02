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
					<div class="form-group">
						<label>Silahkan Pilih Data</label>
						<select class="form-control selectric"  name="role">
							<option >-- Silahkan Pilih --</option>
							@foreach ($data2 as $row)
							<option value="{{$row->id_data}}">{{$row->name}}</option>
							@endforeach
						</select>
					</div>
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
						<h4>WhatsApp</h4>
					</div>
					<div class="card-body">
						<div class="buttons text-right">

							<a data-toggle="modal" data-target="#basicModal" href="" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Import</a>
							<a href="{{ asset('format_wa_excel.xlsx') }}" class="btn btn-icon icon-left btn-dark"><i class="far fa-file"></i> Format</a>
							<a href="{{route('wa.delete')}}" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Hapus Semua</a>
						</div>
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
										<th>Kirim</th>

										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php
									$nomor = 1;
									@endphp
									@foreach ($data as $row)

									@if($row->status != 1 && $row->name != 'NAMA' && auth()->user()->id_data == 1 )
									<tr>
										<td>{{$nomor++}}</td>
										<td>{{$row->name}}</td>
										<td>+62{{$row->number}}</td>
										<form action="{{route('wa.status')}}" method="post">
											@csrf
											<td>
												<input type="text"  name="text" value="{{$row->text}}" readonly="">
												<input type="hidden"   name="number" value="{{$row->number}}" readonly="">
												<input type="hidden"   name="name" value="{{$row->name}}" readonly="">
												<br>{{$row->text}}
											</td>
											<td align="center">  
												<input type="hidden" name="id" value="{{$row->id}}">
												<button class="btn btn-warning" type="submit"><i class="now-ui-icons ui-1_email-85"></i> Kirim Pesan</button>
											</form>
										</td>
										<td align="center">
											<form id="data-{{ $row->id }}" action="{{route('waweb.destroy',$row->id)}}" method="post">
												{{csrf_field()}}
												{{method_field('delete')}}
												<input type="hidden" value="{{$row->name}}" name="name">
											</form>
											@csrf
											@method('DELETE')
											<button type="submit" onclick="deleteRow( {{ $row->id }} )" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i></button>
										</td>
									</tr>
									@elseif($row->status != 1 && $row->name != 'NAMA'  && auth()->user()->id_data == $row->id_data)
									<tr>
										<td>{{$nomor++}}</td>
										<td>{{$row->name}}</td>
										<td>+62{{$row->number}}</td>
										<form action="{{route('wa.status')}}" method="post">
											@csrf
											<td>
												<input type="hidden"  name="text" value="{{$row->text}}" readonly="">
												<input type="hidden"   name="number" value="{{$row->number}}" readonly="">
												<input type="hidden"   name="name" value="{{$row->name}}" readonly="">
												<br>{{$row->text}}
											</td>
											<td align="center">  
												<input type="hidden" name="id" value="{{$row->id}}">
												<button class="btn btn-warning" type="submit"><i class="now-ui-icons ui-1_email-85"></i> Kirim Pesan</button>
											</form>
										</td>
										<td align="center">
											<form id="data-{{ $row->id }}" action="{{route('waweb.destroy',$row->id)}}" method="post">
												{{csrf_field()}}
												{{method_field('delete')}}
											</form>
											@csrf
											@method('DELETE')
											<button type="submit" onclick="deleteRow( {{ $row->id }} )" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i></button>
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