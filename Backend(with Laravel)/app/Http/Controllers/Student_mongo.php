<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentnosql;
use Illuminate\Support\Facades\Auth;

class Student_mongo extends Controller
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

    public function update(Request $request)
{
    try {

        $user = auth()->user();

        $student = Studentnosql::where('user_id', (int)$user->id)->first();

        if (!$student) {

            $student = new Studentnosql();
            $student->user_id = (int)$user->id;
        }

        $student->personal_info = [

            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'dob'        => $request->dob,
            'gender'     => $request->gender,
            'phone'      => $request->phone,
        ];

        $student->location = [

            'locality' => $request->locality,
            'city'     => $request->city,
            'state'    => $request->state,
            'village'  => $request->village,
        ];

        $student->academic_records = [

            'class_10' => [

                'school_name' => $request->class10school,
                'board'       => $request->class10board,
                'marks'       => $request->class10marks,
            ],

            'class_12' => [

                'school_name' => $request->class12school,
                'board'       => $request->class12board,
                'marks'       => $request->class12marks,
            ],

            'target_exam' => $request->target_exam,
        ];

        $student->save();

        return response()->json([

            'message' => 'Profile updated successfully!',
            'status'  => 'success'

        ]);

    } catch (\Exception $e) {

        \Log::error("MongoDB Update Error: " . $e->getMessage());

        return response()->json([

            'status' => 'error',
            'message' => 'Failed to update profile',
            'error' => $e->getMessage()

        ], 500);
    }
}
}
