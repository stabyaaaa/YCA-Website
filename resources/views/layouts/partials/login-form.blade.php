<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md">

    <!-- Login Header -->
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Login
    </h2>

<form method="POST"
      action="{{ route('login') }}"
      class="space-y-5"
      x-data="{ loading: false }"
      @submit="loading = true">

    @csrf

    <!-- Email -->
    <div>
        <label class="block text-sm font-medium text-gray-700">
            Email <span class="text-red-500">*</span>
        </label>
        <input type="email" name="email" required
               class="mt-1 w-full rounded-md border border-gray-300 shadow-sm
               focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Password -->
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

    <!-- Login Button -->
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

        <span x-text="loading ? 'Logging in...' : 'Login'"></span>
    </button>

</form>

<!-- Divider -->
<div class="flex items-center my-6">
    <div class="flex-grow border-t"></div>
    <span class="mx-3 text-gray-400 text-sm">OR</span>
    <div class="flex-grow border-t"></div>
</div>

<!-- Dummy Social Login -->
<div class="space-y-3">

    <!-- Google -->
    <button class="w-full flex items-center justify-center border rounded-lg py-2 hover:bg-gray-50">
        <img src="https://www.svgrepo.com/show/475656/google-color.svg"
             class="w-5 h-5 mr-2">
        Sign in with Google
    </button>

    <!-- Twitter -->
    <button class="w-full flex items-center justify-center border rounded-lg py-2 hover:bg-gray-50">
        <img src="https://www.svgrepo.com/show/475689/twitter-color.svg"
             class="w-5 h-5 mr-2">
        Sign in with Twitter
    </button>

    <!-- GitHub
    <button class="w-full flex items-center justify-center border rounded-lg py-2 hover:bg-gray-50">
        <img src="https://www.svgrepo.com/show/512317/github-142.svg"
             class="w-5 h-5 mr-2">
        Sign in with GitHub
    </button> -->

</div>


<!-- Register -->
<p class="text-sm text-center mt-6">
    Don’t have an account?
    <button type="button"
            onclick="openAuthModal('register')"
            class="text-blue-600 font-medium">
        Register
    </button>
</p>

</div>