<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Reset password</h3>
		
		<div class="card-text">
			<div class="mt-5">
				@if($errors->any())
					<div class="col-12">
						@foreach($errors->all() as $error)
							<div class="alert alert-danger">
								{{ $error }}
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

			<form method="POST" action="{{ route('studentresetpasswordpost') }}">
				@csrf
				<input type="hidden" name="token" value="{{ $token }}">
				<input type="hidden" name="studentemail" value="{{ $email }}">
				<div class="form-group">
				<label>Email Address</label>
					<input type="email" class="form-control form-control-sm" value="{{ $email }}" disabled>
				</div>

				<div class="form-group">
					<label for="studentpassword">Enter New Password</label>
					<input type="password" class="form-control form-control-sm" name="studentpassword" placeholder="Enter your new password">
				</div>	

				<div class="form-group">
					<label for="studentpassword_confirmation">Confirm New Password</label>
					<input type="password" class="form-control form-control-sm" name="studentpassword_confirmation" placeholder="Confirm your new password">
				</div>

				<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
			</form>
		</div>
	</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
