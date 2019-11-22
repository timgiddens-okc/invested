@extends('layouts.app')

@section('content')
	
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="small-12 medium-6 cell">
				<div class="responsive-embed widescreen">
					<iframe src="https://www.voki.com/vp-editor/preview_export/impress.php?VpID=1202266" width="640" height="480" style="border:0px"></iframe>
				</div>
				<h1>Create A Portfolio</h1>
				<p>Did you know you can create multiple portfolios including one that is used as a watchlist. You will need to name the portfolio that is the <strong>STARS Portfolio</strong> as:  Fall or Spring--Year. If your teacher wants you to build a portfolio with a different amount of money you would choose that amount here. TIP: Recording research as you go is powerful for putting together your reports works sited page at the end of the project.</p>
				<section class="create-portfolio">
					<form action="/portfolio/create" method="post" class="form">
						{{ csrf_field() }}
						@if($errors->any())
							<div class="callout alert">
								@foreach($errors->all() as $error)
								<p>{{ $error }}</p>
								@endforeach
							</div>
						@endif
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Portfolio Name
									<input type="text" name="name" value="{{ old('name') }}" required>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Starting Balance
									<div class="input-group">
										<span class="input-group-label">$</span>
										<input type="number" name="starting_balance" class="input-group-field" value="500000" required>
									</div>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									What is your <strong>investment goal</strong> for this portfolio?
									<select name="goal" id="goal">
										<option value="To perform as good or better than the Dow for the same period">To perform as good or better than the Dow for the same period.</option>
										<option value="To perform as good or better than the S&P 500 for the same period">To perform as good or better than the S&P 500 for the same period.</option>
										<option value="To watch and see how my stocks fluctuate over a length of time">To watch and see how my stocks fluctuate over a length of time.</option>
										<option value="To have an overall gain in my portfolio">To have an overall gain in my portfolio.</option>
										<option value="other">Other</option>
									</select>
								</label>
							</div>
						</div>
						<div id="other-goal"></div>
						@if(!\Auth::user()->hasStarsPortfolio())
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									<input type="checkbox" name="stars" value="1" /> This is my official STARS competition portfolio
								</label>
							</div>
						</div>
						@endif
						
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell text-right">
								<button type="submit" class="button">Create Portfolio</button>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
	
@endsection