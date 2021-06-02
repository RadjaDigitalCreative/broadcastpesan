@extends('layouts.auth.app')
@section('content')
<section class="section">
	<div class="container mt-5">
		<div class="row">
			<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
				<div class="card card-primary">
					<div class="card-header">
						<h4>Register</h4>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="row">
								<div class="form-group col-12">
									<label for="frist_name">Username</label>
									<input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
									@error('name')
									<div class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</div>
									@enderror

								</div>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email">
								@error('email')
								<div class="invalid-feedback">
									<strong>{{ $message }}</strong>
								</div>
								@enderror


							</div>
							<div class="row">
								<div class="form-group col-6">
									<label for="password" class="d-block">Password</label>
									<input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" name="password" data-indicator="pwindicator" >

									<div id="pwindicator" class="pwindicator">
										<div class="bar"></div>
										<div class="label"></div>
									</div>
								</div>
								<div class="form-group col-6">
									<label for="password2" class="d-block">Password Confirmation</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" name="password-confirm">
								</div>
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="agree" class="custom-control-input" id="agree">
									<label class="custom-control-label" for="agree">Saya Yakin dan Percaya</label>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg btn-block">
									Daftar
								</button>
							</div>
						</form>
					</div>
					<div class="mb-4 text-muted text-center">
						Apakah Anda Sudah Memiliki? <a href="{{ route('login') }}">MasuK</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection