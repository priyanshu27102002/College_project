<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Forgetpasswordstudent;
use App\Http\Controllers\Forgetpasswordalumini;
use App\Http\Controllers\Forgetpasswordcompany;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AluminiController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StudentnosqlController;


Route::post('/index',[ContactFormController::class, 'submit'])->name('contact.submit');


Route::post('/signupstudent',[AuthController::class, "signupstudentPost"])->name("signupstudent.post");
Route::post('/signupalumini',[AuthController::class, "signupaluminiPost"])->name("signupalumini.post");
Route::post('/signupcompany',[AuthController::class, "signupcompanyPost"])->name("signupcompany.post");


Route::post('/loginstudent',[AuthController::class, "loginstudentPost"])->name("loginstudent.post");
Route::post('/loginalumini',[AuthController::class, "loginaluminiPost"])->name("loginalumini.post");
Route::post('/logincompany',[AuthController::class, "logincompanyPost"])->name("logincompany.post");


Route::post('/forgetPasswordstudent',[Forgetpasswordstudent::class,"forgetpasswordstudentPost"])->name("forgetPasswordstudent.post");
Route::post('/forgetPasswordalumini',[Forgetpasswordalumini::class,"forgetpasswordaluminiPost"])->name("forgetPasswordalumini.post");
Route::post('/forgetPasswordcompany',[Forgetpasswordcompany::class,"forgetpasswordcompanyPost"])->name("forgetPasswordcompany.post");


Route::post('/studentresetpassword',[Forgetpasswordstudent::class,"studentresetPasswordpost"])->name("studentresetpasswordpost");
Route::post('/aluminiresetpassword',[Forgetpasswordalumini::class,"aluminiresetPasswordpost"])->name("aluminiresetpasswordpost");
Route::post('/companyresetpassword',[Forgetpasswordcompany::class,"companyresetPasswordpost"])->name("companyresetpasswordpost");


Route::middleware("auth:sanctum")->group(function(){

    Route::post('/logoutstudent', [LogoutController::class, 'logoutstudent']);

    Route::post('/logoutalumini', [LogoutController::class, 'logoutalumini']);

});

Route::get('/test', function () {

    return response()->json([

        'status' => 'success',
        'message' => 'API working perfectly'

    ]);

});


