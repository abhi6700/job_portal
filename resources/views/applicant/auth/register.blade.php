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
					<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
					<form method="POST" action="{{ route('applicant.auth.register') }}">
						@csrf
						<div class="mb-3">
							<label class="mb-2 text-muted" for="email">Full Name</label>
							<input type="text" class="form-control"
								name="name" id="name" placeholder="John Doe"
								value="{{old('name')}}" />
							@error('name')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>

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
							<label class="mb-2 text-muted" for="mobile">Mobile Number</label>
							<input type="tel" class="form-control"
								name="mobile" id="mobile" placeholder="123-456-7890"
								value="{{old('mobile')}}" />
							@error('mobile')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>

						<div class="mb-3">
							<div class="mb-2 w-100">
								<label class="text-muted" for="password">Password</label>
							</div>
							<input type="password" class="form-control"
								name="password" id="password" placeholder="Enter your password" />
							@error('password')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>

						<div class="mb-3">
							<div class="mb-2 w-100">
								<label class="text-muted" for="password">Confirm Password</label>
							</div>
							<input type="password" class="form-control"
								name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" />
							@error('password_confirmation')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>

						<div class="d-flex align-items-center">
							<!-- <div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div> -->
							<button type="submit" class="btn btn-primary ms-auto">
								Register
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
						Already have an account? <a href="{{ route('applicant.auth.login') }}" class="text-dark">Login</a>
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