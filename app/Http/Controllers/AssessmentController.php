<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preassessment;
use App\Postassessment;

class AssessmentController extends Controller
{
    public function risk()
    {
	    if(\Auth::check()){
	    if(\Auth::user()->risk == null){
	    	return view('assessments.risk');
	    } else {
		    return redirect('/');
	    }
	    } else {
		    return view('assessments.risk');
	    }
    }
    
    public function completeRisk(Request $request)
    {
	    if(\Auth::check()){
		  	$total = 0;
		  	$message = "";
		  	foreach($request->except(['_token']) as $answer){
			  	$total += $answer;
		  	}
		  	if($total >= 0 && $total <= 18) {
			  	\Auth::user()->risk = "Low";
			  	$message = "You have a low tolerance for risk.";
		  	} elseif ($total >= 19 && $total <= 22) {
			  	\Auth::user()->risk = "Below Average";
			  	$message = "You have a below-average tolerance for risk.";
		  	} elseif ($total >= 23 && $total <= 28) {
			  	\Auth::user()->risk = "Moderate";
			  	$message = "You have an average/moderate tolerance for risk.";
		  	} elseif ($total >= 29 && $total <= 32) {
			  	\Auth::user()->risk = "Above Average";
			  	$message = "You have an above-average tolerance for risk.";
		  	} else {
			  	\Auth::user()->risk = "High";
			  	$message = "You have a high tolerance for risk.";
		  	}
		  	
		  	\Auth::user()->save();
		  	
		  	\Session::flash('success', 'Thank you for taking your risk assessment! ' . $message);
		  	return redirect('/');
	  	} else {
		  	$total = 0;
		  	$message = "";
		  	foreach($request->except(['_token']) as $answer){
			  	$total += $answer;
		  	}
		  	if($total >= 0 && $total <= 18) {
			  	$message = "You have a low tolerance for risk.";
		  	} elseif ($total >= 19 && $total <= 22) {
			  	$message = "You have a below-average tolerance for risk.";
		  	} elseif ($total >= 23 && $total <= 28) {
			  	$message = "You have an average/moderate tolerance for risk.";
		  	} elseif ($total >= 29 && $total <= 32) {
			  	$message = "You have an above-average tolerance for risk.";
		  	} else {
			  	$message = "You have a high tolerance for risk.";
		  	}
		  	
		  	return view("assessments.results", [
			  	"message" => $message
		  	]);
	  	}
    }
    
    public function preassessment()
    {
	    $preassessment = Preassessment::where('user_id', \Auth::user()->id)->exists();
	    if(!$preassessment){
		    return view("assessments.pre");
	    } else {
		    \Session::flash('alert', "You've already taken your preassessment!");
				return redirect('/');
	    }
    }
    
    public function postassessment()
    {
	    $preassessment = Preassessment::where('user_id', \Auth::user()->id)->exists();
	    if(!$preassessment){
		    \Session::flash('alert', "Please take your preassessment!");
				return redirect('/');
	    } else {
		    return view("assessments.post");
	    }
    }
    
    public function completePreassessment(Request $request)
    {
	    $preassessment = Preassessment::create([
		    "q1" => $request->input('q1'),
		    "q2" => $request->input('q2'),
		    "q3" => $request->input('q3'),
		    "q4" => $request->input('q4'),
		    "q5" => $request->input('q5'),
		    "q6" => $request->input('q6'),
		    "q7" => $request->input('q7'),
		    "q8" => $request->input('q8'),
		    "q9" => $request->input('q9'),
		    "q10" => $request->input('q10'),
		    "q11" => $request->input('q11'),
		    "q12" => $request->input('q12'), // Where quiz starts
		    "q13" => $request->input('q13'),
		    "q14" => $request->input('q14'),
		    "q15" => $request->input('q15'),
		    "q16" => $request->input('q16'),
		    "q17" => $request->input('q17'),
		    "q18" => $request->input('q18'),
		    "q19" => $request->input('q19'),
		    "q20" => $request->input('q20'),
		    "q21" => $request->input('q21'),
		    "q22" => $request->input('q22'),
		    "user_id" => \Auth::user()->id
	    ]);
	    
	    $max = 11;
	    $correct = 0;
	   
			if($request->input("q12") == "a"){ $correct++; }
			if($request->input("q13") == "b"){ $correct++; }
			if($request->input("q14") == "b"){ $correct++; }
			if($request->input("q15") == "a"){ $correct++; }
			if($request->input("q16") == "a"){ $correct++; }
			if($request->input("q17") == "b"){ $correct++; }
			if($request->input("q18") == "b"){ $correct++; }
			if($request->input("q19") == "c"){ $correct++; }
			if($request->input("q20") == "b"){ $correct++; }
			if($request->input("q21") == "c"){ $correct++; }
			if($request->input("q22") == "c"){ $correct++; }
			
			$grade = number_format(($correct / $max) * 100);
			
			$preassessment->grade = $grade;
			$preassessment->save();

			return redirect('/preassessment/complete');
    }
    
    public function completePostassessment(Request $request)
    {
	    $postassessment = Postassessment::create([
		    "q1" => $request->input('q1'),
		    "q2" => $request->input('q2'),
		    "q3" => $request->input('q3'),
		    "q4" => $request->input('q4'),
		    "q5" => $request->input('q5'),
		    "q6" => $request->input('q6'),
		    "q7" => $request->input('q7'),
		    "q8" => $request->input('q8'),
		    "q9" => $request->input('q9'),
		    "q10" => $request->input('q10'),
		    "q11" => $request->input('q11'),
		    "q12" => $request->input('q12'), // Where quiz starts
		    "q13" => $request->input('q13'),
		    "q14" => $request->input('q14'),
		    "q15" => $request->input('q15'),
		    "q16" => $request->input('q16'),
		    "q17" => $request->input('q17'),
		    "q18" => $request->input('q18'),
		    "q19" => $request->input('q19'),
		    "q20" => $request->input('q20'),
		    "q21" => $request->input('q21'),
		    "q22" => $request->input('q22'),
		    "user_id" => \Auth::user()->id
	    ]);
	    
	    $max = 11;
	    $correct = 0;
	   
			if($request->input("q12") == "a"){ $correct++; }
			if($request->input("q13") == "b"){ $correct++; }
			if($request->input("q14") == "b"){ $correct++; }
			if($request->input("q15") == "a"){ $correct++; }
			if($request->input("q16") == "a"){ $correct++; }
			if($request->input("q17") == "b"){ $correct++; }
			if($request->input("q18") == "b"){ $correct++; }
			if($request->input("q19") == "c"){ $correct++; }
			if($request->input("q20") == "b"){ $correct++; }
			if($request->input("q21") == "c"){ $correct++; }
			if($request->input("q22") == "c"){ $correct++; }
			
			$grade = number_format(($correct / $max) * 100);
			
			$postassessment->grade = $grade;
			$postassessment->save();

			return redirect('/postassessment/complete');
    }
    
    public function preassessmentComplete()
    {
	    $assessment = Preassessment::where('user_id', \Auth::user()->id)->first();
	    
	    if($assessment){
		    return view("assessments.pre-complete", [
			    "assessment" => $assessment
		    ]);
	    } else {
		    \Session::flash('alert', "Please take your preassessment!");
				return redirect('/');
	    }
    }
    
    public function postassessmentComplete()
    {
	    $pre_assessment = Preassessment::where('user_id', \Auth::user()->id)->first();
	    $post_assessment = Postassessment::where('user_id', \Auth::user()->id)->first();
	    
	    if($pre_assessment && $post_assessment){
		    return view("assessments.post-complete", [
			    "pre_assessment" => $pre_assessment,
			    "post_assessment" => $post_assessment
		    ]);
	    } else {
		    \Session::flash('alert', "Please take your preassessment and postassessment!");
				return redirect('/');
	    }
    }
}
