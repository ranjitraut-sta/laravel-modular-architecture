<p>Click the link below to reset your password:</p>
<a href="{{ url('/auth/password/reset?token=' . $token . '&email=' . urlencode($email)) }}">
    Reset Password
</a>
