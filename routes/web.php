<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionManageController;
Route::get('/', function () {
    //return view('welcome');
    //echo "Welcome to Home Page";
    return view('home');
});

Route::get('/about', function(){
    //echo "Welcome to About Page";
    return view('about');
});

Route::view('/contact','contact');

Route::get('/product/{id}/{cat_id?}/', function($id, $cat_id=0){
    // echo $id;
    // echo "<br>";
    // echo $cat_id;
    return view('product',["id"=>$id, "cat"=>$cat_id]);
})->where(["id"=>"[0-9]+"]);

//->where(['id' => '[0-9]+', 'name' => '[a-z]+'])

Route::get('/test', [TestController::class, 'test']);

Route::get('/service/{id}/{cat_id?}/',[TestController::class, 'service']);

// Route::get('/create', [FormController::class, 'create']);
Route::middleware('admin')->group(function(){
    Route::get('/create', [FormController::class, 'create']);
      
});
Route::post('/save', [FormController::class, 'save']);

Route::get('/student/edit/{id}',[FormController::class, 'edit']);

//Route::get('/student/list', [FormController::class, 'student_list']);
//Route::get('/student/list', [FormController::class, 'student_list'])->middleware('superadmin');

Route::middleware('superadmin')->group(function(){
    Route::get('/student/list', [FormController::class, 'student_list']);    
});


Route::post('/student/update', [FormController::class, 'update']);
    Route::get('/student/delete/{id}', [FormController::class, 'delete']);
    Route::get('/student/view/{id}', [FormController::class, 'view']);
    Route::post('/student/remove', [FormController::class, 'remove']);


// reg authentication
Route::get('/user-registration',[AuthController::class, 'registration']);
Route::post('/user-registration',[AuthController::class, 'registration_submit']);
Route::get('/user-login',[AuthController::class, 'login']);
Route::post('/user-login',[AuthController::class, 'login_submit']);
Route::get('/user-logout',[AuthController::class, 'logout']);



// session manage
Route::get('/session_manage',[SessionManageController::class, 'login']);
Route::post('/session_create',[SessionManageController::class, 'login_submit']);
Route::get('/session_check',[SessionManageController::class, 'session_check']);
// session check in profile page
Route::view('/session_profile','session.profile');
// check in another page
Route::view('/session_profile1','session.profile1');
// session out
Route::get('/session_out',[SessionManageController::class, 'logout']);

// session flash message
// new form
Route::view('/session_flash','session.flash-form');
// flash form submit
Route::post('/session_flash_form_submit',[SessionManageController::class, 'flash_submit']);
Route::view('/session_flash_check','session.flash-check');