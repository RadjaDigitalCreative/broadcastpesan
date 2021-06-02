@extends('layouts.app')
@section('style')

<!-- modal lihat bukti bayar -->
@foreach ($data as $row)
<div class="modal fade" id="basicModals{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5><i class="far fa-dollar"></i> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="card-body">
				<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<a data-dismiss="modal" href="{{ URL::to('/') }}/images/{{ $row->bukti }}" data-sub-html="{{ URL::to('/') }}/images/{{ $row->bukti }}">
							<img class="img-responsive thumbnail" src="{{ URL::to('/') }}/images/{{ $row->bukti }}" alt="">
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<form action="{{ route('user.payment.konfirmasi') }}" method="post">
					@csrf
					<input type="hidden" name="dibayar" value="{{ $row->harga }}">
					<input type="hidden" name="user_id" value="{{ $row->id }}">
				</form>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
@endforeach
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="card">
						<div class="body">
							<div id="mail-nav">
								<button type="button" class="btn btn-danger waves-effect btn-compose m-b-15">Notification</button>
								<ul class="" id="mail-folders">
									<li >
										<a href="{{ route('notification') }}" title="Inbox">Notifikasi Baru
										</a>
									</li>
									<li class="active">
										<a href="{{ route('notification.konfirmasi') }}" title="Sent">Terkonfirmasi</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div class="card">
						<div class="boxs mail_listing">
							<div class="inbox-center table-responsive">
								<table  class="table table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Email</th>
											<th>File</th>
											<th>Notifikasi Masuk</th>
										</tr>
									</thead>
									<tbody>
										@php
										$nomor = 1;
										@endphp
										@foreach ($data as $row)
										<tr class="unread">
											<td class="tbl-checkbox">
												{{ $nomor++}}
											</td>
											
											<td class="hidden-xs">{{ $row->name}}</td>
											<td class="max-texts">
												<a href="#">
													<span class="badge badge-success">Sudah Aktif</span>
													{{ $row->email}}</a>
												</td>
												<td class="hidden-xs">
													<a data-toggle="modal" data-target="#basicModals{{$row->id}}" href=""><i class="material-icons">attach_file</i></a>
												</td>
												<td class="text-right"> {{ $row->notif_tgl}} </td>
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
		</section>
		@endsection