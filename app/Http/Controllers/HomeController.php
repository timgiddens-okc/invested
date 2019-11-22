<?php

namespace App\Http\Controllers;

use App\User;
use App\Portfolio;
use App\TeacherCode;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    if(\Auth::user()->type == 1){
		    $classes = \Auth::user()->codes;
		    return view('teachers.home', [
			    "classes" => $classes
		    ]);
	    } elseif(\Auth::user()->type == 2 || \Auth::user()->type == 3) {
		    $reports = Report::where("semi_finalist",1)->get();
		    return view('super-user.home', [
			    "reports" => $reports
		    ]);
		} else {
	    	$portfolios = \Auth::user()->portfolios;
	        return view('home', [
		        "portfolios" => $portfolios
	        ]);
        }
    }
    
	public function semifinalists()
	{
		return view('semi-finalists');
	}
	
    public function homeRedirect()
    {
	    return redirect('/');
    }
    
    public function logout()
    {
	    Auth::logout();
	    
	    return redirect('/login');
    }
    
    public function settings()
    {
	    return view('settings.settings');
    }
    
    public function updateInfo(Request $request)
    {
	    if(\Auth::user()->email == $request->input('email')){
		    $this->validate($request, [
			    "name" => "required"
		    ]);
	    } else {
		    $this->validate($request, [
			    "name" => "required",
			    "email" => "required|unique:users,email"
		    ]);
	    }
	    
	    \Auth::user()->name = $request->input('name');
	    \Auth::user()->email = $request->input('email');
	    \Auth::user()->high_school = $request->input('high_school');
	    \Auth::user()->grade = $request->input('grade');
		\Auth::user()->classification = $request->input('classification');
	    \Auth::user()->save();
	    
	    \Session::flash('success','Your information has been updated!');
	    return back();
    }
    
    public function updatePassword(Request $request)
    {
	     $this->validate($request, [
		    "password" => "required|string|min:6|confirmed"
	    ]);
	    
	    \Auth::user()->password = Hash::make($request->input('password'));
	    \Auth::user()->save();
	    
	    \Session::flash('success','Your password has been updated!');
	    return back();
    }
    
    public function updateTeacher(Request $request)
    {
	    $this->validate($request, [
		    "teacher_code" => "required"
	    ]);
	    
	    $class = TeacherCode::where('code', $request->input('teacher_code'))->first();
	    
	    if($class) {
		    \Auth::user()->class_id = $class->id;
		    \Auth::user()->save();
		    
		    // Portfolio::where('user_id',\Auth::user()->id)->update(["stars"=>0]);
		    
		    \Session::flash('success', 'You have linked your account to your teacher!');
	    } else {
		    \Session::flash('alert','That teacher was not found. Make sure your code is entered correctly!');
	    }
	    
	    return back();
    }
}
