<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;


class AuthController extends Controller
{


    public function loginStudent(Request $request){

        $user = User::where('email',$request->email)->where('password',$request->password)->first();


        if($user){
            session(['student_id'=>$user->id,"student_name"=>$user->first_name." ".$user->last_name,"profile_pic"=>$user->profile_pic]);
          return   redirect('student/dashboard');
        }else{
            return back()->with(["status"=>"error","message"=>"Invalid username or password"]);
        }
    }


    public function loginAdmin(Request $request){
        $admin = Admin::where("username",$request->username)->where("password",$request->password)->first();
        if($admin){
            session(["admin_id"=>$admin->id]);
            return redirect('admin/dashboard');
        }else{
            return back()->with(["login_error"=>"Invalid Username or Password"]);
        }
    }


    public function logoutStudent(){
            session()->forget(['student_id','student_name']);
            return redirect('/');
    }

    public function logoutAdmin(){
        session()->forget(['admin_id']);
        return redirect('/admin');
    }
}
