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
				
					<?php
						$student = null;
						if(\Auth::user()->type == 1){
							$s = \App\User::where('id', $portfolio->user_id)->first();
							$student = "For " . $s->name;
						}	
					?>
					@if($student)
						<h6>{{ $student }}</h6>
					@endif
					<h1>Detailed Company Information</h1>
					<p>The STARS report asks you to write in detail about one company, but to do proper research on your companies you should ask many of the questions asked on this screen to determine if a company is a good fit for your portfolio based on your investment goal. Therefore, you could have detailed information on all your companies.</p>
					
					@if(\Auth::user()->type != 1)
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<form action="" method="post">
									@csrf
									<h2>Basic Information</h2>
									<div class="grid-x grid-padding-x">
										<div class="small-12 medium-6 cell">
											<label>
												Company
												<input type="text" name="company" required />
											</label>
										</div>
										<div class="small-12 medium-6 cell">
											<label>
												Ticker Symbol
												<input type="text" name="ticker" required />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 medium-4 cell">
											<label>
												Industry
												<input type="text" name="industry" />
											</label>
										</div>
										<div class="small-12 medium-4 cell">
											<label>
												Sector
												<input type="text" name="sector" />
											</label>
										</div>
										<div class="small-12 medium-4 cell">
											<label>
												Products/Services
												<input type="text" name="products_services" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-6 medium-3 cell">
											<label>
												PE Ratio
												<input type="text" name="pe" />
											</label>
										</div>
										<div class="small-6 medium-3 cell">
											<label>
												Earnings Per Share
												<input type="text" name="earnings_per_share" />
											</label>
										</div>
										<div class="small-6 medium-3 cell">
											<label>
												Market Cap
												<select name="market_cap">
													<option value="Large Cap">Large Cap</option>
													<option value="Mid Cap">Mid Cap</option>
													<option value="Small Cap">Small Cap</option>
												</select>
											</label>
										</div>
										<div class="small-6 medium-3 cell">
											<label>
												% Sales Growth for Next Year
												<input type="text" name="sales_growth" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 medium-4 cell">
											<label>
												Company Headquarters
												<input type="text" name="company_headquarters" />
											</label>
										</div>
										<div class="small-12 medium-4 cell">
											<label>
												Year Company Founded
												<input type="text" name="year_company_founded" />
											</label>
										</div>
										<div class="small-12 medium-4 cell">
											<label>
												Company Website / Investor Relations Page
												<input type="text" name="website" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Description
												<textarea name="description"></textarea>
											</label>
										</div>
									</div>
																		
									<h2>News/Current Events</h2>
									<p>Find article/information related to some of the interesting data points you found, and/or recent, relevant events that may affect your portfolio. Document key points of articles.</p>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Source
												<input type="text" name="source" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Key Points
												<textarea name="key_points"></textarea>
											</label>
										</div>
									</div>
									
									<h2>Information from Company Sources</h2>
									<p>If possible, contact an employee of the company. Ask questions relevant to the company’s stock, the stock market, and/or your portfolio.</p>
									
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Source/Employee
												<input type="text" name="employee" />
											</label>
										</div>
									</div>
									
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Question
												<input type="text" name="question_one" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Answer
												<textarea name="answer_one"></textarea>
											</label>
										</div>
									</div>
									
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Question
												<input type="text" name="question_two" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Answer
												<textarea name="answer_two"></textarea>
											</label>
										</div>
									</div>
									
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Question
												<input type="text" name="question_three" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Answer
												<textarea name="answer_three"></textarea>
											</label>
										</div>
									</div>
									
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell text-right">
											<button type="submit" class="button">Submit Company Information</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>
					@endif
					
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