@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="bg-white shadow-lg rounded-xl p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                My Role Requests
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">Target User</th>
                        <th class="px-6 py-3 text-left">User Email</th>
                        <th class="px-6 py-3 text-left">Requested Role</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Requested On</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                @forelse($requests as $request)

                    @php
                        $data  = $request->payload;
                        $user  = \App\Models\User::find($data['user_id'] ?? null);
                    @endphp

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                            {{ $user->name ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $user->email ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-4">
                            @if(($data['new_role'] ?? '') === 'admin')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                    Admin
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-700">
                                    User
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            @if($request->status === 'pending')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>
                            @elseif($request->status === 'approved')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                    Approved
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                    Rejected
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $request->created_at->format('d M Y') }}
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            You have not made any role requests yet.
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>
@endsection