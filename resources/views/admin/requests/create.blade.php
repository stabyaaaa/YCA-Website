<!-- @extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <h2 class="text-2xl font-bold mb-6">Create Role Change Request</h2>

    <form method="POST" action="{{ route('admin.request.store') }}">
        @csrf

        <div class="mb-4">
            <label>User</label>
            <select name="user_id" class="w-full border p-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }} ({{ $user->role }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>New Role</label>
            <select name="role" class="w-full border p-2">
                <option value="admin">Admin</option>
                <option value="super_admin">Super Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Send Request
        </button>
    </form>

</div>
@endsection -->