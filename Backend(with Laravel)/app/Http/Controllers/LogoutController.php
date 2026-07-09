<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logoutstudent(Request $request)
    {
        Auth::guard('web')->logout(); // Logs out the user

        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates CSRF token

        return redirect('/loginstudent'); // Redirect to login page
    }
    public function logoutalumini(Request $request)
    {
        Auth::guard('alumini')->logout(); // Logs out the user

        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates CSRF token

        return redirect('/loginalumini'); // Redirect to login page
    }
}
