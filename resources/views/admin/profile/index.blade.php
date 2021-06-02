@extends('layouts.app')
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-sm-4">
			<div class="col-12 col-md-12 col-lg-4">
				<div class="card author-box">
					<div class="card-body">
						<div class="author-box-center">
							<img alt="image" src="
							@if(auth()->user()->image != NULL)
							{{ URL::to('/') }}/images/{{ auth()->user()->image }}
							@else
							{{ asset('admin/assets/img/users/user-1.png') }}
							@endif
							" class="rounded-circle author-box-picture">
							<div class="clearfix"></div>
							<div class="author-box-name">
								<a href="#">{{ Auth::user()->name }}</a>
							</div>
							<div class="author-box-job">{{ Auth::user()->email }}</div>
						</div>
						<div class="text-center">
							<div class="author-box-description">
								<p>
									{{ Auth::user()->bio }}.
								</p>
							</div>
							<div class="mb-2 mt-3">
								<div class="text-small font-weight-bold">{{ Auth::user()->notelp }}</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4>Personal Details</h4>
					</div>
					<div class="card-body">
						<div class="py-4">
							<p class="clearfix">
								<span class="float-left">
									Tempat, Tanggal Lahir 
								</span>
								<span class="float-right text-muted">
									30-05-1998
								</span>
							</p>
							<p class="clearfix">
								<span class="float-left">
									No. Telepon
								</span>
								<span class="float-right text-muted">
									{{ Auth::user()->notelp }}
								</span>
							</p>
							<p class="clearfix">
								<span class="float-left">
									Email
								</span>
								<span class="float-right text-muted">
									{{ Auth::user()->email }}
								</span>
							</p>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4>Skills</h4>
					</div>
					<div class="card-body">
						<ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
							@foreach ($skill as $row)
							@if($row->id_user == auth()->user()->id)
							<li class="media">
								<div class="media-body">
									<div class="media-title">{{$row->kemampuan}}</div>
								</div>
								<div class="media-progressbar p-t-10">
									<div class="progress" data-height="6">
										<div class="progress-bar bg-primary" data-width="{{$row->skill}}%"></div>
									</div>
								</div>
							</li>
							@endif
							@endforeach
						
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-8">
				<div class="card">
					<div class="padding-20">
						<ul class="nav nav-tabs" id="myTab2" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
								aria-selected="true">Tentang</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
								aria-selected="false">Pengaturan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#skill" role="tab"
								aria-selected="false">Skill</a>
							</li>
						</ul>
						<div class="tab-content tab-bordered" id="myTab3Content">
							<div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
								<div class="row">
									<div class="col-md-4 col-6 b-r">
										<strong>Nama Lengkap</strong>
										<br>
										<p class="text-muted">{{ Auth::user()->name }}</p>
									</div>
									<div class="col-md-4 col-6 b-r">
										<strong>No.Telepon</strong>
										<br>
										<p class="text-muted">{{ Auth::user()->notelp }}</p>
									</div>
									<div class="col-md-4 col-6 b-r">
										<strong>Email</strong>
										<br>
										<p class="text-muted">{{ Auth::user()->email }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-6">
										<strong>Lokasi</strong>
										<br>
										<p class="text-muted">Indonesia</p>
									</div>
								</div>
								<div class="row">

									<div class="col-md-4 col-6 b-r">
										<strong>Biografi</strong>
										<p class="text-muted">{{ Auth::user()->bio }}.</p>
									</div>
								</div>

							</div>

							<!-- FORM UPDATE DATA -->
							<div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
								<form action="{{route('profile.store')}}" method="post" class="needs-validation" enctype="multipart/form-data">
									@csrf
									<div class="card-header">
										<h4>Edit Profile</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="form-group col-md-12 col-12">
												<label>Nama Lengkap</label>
												<input name="name" type="text" class="form-control" value="{{auth()->user()->name}}">
												<div class="invalid-feedback">
													Silahkan isi nama depan
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-7 col-12">
												<label>Email</label>
												<input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
												<div class="invalid-feedback">
													Silahkan isi email anda
												</div>
											</div>
											<div class="form-group col-md-5 col-12">
												<label>No. Telepon</label>
												<input type="tel" class="form-control" name="notelp" value="{{auth()->user()->notelp}}">
											</div>
										</div>
										<div class="row">
											<div class="form-group col-12">
												<label>Bio</label>
												<textarea name="bio" 
												class="form-control summernote-simple">{{auth()->user()->bio}}</textarea>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-10 col-12">
												<label>Foto</label>
												<input type="hidden" name="hidden_image" value="{{auth()->user()->image}}" />
												<input type="hidden" name="id" value="{{auth()->user()->id}}" />
												<input type="file" class="form-control" name="image">
												<div class="invalid-feedback">
													Silahkan isi foto anda
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button class="btn btn-primary">Ganti Perubahan</button>
									</div>
								</form>
							</div>

							<!-- UPDATE SKILL -->
							<div class="tab-pane fade" id="skill" role="tabpanel" aria-labelledby="profile-tab3">
								<form action="{{route('profile.store2')}}" method="post" class="needs-validation" >
									@csrf
									<div class="card-header">
										<h4>Tambah Skill</h4>
									</div>
									<div class="card-body">
										<input type="hidden" name="id" value="{{auth()->user()->id}}" />

										<div id="app">
											<div class="row" v-for="(order, index) in orders" :key="index">
												<div class="col-md-4">
													<div class="form-group">
														<input  type="text" name="kemampuan[]" class="form-control" required="" placeholder="Kemampuan">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<input  type="number" placeholder="%" name="skill[]" class="form-control" required="" >
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
										<button class="btn btn-primary">Ganti Perubahan</button>
									</div>
								</form>
							</div>
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