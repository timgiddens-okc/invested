@extends('layouts.app')

@section('content')

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell">
			<div class="form">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h1>Reset Password</h1>					
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
					<form action="{{ route('password.update') }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="token" value="{{ $token }}">
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
								<label>
									Confirm Password
									<input type="password" name="password_confirmation" class="{{ ($errors->has('password_confirmation')) ? 'field-error' : '' }}" required>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell text-right">
								<button type="submit" class="button">Reset Password</button>						
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection