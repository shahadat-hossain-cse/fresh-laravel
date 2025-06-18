<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\StudentController;
use App\Http\Controllers\api\TestController;
use App\Http\Controllers\api\TokenController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/test',function(){
    $arr = ["name"=>"sdt", "email"=>"abc@yahoo.com"];
    return response()->json($arr);
    // json_encode()
});

Route::get('/get_students',[TestController::class, 'get_students']);

Route::get('/get_student_by_id/{id}',[StudentController::class, 'get_student_by_id']);

Route::post('/student/add',[StudentController::class, 'add']);

Route::post('/login',[TokenController::class, 'login']);

Route::post('/get_token',[TokenController::class, 'get_token']);

Route::middleware('token.check')->group(function () {

    
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->get('token_user'),
        ]);
    });

    Route::get('/get_all_students',[StudentController::class, 'get_students']);
    Route::post('/student/add_with_token',[StudentController::class, 'add']);
});