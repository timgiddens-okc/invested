@extends('layouts.app')

@section('content')
	
	<div id="research">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					@if(\Auth::user()->certification)
						<h1>Stars Teacher Quiz</h1>
						<h4>Thanks for taking the quiz! Here are your results.</h4>
						
						<div class="results">
							<h3 >{{ \Auth::user()->certification->grade }}%</h3>
						</div>
						<a href="/" class="button">Back To Dashboard</a>
					@else
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
					<p>Choose the best answer.</p>

					
					<form action="" method="post">
						@csrf
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Which of the following should you consider when buying a stock?<br>
										<input type="radio" name="buying_a_stock" value="a" id="buying_a_stock-a" required><label for="buying_a_stock-a">PE</label><br>
										<input type="radio" name="buying_a_stock" value="b" id="buying_a_stock-b" required><label for="buying_a_stock-b">Market cap</label><br>
										<input type="radio" name="buying_a_stock" value="c" id="buying_a_stock-c" required><label for="buying_a_stock-c">PEG</label><br>
										<input type="radio" name="buying_a_stock" value="d" id="buying_a_stock-d" required><label for="buying_a_stock-d">All of the above</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										With careful research investment risk can be eliminated.<br>
										<input type="radio" name="careful_research" value="a" id="careful_research-a" required><label for="careful_research-a">True</label><br>
										<input type="radio" name="careful_research" value="b" id="careful_research-b" required><label for="careful_research-b">False</label>								
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										For individuals to have the same amount of savings and retirement money, a person who starts saving and investing at age 25 will have to contribute less money than a person who starts at age 35.<br>
										<input type="radio" name="saving_and_investing" value="a" id="saving_and_investing-a" required><label for="saving_and_investing-a">True</label><br>
										<input type="radio" name="saving_and_investing" value="b" id="saving_and_investing-b" required><label for="saving_and_investing-b">False</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										 Which of the following helps diversify and reduce risk?<br>
										<input type="radio" name="diversify_and_reduce_risk" value="a" id="diversify_and_reduce_risk-a" required><label for="diversify_and_reduce_risk-a">Owning different types of assets</label><br>
										<input type="radio" name="diversify_and_reduce_risk" value="b" id="diversify_and_reduce_risk-b" required><label for="diversify_and_reduce_risk-b">Stocks in different industries/sectors</label><br>
										<input type="radio" name="diversify_and_reduce_risk" value="c" id="diversify_and_reduce_risk-c" required><label for="diversify_and_reduce_risk-c">Owning different sizes of market caps</label><br>
										<input type="radio" name="diversify_and_reduce_risk" value="d" id="diversify_and_reduce_risk-d" required><label for="diversify_and_reduce_risk-d">All of the above</label><br>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										If you have any questions about an investment or a securities professional you should contact<br>
										<input type="radio" name="questions" value="a" id="questions-a" required><label for="questions-a">Department of Banks</label><br>
										<input type="radio" name="questions" value="b" id="questions-b" required><label for="questions-b">Oklahoma Department of Securities</label><br>
										<input type="radio" name="questions" value="c" id="questions-c" required><label for="questions-c">National Department of Securities Fraud</label><br>
										<input type="radio" name="questions" value="d" id="questions-d" required><label for="questions-d">All of the above</label>
									</label>
								</div>
							</div>
						</section>
						
						<div class="grid-x grid-padding-x">
							<div class="small-12 text-right">
								<button type="submit" class="button">Complete Quiz</button>
							</div>
						</div>
						
					</form>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection