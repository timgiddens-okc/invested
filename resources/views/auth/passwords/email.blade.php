@extends('layouts.app')

@section('content')

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell">
			<div class="form">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h1>Forgot Password</h1>					
					</div>
				</div>
				<div class="form-box">
					@if (session('status'))
						<div class="callout success">
							<p>{{ session('status') }}</p>
						</div>
					@endif
					@if($errors->any())
						<div class="callout alert">
							<p>
								@foreach($errors->all() as $error)
									{{ $error }}<br>
								@endforeach
							</p>
						</div>
					@endif
					<form action="{{ route('password.email') }}" method="post">
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
							<div class="small-12 cell text-right">
								<button type="submit" class="button">Send Password Reset</button>						
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection