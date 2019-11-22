<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $guarded = ['id'];
    
    public function portfolio()
    {
	    return $this->belongsTo(Portfolio::class);
    }
}
