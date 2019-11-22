@extends('layouts.app')

@section('content')
	
	<div id="research">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has($msg))
					      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
					      @endif
					    @endforeach
						</div>
					</div>
				
					<h1>Preassessment</h1>
					<p>Thank you for taking your assessment! Here is your grade:</p>
					
					<div class="results">
						<h2 class="grade {{ ($assessment->grade >= 50) ? 'positive' : 'negative' }}">{{ $assessment->grade }}%</h2>
					</div>
					
					<a href="/" class="button">Back To Portfolios</a>
					
				</div>
			</div>
		</div>
	</div>

@endsection