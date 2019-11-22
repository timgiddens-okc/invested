<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\AddReviewer;
use Illuminate\Http\Request;
use App\User;
use App\Certification;
use App\Portfolio;
use App\TeacherCode;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
	public function viewQuiz(Certification $certification)
	{
		return view("teachers.results", [
			"certification" => $certification
		]);
	}
	
	public function certifications()
	{
		$certifications = Certification::all();
		return view("teachers.certifications", [
			"certifications" => $certifications
		]);
	}
	
	public function certificationQuiz()
	{
		if(\Auth::user()->type == 1 || \Auth::user()->type == 2){
			
			return view("teachers.quiz");
			
		} else {
			return redirect("/");
		}
	}
	
	public function submitCertificationQuiz(Request $request)
	{
		$certification = Certification::create([
			"buying_a_stock" => $request->input("buying_a_stock"),
			"careful_research" => $request->input("careful_research"),
			"saving_and_investing" => $request->input("saving_and_investing"),
			"diversify_and_reduce_risk" => $request->input("diversify_and_reduce_risk"),
			"questions" => $request->input("questions"),
			"user_id" => \Auth::user()->id,
		]);
		
		$correct = 0;
		if($request->input("buying_a_stock") == "d") 
			$correct++;
		if($request->input("careful_research") == "b") 
			$correct++;
		if($request->input("saving_and_investing") == "a") 
			$correct++;
		if($request->input("diversify_and_reduce_risk") == "d") 
			$correct++;
		if($request->input("questions") == "b") 
			$correct++;
			
		$grade = round($correct / 5 * 100);
		$certification->grade = $grade;
		$certification->save();
		
		\Auth::user()->certification()->save($certification);
		
		return back();
	}
	
    public function registerTeacher()
    {
	  	return view("auth.create-teacher");
    }
    
    public function createReviewer(Request $request)
    {
	    $this->validate($request, [
		    'name' => 'required',
			'email' => 'required|string|email|max:255|unique:users'
	    ]);
	    
	    $password = str_random(8);
	    
	    $user = User::create([
		    'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => Hash::make($password),
			'type' => 3
		]);
		
		Mail::to($request->input("email"))->send(new AddReviewer($request->input("email"),$password));
		
		\Session::flash('success', 'The user has been added as a reviewer!');
		return back();
    }
    
    public function createTeacher(Request $request)
    {
	    $this->validate($request, [
		    'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
			'teacher_id' => 'required'
	    ]);
	    
	    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'type' => 1,
        'classification' => $request->input('classification'),
        'high_school' => $request->input('high_school'),
        'teacher_id' => $request->input('teacher_id')
      ]);
      
      \Auth::login($user);
      
      \Session::flash('success', 'Welcome to the platform! Be sure to generate a class code to share with your students when they register.');
      return redirect('/');
    }
    
    public function createClass(Request $request)
    {
	    $this->validate($request, [
		    'name' => 'required'
	    ]);
	    
	    $code = "";
	    
	    do {
		    $code = md5(microtime());
		    $code = substr($code, 0, 7);
		    $user_code = TeacherCode::where('code', $code)->get();
	    }
	    while(!$user_code->isEmpty());
	    
	    $teacher_code = TeacherCode::create([
		    "name" => $request->input('name'),
		    "category" => $request->input('category'),
		    "user_id" => \Auth::user()->id,
		    "code" => $code
	    ]);
	    
	    \Auth::user()->codes()->save($teacher_code);
	    
	    \Session::flash('success', 'Your class has been created! Make sure to give your students the correct code!');
      return back();
    }
    
    public function students()
    {
	    $classes = \Auth::user()->codes;
	    
	    return view("teachers.students", [
		    "classes" => $classes
	    ]);
    }
    
    public function resources()
    {
	    return view("teachers.resources");
    }
    
    public function download($file)
    {
	    $filename = asset('/teacher-resources/' . $file);
	    
	    return $filename;
	    
	    return response()->download($filename);
    }
    
    public function removeStudent(User $user)
    {
	    $user->class_id = null;
	    $user->save();
	    
	    Portfolio::where('user_id',$user->id)->update(["stars"=>0]);
	    
	    \Session::flash('success', 'The student has been removed!');
		return back();
    }
    
    public function deleteClass($class)
    {
	    $users = User::where('class_id', $class)->get();
	    foreach($users as $user){
		    $user->class_id = null;
		    $user->save();
		    Portfolio::where('user_id',$user->id)->update(["stars"=>0]);
	    }
	    
	    TeacherCode::where('id', $class)->delete();
	    
	    \Session::flash('success', 'The class has been removed!');
		return back();
    }
}
