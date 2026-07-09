<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumini;

class Forgetpasswordalumini extends Controller
{
    /**
     * Show forget password form.
     */
    public function forgetpasswordalumini()
    {
        return view("forgetpassword.forgetpasswordalumini");
    }

    /**
     * Handle forget password request.
     */
    public function forgetpasswordaluminiPost(Request $request)
    {
        // Validate email input
        $request->validate([
            "aluminiemail" => "required|email|exists:alumini,email",
        ]);

        $email = strtolower($request->aluminiemail);

        // Generate a new token
        $token = Str::random(64);

        // Store or update the password reset token
        DB::table('aluminipassword_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Generate reset link
        $resetLink = route('aluminiresetpassword', ['token' => $token, 'email' => $request->aluminiemail]);

        // Send password reset email
        Mail::send("forgetpassword.aluminiemailview", ['token' => $token, 'email' => $request->aluminiemail], function ($message) use ($request) {
            $message->to($request->aluminiemail);
            $message->subject("Reset Password");
        });

        return redirect()->route("forgetPasswordalumini")->with("success", "We have sent an email to reset your password.");
    }

    /**
     * Show reset password form.
     */
    public function aluminiresetPassword(Request $request, $token)
    {
        $email = $request->query('email');

        return view("forgetpassword.aluminiresetpassword", compact('token', 'email'));
    }

    /**
     * Handle reset password submission.
     */
    public function aluminiresetpasswordpost(Request $request)
    {
        // Log request data
        Log::info('Reset Password Request', [
            'email' => $request->aluminiemail,
            'token' => $request->token
        ]);

        // Validate input
        $request->validate([
            "aluminiemail" => "required|email|exists:alumini,email",
            "aluminipassword" => "required|string|min:8|confirmed",
        ]);

        $email = strtolower($request->aluminiemail);

        // Retrieve token data
        $updatePassword = DB::table('aluminipassword_reset_tokens')
            ->where("email", $email)
            ->where("token", $request->token)
            ->first();

        if (!$updatePassword) {
            Log::error('Invalid token or email', ['email' => $email]);
            return redirect()->route("aluminiresetpassword", ['token' => $request->token, 'email' => $email])
                ->with("error", "Invalid token or email.");
        }

        // Check if token is expired (valid for 1 hour)
        if (Carbon::parse($updatePassword->created_at)->addHours(1)->isPast()) {
            DB::table('aluminipassword_reset_tokens')->where("email", $email)->delete();
            Log::error('Token expired', ['email' => $email]);
            return redirect()->route("aluminiresetpassword", ['token' => $request->token, 'email' => $email])
                ->with("error", "Token has expired.");
        }

        // Update password
        Alumini::where("email", $email)->update([
            "password" => Hash::make($request->aluminipassword),
        ]);

        // Delete used token
        DB::table('aluminipassword_reset_tokens')->where("email", $email)->delete();

        return redirect()->route("loginalumini")->with("success", "Password has been reset.");
    }
}
            