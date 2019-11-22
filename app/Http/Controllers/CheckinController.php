<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkin;

class CheckinController extends Controller
{
	public function checkins()
	{
		$checkins = Checkin::all();
		
		return view("checkins", [
			"checkins" => $checkins
		]);
	}
	
    public function checkinMorning(Checkin $checkin)
    {
	    $checkin->morning = \Carbon\Carbon::now();
	    $checkin->save();
	    
	    \Session::flash("success", "This attendee has been checked in.");
	    return back();
    }
    
    public function checkinAfternoon(Checkin $checkin)
    {
	    $checkin->afternoon = \Carbon\Carbon::now();
	    $checkin->save();
	    
	    \Session::flash("success", "This attendee has been checked in.");
	    return back();
    }
}
