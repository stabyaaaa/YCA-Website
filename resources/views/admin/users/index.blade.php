@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="bg-white shadow-lg rounded-xl p-6">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                User Management
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $user->id }}
                        </td>

                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">
                            @if($user->role === 'super_admin')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-700">
                                    Super Admin
                                </span>
                            @elseif($user->role === 'admin')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                    Admin
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-700">
                                    User
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center space-x-2">

                            {{-- SUPER ADMIN --}}
                            @if(auth()->user()->role === 'super_admin')

                                {{-- Change Role --}}
                                <form method="POST" action="{{ route('users.update', $user) }}" class="inline-block">
                                    @csrf
                                    @method('PUT')

                                    <select name="role"
                                        class="border border-gray-300 rounded-md px-2 py-1 text-sm focus:ring focus:ring-blue-200">
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>

                                    <button type="submit"
                                        class="ml-2 bg-blue-600 text-white px-3 py-1.5 rounded-md text-sm hover:bg-blue-700 transition">
                                        Update
                                    </button>
                                </form>

                                {{-- Delete --}}
                                @if(auth()->id() !== $user->id)
                                    <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1.5 rounded-md text-sm hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                @endif

                            {{-- ADMIN --}}
                            @elseif(auth()->user()->role === 'admin')

                                @if($user->role === 'user')

                                    @if(isset($pendingRequests) && in_array($user->id, $pendingRequests))

                                        <button disabled
                                            class="bg-gray-300 text-gray-600 px-4 py-1.5 rounded-md text-sm cursor-not-allowed">
                                            Requested
                                        </button>

                                    @else

                                        <form method="POST" action="{{ route('admin.request.store') }}" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="hidden" name="role" value="admin">

                                            <button type="submit"
                                                class="bg-green-600 text-white px-4 py-1.5 rounded-md text-sm hover:bg-green-700 transition">
                                                Request Promotion
                                            </button>
                                        </form>

                                    @endif

                                @endif

                            @endif

                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

    </div>

</div>
@endsection