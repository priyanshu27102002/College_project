<?php

use Illuminate\Support\Facades\Route;

use App\Models\Studentnosql;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Forgetpasswordstudent;
use App\Http\Controllers\Forgetpasswordalumini;
use App\Http\Controllers\Forgetpasswordcompany;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AluminiController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Student_mongo;





Route::get('/', function () {
    return view('index');
})->name('index');
//Signup Routes
Route::get('/login', function () {
    return redirect()->route('loginstudent');
})->name('login') ;

Route::get('/signup',function (){
    return view ('loginsignups.signup');
})->name('signup');


//page routes

//Student pages
Route::middleware("auth:web")->group(function(){
    Route::get('/student', [StudentController::class, 'showUser'])->name('student1');
    Route::get('/students-dashboard', [StudentController::class, 'studentDashboard'])->name('students.dashboard');
    Route::post('/students/store', [Student_mongo::class, 'store'])->name('students.store');
    
 });


// alumini pages

Route::middleware("auth:alumini")->group(function(){
    Route::get('/alumini/{id}', [AluminiController::class, 'showAlumini'])->name('alumini1');
    Route::get('/alumini-dashboard', [AluminiController::class, 'aluminiDashboard'])->name('alumini.dashboard');
});

// company pages

Route::middleware("auth:company")->group(function(){Route::get('/company1', function () {
    return view('company.company1');
})->name('company1');

});



//signup routes


// students

Route::get('/signupstudent',[AuthController::class,"signupstudent"])->name("signupstudent");


// alumini

Route::get('/signupalumini',[AuthController::class,"signupalumini"])->name("signupalumini");


// company

Route::get('/signupcompany',[AuthController::class,"signupcompany"])->name("signupcompany");
// Route::get('/signupstudent',function (){
//     return view ('loginsignups.signupstudent');
// })->name('signupstudent');
// Route::get('/signupalumini',function (){
//     return view ('loginsignups.signupalumini');
// })->name('signupalumini');
// Route::get('/signupcompany',function (){
//     return view ('loginsignups.signupcompany');
// })->name('signupcompany');

//login Routes


// students

Route::get('/loginstudent', [AuthController::class, "loginstudent"])->name("loginstudent");

// alumini

Route::get('/loginalumini', [AuthController::class, "loginalumini"])->name("loginalumini");


// Company

Route::get('/logincompany', [AuthController::class, "logincompany"])->name("logincompany");


// Route::get('/loginstudent',function (){
//     return view ('loginsignups.loginstudent');
// })->name('loginstudent');
// Route::get('/loginalumini',function (){
//     return view ('loginsignups.loginalumini');
// })->name('loginalumini');
// Route::get('/logincompany',function (){
//     return view ('loginsignups.logincompany');
// })->name('logincompany');



//FORGET PASSWORD

//student
Route::get('/forgetPasswordstudent',[Forgetpasswordstudent::class,"forgetpasswordstudent"])->name("forgetPasswordstudent");

//alumini
Route::get('/forgetPasswordalumini',[Forgetpasswordalumini::class,"forgetpasswordalumini"])->name("forgetPasswordalumini");

// company
Route::get('/forgetPasswordcompany',[Forgetpasswordcompany::class,"forgetpasswordcompany"])->name("forgetPasswordcompany");


// PASSWORD RESET ROUTE

// student
Route::get('/studentresetpassword/{token}',[Forgetpasswordstudent::class,"studentresetPassword"])->name("studentresetpassword");

//alumni
Route::get('/aluminiresetpassword/{token}',[Forgetpasswordalumini::class,"aluminiresetPassword"])->name("aluminiresetpassword");

//company
Route::get('/companyresetpassword/{token}',[Forgetpasswordcompany::class,"companyresetPassword"])->name("companyresetpassword");


// LOGOUT rOUTES

// sTUDENT


// ALUMNI


// Route::get('/test-insert', function () {
//     $student = studentnosql::create([
//         'fname' => 'Test',
//         'lname' => 'Insert',
//         'email' => 'test@example.com',
//         'Locality' => 'Test Area',
//         'address' => '123 Test St',
//         'State' => 'TestState',
//         'City' => 'TestCity',
//         'dob' => '2000-01-01',
//         'gender' => 'Other',
//         'phone' => '1234567890',
//         'exam' => 'CBSE',
//         'studentschoolname' => 'ABC School',
//         'studentboard' => 'CBSE',
//         'studentclass10marks' => '85%',
//         'student12schoolname' => 'XYZ School',
//         'studentboard12' => 'CBSE',
//         'studentclass12marks' => '90%',
//     ]);

//     return "Inserted!";
// });

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

    Route::post('/logoutstudent', [LogoutController::class, 'logoutstudent'])->name('logoutstudent.post');

    Route::post('/logoutalumini', [LogoutController::class, 'logoutalumini'])->name('logoutalumini.post');

});


