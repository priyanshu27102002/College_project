<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Alumini_mongo extends Controller
{
    public function store(Request $request){
        //1. validate
        $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|email',
                'Locality' => 'required|string',
                'address' => 'required|string',
                'State' => 'required|string',
                'City' => 'required|string',
                'dob' => 'required|date',
                'gender' => 'required|string',
                'phone' => 'required|string',
                'exam' => 'required|string',
                'studentschoolname' => 'required|string',
                'studentboard' => 'required|string',
                'studentclass10marks' => 'required|string',
                'student12schoolname' => 'required|string',
                'studentboard12' => 'required|string',
                'studentclass12marks' => 'required|string',
        ]);
        // 2. Map the data into a Nested JSON structure
        $nestedData=[
                    'user_id' => Auth::id(),
                    'personal_info' => [
                        'first_name' => $request->fname,
                        'last_name' => $request->lname,
                        'email' => $request->email,
                        'dob' => $request->dob,
                        'gender' => $request->gender,
                        'phone' => $request->phone,

                    ],
                    'location'=>[
                        'locality' => $request->Locality,
                        'city'     => $request->City,
                        'state'    => $request->State,
                        'village'  => $request->address,
                    ],
                    'academic_records' => [
                        'class_10' => [
                            'school' => $request->studentschoolname,
                            'board'  => $request->studentboard,
                            'marks'  => $request->studentclass10marks,
                        ],
                        'class_12' => [
                            'school' => $request->student12schoolname,
                            'board'  => $request->studentboard12,
                            'marks'  => $request->studentclass12marks,
                        ]
                    ],
                    'target_exam' => $request->exam,
                    'status' => [
                        'step_one_completed' => true,
                        'submitted_at' => now(),
                    ]
            ];

            try{
                Studentnosql::create($nestedData);
                
                return redirect()->route('candidate.dashboard')->with('sucess','Nested Profile stored in MongoDB'); 
            }
            catch(\Exception $e){
                return back()->withInput()->with('error','Failed to store: ' . $e->getMessage());
            }

        
    }
}
