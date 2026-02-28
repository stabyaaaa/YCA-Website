<form method="POST"
      action="{{ route('login') }}"
      class="mt-6 space-y-5"
      x-data="{ loading: false }"
      @submit="loading = true">

    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700">
            Email <span class="text-red-500">*</span>
        </label>
        <input type="email" name="email" required
               class="mt-1 w-full rounded-md border border-gray-300 shadow-sm
               focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">
            Password <span class="text-red-500">*</span>
        </label>
        <input type="password" name="password" required
               class="mt-1 w-full rounded-md border border-gray-300 shadow-sm
               focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    @error('email', 'login')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    <!-- ✅ Updated Button -->
    <button type="submit"
        :disabled="loading"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold flex items-center justify-center space-x-2">

        <!-- Spinner -->
        <svg x-show="loading"
             x-cloak
             class="w-5 h-5 animate-spin"
             fill="none"
             viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"
                    stroke="currentColor"
                    stroke-width="4"
                    class="opacity-25"/>
            <path fill="currentColor"
                  class="opacity-75"
                  d="M4 12a8 8 0 018-8v8H4z"/>
        </svg>

        <!-- Text -->
        <span x-text="loading ? 'Logging in...' : 'Login'"></span>
    </button>

    <p class="text-sm text-center mt-4">
    Don’t have an account?
    <button type="button"
            onclick="openAuthModal('register')"
            class="text-blue-600">
        Register
    </button>
</p>
        
    </p>
</form>
