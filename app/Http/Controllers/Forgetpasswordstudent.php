<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Forgetpasswordstudent extends Controller
{
    /**
     * Show forget password form.
     */
    public function forgetpasswordstudent()
    {
        return view("forgetpassword.forgetpasswordstudent");
    }

    /**
     * Handle forget password request.
     */
    public function forgetpasswordstudentPost(Request $request)
    {
        // Validate email input
        $request->validate([
            "studentemail" => "required|email|exists:users,email",
        ]);

        $email = strtolower($request->studentemail);

        // Generate a new token
        $token = Str::random(64);

        // Store or update the password reset token
        DB::table('studentpassword_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Generate reset link
        $resetLink = route('studentresetpassword', ['token' => $token, 'email' => $request->studentemail]);

        // Send password reset email
        Mail::send("forgetpassword.studentemailview", ['token' => $token, 'email' => $request->studentemail], function ($message) use ($request) {
            $message->to($request->studentemail);
            $message->subject("Reset Password");
        });

        return redirect()->route("forgetPasswordstudent")->with("success", "We have sent an email to reset your password.");
    }

    /**
     * Show reset password form.
     */
    public function studentresetPassword(Request $request, $token)
    {
        $email = $request->query('email');

        return view("forgetpassword.studentresetpassword", compact('token', 'email'));
    }

    /**
     * Handle reset password submission.
     */
    public function studentresetpasswordpost(Request $request)
    {
        // Log request data
        Log::info('Reset Password Request', [
            'email' => $request->studentemail,
            'token' => $request->token
        ]);

        // Validate input
        $request->validate([
            "studentemail" => "required|email|exists:users,email",
            "studentpassword" => "required|string|min:8|confirmed",
        ]);

        $email = strtolower($request->studentemail);

        // Retrieve token data
        $updatePassword = DB::table('studentpassword_reset_tokens')
            ->where("email", $email)
            ->where("token", $request->token)
            ->first();

        if (!$updatePassword) {
            Log::error('Invalid token or email', ['email' => $email]);
            return redirect()->route("studentresetpassword", ['token' => $request->token, 'email' => $email])
                ->with("error", "Invalid token or email.");
        }

        // Check if token is expired (valid for 1 hour)
        if (Carbon::parse($updatePassword->created_at)->addHours(1)->isPast()) {
            DB::table('studentpassword_reset_tokens')->where("email", $email)->delete();
            Log::error('Token expired', ['email' => $email]);
            return redirect()->route("studentresetpassword", ['token' => $request->token, 'email' => $email])
                ->with("error", "Token has expired.");
        }

        // Update password
        User::where("email", $email)->update([
            "password" => Hash::make($request->studentpassword),
        ]);

        // Delete used token
        DB::table('studentpassword_reset_tokens')->where("email", $email)->delete();

        return redirect()->route("loginstudent")->with("success", "Password has been reset.");
    }
}
            