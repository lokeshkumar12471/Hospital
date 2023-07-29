<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            return redirect('home');
        }else{
            $doctor=Doctor::get();
            return view('user.home',compact('doctor'));
        }

    }
        public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor=Doctor::get();
        return view('user.home',compact('doctor'));
            }else{
                return view('admin.home');
            }

        }else{
            return redirect()->back();
        }
    }

    public function appointment(Request $request){
        $data=new Appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->doctor=$request->doctor;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->status="In Progress";
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }
       $data->save();
       return redirect()->back()->with('message','Appointment Request Successful. We will Contact With You Soon');
    }

public function my_appointment(){
if(Auth::id()){
    $userid=Auth::user()->id;
    $appoint=Appointment::where('user_id',$userid)->get();

    return view('user.my_appointment',compact('appoint'));
}else{
return redirect()->back();
}
}
public function cancel_appoint($id){
    $data=Appointment::find($id);
    $data->delete();
    return redirect()->back();

}
}