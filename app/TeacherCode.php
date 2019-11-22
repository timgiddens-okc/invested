<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherCode extends Model
{
		protected $fillable = ['name','category','user_id', 'code'];
	
    public function teacher()
    {
	    return $this->belongsTo(User::class);
    }
}
