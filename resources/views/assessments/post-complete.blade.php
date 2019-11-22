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
				
					<h1>Postassessment</h1>
					<p>Thank you for taking your assessment! Here is your grade comparisson from you preassessment and your postassessment:</p>
					
					<div class="results">
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-6 cell text-center">
								<h2 class="grade {{ ($pre_assessment->grade >= 50) ? 'positive' : 'negative' }}">{{ $pre_assessment->grade }}%</h2>
								<h6>Preassessment</h6>
							</div>
							<div class="small-12 medium-6 cell text-center">
								<h2 class="grade {{ ($post_assessment->grade >= 50) ? 'positive' : 'negative' }}">{{ $post_assessment->grade }}%</h2>
								<h6>Postassessment</h6>
							</div>
						</div>
					</div>
					
					<a href="/" class="button">Back To Portfolios</a>
					
				</div>
			</div>
		</div>
	</div>

@endsection