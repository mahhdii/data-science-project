<?php

namespace App\Http\Controllers;

use App\Campaigns;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

            ->paginate(15);

        return view("guest.campaigns",["campaigns"=>$campaigns]);
    }



    public function search(Request $request){

        $data["campaigns"] = DB::table('campaigns')
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
            ->whereRaw("MATCH (campaign_name) AGAINST (? IN BOOLEAN MODE)",$request->q)
            ->where("campaigns.status","=","Approved")
            ->whereColumn("amount",">","amount_raised")
            ->orderBy("campaigns.created_at","DESC")

            ->paginate(15);


        $data["query"] = $request->q;

        return view('guest.search',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camp = new Campaigns();

        $camp->student_id = $request->student_id;
        $camp->category_id = $request->category_id;
        $camp->campaign_name= $request->campaign_name;
        $camp->reason = $request->reasons;
        $camp->amount = $request->amount;

        $camp->status = "Approved";




        if($camp->save()){
            return back()->with(["status"=>"success","message"=>"Campaign was created successfully"]);
        }
        return back()->with(["status"=>"error","message"=>"Campaign was not created successfully"]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $camp =  Campaigns::find($id);

        $camp->student_id = $request->student_id;
        $camp->category_id = $request->category_id;
        $camp->campaign_name= $request->campaign_name;
        $camp->reason = $request->reasons;
        $camp->amount = $request->amount;
        $camp->status = "Approved";


        if($camp->save()){
            return back()->with(["status"=>"success","message"=>"Campaign was updated successfully"]);
        }
        return back()->with(["status"=>"error","message"=>"Campaign was not updated successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Campaigns::destroy($id)){
            return back()->with(["status"=>"success","message"=>"Campaign was deleted successfully"]);

        }

        return back()->with(["status"=>"error","message"=>"Campaign was not deleted successfully"]);

    }



    public function approval($id){
        $cam = Campaigns::find($id);
        $cam->status = $cam->status == "Approved"?"Unapproved":"Approved";

        if($cam->save()){
            return back()->with(["status"=>"success","message"=>"Campaign status was updated"]);
        }
        return back()->with(["status"=>"erro","message"=>"Campaign status was not updated"]);

    }



    public function verifyPayment($id,$amount){
        $cam = Campaigns::find($id);

        $cam->amount_raised = $cam->amount_raised+$amount;

        $cam->save();

        return back()->with(["status"=>"success","message"=>"Your Contribution was successful"]);


    }
}
