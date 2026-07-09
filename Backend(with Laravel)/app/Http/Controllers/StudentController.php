<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentnosql;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Handles both the initial browser landing and React data fetching.
     */
    public function showUser(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Fetch the MongoDB record using the authenticated user's ID
        $mongoEntry = Studentnosql::where('user_id', (int)$user->id)->first();

        // 1. Handle API requests from React (Axios)
        if ($request->expectsJson() || $request->isXmlHttpRequest()) {
            if (!$mongoEntry) {
                return response()->json(['message' => 'No registration record found in MongoDB'], 404);
            }
            return response()->json($mongoEntry);
        }

        // 2. Handle Browser Page Loads
        // If the user already has a MongoDB entry, redirect them to the React Dashboard
        if ($mongoEntry) {
            return redirect()->away(env('FRONTEND_URL', 'http://127.0.0.1:3000') . '/dashboard');
        }

        // If no MongoDB record exists, land them on the registration form (Blade)
        return view('students.student1', ['studentName' => $user->name]);
    }

    public function studentDashboard()
    {
        return view('students.dashboard');
    }
}