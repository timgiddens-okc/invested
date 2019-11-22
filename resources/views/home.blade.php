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
			
				<h1>Portfolios</h1>
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
				@if(\Auth::user()->hasStarsPortfolio())
				<div class="disclaimer">
					<div class="star-note"><i class="fa fa-star"></i></div> This icon designates your official STARS portfolio.
				</div>
				@endif
			</div>
			<div class="small-12 medium-4 cell">
				<section>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							<h2>Create A Portfolio</h2>
							<a href="/portfolio/new" class="button expanded">Create New</a>
						</div>
					</div>
				</section>
				
				<section>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							<h2>Risk Assessment</h2>
							<p>Take your risk assessment!</p>
							<a href="/risk-assessment" class="button expanded">
								@if(\Auth::user()->risk)
									<i class="fas fa-check-circle"></i> Risk Assessment
								@else
									Take Risk Assessment
								@endif
							</a>
						</div>
					</div>
				</section>
				
				<section>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							<h2>Assessments</h2>
							<a href="/preassessment" class="button expanded">
								@if(\Auth::user()->preassessmentCompleted())
									<i class="fas fa-check-circle"></i> Preassessment
								@else
									Take Preassessment
								@endif
							</a>
							<a href="/postassessment" class="button expanded">
								@if(\Auth::user()->postassessmentCompleted())
									<i class="fas fa-check-circle"></i> Postassessment
								@else
									Take Postassessment
								@endif
							</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

@endsection
