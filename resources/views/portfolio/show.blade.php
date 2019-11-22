@extends('layouts.app')

@section('content')
	
	<div id="place-a-trade" class="{{ ($errors->any()) ? 'visible' : '' }}">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<h3>Place A Trade</h3>
				<p>TIP: For a $500,000 portfolio it is sometimes helpful when buying stocks that are selling under $100 that you think in terms of 1000 share buys instead of 100 share buys also called lots.</p>
				<div class="grid-x">
					<div class="small-6 cell text-center">
						<div class="open-menu active" data-target="buy">Buy</div>
					</div>
					<div class="small-6 cell text-center">
						<div class="open-menu" data-target="sell">Sell</div>
					</div>
				</div>
				<div class="purchase-menu" id="buy">
					<form action="/portfolio/{{ $portfolio->slug }}/buy" method="post" id="buy-form">
						{{ csrf_field() }}
						<div class="grid-x grid-padding-x">
							<div class="small-6 cell">
								<label>
									Ticker
									<input type="text" name="ticker" id="ticker" required />
								</label>
							</div>
							<div class="small-6 cell">
								<label>
									Quantity
									<input type="number" min="1" value="1" name="amount" id="shares" required />
								</label>
							</div>
						</div>
						<input type="hidden" id="portfolio" value="{{ $portfolio->slug }}" />
						<div id="search-results"></div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Why are you making this trade?
									<textarea name="comment" id="trade-comment"></textarea>
								</label>
							</div>
						</div>
						<div id="pricing"></div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell text-right">
								<button type="submit" class="button purchase">Purchase</button>
							</div>
						</div>
					</form>
				</div>
				<div class="purchase-menu" id="sell">
					<form action="/portfolio/{{ $portfolio->slug }}/sell" method="post" id="sell-form">
						{{ csrf_field() }}
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>
									Stock
									<select name="stock" id="sell-ticker">
										@foreach($stocks as $stock => $v)
										<option value="{{ $stock }}">{{ strtoupper($stock) }} {{ number_format($v['shares_held']) }} Shares</option>
										@endforeach
									</select>
								</label>
							</div>
							<div class="small-12 medium-6 cell">
								<label>
									How many to sell?
									<input type="number" name="shares" min="1" value="1" id="sell-shares" />
								</label>
							</div>
						</div>
						<input type="hidden" id="sell-portfolio" value="{{ $portfolio->slug }}" />
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Why are you making this trade?
									<textarea name="comment" id="trade-comment"></textarea>
								</label>
							</div>
						</div>
						<div id="sell-pricing"></div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell text-right">
								<button type="submit" class="button sell">Sell</button>
							</div>
						</div>
					</form>
				</div>
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell text-center">
						<p class="close-window">Cancel Trade</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="overlay {{ ($errors->any()) ? 'visible' : '' }}"></div>
	
	<div class="grid-container">
		
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						@foreach (['alert', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has($msg))
				      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
				      @endif
				    @endforeach
					</div>
				</div>
				<h1>
					{{ $portfolio->name }} 
					<a href="/portfolio/{{ $portfolio->slug }}/edit" class="edit-portfolio"><i class="fas fa-edit"></i></a> 
					@if($portfolio->stars != 1)
					<a href="/portfolio/{{ $portfolio->slug }}/delete" class="delete-portfolio"><i class="fas fa-trash"></i></a>
					@endif
				</h1>
				<div class="goal">
					<p><strong>Portfolio Goal: </strong> {{ $portfolio->goal }}</p>
				</div>
			</div>
		</div>
	
		<div class="grid-x grid-padding-x small-up-2 medium-up-4 current-stats">
			<div class="cell text-center">
				<section>
					<div class="number">${{ number_format($portfolio->cash_available,2) }}</div>
					<div class="portfolio-name">Cash Available</div>
				</section>
			</div>
			<div class="cell text-center">
				<section>
					<div class="number">${{ number_format($value,2) }}</div>
					<div class="portfolio-name">Stock Value</div>
				</section>
			</div>
			<div class="cell text-center">
				<section>
					<div class="number">${{ number_format($portfolio->cash_available+$value,2) }}</div>
					<div class="portfolio-name">Portfolio Value</div>
				</section>
			</div>
			<div class="cell text-center">
				<section>
					<div class="number {{ ($change >= 0) ? 'positive' : 'negative' }}">{{ $change }}%</div>
					<div class="portfolio-name">Percentage Change</div>
				</section>
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<section class="portfolio-content">
					<div class="table-scroll">
						<table>
							<thead>
								<tr>
									<td>Name</td>
									<td>$ Current Price</td>
									<td>% Daily Change</td>
									<td>Shares Held</td>
									<td>$ Cost Basis</td>
									<td>$ Market Value</td>
									<td>$ Overall Change</td>
									<td>% Overall Change</td>
									<td>% Weight</td>
								</tr>
							</thead>
							<tbody>
								@foreach($stocks as $stock => $values)
								<tr>
									<td>{{ strtoupper($stock) }}</td>
									<td>{{ $values['current_price'] }}</td>
									<td><span class="{{ ($values['daily_change'] >= 0) ? 'positive' : 'negative' }}">{{ $values['daily_change'] }}%</span></td>
									<td>{{ $values['shares_held'] }}</td>
									<td>{{ number_format($values['cost_basis'],2) }}</td>
									<td>{{ number_format($values['market_value'],2) }}</td>
									<td><span class="{{ ($values['dollar_overall_change'] >= 0) ? 'positive' : 'negative' }}">{{ number_format($values['dollar_overall_change'],2) }}</span></td>
									<td><span class="{{ ($values['percent_overall_change'] >= 0) ? 'positive' : 'negative' }}">{{ number_format($values['percent_overall_change'],2) }}%</span></td>
									<?php
									  $weight = (($values['current_price'] * $values['shares_held']) / ($value + $portfolio->cash_available)) * 100;	
									?>
									<td>{{ number_format($weight,2) }}%</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="grid-x grid-padding-x align-middle">
						<div class="small-12 medium-shrink cell">
							<p class="disclaimer">Please note that stock prices are on a one minute delay.</p>
						</div>
						<div class="small-12 medium-auto cell text-right">
						@if(\Auth::check())
							@if(\Auth::user()->type == 0)
							<a href="#" class="button place-a-trade">Place A Trade</a>
							@endif
						@endif
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<h2>Market Performance <span>(Since portfolio creation)</span></h2>
				@if(count($portfolio->changes) > 0)
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<section>
							<div class="graph">
								<?php
									$total_points = count($portfolio->changes);
									$x_pos = 100 / $total_points;	
								?>
								@foreach($portfolio->changes as $change)
									<?php
										$bottom = 50 + $change->percentage;
										$left = $x_pos * $loop->index;	
									?>
									<div class="point {{ ($change->percentage >= 0) ? 'positive' : 'negative' }}" style="bottom: {{ $bottom . "%" }};left: {{ $left . "%" }};"></div>
								@endforeach
							</div>
							<div class="grid-x grid-padding-x align-middle">
								<div class="shrink cell">
									<div class="portfolio-name">Your Portfolio</div>
								</div>
							</div>
						</section>
					</div>
				</div>
				@endif
				<!--<div class="grid-x grid-padding-x current-stats">
					<div class="small-12 medium-4 cell text-center">
						<section>
							<div class="number market {{ ($dj_change >= 0) ? 'positive' : 'negative' }}">{{ $dj_change }}%</div>
							<div class="grid-x grid-padding-x align-middle">
								<div class="shrink cell">
									<div class="portfolio-name">Dow Jones</div>
								</div>
								<div class="auto cell text-right">
									<div class="portfolio-change market">{{ number_format($dow_jones,2) }}</div>
									<div class="today-change"><span class="{{ ($dj_today >= 0) ? 'positive' : 'negative' }}">{{ ($dj_today >= 0) ? '+' : '' }}{{ $dj_today }}%</span> Today</div>
								</div>
							</div>							
						</section>
					</div>
					<div class="small-12 medium-4 cell text-center">
						<section>
							<div class="number market {{ ($n_change >= 0) ? 'positive' : 'negative' }}">{{ $n_change }}%</div>
							<div class="grid-x grid-padding-x align-middle">
								<div class="shrink cell">
									<div class="portfolio-name">Nasdaq</div>
								</div>
								<div class="auto cell text-right">
									<div class="portfolio-change market">{{ number_format($nasdaq,2) }}</div>
									<div class="today-change"><span class="{{ ($n_today >= 0) ? 'positive' : 'negative' }}">{{ ($n_today >= 0) ? '+' : '' }}{{ $n_today }}%</span> Today</div>
								</div>
							</div>							
						</section>
					</div>
					<div class="small-12 medium-4 cell text-center">
						<section>
							<div class="number market {{ ($sp_change >= 0) ? 'positive' : 'negative' }}">{{ $sp_change }}%</div>
							<div class="grid-x grid-padding-x align-middle">
								<div class="shrink cell">
									<div class="portfolio-name">S&P 500</div>
								</div>
								<div class="auto cell text-right">
									<div class="portfolio-change market">{{ number_format($s_and_p,2) }}</div>
									<div class="today-change"><span class="{{ ($sp_today >= 0) ? 'positive' : 'negative' }}">{{ ($sp_today >= 0) ? '+' : '' }}{{ $sp_today }}%</span> Today</div>
								</div>
							</div>							
						</section>
					</div>
				</div> -->
			</div>
		</div>
		
		@if($portfolio->stars == 1 && \Auth::check())
		<div id="student-tools">
			<div class="grid-x grid-padding-x">
				<div class="small-12 cell">
					<h2>Student Tools</h2>
				</div>
			</div>
			<div class="grid-x grid-padding-x">
				<div class="small-12 medium-8 cell">
					<a href="/portfolio/{{ $portfolio->slug }}/history">Transaction History Report</a>
					<a href="/portfolio/{{ $portfolio->slug }}/research-log">Research Log</a>
					<a href="/portfolio/{{ $portfolio->slug }}/company-information">Detailed Company Information</a>
				</div>
				<div class="small-12 medium-4 cell text-left medium-text-right">
					@if(\Auth::user()->type == 0)
					<a href="/portfolio/{{ $portfolio->slug }}/report-instructions" target="_blank">Instructions For Report</a>
					<a href="/portfolio/{{ $portfolio->slug }}/report">My STARS Report</a>
					@endif
				</div>
			</div>
		</div>
		@endif
		
	</div>

@endsection