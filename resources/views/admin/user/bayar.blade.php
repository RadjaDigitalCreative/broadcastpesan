@extends('layouts.app')
@section('content')
<!-- modal user bayar -->
@php
function rupiah($m)
{
	$rupiah = "Rp ".number_format($m,0,",",".").",-";
	return $rupiah;
}
@endphp
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Bayar Sekarang</h5><i class="far fa-dollar"></i> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('user.payment.bayar2') }}" method="POST" enctype="multipart/form-data">
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

<section class="section">
	<div class="row ">
		<div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="card">
				<div class="card-statistic-4">
					<div class="align-items-center justify-content-between">
						<div class="row ">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
								<div class="card-content">
									<h2 class="mb-3 font-18">Silahkan Lakukan Pembayaran Ulang </h2>
									@if($role_pay->pay == 1)
									<a href="#" class="btn btn-icon btn-lg icon-left btn-success"><i class="fas fa-check"></i> Success</a>

									@else
									<a href="" data-toggle="modal" data-target="#basicModal"><p class="mb-0"><span class="col-green">Klik Tombol Ini </span> </p></a>

									@endif
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
								<div class="banner-img">
									<img src="{{ asset('admin/assets/img/banner/1.png') }}" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@if($role_pay->pay == 1)
<section class="section">
	<div class="row ">
		<div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="card">
				<div class="card-statistic-4">
					<div class="align-items-center justify-content-between">
						<div class="row ">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
								<div class="card-content">
									<h2 class="mb-3 font-18">Pembayaran Anda Sedang Menunggu Konfirmasi </h2>
									@if($role_pay->pay == 2)
									<a href="#" class="btn btn-icon btn-lg icon-left btn-success"><i class="fas fa-check"></i> Success</a>

									@endif
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
								<div class="banner-img">
									<img src="{{ asset('admin/assets/img/banner/2.png') }}" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@elseif($role_pay->pay == 2)
<section class="section">
	<div class="row ">
		<div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="card">
				<div class="card-statistic-4">
					<div class="align-items-center justify-content-between">
						<div class="row ">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
								<div class="card-content">
									<h2 class="mb-3 font-18">Pembayaran Anda Berhasil </h2>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
								<div class="banner-img">
									<img src="{{ asset('admin/assets/img/banner/3.png') }}" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
@endsection