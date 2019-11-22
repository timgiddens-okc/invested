@extends('layouts.app')

@section('content')

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 medium-8 cell">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has($msg))
				      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
				      @endif
				    @endforeach
					</div>
				</div>
			
				<h1>Classes</h1>
				@if($classes)
					@foreach($classes as $class)
						<div class="class">
						<?php
							$students = \App\User::where('class_id',$class->id)->pluck('id');
							$portfolios = \App\Portfolio::where('stars',1)->whereIn('user_id',$students)->get();
						?>
						<div class="class-title">
							<div class="grid-x grid-padding-x align-bottom">
								<div class="small-7 cell">
									<h2>{{ $class->name }}</h2>
								</div>
								<div class="small-5 cell text-right">
									<h3>Code: {{ $class->code }}</h3>
								</div>
							</div>
						</div>
							<div class="grid-x grid-padding-x small-up-1 medium-up-2">
								@foreach($portfolios as $portfolio)
								<a href="/portfolio/{{ $portfolio->slug }}" class="cell" id="portfolio-{{ $portfolio->id }}">
									<section class="home current-stats text-center portfolio-info">
										<i class="fa fa-spinner fa-spin"></i><br>
										<p>Loading...</p>
									</section>
								</a>
								<script type="text/javascript">
									$.ajax({
										async: "true",
										method: "GET",
										url: "/portfolio-info/{{ $portfolio->id }}",
										success: function(data){
											$("#portfolio-{{ $portfolio->id }}").html(data);
										}
									});					
								</script>
								@endforeach				
							</div>
						</div>
					@endforeach
				@endif
			</div>
			<div class="small-12 medium-4 cell">
				<section>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							<h2>Create Class</h2>
							@if($errors->any())
								<div class="callout alert">
									<p>
										@foreach($errors->all() as $error)
											{{ $error }}<br>
										@endforeach
									</p>
								</div>
							@endif
							<form action="/create-class" method="post">
								@csrf
								<div class="grid-x grid-padding-x">
									<div class="small-12 cell">
										<label>
											Class Name
											<input type="text" name="name" />
										</label>
									</div>
								</div>
								<div class="grid-x grid-padding-x">
									<div class="small-12 cell">
										<label>
											Class Category
											<select name="category">
												<option value="1">Financial Literacy</option>
												<option value="2">Math</option>
												<option value="3">Social Sciences</option>
												<option value="4">Economics</option>
												<option value="5">English</option>
												<option value="6">Science</option>
												<option value="7">Computer</option>
												<option value="8">Agriculture</option>
												<option value="9">Career Technology</option>
											</select>
										</label>
									</div>
								</div>
								<div class="grid-x grid-padding-x">
									<div class="small-12 cell">
										<button type="submit" class="button">Add Class</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

@endsection
