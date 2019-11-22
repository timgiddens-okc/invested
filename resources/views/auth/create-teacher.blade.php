@extends('layouts.app')

@section('content')

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell">
			<div class="form">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h1>Register</h1>
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
					<form action="/register-teacher" method="post">
						{{ csrf_field() }}
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Name
									<input type="text" class="{{ $errors->has('name') ? 'field-error' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									E-Mail Address
									<input type="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'field-error' : '' }}" required>
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
							<div class="small-12 cell">
								<label>
									Teacher Id
									<input type="text" class="{{ $errors->has('teacher_id') ? 'field-error' : '' }}" name="teacher_id" value="{{ old('teacher_id') }}" required>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									High School
									<input type="text" class="{{ $errors->has('high_school') ? 'field-error' : '' }}" name="high_school" value="{{ old('high_school') }}" required>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									OSSAA Academic Classification (<a href="http://www.ossaa.net/docs/2018-19/Classifications/AC_2018-19_Classificiations.pdf" target="_blank">Find Yours</a>)
									<select name="classification">
										<option value="A">A</option>
										<option value="2A">2A</option>
										<option value="3A">3A</option>
										<option value="4A">4A</option>
										<option value="5A">5A</option>
										<option value="6A">6A</option>
										<option value="Other">Other</option>
									</select>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell text-right">
								<button type="submit" class="button">Register</button>						
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
