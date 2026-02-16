<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="font-family: Arial; background:#f3f4f6;">

<div style="width:400px;margin:100px auto;background:white;padding:30px;border-radius:8px;">
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Email" required style="width:100%;padding:10px;margin-top:10px;">
        <input type="password" name="password" placeholder="Password" required style="width:100%;padding:10px;margin-top:10px;">

        <button type="submit" style="margin-top:15px;width:100%;padding:10px;background:#2563eb;color:white;border:none;">
            Login
        </button>
    </form>
    <p style="margin-top:10px;">
        Forgot Password? <a href="/forgot-password">Reset Password</a>
    </p>

    <p style="margin-top:10px;">
        Don’t have an account? <a href="/register">Register</a>
    </p>
</div>

</body>
</html>
