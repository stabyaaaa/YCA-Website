<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
</head>
<body>
    <nav>
        <a href="/superadmin/admins/create">➕ Create Admin</a> |
        <a href="/super-admin/requests">⏳ Pending Admins</a> |
        <a href="/dashboard">🏠 Dashboard</a>
    </nav>

<hr>


<h2>Create Admin</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="/superadmin/admins/store">
    @csrf

    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>

    <button type="submit">Create Admin</button>
</form>

</body>
</html>
