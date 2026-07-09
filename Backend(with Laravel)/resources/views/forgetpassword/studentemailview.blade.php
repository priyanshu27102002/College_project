<h1>Reset Password</h1>
<p>Click on the link below to reset your password:</p>
<a href="{{ route('studentresetpassword', ['token' => $token, 'email' => $email]) }}">
    Click here to reset your password
</a>
