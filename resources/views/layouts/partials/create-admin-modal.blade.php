<!-- {{-- ONLY RENDER IF SESSION EXISTS --}}
@if(session('user_created'))

<div id="createAdminModal"
    class="relative w-full bg-white rounded-2xl shadow-xl p-10
       transform transition-all duration-300 scale-95 opacity-0"


    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">

        {{-- SUCCESS MESSAGE --}}
        <div class="text-center">
            <h3 class="text-green-600 text-lg font-semibold mb-2">
                ✅ Admin created successfully
            </h3>

            <p class="text-sm text-gray-600">
                Restarting page in
                <span id="countdown">3</span>…
            </p>
        </div>

    </div>
</div>

<script>
    let seconds = 3;
    const el = document.getElementById('countdown');

    const timer = setInterval(() => {
        seconds--;
        el.textContent = seconds;

        if (seconds <= 0) {
            clearInterval(timer);
            window.location.href = "{{ url()->current() }}";
        }
    }, 1000);
</script>

@endif -->
