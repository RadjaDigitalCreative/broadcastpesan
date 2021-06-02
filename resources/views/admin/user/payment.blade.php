@extends('layouts.app')
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Buat Harga</h4>
					</div>
					<div class="card-body">
						<form action="{{route('user.payment.store')}}" method="post" class="needs-validation" enctype="multipart/form-data">
							@csrf
							
							<div class="card-body">
								<div id="app">
									<div class="row" v-for="(order, index) in orders" :key="index">
										<div class="col-md-4">
											<div class="form-group">
												<input  type="number" name="bulan[]" class="form-control" required="" placeholder="Pemakain Bulan">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input  type="number" placeholder="Harga" name="harga[]" class="form-control" required="" >
											</div>
										</div>
										<div class="buttons">
											<button type="button"  @click="delOrder(index)" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
											<button type="button" @click="addOrder()" class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-right">
								<button type="submit" class="btn btn-primary">Buat Harga</button>
								<button type="reset" class="btn btn-danger">Reset</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>List Harga Yang Ada</h4>
					</div>
					<div class="card-body">
						<div class="buttons text-right">
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
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php
									$nomor = 1;
									function rupiah($m)
									{
										$rupiah = "Rp ".number_format($m,0,",",".").",-";
										return $rupiah;
									}
									@endphp
									@foreach ($data as $row)
									<tr>
										<td>{{$nomor++}}</td>
										<td>{{$row->hari}} Hari</td>
										<td>{{rupiah($row->harga)}}</td>
										<td align="center">
											<form id="data-{{ $row->id }}" action="{{route('user.payment.delete',$row->id)}}" method="post">
												{{csrf_field()}}
												{{method_field('delete')}}
											</form>
											@csrf
											@method('DELETE')
											<button type="submit" onclick="deleteRow( {{ $row->id }} )" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i> Hapus</button>
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
</section>
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script type="text/javascript">
	new Vue({
		el: '#app',
		data: {
			orders: [
			{pesanan: 0, nama: "", harga: 0, jumlah: 1, subtotal: 0},
			],
			discount: 0,
			note: "",
		},
		methods: {
			addOrder(){
				var orders = {pesanan: 0, nama: "", harga: 0, jumlah: 1, subtotal: 0};
				this.orders.push(orders);
			},
			delOrder(index){
				if (index > 0){
					this.orders.splice(index,1);
				}
			},
		},
	});
</script>
@endsection
@endsection