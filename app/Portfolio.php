<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = ['id'];
    
    public function stocks()
    {
	    return $this->hasMany(Stock::class)->orderBy('created_at','desc');
    }
    
    public function user()
    {
	    return $this->belongsTo(User::class);
    }
    
    public function transactions()
    {
	    return $this->hasMany(Transaction::class)->orderBy('created_at','desc');
    }
    
    public function researches()
    {
	    return $this->hasMany(Research::class);
    }
    
    public function companies()
    {
	    return $this->hasMany(Company::class);
    }
    
    public function changes()
    {
	    return $this->hasMany(Change::class);
    }
}