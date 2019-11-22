@extends('layouts.app')

@section('content')
	
	<div id="quiz">
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
				
					<h1>Stars Teacher Quiz</h1>
					<p>Here are the results to your certification quiz.</p>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">									
									<h4>Which of the following should you consider when buying a stock?</h4>
									<div class="answer {{ ($certification->buying_a_stock == 'a') ? 'selected' : ''}}">PE</div>
									<div class="answer {{ ($certification->buying_a_stock == 'b') ? 'selected' : ''}}">Market cap</div>
									<div class="answer {{ ($certification->buying_a_stock == 'c') ? 'selected' : ''}}">PEG</div>
									<div class="answer correct {{ ($certification->buying_a_stock == 'd') ? 'selected' : ''}}">All of the above</div>						
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<h4>With careful research investment risk can be eliminated.</h4>
									<div class="answer {{ ($certification->careful_research == 'a') ? 'selected' : ''}}">True</div>
									<div class="answer correct {{ ($certification->careful_research == 'b') ? 'selected' : ''}}">False</div>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<h4>For individuals to have the same amount of savings and retirement money, a person who starts saving and investing at age 25 will have to contribute less money than a person who starts at age 35.</h4>
									<div class="answer correct {{ ($certification->saving_and_investing == 'a') ? 'selected' : ''}}">True</div>
									<div class="answer {{ ($certification->saving_and_investing == 'b') ? 'selected' : ''}}">False</div>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<h4>Which of the following helps diversify and reduce risk?</h4>
									<div class="answer {{ ($certification->diversify_and_reduce_risk == 'a') ? 'selected' : ''}}">Owning different types of assets</div>
									<div class="answer {{ ($certification->diversify_and_reduce_risk == 'b') ? 'selected' : ''}}">Stocks in different industries/sectors</div>
									<div class="answer {{ ($certification->diversify_and_reduce_risk == 'c') ? 'selected' : ''}}">Owning different sizes of market caps</div>
									<div class="answer correct {{ ($certification->diversify_and_reduce_risk == 'd') ? 'selected' : ''}}">All of the above</div>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<h4>If you have any questions about an investment or a securities professional you should contact</h4>
									<div class="answer {{ ($certification->questions == 'a') ? 'selected' : ''}}">Department of Banks</div>
									<div class="answer correct {{ ($certification->questions == 'b') ? 'selected' : ''}}">Oklahoma Department of Securities</div>
									<div class="answer {{ ($certification->questions == 'c') ? 'selected' : ''}}">National Department of Securities Fraud</div>
									<div class="answer {{ ($certification->questions == 'd') ? 'selected' : ''}}">All of the above</div>
								</div>
							</div>
						</section>

				</div>
			</div>
		</div>
	</div>

@endsection