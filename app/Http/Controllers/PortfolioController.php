<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Research;
use App\Company;
use App\Price;
use App\Change;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PortfolioController extends Controller
{
	
	public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function info(Portfolio $portfolio)
    {
	    return view("portfolio-info", [
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function show($slug)
    {
	    if($slug == "new"){
			return view("portfolio.new");   
	    }
	    $value = 0.00;
	    $original = 0.00;
	    $totalShares = 0;
	    $change = 0;
	    $portfolio = null;
		
		if(\Auth::check()){
	    if(\Auth::user()->type != 0){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
		} else {
			$portfolio = Portfolio::where('slug',$slug)->first();
		}
        if(!$portfolio){
            return redirect("/");
        }
	    $portfolio->load('stocks');
	    
		/*
	    $dow_jones = Price::search("^DJI");
	    $nasdaq = Price::search("NDX");
	    $s_and_p = Price::search("^GSPC");
	    
	    $dj_change = $dow_jones['05. price'] - $portfolio->dow_jones;
	    $dj_change = number_format(($dj_change / $portfolio->dow_jones) * 100,2);
	    $dj_today = $dow_jones['05. price'] - $dow_jones['08. previous close'];
	    $dj_today = number_format(($dj_today / $dow_jones['08. previous close']) * 100,2);
	    
	    $n_change = $nasdaq['05. price'] - $portfolio->nasdaq;
	    $n_change = number_format(($n_change / $portfolio->nasdaq) * 100,2);
	    $n_today = $nasdaq['05. price'] - $nasdaq['08. previous close'];
	    $n_today = number_format(($n_today / $nasdaq['08. previous close']) * 100,2);
	    
	    $sp_change = $s_and_p['05. price'] - $portfolio->s_and_p;
	    $sp_change = number_format(($sp_change / $portfolio->s_and_p) * 100,2);
	    $sp_today = $s_and_p['05. price'] - $s_and_p['08. previous close'];
	    $sp_today = number_format(($sp_today / $s_and_p['08. previous close']) * 100,2);
		*/
		
		$dj_change = 1;
		$dj_today = 1;
		$n_change = 1;
		$n_today = 1;
		$sp_change = 1;
		$sp_today = 1;
	    
	    $stocks = array();
	    
	    if(count($portfolio->stocks) > 0){
		    $tickers = "";
		    foreach($portfolio->stocks as $stock){
			    $tickers .= $stock->ticker . ",";
		    }	    
		    $currentPrices = Price::batch($tickers);
		    		    
		    $tickers = explode(",", $tickers);
	       	       
		    $count = 0;
            $stockCount = count($portfolio->stocks) - 1;
            $soldTickers = false;
            $alreadyQuoted = array();
         
		    foreach($portfolio->stocks as $stock){
                if(in_array(strtoupper($stock->ticker), $currentPrices)){
	                if(in_array($stock->ticker, $alreadyQuoted)){
		            	  $stock->current_price = $alreadyQuoted[$stock->ticker];
	                } else {
			          $stock->current_price = $currentPrices[$count]["2. price"]; 
			          $alreadyQuoted[$stock->ticker] = $currentPrices[$count]["2. price"]; 
			          $count++; 
			        }         
			        $stock->save();                   
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
					    
					    if(!$soldTickers){
						    $soldTickers = $stock->ticker;
					    } else {
						    $soldTickers .= ", " . $stock->ticker;
					    }
	                    
	                    $stock->delete();
	                    continue;
	                }
                }
                
                
			    $dailyChange = $stock->current_price - $stock->yesterdays_price;
                if($stock->yesterdays_price != 0){
			     $dailyChange = ($dailyChange / $stock->yesterdays_price) * 100;
                }
			    $cost_basis = 0;
				$total_shares = 0;
			    if(isset($stocks[$stock->ticker])){
				   
				    foreach($portfolio->stocks as $s){
					    if($s->ticker == $stock->ticker){
						    $total_shares += $s->shares_held;
						    $cost_basis += $s->purchase_price * $s->shares_held;
					    }
				    }
				    $cost_basis = $cost_basis / $total_shares;
					
					$percentChange = 0;
                    if($cost_basis != 0){
                        $percentChange = (($stock->current_price - $cost_basis) / $cost_basis) * 100;
                    }
				    
				    $stocks[$stock->ticker] = array(
					    "current_price" => $stock->current_price,
					    "daily_change" => number_format($dailyChange,4),
					    "shares_held" => $total_shares,
					    "cost_basis" => $cost_basis,
					    "market_value" => $stock->current_price * $total_shares,
					    "dollar_overall_change" => $stock->current_price - $cost_basis,
					    "percent_overall_change" => $percentChange
				    );
			    } else {
                    $percentChange = 0;
                    if($stock->purchase_price != 0){
                        $percentChange = (($stock->current_price - $stock->purchase_price) / $stock->purchase_price) * 100;
                    }
				    $stocks[$stock->ticker] = array(
					    "current_price" => $stock->current_price,
					    "daily_change" => number_format($dailyChange,4),
					    "shares_held" => $stock->shares_held,
					    "cost_basis" => $stock->purchase_price,
					    "market_value" => $stock->current_price * $stock->shares_held,
					    "dollar_overall_change" => $stock->current_price - $stock->purchase_price,
					    "percent_overall_change" => $percentChange
				    );
			    }

                
			    $value += $stock->current_price * $stock->shares_held;
		    }
		    
		    	if($soldTickers){
	                \Session::flash("info", "These stocks have automatically been sold at their purchase price: " . $soldTickers . ". These companies are no longer listed on the exchange.  The company has either gone private, changed their ticker, or have been delisted.  Please research the company for further information.");
                }
				
				$change = ($value + $portfolio->cash_available) - $portfolio->starting_balance;
				$change = number_format(($change / $portfolio->starting_balance) * 100,4);
			}

	    return view('portfolio.show', [
		    "portfolio" => $portfolio,
		    "value" => $value,
		    "change" => $change,
		    "totalShares" => $totalShares,
		    "dow_jones" => 1, //$dow_jones["05. price"]
		    "dj_change" => $dj_change,
		    "nasdaq" => 1, //$nasdaq["05. price"]
		    "n_change" => $n_change,
		    "s_and_p" => 1,  //$s_and_p["05. price"]
		    "sp_change" => $sp_change,
		    "stocks" => $stocks,
		    "dj_today" => $dj_today,
		    "n_today" => $n_today,
		    "sp_today" => $sp_today
	    ]);
    }
	
    public function new()
    {
	    return view("portfolio.new");
    }
    
    public function create(Request $request)
    {
	    $request->validate([
		    'name' => 'required|unique:portfolios,name',
		    'starting_balance' => 'required|numeric'
	    ]);
	    
	    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $request->input('name')));
	    
	    /*$dow_jones = Price::search("^DJI");
	    $nasdaq = Price::search("NDX");
	    $s_and_p = Price::search("^GSPC");*/
	    
	    $stars = 0;
	    
	    if($request->input('stars')){
		    $stars = 1;
	    }
	    
	    $portfolio = Portfolio::create([
		    "name" => $request->input('name'),
		    "slug" => $slug,
		    "starting_balance" => $request->input('starting_balance'),
		    "cash_available" => $request->input('starting_balance'),
		    "user_id" => \Auth::user()->id,
		    "goal" => $request->input('goal'),
		    "dow_jones" => 1,//$dow_jones["05. price"],
		    "nasdaq" => 1, //$nasdaq["05. price"],
		    "s_and_p" =>1,// $s_and_p["05. price"],
		    "stars" => $stars
	    ]);
	    
	    \Auth::user()->portfolios()->save($portfolio);
	    
	    $change = Change::create([
		   "percentage" => 0.00,
		   "portfolio_id" => $portfolio->id 
	    ]);
	    
	    $portfolio->changes()->save($change);
	    
	    \Session::flash('success', 'Your new portfolio has been created!');
	    return redirect('/portfolio/' . $slug);
    }
    
    public function transactions($slug)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    $transactions = $portfolio->transactions;
	    return view('transactions.list', [
		    "transactions" => $transactions,
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function researchLog($slug)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    $research = $portfolio->researches;
	    
	    return view('research.index', [
		    "research" => $research,
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function editResearch($slug, Research $research)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    return view('research.edit', [
		    "research" => $research,
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function updateResearch($slug, Research $research, Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    $research->update($request->all());
	    $research->save();
	    
	    \Session::flash('success', 'Your research has been updated!');
	    return redirect("/portfolio/" . $portfolio->slug . "/research-log");
    }
    
    public function submitResearch($slug, Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    $research = Research::create([
		    "date_of_research" => \Carbon\Carbon::now(),
		    "source" => $request->input('source'),
		    "author" => $request->input('author'),
		    "title" => $request->input('title'),
		    "date_of_article" => $request->input('date_of_article'),
		    "comments" => $request->input('comments'),
		    "portfolio_id" => $portfolio->id,
		    "company_name" => $request->input('company_name'),
		    "ticker" => $request->input('ticker'),
		    "tags" => $request->input('tags')
	    ]);
	    
	    $portfolio->researches()->save($research);
	    
	    \Session::flash('success', 'Your research has been added!');
	    return back();
    }
    
    public function companyInformation($slug)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    $companies = $portfolio->companies;
	    
	    return view('company-information.index', [
		    "companies" => $companies,
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function showCompanyInformation($slug, Company $company)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    $companies = $portfolio->companies;
	    
	    return view('company-information.show', [
		    "companies" => $companies,
		    "company" => $company,
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function editCompanyInformation($slug, Company $company)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    return view('company-information.edit', [
		    "company" => $company,
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function updateCompanyInformation($slug, Company $company, Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    $company->update($request->all());
	    $company->save();
	    
	    \Session::flash('success', 'Your company information has been updated!');
	    return redirect('/portfolio/' . $portfolio->slug .'/company-information/' . $company->id);
    }
    
    public function submitCompanyInformation($slug, Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    $company = Company::create($request->all());
	    
	    $portfolio->companies()->save($company);
	    
	    \Session::flash('success', 'Your company information has been added!');
	    return back();
    }
    
    public function allResearch()
    {
	    $research = array();
	    
	    foreach(\Auth::user()->portfolios as $portfolio) {
		  	foreach($portfolio->researches as $r){
			  	$research[] = $r;
		  	}
	    }
	    
	    return view("research.all", [
		    "research" => $research
	    ]);
    }
    
    public function edit($slug)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    return view("portfolio.edit", [
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function update($slug, Request $request)
    {
	    if(\Auth::user()->type == 1){
		    $portfolio = Portfolio::where('slug',$slug)->first();
	    } else {
	    	$portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    }
	    
	    if($portfolio->name != $request->input('name')){
		    $request->validate([
			    'name' => 'required|unique:portfolios,name'
			]);
			
			$slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $request->input('name')));
	    	    
			$portfolio->name = $request->input('name');
			$portfolio->slug = $slug;
			$portfolio->save();
		}
	    
	    \Session::flash('success', 'Your portfolio name has been updated!');
	    return redirect("/portfolio/" . $slug);
    }
    
    public function delete($slug)
    {
	    Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->delete();
	    \Session::flash('success', 'The portfolio has been deleted.');
	    return redirect("/");
    }
}
