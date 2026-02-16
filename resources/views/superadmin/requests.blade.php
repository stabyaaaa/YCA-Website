<!DOCTYPE html>
<html>
<head>
    <title>Admin Requests</title>
</head>
<body>

<h2>Pending Admin Requests</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Requested By</th>
        <th>Action</th>
    </tr>

    @forelse($requests as $req)
        <tr>
            <td>{{ $req->payload['name'] }}</td>
            <td>{{ $req->payload['email'] }}</td>
            <td>User ID: {{ $req->requested_by }}</td>
            <td>
                <form method="POST" action="{{ route('superadmin.approve', $req->id) }}" style="display:inline;">
                    @csrf
                    <button type="submit">Approve</button>
                </form>

                <form method="POST" action="{{ route('superadmin.reject', $req->id) }}" style="display:inline;">
                    @csrf
                    <button type="submit">Reject</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No pending requests</td>
        </tr>
    @endforelse
</table>

</body>
</html>
