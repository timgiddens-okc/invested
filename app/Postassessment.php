<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Postassessment extends Model
{
    protected $guarded = ['id'];
    
    public function user()
    {
	    $this->belongsTo(User::class);
    }
}
