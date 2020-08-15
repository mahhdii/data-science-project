<?php

namespace App\Http\Controllers;

use App\Campaigns;
use App\Category;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    /**
     * Shows homepage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $campaigns = DB::table('campaigns')
            ->join('users','campaigns.student_id',"=","users.id")
            ->join('categories',"campaigns.category_id","=","categories.id")

            ->select(["users.first_name",
                "users.last_name",
                "users.profile_pic",
                "campaigns.campaign_name",
                "campaigns.student_id",
                "campaigns.reason",
                "campaigns.amount_raised",
                "campaigns.id",
                "campaigns.status",
                "campaigns.created_at",
                "categories.category_name",
                "campaigns.amount"])
            ->where("campaigns.status","=","Approved")
            ->whereColumn("amount",">","amount_raised")
            ->orderBy("campaigns.created_at","DESC")

            ->paginate(12);

        return view('guest.index',["campaigns"=>$campaigns]);
    }

    /**
     * Handles students registration
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request){
        if($request->password != $request->confirm_password){
            return back()->with(['status'=>"error","message"=>"Password did not match"]);
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

           $user->profile_pic = $request->file('profile_picture')->store('profile_pictures','custom_public');
       }


      if( $user->save()){
          return back()->with(['status'=>"success","message"=>"Registration was successful"]);
      }else{
          return back()->with(['status'=>"error","message"=>"Registration was not successful"]);
      }
    }



    public function updateAccount(Request $request){
        $user =  User::find(session('student_id'));
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->registration_no = $request->registration_no;
        $user->department = $request->department;
        $user->level = $request->level;
        $user->bank_name = $request->bank_name;
        $user->account_no = $request->account_no;




        if($request->hasFile('profile_picture')){
           Storage::disk('custom_public')->delete($user->profile_pic);
            $user->profile_pic = $request->file('profile_picture')->store('profile_pictures','custom_public');
        }

        if( $user->save()){
            session(["profile_pic"=> $user->profile_pic]);
            return back()->with(['status'=>"success","message"=>"Account information updated successfully"]);
        }else{
            return back()->with(['status'=>"error","message"=>"Account information not updated due to system error"]);
        }


    }


    public function changePassword(Request $request){
        if($request->password != $request->confirm_password){
            return back()->with(['status'=>"error","message"=>"Password did not match"]);
        }


        $student = User::find(session('student_id'));

        $student->password = $request->password;



        if( $student->save()){
            return back()->with(['status'=>"success","message"=>"Password was updated successfully"]);
        }else{
            return back()->with(['status'=>"error","message"=>"Password was  not updated successfully"]);
        }




    }



    public function dashboard(Request $request){

        $data["allCampaigns"] = Campaigns::where("student_id",session("student_id"))->count();
        $data["approvedCampaigns"] = Campaigns::where("student_id",session("student_id"))
            ->where("status","Approved")
            ->count();

        $data["unapprovedCampaigns"] = Campaigns::where("student_id",session("student_id"))
            ->where("status","Unapproved")
            ->count();

        $data["campaigns"]=DB::table('campaigns')
//
            ->join('categories',"campaigns.category_id","=","categories.id")
            ->select([
                "campaigns.campaign_name",
                "campaigns.student_id",
                "campaigns.reason",
                "campaigns.amount_raised",
                "campaigns.id",
                "campaigns.status",
                "categories.category_name",
                "campaigns.amount"])
            ->where("student_id","=",session('student_id'))
            ->orderBy("campaigns.created_at","DESC")
            ->get()->take(5);



        return view('student.dashboard',$data);

    }


    public function campaigns(){
        $campaigns = DB::table('campaigns')
//            ->join('users','campaigns.student_id',"=","users.id")
            ->join('categories',"campaigns.category_id","=","categories.id")
            ->select([
                "campaigns.campaign_name",
                "campaigns.student_id",
                "campaigns.reason",
                "campaigns.amount_raised",
                "campaigns.id",
                "campaigns.status",
                "categories.category_name",
                "campaigns.amount"])
            ->where("student_id","=",session('student_id'))
            ->get();
        $categories = Category::all();

        return view('student.campaigns',["campaigns"=>$campaigns,"categories"=>$categories]);


    }

    public function account(){
        $student = User::find(session('student_id'));

        return view('student.account',["student"=>$student]);
    }


    public function createCampaign(Request $request){
        $camp = new Campaigns();
        $camp->student_id = session('student_id');
        $camp->category_id = $request->category_id;
        $camp->campaign_name= $request->campaign_name;
        $camp->reason = $request->reason;
        $camp->amount = $request->amount;
        if($camp->save()){
            return back()->with(["status"=>"success","message"=>"Campaign was created successfully"]);
        }
        return back()->with(["status"=>"error","message"=>"Campaign was not created successfully"]);

    }


    public function updateCampaign(Request $request, $id){
        $camp = Campaigns::find($id);
        $camp->student_id = session('student_id');
        $camp->category_id = $request->category_id;
        $camp->campaign_name= $request->campaign_name;
        $camp->reason = $request->reason;
        $camp->amount = $request->amount;
        $camp->status = "Unapproved";


        if($camp->save()){
            return back()->with(["status"=>"success","message"=>"Campaign was updated successfully"]);
        }
        return back()->with(["status"=>"error","message"=>"Campaign was not updated successfully"]);

    }



    public function baned(){
        $stu = User::find(session('student_id'));
        if(!$stu->baned){
            return redirect('/student/dashboard');
        }
        return view("student.baned");
    }



    public function suspended(){
        $stu = User::find(session('student_id'));
        if(!$stu->suspended){
            return redirect('/student/dashboard');
        }
        return view("student.suspended");
    }
}
