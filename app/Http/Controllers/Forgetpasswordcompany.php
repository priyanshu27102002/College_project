<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class Forgetpasswordcompany extends Controller
{
        /**
     * Show forget password form.
     */
    public function forgetpasswordcompany()
    {
        return view("forgetpassword.forgetpasswordcompany");
    }

    /**
     * Handle forget password request.
     */
    public function forgetpasswordcompanyPost(Request $request)
    {
        // Validate email input
        $request->validate([
            "companyemail" => "required|email|exists:company,email",
        ]);

        $email = strtolower($request->companyemail);

        // Generate a new token
        $token = Str::random(64);

        // Store or update the password reset token
        DB::table('companypassword_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Generate reset link
        $resetLink = route('companyresetpassword', ['token' => $token, 'email' => $request->companyemail]);

        // Send password reset email
        Mail::send("forgetpassword.companyemailview", ['token' => $token, 'email' => $request->companyemail], function ($message) use ($request) {
            $message->to($request->companyemail);
            $message->subject("Reset Password");
        });

        return redirect()->route("forgetPasswordcompany")->with("success", "We have sent an email to reset your password.");
    }

    /**
     * Show reset password form.
     */
    public function companyresetPassword(Request $request, $token)
    {
        $email = $request->query('email');

        return view("forgetpassword.companyresetpassword", compact('token', 'email'));
    }

    /**
     * Handle reset password submission.
     */
    public function companyresetpasswordpost(Request $request)
    {
        // Log request data
        Log::info('Reset Password Request', [
            'email' => $request->companyemail,
            'token' => $request->token
        ]);

        // Validate input
        $request->validate([
            "companyemail" => "required|email|exists:company,email",
            "companypassword" => "required|string|min:8|confirmed",
        ]);

        $email = strtolower($request->companyemail);

        // Retrieve token data
        $updatePassword = DB::table('companypassword_reset_tokens')
            ->where("email", $email)
            ->where("token", $request->token)
            ->first();

        if (!$updatePassword) {
            Log::error('Invalid token or email', ['email' => $email]);
            return redirect()->route("companyresetpassword", ['token' => $request->token, 'email' => $email])
                ->with("error", "Invalid token or email.");
        }

        // Check if token is expired (valid for 1 hour)
        if (Carbon::parse($updatePassword->created_at)->addHours(1)->isPast()) {
            DB::table('companypassword_reset_tokens')->where("email", $email)->delete();
            Log::error('Token expired', ['email' => $email]);
            return redirect()->route("companyresetpassword", ['token' => $request->token, 'email' => $email])
                ->with("error", "Token has expired.");
        }

        // Update password
        Company::where("email", $email)->update([
            "password" => Hash::make($request->companypassword),
        ]);

        // Delete used token
        DB::table('companypassword_reset_tokens')->where("email", $email)->delete();

        return redirect()->route("logincompany")->with("success", "Password has been reset.");
    }
}
