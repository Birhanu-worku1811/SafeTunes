<!DOCTYPE html>
<html lang="">
<head>
    <title>Admin Notification</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>

<p>Congratulations! You have been granted admin privileges. You can now access the admin panel to manage the system.</p>

<p>
    Admin Panel Login Link: <a href="{{ route('admin-auth.login-form') }}">Admin Login</a>
</p>

<p>
    If you have any questions or concerns, please feel free to contact us.
</p>

<p>Best regards,<br>
    {{env('APP_NAME')}}
</p>
</body>
</html>
