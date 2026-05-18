@extends('applicant.layouts.app')
@section('content')
<div class="container h-100">
	<div class="row justify-content-sm-center h-100">
		<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
			<div class="text-center my-3">
				<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="70">
			</div>
			<div class="card shadow-lg">
				<div class="card-body p-5">
					<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
					<form method="POST" action="{{ route('applicant.auth.login') }}">
						@csrf
						<div class="mb-3">
							<label class="mb-2 text-muted" for="email">E-Mail Address</label>
							<input type="email" class="form-control"
								name="email" id="email" placeholder="admin@email.com"
								value="{{old('email')}}" />
							@error('email')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>

						<div class="mb-3">
							<div class="mb-2 w-100">
								<label class="text-muted" for="password">Password</label>
							</div>
							<input type="password" class="form-control "
								name="password" id="password" placeholder="Enter your password" />
							@error('password')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>

						<div class="d-flex align-items-center">
							<button type="submit" class="btn btn-primary ms-auto">
								Login
							</button>
						</div>

					</form>
					@error('error')
					<div class="text-center">
						<span class="text-danger">{{ $message }}</span>
					</div>
					@enderror
				</div>

				<div class="card-footer py-3 border-0">
					<div class="text-center">
						Don't have an account? <a href="{{ route('applicant.auth.register.index') }}" class="text-dark">Create One</a>
					</div>
				</div>
			</div>
			<!-- <div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2021 &mdash; Your Company 
					</div> -->
		</div>
	</div>
</div>
@endsection