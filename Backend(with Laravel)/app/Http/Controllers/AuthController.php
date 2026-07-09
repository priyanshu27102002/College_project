<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Alumini;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

  // STUDENT


  // login for student
  public function loginstudent()
  {
    return view("loginsignups.loginstudent");
  }

  //login post

  function loginstudentPost(Request $request)
  {
    $request->validate([
      "studentemail" => "required",
      "studentpassword" => "required",

    ]);
    $credentials = [
      'email' => $request->studentemail,
      'password' => $request->studentpassword,
  ];
    if(Auth::guard('web')->attempt($credentials)){
      $request->session()->regenerate(); // ✅ VERY IMPORTANT

      return redirect()->route("student1"); // ✅ no ID, no intended()

    }
    // else{
    //   dd("Authsuccess");
    // }
   return redirect(route("loginstudent"))->with("error","Login Failed");
  }

  //Student signup Function
  function signupstudent()
  {
    return view("loginsignups.signupstudent");
  }
  
  
  // student signup post 


  function signupstudentPost(Request $request) 
  {
    $validate = Validator::make($request->all(),
    [
      "studentname" => "required",
      "studentemail" => "required|email|unique:users,email",
      "studentpassword" => "required",

    ]);
    if ($validate->fails()) 
    {
      //return response()->json(['error' => $validator->errors()], 422);
      return redirect()->back()->withErrors($validate);
    }
    
    $user = new User();
    $user->name = $request -> studentname;
    $user->email = $request -> studentemail;
    $user->password = Hash::make($request->studentpassword);
    if($user->save()){
      return redirect(route("loginstudent"))->with("success","User created Successfully");
    }
    return redirect(route("signupstudent"))->with("error","failed to create user");


  }

// ALUMINI CODES

  // alumini signup

   function signupalumini()
  {
    return view("loginsignups.signupalumini");
  }

  // alumini signup post

  public function signupaluminiPost(Request $request)
{
    // Validation Rules
    $messages = [
        "alumininame.required" => "The name field is required.",
        "aluminiemail.required" => "The email field is required.",
        "aluminiemail.email" => "Please provide a valid email address.",
        "aluminiemail.unique" => "This email is already registered.",
        "aluminipassword.required" => "The password field is required.",
    ];

    // Validate the request
    $validate = Validator::make($request->all(), [
        "alumininame" => "required",
        "aluminiemail" => "required|email|unique:alumini,email",
        "aluminipassword" => "required|confirmed",
    ], $messages);

    // Check if validation fails
    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }

    // Check if email already exists manually (optional, as unique rule will catch this)
    if (Alumini::where('email', $request->aluminiemail)->exists()) {
        return redirect()->back()->with("error", "This email is already registered.");
    }

    // Create new alumni
    $alumini = new Alumini();
    $alumini->name = $request->alumininame;
    $alumini->email = $request->aluminiemail;
    $alumini->password = Hash::make($request->aluminipassword);

    if ($alumini->save()) {
        return redirect(route("loginalumini"))->with("success", "Alumni account created successfully.");
    }

    return redirect(route("signupalumini"))->with("error", "Failed to create alumni account.");
}


  // Alumini login routes

  public function loginalumini()
  {
    return view("loginsignups.loginalumini");
  }

  //Alumini login post

  // public function loginaluminiPost(Request $request)
  // {
  //     $request->validate([
  //         "aluminiemail" => "required|email",
  //         "aluminipassword" => "required",
  //     ]);
  
  //     $credentials = [
  //         'email' => $request->aluminiemail,
  //         'password' => $request->aluminipassword,
  //     ];
  
  //     if (Auth::guard('alumini')->attempt($credentials)) {
  //         return redirect()->intended(route("alumini1"));
  //     }
  
  //     Log::error("Alumni Login Failed", ['email' => $request->aluminiemail]);
      
  //     return redirect(route("loginalumini"))->with("error", "Login Failed");
  // }

  function loginaluminiPost(Request $request)
  {
    $request->validate([
      "aluminiemail" => "required",
      "aluminipassword" => "required",

    ]);
    $credential = [
      'email' => $request->aluminiemail,
      'password' => $request->aluminipassword,
  ];
    if(Auth::guard('alumini')->attempt($credential)){
      $request->session()->regenerate();
      $user = Auth::guard('alumini')->user();

      if ($user) {
        return redirect()->route("alumini1", ['id' => $user->id]); // Pass ID correctly
    }

    }


    // else{
    //   dd("Authsuccess");
    // }

    
    return redirect(route("loginalumini"))->with("error","Login Failed");


  }
//   public function loginaluminiPost(Request $request)
// {
//     // Validate the login form input
//     $request->validate([
//         "aluminiemail" => "required|email",
//         "aluminipassword" => "required",
//     ]);

//     // Attempt to log in using the provided credentials
//     if (Auth::guard('alumini')->attempt(['email' => $request->aluminiemail, 'password' => $request->aluminipassword])) {
//         return redirect()->intended(route("alumini1"))->with("success", "Login successful!");
//     }

//     // Log the failed login attempt
//     Log::warning("Alumni login failed for email: " . $request->aluminiemail);

//     // Redirect back with an error message
//     return redirect()->route("loginalumini")->with("error", "Invalid email or password.");
// }



// COMPANY CODES

// Company Signup

function signupcompany()
{
  return view("loginsignups.signupcompany");
}

// Company Signup Post 

public function signupcompanyPost(Request $request)
{
    // Validation Rules
    $messages = [
        "companyname.required" => "The name field is required.",
        "companyemail.required" => "The email field is required.",
        "companyemail.email" => "Please provide a valid email address.",
        "companyemail.unique" => "This email is already registered.",
        "companypassword.required" => "The password field is required.",
    ];

    // Validate the request
    $validate = Validator::make($request->all(), [
        "companyname" => "required",
        "companyemail" => "required|email|unique:company,email",
        "companypassword" => "required|confirmed",
    ], $messages);

    // Check if validation fails
    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }

    // Check if email already exists manually (optional, as unique rule will catch this)
    if (Company::where('email', $request->companyemail)->exists()) {
        return redirect()->back()->with("error", "This email is already registered.");
    }

    // Create new Company
    $company = new Company();
    $company->name = $request->companyname;
    $company->email = $request->companyemail;
    $company->password = Hash::make($request->companypassword);

    if ($company->save()) {
        return redirect(route("logincompany"))->with("success", "Company account created successfully.");
    }

    return redirect(route("signupcompany"))->with("error", "Failed to create company account.");
}
// Login Company
public function logincompany()
{
  return view("loginsignups.logincompany");
}
// Login Company Post
function logincompanyPost(Request $request)
{
  $request->validate([
    "companyemail" => "required",
    "companypassword" => "required",

  ]);
  $credential = [
    'email' => $request->companyemail,
    'password' => $request->companypassword,
];
  if(Auth::guard('company')->attempt($credential)){
    $request->session()->regenerate();
    return redirect()->intended(route("company1"));

  }


  // else{
  //   dd("Authsuccess");
  // }

  
  return redirect(route("logincompany"))->with("error","Login Failed");


}


}
