<!DOCTYPE html>
<html>
<head>
    <title>Pending Admins</title>
</head>
<body>
    <nav>
        <a href="/superadmin/admins/create">➕ Create Admin</a> |
        <a href="/super-admin/requests">⏳ Pending Admins</a> |
        <a href="/dashboard">🏠 Dashboard</a>
    </nav>

<hr>


<h2>Pending Admin Approvals</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if($pendingAdmins->count() === 0)
    <p>No pending admins.</p>
@else
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        @foreach($pendingAdmins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                <form method="POST" action="/superadmin/admins/{{ $admin->id }}/approve" style="display:inline">
                    @csrf
                    <button type="submit">Approve</button>
                </form>

                <form method="POST" action="/superadmin/admins/{{ $admin->id }}/reject" style="display:inline">
                    @csrf
                    <button type="submit" style="color:red">Reject</button>
                </form>
                </td>

                
            </tr>
        @endforeach
    </table>
@endif

</body>
</html>
