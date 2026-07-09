@extends('forgetpassword.layout_forgetpassword')
@section('content')
<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Reset password</h3>
		
		<div class="card-text">

			<div class="mt-5">
				@if($errors->any())
					<div class="col-12">
						@foreach($errors->all() as $error)
							<div class="alert alert-danger">
								{{$error}}
							</div>
						@endforeach
					</div>
				@endif

				@if(session()->has('error'))
					<div class="alert alert-danger">{{ session('error') }}</div>
				@endif

				@if(session()->has('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
				@endif
			</div>

			<form method="POST" action="{{ route('forgetPasswordstudent.post') }}">
				@csrf <!-- Add CSRF token for security -->
				<div class="form-group">
					<label for="studentemail">Enter your email address, and we will send you a link to reset your password.</label>
					<div class="container3">
						<input type="email" id="studentemail" class="form-control form-control-sm" name="studentemail" placeholder="Enter your email address" required>
					</div>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Send password reset email</button>
			</form>
		</div>
	</div>
</div>
@endsection
