<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'risk', 'class_id', 'high_school', 'grade', 'classification', 'teacher_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function portfolios()
    {
	    return $this->hasMany(Portfolio::class);
    }
    
    public function students()
    {
	    $classes = TeacherCode::where('user_id', $this->id)->pluck('id');
	    return User::whereIn('class_id', $classes)->pluck('id');
    }
    
    public function codes()
    {
	    return $this->hasMany(TeacherCode::class);
    }
    
    public function hasStarsPortfolio()
    {
	    $stars = Portfolio::where('user_id',$this->id)->where('stars',1)->count();
	    if($stars > 0){
		    return true;
	    } else {
		    return false;
	    }
    }
    
    public function hasTeacher()
    {
	    return ($this->class_id) ? true : false;
    }
    
    public function preassessmentCompleted()
    {
	    $assessment = Preassessment::where("user_id", $this->id)->exists();
	    
	    return $assessment;
    }
    
    public function postassessmentCompleted()
    {
	    $assessment = Postassessment::where("user_id", $this->id)->exists();
	    
	    return $assessment;
    }
    
    public function preassessment()
    {
	    return $this->hasMany(Preassessment::class);
    }
    
    public function postassessment()
    {
	    return $this->hasMany(Postassessment::class);
    }
    
    public function reports()
    {
	    return $this->hasMany(Report::class);
    }
    
    public function reportSubmitted()
    {
	    $report = Report::where('user_id', $this->id)->exists();
	    
	    return $report;
    }
    
    public function certification()
    {
	    return $this->hasOne(Certification::class);
    }
}
