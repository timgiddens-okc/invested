@extends('layouts.app')

@section('content')

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<h1>Settings</h1>
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has($msg))
				      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
				      @endif
				    @endforeach
					</div>
				</div>
			
			<div class="grid-x grid-padding-x">
				<div class="small-12 medium-6 cell">
					<section>
						<h2>Update Information</h2>
						<form action="/update-information" method="post">
							@csrf
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Name
										<input type="text" name="name" value="{{ \Auth::user()->name }}" />
									</label>
								</div>
							</div>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Email Address
										<input type="text" name="email" value="{{ \Auth::user()->email }}" />
									</label>
								</div>
							</div>
							@if(\Auth::user()->type == 1)
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										High School
										<input type="text" name="high_school" value="{{ \Auth::user()->high_school }}">
									</label>
								</div>
							</div>
								
							@else
							<div class="grid-x grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>
									High School
									<input type="text" name="high_school" value="{{ \Auth::user()->high_school }}">
								</label>
							</div>
							<div class="small-12 medium-6 cell">
								<label>
									Grade
									<select name="grade">
										<option {{ (\Auth::user()->grade == '9th Grade') ? 'selected' : '' }} value="9th Grade">9th Grade</option>
										<option {{ (\Auth::user()->grade == '10th Grade') ? 'selected' : '' }} value="10th Grade">10th Grade</option>
										<option {{ (\Auth::user()->grade == '11th Grade') ? 'selected' : '' }} value="11th Grade">11th Grade</option>
										<option {{ (\Auth::user()->grade == '12th Grade') ? 'selected' : '' }} value="12th Grade">12th Grade</option>
										<option {{ (\Auth::user()->grade == 'N/A') ? 'selected' : '' }} value="N/A">N/A</option>
									</select>
								</label>
							</div>
						</div>
						@endif
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									OSSAA Academic Classification (<a href="http://www.ossaa.net/docs/2018-19/Classifications/AC_2018-19_Classificiations.pdf" target="_blank">Find Yours</a>)
									<select name="classification">
										<option {{ (\Auth::user()->classification == "A") ? "selected" : "" }} value="A">A</option>
										<option {{ (\Auth::user()->classification == "2A") ? "selected" : "" }} value="2A">2A</option>
										<option {{ (\Auth::user()->classification == "3A") ? "selected" : "" }} value="3A">3A</option>
										<option {{ (\Auth::user()->classification == "4A") ? "selected" : "" }} value="4A">4A</option>
										<option {{ (\Auth::user()->classification == "5A") ? "selected" : "" }} value="5A">5A</option>
										<option {{ (\Auth::user()->classification == "6A") ? "selected" : "" }} value="6A">6A</option>
										<option {{ (\Auth::user()->classification == "Other") ? "selected" : "" }} value="Other">Other</option>
									</select>
								</label>
							</div>
						</div>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell text-right">
									<button type="submit" class="button">Update</button>
								</div>
							</div>
						</form>
					</section>
					@if(\Auth::user()->type == 0)
					<section>
						<h2>Class</h2>
						<?php 
							if(\Auth::user()->class_id){
								$class = \App\TeacherCode::where('id',\Auth::user()->class_id)->first(); 
								$teacher = \App\User::find($class->user_id);
						?>	
						<p>Your current teacher is <strong>{{ $teacher->name }}</strong> in <strong>{{ $class->name }}</strong>. If this is incorrect, please enter a new code below.</p><br>
						<?php
							}
						?>
						<form action="/update-teacher" method="post">
							@csrf
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Enter Class Code (ask your teacher for this code!)
										<input type="text" name="teacher_code" />
									</label>
								</div>
							</div>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell text-right">
									<button type="submit" class="button">Update</button>
								</div>
							</div>
						</form>
					</section>
					@endif
				</div>
				<div class="small-12 medium-6 cell">
					<section>
						<h2>Update Password</h2>
						<form action="/update-password" method="post">
							@csrf
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										New Password
										<input type="password" name="password" />
									</label>
								</div>
							</div>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Confirm New Password
										<input type="password" name="password_confirmation" />
									</label>
								</div>
							</div>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell text-right">
									<button type="submit" class="button">Update</button>
								</div>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>

@endsection
