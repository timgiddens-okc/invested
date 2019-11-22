<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use AlphaVantage\Api;

class Stock extends Model
{
    protected $guarded = ['id'];
    
    public function portfolio()
    {
	    return $this->belongsTo(Portfolio::class);
    }
    
    public function getPrices()
    {
	    	$results = Price::search($this->ticker);
		    $this->current_price = $results['05. price'];
		    $this->save(); 
		    return $results;
    }
    
    public function yesterdaysPrice()
    {
	    return Price::yesterdayPrice($this->ticker);
    }
}
