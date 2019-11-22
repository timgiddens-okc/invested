<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\TeacherCode;
use App\SiteMessage;
use App\Notifications\Communication;

class MessagesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
	    if(\Auth::user()->type == 0){
		    $messages = Message::where('user_id',\Auth::user()->id)->orWhere('recipient_id',\Auth::user()->id)->orderBy('created_at','desc')->get();
		    $class_id = \Auth::user()->class_id;
		    $class = TeacherCode::where('id',$class_id)->first();
		    $recipient = $class->user_id;
		    
		    Message::where('recipient_id',\Auth::user()->id)->where('read',0)->update(['read'=>1]);
		    
		    return view("messages.show", [
			    "messages" => $messages,
			    "recipient" => $recipient
		    ]);
	    } else {
		    $codes = \Auth::user()->codes;
		    $code_values = array();
		    foreach($codes as $code){
			    $code_values[] = $code->id;
		    }
		    $students = User::whereIn('class_id',$code_values)->get();
		    
		    return view("messages.index", [
			    "students" => $students
		    ]);
	    }
    }
    
    public function post(Request $request)
    {
	    $this->validate($request, [
		    "text" => "required",
		    "recipient_id" => "required"
	    ]);
	    
	    Message::create([
		    "user_id" => \Auth::user()->id,
		    "recipient_id" => $request->input('recipient_id'),
		    "text" => $request->input("text")
	    ]);
	    
	    $recipient = User::find($request->input('recipient_id'));
	    $url = "/messages/" . \Auth::user()->id;
	    if(\Auth::user()->type == 1){
		    $url = "/messages";
	    }
	    
	    $recipient->notify(new Communication($url));
	    
	    \Session::flash('success', "Your message has been sent!");
	    return back();
    }
    
    public function show(User $user)
    {
	    $messages = Message::where([['user_id','=',\Auth::user()->id],['recipient_id','=',$user->id]])->orWhere([['recipient_id','=',\Auth::user()->id],['user_id','=',$user->id]])->orderBy('created_at','desc')->get();
	    $recipient = $user->id;
	    
	    Message::where('recipient_id',\Auth::user()->id)->where('read',0)->update(['read'=>1]);
	    	    
	    return view("messages.show", [
		    "messages" => $messages,
		    "recipient" => $recipient
	    ]);
    }
    
    public function all()
    {
	    return view("messages.all");
    }
    
    public function messageAll(Request $request)
    {	    
	    $this->validate($request, [
		    "text" => "required",
		]);
		
		$students = \Auth::user()->students();
	    
	    foreach($students as $student){
		    $student = User::where('id',$student)->first();
		    Message::create([
			    "user_id" => \Auth::user()->id,
			    "recipient_id" => $student->id,
			    "text" => $request->input("text")
		    ]);
		    
		    $student->notify(new Communication("/messages"));
		}
		
		\Session::flash('success', "Your message has been sent to your students!");
	    return back();
    }
    
    public function siteMessage(Request $request)
    {
	    SiteMessage::create([
		    "message" => $request->input('message'),
		    "target" => $request->input('target'),
		    "take_down" => $request->input('take_down')
	    ]);
	    
	    \Session::flash('success', "Your message has been posted!");
	    return back();
    }
}
