<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function showUser($id)
    {
        $user = User::find($id); // Fetch user by ID

        if (!$user) {
            return abort(404, 'User not found'); // Show 404 if not found
        }

        return view('students.student1', ['studentName' => $user->name]);
    }
    public function studentDashboard()
    {
    return view('students.dashboard'); // Replace with your actual Blade file path
    }


}
