@extends('layouts.app')

@section('content')

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell">
			<div class="form">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h1>Login</h1>					
					</div>
				</div>
				<div class="form-box">
					@if($errors->any())
						<div class="callout alert">
							<p>
								@foreach($errors->all() as $error)
									{{ $error }}<br>
								@endforeach
							</p>
						</div>
					@endif
					<form action="{{ route('login') }}" method="post">
						{{ csrf_field() }}
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									E-Mail Address
									<input type="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'field-error' : '' }}" required autofocus>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Password
									<input type="password" name="password" class="{{ ($errors->has('password')) ? 'field-error' : '' }}" required>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<input type="checkbox" name="remember" {{ (old('remember')) ? 'checked' : '' }}> Remember Me
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell text-right">
								<a href="/register" class="forgot-password">Create A New Account</a> <a href="{{ route('password.request') }}" class="forgot-password">Forgot your password?</a>
								<button type="submit" class="button">Login</button>						
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
