<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    use App\Models\Studentnosql;

    class StudentnosqlController extends Controller
    {
        public function store(Request $request)
        {

            // Validate if needed
            $validated = $request->validate([
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

            // Save to MongoDB
            $validated['email'] = auth()->user()->email;

            Studentnosql::create($validated);

            if ($student) {
                \Log::info('Student inserted successfully: ' . $student->_id);
            } else {
                \Log::error('Student insertion failed');
            }
            

            return redirect()->back()->with('success', 'Student registered successfully!');
        }
    }