@extends('layouts.app')
@section('style')
<link href="{{ asset('admin/assets/bundles/lightgallery/dist/css/lightgallery.css') }}" rel="stylesheet">
@endsection
@section('content')
@php
function rupiah($m)
{
	$rupiah = "Rp ".number_format($m,0,",",".").",-";
	return $rupiah;
}
@endphp

<!-- modal user bayar -->

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Bayar Sekarang</h5><i class="far fa-dollar"></i> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('user.payment.bayar') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					@foreach ($data2 as $row)
					<div class="pretty p-default p-round">
						<input type="radio" name="harga" value="{{$row->hari}}"> {{rupiah($row->harga)}}, Masa Pemakaian {{$row->hari}} Hari <br>
					</div>
					@endforeach<br><br>
					<label class="label">Kirim Bukti Bayar</label>
					<input type="file" name="image" placeholder="Bukti Pembayaran" class="form-control">
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="submit" class="btn btn-primary">Bayar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>

			</form>

		</div>
	</div>
</div>

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
					@if(auth()->user()->id_data == 1)
					<button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
					@endif
				</form>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
@endforeach

<!-- isi content -->
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
							@if(auth()->user()->id_data == 1)
							<a href="{{ route('user.payment')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Buat Harga </a>
							   <form class="form-inline float-right" action="{{ route('user.filter')}}" method="post">
							       @csrf
                                    <div class="form-group mx-sm-3">
                                        <select name="role_pay" id="province" class="form-control">
                                            <option value="">== Masa Pemakaian ==</option>
                                            <option value="2">Aktif</option>
                                            <option value="1">Belum Dikonfirmasi</option>
                                            <option value="0">Belum Bayar</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3">
                                        <input type="text" id="created_at" name="date" class="form-control" >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('user')}}" class="btn btn-success">Refresh</a>
                                </form>
                                
							@endif

							<!-- <a href="{{ asset('format_wa_excel.xlsx') }}" class="btn btn-icon icon-left btn-dark"><i class="far fa-file"></i> Format</a>
								<a href="{{route('wa.delete')}}" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Hapus Semua</a> -->
							</div>
							<div class="table-responsive">
								<table class="table table-striped" id="tableExport">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>Nama Customer</th>
											<th>Email</th>
											<th>No. Telp</th>
											<th>Tgl. Bayar</th>
											<th>Total Bayar</th>
											<th>Status</th>
											<th>Masa Pemakaian</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php
										$nomor = 1;
                                        $harga = 0; 

										@endphp
										@foreach ($data as $row)
										@if(auth()->user()->id_data == 1)
										<tr>
											<td>{{$nomor++}}</td>
											<td>{{$row->name}}</td>
											<td>{{$row->email}}</td>
											<td>{{$row->notelp}}</td>
											<td>{{$row->tgl_bayar}}</td>
											<td>{{rupiah($row->harga)}}</td>
											@if($row->pay < 1)
											<td>
												<a data-toggle="modal" data-target="#basicModal" href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-edit"></i> Bayar Sekarang</a>
											</td>
											<td>
												<a data-toggle="modal" data-target="#basicModal" href="" class="btn btn-icon icon-left btn-warning"> Sudah Tidak Aktif</a>
											</td>
											@elseif($row->pay == 1)
											<td>
												<a data-toggle="modal" data-target="#basicModals{{$row->id}}" href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Menunggu Konfirmasi</a>
											</td>
											<td>
												<a href="#" class="btn btn-icon icon-left btn-success"> Sudah Bayar</a>
											</td>
											@else
											<td>
											    <?php 
												    $fdate = $row->dibayar;
                                                    $tdate = now()->format('Y-m-d');;
                                                    $datetime1 = new DateTime($fdate);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                    ?>
                                                    @if(now()->format('Y-m-d') > $row->dibayar)
                                                    <a data-toggle="modal" data-target="#basicModal" href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-edit"></i> Bayar Sekarang</a>
                                                    @elseif(now()->format('Y-m-d') < $row->dibayar)
                                                    	<a href="#" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i> Sudah Aktif</a>
                                                    @endif
											
											
											</td>
											<td>
											    @if($row->id_data == 1)
												<a href="#" class="btn btn-icon icon-left btn-success"> Selamanya</a>
												@else
												<?php 
												    $fdate = $row->dibayar;
                                                    $tdate = now()->format('Y-m-d');;
                                                    $datetime1 = new DateTime($fdate);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                    ?>
                                                    @if(now()->format('Y-m-d') > $row->dibayar)
                                                    <a data-toggle="modal" data-target="#basicModal" href="" class="btn btn-icon icon-left btn-warning"> Sudah Tidak Aktif</a>
                                                    @elseif(now()->format('Y-m-d') < $row->dibayar)
    												<a href="#" class="btn btn-icon icon-left btn-success"> {{$days}} hari lagi</a>
    												@endif
												@endif
											</td>
											@endif
											<td align="center">
												<form id="data-{{ $row->id }}" action="{{route('user.delete',$row->id)}}" method="post">
													{{csrf_field()}}
													{{method_field('delete')}}
												</form>
												@csrf
												@method('DELETE')
												<button type="submit" onclick="deleteRow( {{ $row->id }} )" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i> Hapus</button>
											</td>
										</tr>
										@elseif($row->id_data == auth()->user()->id_data)
										<tr>
											<td>{{$nomor++}}</td>
											<td>{{$row->name}}</td>
											<td>{{$row->email}}</td>
											<td>{{$row->notelp}}</td>
											@if($row->pay < 1)
											<td>
												<a data-toggle="modal" data-target="#basicModal" href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-edit"></i> Bayar Sekarang</a>
											</td>
											<td>
												<a data-toggle="modal" data-target="#basicModal" href="" class="btn btn-icon icon-left btn-warning"> Sudah Tidak Aktif</a>
											</td>
											@elseif($row->pay == 1)
											<td>
												<a data-toggle="modal" data-target="#basicModals{{$row->id}}" href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Menunggu Konfirmasi</a>
											</td>
											<td>
												<a href="#" class="btn btn-icon icon-left btn-success"> Sudah Bayar</a>
											</td>
											@else
											<td>
												<a href="#" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i> Sudah Aktif</a>
											</td>
											<td>
												<a href="#" class="btn btn-icon icon-left btn-success"> Sudah Bayar</a>
											</td>
											@endif
											<td align="center">
												<form id="data-{{ $row->id }}" action="{{route('user.delete',$row->id)}}" method="post">
													{{csrf_field()}}
													{{method_field('delete')}}
												</form>
												@csrf
												@method('DELETE')
												<button type="submit" onclick="deleteRow( {{ $row->id }} )" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i> Hapus</button>
											</td>
										</tr>
										@endif
                                        <?php $harga += $row->harga; ?>
										@endforeach
									</tbody>
									  <tr>
                                            <td colspan="5" class="text-center"><b>Total</b></td>
                                            <td><b>{{rupiah($harga)}}</b></td>
                                            <td colspan="4" class="text-center"><b>Total</b></td>
                                      </tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
	@section('script')
	<script src="{{ asset('admin/assets/bundles/lightgallery/dist/js/lightgallery-all.js') }}"></script>
	<!-- Page Specific JS File -->
	<script src="{{ asset('admin/assets/js/page/light-gallery.js') }}"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(document).ready(function() {
      let start = moment().startOf('month')
      let end = moment().endOf('month')

      $('#exportpdf').attr('href', '/administrator/reports/order/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

      $('#created_at').daterangepicker({
        startDate: start,
        endDate: end
    }, function(first, last) {
        $('#exportpdf').attr('href', '/administrator/reports/order/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    })
  })
</script>
	@endsection
