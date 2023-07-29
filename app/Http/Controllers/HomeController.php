<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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

}