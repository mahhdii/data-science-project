<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home',function(){
// 	return "At Home";
// });



use Illuminate\Support\Facades\Route;
Route::get('home', "StudentController@index");
Route::get('/', "StudentController@index");
Route::get('/verify-payment/{id}/{amount}',"CampaignsController@verifyPayment");
Route::get("campaigns","CampaignsController@index");
Route::get("/campaigns/search","CampaignsController@search")->name('search');

Route::group(['prefix' => 'student'], function () {
    Route::post('/register',"StudentController@register")->name('register');
    Route::post('/login',"AuthController@loginStudent")->name('student.login');

    Route::group(["middleware"=>"studentAuth"], function () {

        Route::get("/baned","StudentController@baned");
        Route::get("/suspended","StudentController@suspended");
        Route::get("/logout","AuthController@logoutStudent")->name('student.logout');


        Route::group(['middleware'=>"banSuspend"], function () {

            Route::get('/dashboard',"StudentController@dashboard");
            Route::get('/campaigns',"StudentController@campaigns");
            Route::get('/account',"StudentController@account");
            Route::patch("/account","StudentController@updateAccount")->name("update_account");
            Route::patch("/change-password","StudentController@changePassword")->name("student.change_password");


//        Campaigns route
            Route::post("/campaigns/","StudentController@createCampaign")->name("student.campaign.create");
            Route::patch("/campaigns/{id}","StudentController@updateCampaign");
            Route::delete("campaigns/{id}","CampaignsController@destroy");

        });


    });

});

Route::group(['prefix'=>"admin"], function () {
    Route::get('/',"AdminController@showLogin");
    Route::post('/login',"AuthController@loginAdmin")->name('admin.login');


    Route::group(["middleware"=>"adminAuth"], function () {
        Route::get('/dashboard',"AdminController@index");
        Route::get('/campaigns',"AdminController@campaigns");
        Route::get('/students',"AdminController@students");
        Route::get('/categories',"AdminController@categories");
        Route::get("/logout","AuthController@logoutAdmin")->name('admin.logout');
        Route::patch("/change-password","AdminController@changePassword")->name("admin.change_password");



//        Routes for categories
        Route::post('/categories',"CategoryController@store")->name('category.add');
        Route::patch('/categories/{id}',"CategoryController@update")->name('category.update');
        Route::delete('/categories/{id}',"CategoryController@destroy");



//        Routes for campaigns
        Route::post("/campaigns","CampaignsController@store")->name('admin.campaign.create');
        Route::patch("/campaigns/{id}","CampaignsController@update");
        Route::delete("campaigns/{id}","CampaignsController@destroy");
        Route::patch("/campaigns/approval/{id}","CampaignsController@approval");



//        Routes for student CRUD
        Route::post("/students","AdminController@addStudent")->name('admin.student.add');
        Route::patch("/students/{id}","AdminController@updateStudent");
        Route::get("/students/ban/{id}","AdminController@banStudent");
        Route::get("/students/suspend/{id}","AdminController@suspendStudent");



    });
});