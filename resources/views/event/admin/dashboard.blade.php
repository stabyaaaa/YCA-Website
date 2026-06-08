<!DOCTYPE html>
<html>
<head>
    <title>Event Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">Event Dashboard</h1>

    <div class="grid grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">Total Attendees</h2>
            <p class="text-3xl font-bold mt-2">{{ \App\Models\Event\Attendee::count() }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">Checked In</h2>
            <p class="text-3xl font-bold mt-2">
                {{ \App\Models\Event\Checkin::count() }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">Pending Print</h2>
            <p class="text-3xl font-bold mt-2">
                {{ \App\Models\Event\Attendee::where('is_printed',0)->count() }}
            </p>
        </div>

    </div>

</div>

</body>
</html>