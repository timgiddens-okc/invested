<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AlphaVantage\Api;
use App\Stock;
use App\Price;
use App\Transaction;
use App\Portfolio;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
	
	public function test($company)
	{
		$ticker = strtoupper($company);
	    $stockQuote = Api::stock()->quote($ticker);
	    if(isset($stockQuote['Error Message'])){
			return "The symbol does not seem to exist. Please check your spelling";		    
		  } elseif(isset($stockQuote['Note'])) { 
			  return "Rate limit!";
		  } else {
		   if(!isset($stockQuote["Global Quote"])){
			   Log::critical(print_r($stockQuote,true));
			   return "This symbol returns an error.";
		   }
		   return $stockQuote["Global Quote"];
		}
	}
	
	public function search(Request $request)
	{
		$results = Api::general()->query('SYMBOL_SEARCH', [
			"keywords" => $request->input('query'),
			"datatype" => "json"
		]);
		
		return view("stocks.search", [
			"results" => $results
		]);
	}
    
    public function buy($slug, Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    $cashAvailable = $portfolio->cash_available;
	    $cost = Price::search($request->input("ticker"));
	    $total = $cost["05. price"] * $request->input("amount");
	    if($total <= $cashAvailable){
		    $portfolio->cash_available = $cashAvailable - $total;
		    
		    $stock = Stock::create([
			    "name" => null,
			    "ticker" => $cost["01. symbol"],
			    "purchase_price" => $cost["05. price"],
			    "shares_held" => $request->input('amount'),
			    "portfolio_id" => $portfolio->id,
			    "current_price" => $cost["05. price"],
			    "yesterdays_price" => $cost["08. previous close"]
		    ]);
		    $portfolio->stocks()->save($stock);
		    $portfolio->save();
		    
		    $transaction = Transaction::create([
			    "type" => 1,
			    "ticker" => $cost["01. symbol"],
			    "numberOfShares" => $request->input('amount'),
			    "price" => $cost["05. price"],
			    "comment" => $request->input('comment'),
			    "portfolio_id" => $portfolio->id
		    ]);
		    
		    $portfolio->transactions()->save($transaction);
		    
		    \Session::flash('success', 'Your purchase is successful!');
	    } else {
		    \Session::flash('alert', 'Your purchase was not successful. You do not have enough cash available to make this trade.');
		    
	    }
	    return back();
    }
    
    public function sell($slug, Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    $shares = $request->input('shares');
	    $ticker = $request->input('stock');
	    $cost = Price::search($ticker);
        $stock = Stock::where("ticker",$ticker)->first();
        $total = 0;
        if(isset($cost["05. price"])){
	        $total = $cost["05. price"] * $shares;
        } else {
            $total = $stock->current_price * $shares;
        }
	    $shares_owned = 0;
	    foreach($portfolio->stocks as $stock){
		    if($stock->ticker == $ticker){
			    $shares_owned += $stock->shares_held;
			}
		}
	    
	    if($shares_owned >= $shares){
		    $portfolio->cash_available += $total;
		    $portfolio->save();
		    
		    foreach($portfolio->stocks as $stock){
			    if($stock->ticker == $ticker){
				    if($stock->shares_held <= $shares){
					    $shares -= $stock->shares_held;
					    $stock->delete();
				    } else {
					    $stock->shares_held = $stock->shares_held - $shares;
					    $stock->save();
					    $shares = 0;
				    }
			    }
		    }
		    
		    $transaction = Transaction::create([
			    "type" => 2,
			    "ticker" => strtoupper($request->input('stock')),
			    "numberOfShares" => $request->input('shares'),
			    "price" => $cost["05. price"],
			    "comment" => $request->input('comment'),
			    "portfolio_id" => $portfolio->id
		    ]);
		    
		    $portfolio->transactions()->save($transaction);
		    
		    \Session::flash('success', 'Your sell was successful!');
	    } else {
		   \Session::flash('alert', 'Your sell was not executed. You do not have enough shares to make this trade.'); 
	    }
	    return back();
    }
    
    public function pricing(Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$request->input('portfolio'))->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$request->input('portfolio'))->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    $stock_price = Price::search($request->input('ticker'));
        $price = 0;
        if(isset($stock_price["05. price"])){
            $price =$stock_price["05. price"];
        } else {
            $stock_price = "The symbol does not seem to exist. Please check your spelling";
        }
	    $total = (float)$price * (int)$request->input('shares');
	    $cash_available = $portfolio->cash_available - $total;
	    
	    return view("stocks.pricing", [
		    "ticker" => $request->input('ticker'),
		    "stock_price" => $stock_price,
		    "shares" => $request->input('shares'),
		    "cash_available" => $cash_available,
		    "total" => $total
	    ]);
    }
    
    public function sellPricing(Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$request->input('portfolio'))->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$request->input('portfolio'))->where('user_id',\Auth::user()->id)->first();
	    }

        $stock_price = Price::search($request->input('ticker'));
	    $price = 0;
        if(isset($stock_price["05. price"])){
            $price =$stock_price["05. price"];
        } else {
            $stock_price = "The symbol does not seem to exist. Please check your spelling";
        }
	    $total = (float)$price * (int)$request->input('shares');
	    $cash_available = $portfolio->cash_available + $total;
	    
	    return view("stocks.sell-pricing", [
		    "ticker" => $request->input('ticker'),
		    "stock_price" => $stock_price,
		    "shares" => $request->input('shares'),
		    "cash_available" => $cash_available,
		    "total" => $total
	    ]);
    }
}
