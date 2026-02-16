<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'World Bank × Yunus Center AIT')</title>

    @vite('resources/css/app.css')
     <!-- Alpine.js (for dropdowns, toggles, etc.) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<script>
    function openCreateAdminModal() {
        document.getElementById('createAdminModal').classList.remove('hidden');
        document.getElementById('createAdminModal').classList.add('flex');
    }

    function closeCreateAdminModal() {
        document.getElementById('createAdminModal').classList.add('hidden');
        document.getElementById('createAdminModal').classList.remove('flex');
    }

    document.addEventListener('DOMContentLoaded', () => {
    const counter = document.getElementById('countdown');

    if (!counter) return;

    let count = 3;
    const interval = setInterval(() => {
        count--;
        counter.innerText = count;

        if (count === 0) {
            clearInterval(interval);
            closeCreateAdminModal(); // just close modal
        }
    }, 1000);
});

    document.addEventListener('DOMContentLoaded', () => {
        @if(session('admin_created'))
            openCreateAdminModal();
        @endif
    });
</script>



<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    @include('layouts/partials/public-navbar')

    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts/partials/public-footer')
    @include('layouts/partials.create-admin-modal')

</body>

</html>
