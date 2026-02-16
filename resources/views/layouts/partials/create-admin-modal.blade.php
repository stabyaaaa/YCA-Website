<div id="createAdminModal"
     class="fixed inset-0 bg-black bg-opacity-50
     {{ session('admin_created') ? 'flex' : 'hidden' }}
     items-center justify-center z-50">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">

        {{-- FORM --}}
        <div id="formBox" class="{{ session('admin_created') ? 'hidden' : '' }}">
            <h2 class="text-xl font-semibold mb-4">Create Admin</h2>

            <form method="POST" action="{{ route('superadmin.admins.store') }}">
                @csrf

                <input type="text" name="name"
                       placeholder="Name"
                       class="w-full border rounded px-3 py-2 mb-3"
                       required>

                <input type="email" name="email"
                       placeholder="Email"
                       autocomplete="new-email"
                       class="w-full border rounded px-3 py-2 mb-3"
                       required>

                <input type="password" name="password"
                       placeholder="Password"
                       class="w-full border rounded px-3 py-2 mb-3"
                       required>

                <input type="password" name="password_confirmation"
                       placeholder="Confirm Password"
                       class="w-full border rounded px-3 py-2 mb-4"
                       required>

                <div class="flex justify-end gap-2">
                    <button type="button"
                            onclick="closeCreateAdminModal()"
                            class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-4 py-2 bg-purple-600 text-white rounded">
                        Create
                    </button>
                </div>
            </form>
        </div>

        {{-- SUCCESS --}}
        @if(session('admin_created'))
            <div class="absolute inset-0 bg-white flex flex-col items-center justify-center text-center">
                <h3 class="text-green-600 text-lg font-semibold mb-2">
                    ✅ Admin created successfully
                </h3>
                <p class="text-sm text-gray-600">
                    Redirecting to dashboard in
                    <span id="countdown">3</span>…
                </p>
            </div>
        @endif
    </div>
</div>
{{-- ✅ COUNTDOWN SCRIPT GOES HERE --}}
@if(session('admin_created'))
<script>
    let seconds = 3;
    const el = document.getElementById('countdown');

    const timer = setInterval(() => {
        seconds--;
        el.textContent = seconds;

        if (seconds <= 0) {
            clearInterval(timer);
            window.location.reload(); // SAME page
        }
    }, 1000);
</script>
@endif