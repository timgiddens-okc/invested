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
				
					<h1>{{ $company->company }} ({{ $company->ticker }})</h1>
					<section>
						<h2>Basic Information</h2>
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-4 cell">
								<h6>Industry</h6>
								<h4>{{ $company->industry }}</h4>
							</div>
							<div class="small-12 medium-4 cell">
								<h6>Sector</h6>
								<h4>{{ $company->sector }}</h4>
							</div>
							<div class="small-12 medium-4 cell">
								<h6>Products/Services</h6>
								<h4>{{ $company->products_services }}</h4>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-4 cell">
								<h6>PE Ratio</h6>
								<h4>{{ $company->pe }}</h4>
							</div>
							<div class="small-12 medium-4 cell">
								<h6>Earnings Per Share</h6>
								<h4>{{ $company->earnings_per_share }}</h4>
							</div>
							<div class="small-12 medium-4 cell">
								<h6>Market Cap</h6>
								<h4>{{ $company->market_cap }}</h4>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-4 cell">
								<h6>Company Headquarters</h6>
								<h4>{{ $company->company_headquarters }}</h4>
							</div>
							<div class="small-12 medium-4 cell">
								<h6>Year Founded</h6>
								<h4>{{ $company->year_company_founded }}</h4>
							</div>
							<div class="small-12 medium-4 cell">
								<h6>Website / Investor Relations Page</h6>
								<h4>{{ $company->website }}</h4>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-4 cell">
								<h6>% Sales Growth for Next Year</h6>
								<h4>{{ $company->sales_growth }}</h4>
							</div>
							<div class="small-12 medium-8 cell">
								<h6>Description</h6>
								<p>{{ nl2br($company->description) }}</p>
							</div>
						</div>
						<div class="divider"></div>
						<h2>News/Current Events</h2>
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-4 cell">
								<h6>Source</h6>
								<h4>{{ $company->source }}</h4>
							</div>
							<div class="small-12 medium-8 cell">
								<h6>Key Points</h6>
								<p>{{ nl2br($company->key_points) }}</p>
							</div>
						</div>
						<div class="divider"></div>
						<h2>Information From Company Sources</h2>
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-4 cell">
								<h6>Source/Employee</h6>
								<h4>{{ $company->employee }}</h4>
							</div>
							<div class="small-12 medium-8 cell">
								<h6>Questions</h6>
								<h4>{{ $company->question_one }}</h4>
								<p>{{ $company->answer_one }}</p>
								@if($company->question_two)
									<div class="divider"></div>
									<h4>{{ $company->question_two }}</h4>
									<p>{{ $company->answer_two }}</p>
								@endif
								@if($company->question_three)
									<div class="divider"></div>
									<h4>{{ $company->question_three }}</h4>
									<p>{{ $company->answer_three }}</p>
								@endif
							</div>
						</div>
					</section>
					
					@if(count($companies) > 0)
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<h2>Submitted Company Information</h2>
									<div class="portfolio-content">
									<table>
										<thead>
											<tr>
												<td>Company</td>
												<td>Ticker</td>
												<td>Industry</td>
												<td>Sector</td>
												<td>Products/Services</td>
												<td></td>
											</tr>
										</thead>
										<tbody>		
											@foreach($companies as $company)								
											<tr>											
												<td>{{ $company->company }}</td>
												<td>{{ $company->ticker }}</td>
												<td>{{ $company->industry }}</td>
												<td>{{ $company->sector }}</td>
												<td>{{ $company->products_services }}</td>
												<td class="text-center"><a href="/portfolio/{{ $portfolio->slug }}/company-information/{{ $company->id }}"><i class="fas fa-eye"></i></a> <a href="/portfolio/{{ $portfolio->slug }}/company-information/{{ $company->id }}/edit"><i class="fas fa-edit"></i></a></td>												
											</tr>
											@endforeach
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</section>
					@endif
					
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell text-right">
							<a href="/portfolio/{{ $portfolio->slug }}" class="button">Back To Portfolio</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection