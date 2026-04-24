@if (Auth::check())
    <script>
        window.location.href = '/';
    </script>
@endif
<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Reset Your Password
        </h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" 
                       name="email" 
                       value="{{ old('email', $request->email) }}" 
                       required
                       class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- New Password -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" 
                       name="password" 
                       required
                       class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" 
                       name="password_confirmation" 
                       required
                       class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit" 
                    class="w-full mt-8 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold">
                Reset Password
            </button>
        </form>

        <div class="text-center mt-8">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                ← Back to Login
            </a>
        </div>

    </div>
</x-guest-layout>