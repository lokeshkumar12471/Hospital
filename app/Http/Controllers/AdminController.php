<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;


class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }
    public function upload(Request $request){

 $doctor=new Doctor;
 $image=$request->file;
 $imageName=time().'.'. $image->getClientOriginalExtension();
 $request->file->move('doctorimage',$imageName);
 $doctor->image=$imageName;
 $doctor->name=$request->name;
 $doctor->phone=$request->phone;
 $doctor->room=$request->room;
 $doctor->speciality=$request->speciality;
 $doctor->save();
 return redirect()->back()->with('message','Doctor Added Successfully');
   }
   public function showappointment(){
    $data= Appointment::get();
    return view('admin.showappointment',compact('data'));
   }

   public function approved($id){
    $data=Appointment::find($id);
    $data->status="Approved";
    $data->save();
    return redirect()->back();
   }

   public function canceled($id){
    $data=Appointment::find($id);
    $data->status="Canceled";
    $data->save();
    return redirect()->back();
   }


   public function showdoctor(){
    $data=Doctor::get();
return view('admin.showdoctor',compact('data'));
   }

   public function deletedoctor($id){
    $data=Doctor::find($id);
     $data->delete();
       return redirect()->back();
   }

   public function updatedoctor($id){
    $data=Doctor::find($id);
    return view('admin.update_doctor',compact('data'));
   }

   public function editdoctor(Request $request,$id){
    $data=Doctor::find($id);
    $data->name=$request->name;
    $data->phone=$request->phone;
    $data->speciality=$request->speciality;
    $data->room=$request->room;
    $image=$request->file;
    if($image){


    $imageName=time().'.'.$image->getClientOriginalExtension();
    $request->file->move('doctorimage',$imageName);
    $data->image=$imageName;
}
    $data->save();

return redirect()->back()->with('message','Doctor Details Updated Successfully');
   }
}