<?php
	$value = 0.00;
	$original = 0.00;
	$change = 0;
	$portfolioValue = $portfolio->cash_available;
	$student = \App\User::find($portfolio->user_id);
	if(count($portfolio->stocks) > 0){
		$tickers = "";
		foreach($portfolio->stocks as $stock){
		    $tickers .= $stock->ticker . ",";
	    }
	    
	    $currentPrices = \App\Price::batch($tickers);
		$count = 0;
		foreach($portfolio->stocks as $stock){
			if(in_array(strtoupper($stock->ticker), $currentPrices)){
                $stock->current_price = $currentPrices[$count]["2. price"];               
                $stock->save();
                $count++;
            } else {
                $currentPrice = \App\Price::search($stock->ticker);
                if(isset($currentPrice["05. price"])){
                	$stock->current_price = $currentPrice["05. price"];
                	$stock->save();
                } else {
                    $cashAvailable = $portfolio->cash_available;
                    $stockPrice = $stock->purchase_price * $stock->shares_held;
                    $cashAvailable += $stockPrice;
                    $portfolio->cash_available = $cashAvailable;
                    $portfolio->save();
                    
                    $transaction = \App\Transaction::create([
					    "type" => 2,
					    "ticker" => $stock->ticker,
					    "numberOfShares" => $stock->shares_held,
					    "price" => $stock->purchase_price,
					    "comment" => "This stock has been automatically sold at its original price. The company is no longer listed on the exchange.  The company has either gone private, changed their ticker, or have been delisted.  Please research the company for further information.",
					    "portfolio_id" => $portfolio->id
				    ]);
				    
				    $portfolio->transactions()->save($transaction);
                    
                    $stock->delete();
                }               
                
            }
			$value += $stock->current_price * $stock->shares_held;
			$original += $stock->purchase_price * $stock->shares_held;
			
		}
		$change = ($value + $portfolio->cash_available) - $portfolio->starting_balance;
		$change = number_format(($change / $portfolio->starting_balance) * 100,4);
		
		$portfolioValue += $value;
	}
?>
	
<section class="home current-stats text-center">
	@if($portfolio->stars == 1)
	<div class="stars"><i class="fa fa-star"></i></div>
	@endif
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell	text-center">
			<div class="number">${{ number_format($portfolioValue,2) }}</div>
		</div>
	</div>
	<div class="grid-x grid-padding-x align-middle">
		<div class="shrink cell">
			@if(\Auth::user()->type == 1)
			<div class="portfolio-name">{{ $student->name }}</div>
			@else
			<div class="portfolio-name">{{ $portfolio->name }}</div>
			@endif
		</div>
		<div class="auto cell text-right">
			<div class="portfolio-change {{ ($change >= 0) ? 'positive' : 'negative' }}">{{ $change }}%</div>
		</div>
	</div>
	<div class="grid-x grid-padding-x">
		<div class="small-12 cell text-left">
			<p class="disclaimer" style="margin: 3px 0px 0px 0px;">Created: {{ \Carbon\Carbon::parse($portfolio->created_at)->format("m-d-y") }}</p>
			<p class="disclaimer" style="margin: 3px 0px 0px 0px;">
				<?php 
					$research = \App\Research::where('portfolio_id', $portfolio->id)->orderBy('created_at', 'desc')->first(); 
					if($research){
				?>
				Last Research: {{ \Carbon\Carbon::parse($research->created_at)->format("m-d-y") }}
				<?php } ?>
			</p>
		</div>
	</div>
</section>