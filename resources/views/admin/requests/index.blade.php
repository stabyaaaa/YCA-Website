@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="bg-white shadow-lg rounded-xl p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Pending Role Requests
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">Requested By</th>
                        <th class="px-6 py-3 text-left">Requester Email</th>
                        <th class="px-6 py-3 text-left">Target User</th>
                        <th class="px-6 py-3 text-left">Target Email</th>
                        <th class="px-6 py-3 text-left">New Role</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                @forelse($requests as $request)

                    @php
                        $data  = $request->payload;
                        $user  = \App\Models\User::find($data['user_id'] ?? null);
                        $admin = \App\Models\User::find($request->requested_by);
                    @endphp

                    <tr class="hover:bg-gray-50 transition">

                        {{-- Requested By --}}
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                            {{ $admin->name ?? 'N/A' }}
                        </td>

                        {{-- Requester Email --}}
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $admin->email ?? 'N/A' }}
                        </td>

                        {{-- Target User --}}
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                            {{ $user->name ?? 'N/A' }}
                        </td>

                        {{-- Target Email --}}
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $user->email ?? 'N/A' }}
                        </td>

                        {{-- New Role Badge --}}
                        <td class="px-6 py-4">
                            @if(($data['new_role'] ?? '') === 'admin')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                    Admin
                                </span>
                            @elseif(($data['new_role'] ?? '') === 'super_admin')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-700">
                                    Super Admin
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-700">
                                    User
                                </span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-center space-x-2">

                            <form action="{{ route('admin.requests.approve', $request->id) }}" 
                                  method="POST" 
                                  class="inline-block">
                                @csrf
                                <button type="submit"
                                    class="bg-green-600 text-white px-4 py-1.5 rounded-md text-sm hover:bg-green-700 transition">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.requests.reject', $request->id) }}" 
                                  method="POST" 
                                  class="inline-block">
                                @csrf
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-1.5 rounded-md text-sm hover:bg-red-700 transition">
                                    Reject
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                
                                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-gray-100">
                                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                </div>

                                <p class="text-gray-500 text-sm font-medium">
                                    No pending role requests
                                </p>

                                <p class="text-gray-400 text-xs">
                                    When admins request promotions, they will appear here.
                                </p>

                            </div>
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>
@endsection