<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Campaigns;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{



    public function index(){

        $data["totalStudents"] = User::count();
        $data["totalCampaigns"] = Campaigns::count();
        $data["activeCampaigns"] = Campaigns::where("status","=","Approved")->whereColumn("amount",">","amount_raised")->count();
        $data["campaigns"] = DB::table('campaigns')
            ->join('users','campaigns.student_id',"=","users.id")
            ->join('categories',"campaigns.category_id","=","categories.id")
            ->select(["users.first_name",
                "users.last_name",
                "campaigns.campaign_name",
                "campaigns.student_id",
                "campaigns.reason",
                "campaigns.amount_raised",
                "campaigns.id",
                "campaigns.status",
                "categories.category_name",
                "campaigns.amount"])

            ->orderBy("campaigns.created_at","DESC")
            ->get()->take(5);
        return view('admin.dashboard',$data);
    }


    public function campaigns(){
        $student = User::all();
        $campaigns = DB::table('campaigns')
            ->join('users','campaigns.student_id',"=","users.id")
            ->join('categories',"campaigns.category_id","=","categories.id")
            ->select(["users.first_name",
                "users.last_name",
                "campaigns.campaign_name",
                "campaigns.student_id",
                "campaigns.reason",
                "campaigns.amount_raised",
                "campaigns.id",
                "campaigns.status",
                "categories.category_name",
                "campaigns.amount"])->orderBy("campaigns.created_at","DESC")
            ->get();



        $categories = Category::all();
        return view('admin.campaigns',["students"=>$student,"campaigns"=>$campaigns,"categories"=>$categories]);
    }

    public function students(){
        $students = User::all();
        return view('admin.students',["students"=>$students]);

    }


    public function categories(){

        $cats = Category::all();
        return view('admin.categories',['categories'=>$cats]);

    }


    public function showLogin(){
      return view('admin.login');
    }



    public function addStudent(Request $request){

        if($request->password != $request->confirm_password){
            return back()->with(['status'=>"error","message"=>"Password mismatch"]);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->registration_no = $request->registration_no;
        $user->department = $request->department;
        $user->level = $request->level;
        $user->password = $request->password;

        if($request->hasFile('profile_picture')){
            $user->profile_pic = $request->file('profile_picture')->store('profile_pictures');
        }


        if( $user->save()){
            return back()->with(['status'=>"success","message"=>"Student successfully added"]);
        }else{
            return back()->with(['status'=>"error","message"=>"Student was not added due to system error"]);
        }

    }

    public function banStudent($id){
        $user = User::find($id);
        $user->baned = true;

        $user->save();
        return back()->with(["status"=>"success","message"=>"Baned  successfully"]);
    }

    public function suspendStudent($id){
        $user = User::find($id);
        $user->suspended = $user->suspended?false:true;

        $user->save();
        return back()->with(["status"=>"success","message"=>"Suspension  status updated successfully"]);
    }


    public function updateStudent(Request $request,$id){

        if($request->password != $request->confirm_password){
            return back()->with(['status'=>"error","message"=>"Password mismatch"]);
        }

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->registration_no = $request->registration_no;
        $user->department = $request->department;
        $user->level = $request->level;
        $user->password = $request->password;

        if($request->hasFile('profile_picture')){
            $user->profile_pic = $request->file('profile_picture')->store('profile_pictures');
        }

        if( $user->save()){
            return back()->with(['status'=>"success","message"=>"Student record was successfully updated"]);
        }else{
            return back()->with(['status'=>"error","message"=>"Student record was not updated due to system error"]);
        }

    }

    public function changePassword(Request $request){
        if($request->password != $request->confirm_password){
            return back()->with(['status'=>"error","message"=>"Password did not match"]);
        }
        $admin = Admin::find(1);
        $admin->password = $request->password;
        if( $admin->save()){
            return back()->with(['status'=>"success","message"=>"Password was updated successfully"]);
        }else{
            return back()->with(['status'=>"error","message"=>"Password was  not updated successfully"]);
        }
    }
}
