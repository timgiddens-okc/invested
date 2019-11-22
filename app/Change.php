<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    protected $fillable = ['percentage', 'portfolio_id'];
    
    public function portfolio()
    {
	    return $this->belongsTo(Portfolio::class);
    }
}
