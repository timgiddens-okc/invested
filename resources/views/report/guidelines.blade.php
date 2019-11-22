@extends('layouts.app')

@section('content')
	
	<div id="company-information">
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
				
					<h1>STARS Report Requirements</h1>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<h6>Report Layout</h6>
								<p>
									<strong>Cover Page</strong><br>
									Refer to <a href="{{ asset('report-guidelines/cover-page-guidelines.pdf') }}" target="_blank">these guidelines</a>
								</p>
								<p>
									<strong>Body</strong><br>
									8 page maximum length including, cover and works cited.  No minimum length requirement.
								</p>
								<p>
									<strong>Works Cited</strong><br>
									At end of paper.  Please use a minimum of five cited resources. Refer to <a href="{{ asset('report-guidelines/works-cited-guidelines.pdf') }}" target="_blank">guidelines</a>.
								</p>
								<p>
									<strong>Format</strong><br>
									&bull; 1” margins<br>
									&bull; Double spaced<br>
									&bull; Font size 12 <br>
									&bull; Font – Arial, Times New Roman, or Century Schoolbook
								</p>
								<h6>Report Contents</h6>
								<p>The purpose of the STARS report is to summarize what you have learned throughout the STARS project.  Items that STARS would like to see addressed are a discussion of your risk assessment, project goal, research of stock, risk and diversification within your portfolio, activity in your portfolio, and fraud.   In addition we would like you to detail at least one stock that you purchased for your portfolio including, but not limited to, the company history, sector, industry and relevant factor for your purchase.   We would like the report to show us the benefits you received from STARS.</p>
							</div>
						</div>		
					</section>
					
					@if(isset($portfolio))
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell text-right">
							<a href="/portfolio/{{ $portfolio->slug }}" class="button">Back To Portfolio</a>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection