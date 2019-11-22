<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Report;
use App\User;
use App\Notifications\ReportSubmitted;

class ReportController extends Controller
{
    public function index($slug)
    {
	    $portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    return view("report.index", [
		    "portfolio" => $portfolio
	    ]);
    }
    
    public function submit($slug, Request $request)
    {
	    $portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    $path = $request->file('file')->store('reports');
	    
	    $report = Report::create([
		   "file" => $path,
		   "user_id" => \Auth::user()->id 
	    ]);
	    
	    \Auth::user()->reports()->save($report);
	    
	    \Session::flash("success", "Thank you for submitting your report!");
	    return back();
    }
    
    public function submitToStars(Report $report)
    {
	    $report->submitted = 1;
	    $report->save();
	    
	    $superUsers = User::where("type",2)->get();
	    
	    foreach($superUsers as $user){
		    $user->notify(new ReportSubmitted());
	    }
	    
	    \Session::flash("success", "The report has been marked for submission!");
	    return back();
    }
    
    public function unsubmit(Report $report)
    {
	    $report->submitted = 0;
	    $report->save();
	    
	    \Session::flash("success", "The report has been un-submitted.");
	    return back();
    }
    
    public function semifinalist(Report $report)
    {
	    $report->semi_finalist = 1;
	    $report->save();
	    
	    \Session::flash("success", "The report has been marked as a semi-finalist!");
	    return back();
    }
    
    public function nonSemifinalist(Report $report)
    {
	    $report->semi_finalist = 0;
	    $report->save();
	    
	    \Session::flash("success", "The report has been un-marked as a semi-finalist!");
	    return back();
    }
    
    public function releaseReports()
    {
	    
	    $reviewers = User::where("type",3)->get();
	    
	    foreach($reviewers as $user){
		    $user->notify(new ReportSubmitted());
	    }
	    
	    \Session::flash("success", "The reports have been released to the reviewers!");
	    return back();
    }
    
    public function classification($classification)
    {
	    $students = array();
	    $reports = array();
	    $classification = strtoupper($classification);
	    $teachers = User::where('classification', $classification)->get();
	    foreach($teachers as $teacher){
		    $theseStudents = $teacher->students();
		    foreach($theseStudents as $s){
			    $students[] = $s;
		    }
	    }
	    $theseReports = Report::where('submitted', 1)->whereIn('user_id', $students)->get();
	    foreach($theseReports as $r){
		    $reports[] = $r;
	    }

	    return view("report.classification", [
		    "reports" => $reports,
		    "classification" => $classification
	    ]);
    }
    
    public function guidelines($slug)
    {
	    $portfolio = Portfolio::where('slug',$slug)->where('user_id',\Auth::user()->id)->first();
	    return view("report.guidelines", [
		    "portfolio" => $portfolio
	    ]);
    }
	
	public function generalGuidelines()
    {
	    return view("report.guidelines");
    }
}
