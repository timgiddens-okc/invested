<?php

namespace App\Http\Controllers;

use App\DayOneSurvey;
use App\DayTwoSurvey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function dayOneSurvey()
    {
	    return view("surveys.day-one");
    }
    
    public function completeDayOneSurvey(Request $request)
    {
	 	DayOneSurvey::create($request->all());
	 	
	 	\Session::flash("success", "The survey has been submitted!");   
	    return back();
    }
    
    public function dayTwoSurvey()
    {
	    return view("surveys.day-two");
    }
    
    public function completeDayTwoSurvey(Request $request)
    {
	 	DayTwoSurvey::create($request->all());
	 	
	 	\Session::flash("success", "The survey has been submitted!");   
	    return back();
    }
    
    public function dayOneResults()
    {
	    $surveys = DayOneSurvey::all();
	    return view("surveys.day-one-results", [
		    "surveys" => $surveys
	    ]);
    }
    
    public function dayTwoResults()
    {
	    $surveys = DayTwoSurvey::all();
	    return view("surveys.day-two-results", [
		    "surveys" => $surveys
	    ]);
    }
}
