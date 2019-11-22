<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use AlphaVantage\Api;
use Illuminate\Support\Facades\Log;

class Price extends Model
{
    public static function search($company)
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
           } else {
			return $stockQuote["Global Quote"];
		   }
	    }
    }
    
    public static function batch($tickers)
    {
	    $tickers = strtoupper($tickers);
	    $stockQuote = Api::stock()->batchStockQuotes($tickers);
	    if(!isset($stockQuote["Stock Quotes"])){
             Log::critical(print_r($stockQuote,true));
			 Log::critical($tickers);
        }
	    return $stockQuote['Stock Quotes'];
    }
    
    public static function yesterdayPrice($company)
    {
	    $ticker = strtoupper($company);
	    $stockQuote = Api::stock()->quote($ticker);
	    
	    if(isset($stockQuote['Error Message'])){
				return "The symbol does not seem to exist. Please check your spelling";		    
		  } elseif(isset($stockQuote['Note'])) { 
			  return "Rate limit!";
		  }else {
      
            $cost = $stockQuote["Global Quote"]["08. previous close"];
		    return $cost;
	    }
    }
}
