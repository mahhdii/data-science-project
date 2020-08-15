<?php

namespace App\Http\Controllers;

use foo\bar;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cat = new Category();

       $cat->category_name = $request->category_name;

       if($cat->save()){
           return back()->with(["status"=>"success","message"=>"Category was add successfully"]);
       }

       return back()->with(["status"=>"error","message"=>"Category was not added successfully"]);
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
        $cat =  Category::find($id);

        $cat->category_name = $request->category_name;

        if($cat->save()){
            return back()->with(["status"=>"success","message"=>"Category was updated successfully"]);
        }

        return back()->with(["status"=>"error","message"=>"Category was not updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::destroy($id)){
            return back()->with(["status"=>"success","message"=>"Category was deleted successfully"]);

        }

        return back()->with(["status"=>"error","message"=>"Category was not deleted successfully"]);

    }
}
