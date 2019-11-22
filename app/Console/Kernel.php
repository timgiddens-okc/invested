<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Portfolio;
use App\Change;
use App\Stock;
use App\Price;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
	    	Portfolio::chunk(50, function($portfolios){
		    	foreach($portfolios as $portfolio){
			    	$value = 0.00;
					$original = 0.00;
					$change = 0;
					$portfolioValue = $portfolio->cash_available;
					if(count($portfolio->stocks) > 0){
						$tickers = "";
						foreach($portfolio->stocks as $stock){
						    $tickers .= $stock->ticker . ",";
					    }
					    
					    $currentPrices = \App\Price::batch($tickers);
						$count = 0;
						foreach($portfolio->stocks as $stock){
			                if(in_array(strtoupper($stock->ticker), array_column($currentPrices, '1. symbol'))){
						        $stock->current_price = $currentPrices[$count]["2. price"];               
						        $stock->save();
			                    $count++;
			                } else {
			                    $currentPrice = Price::search($stock->ticker);
								if(isset($currentPrice["05. price"])){
				                	$stock->current_price = $currentPrice["05. price"];
				                	$stock->save();
				                } else {
				                    $cashAvailable = $portfolio->cash_available;
				                    $stockPrice = $stock->purchase_price * $stock->shares_held;
				                    $cashAvailable += $stockPrice;
				                    $portfolio->cash_available = $cashAvailable;
				                    $portfolio->save();
				                    
				                    $transaction = Transaction::create([
									    "type" => 2,
									    "ticker" => $stock->ticker,
									    "numberOfShares" => $stock->shares_held,
									    "price" => $stock->purchase_price,
									    "comment" => "One or more of your stocks have been sold at its purchase price. The company is no longer listed on the exchange.  The company has either gone private, changed their ticker, or have been delisted.  Please research the company for further information.",
									    "portfolio_id" => $portfolio->id
								    ]);
								    
								    $portfolio->transactions()->save($transaction);
				                    
				                    $stock->delete();
				                    continue;
				                }
			                }
			            }

						$change = ($value + $portfolio->cash_available) - $portfolio->starting_balance;
						$change = number_format(($change / $portfolio->starting_balance) * 100,2);
						
						$portfolioValue += $value;
					}
					
					$change = Change::create([
						"percentage" => $change,
						"portfolio_id" => $portfolio->id
					]);
					
					$portfolio->changes()->save($change);
		    	}
	    	});
        })->dailyAt('22:00')->timezone('America/Chicago');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
