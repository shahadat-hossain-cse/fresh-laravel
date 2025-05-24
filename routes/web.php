<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FormController;
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

Route::get('/create', [FormController::class, 'create']);
Route::post('/save', [FormController::class, 'save']);
Route::get('/edit/{id}',[FormController::class, 'edit']);

