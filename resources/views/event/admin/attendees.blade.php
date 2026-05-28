<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Attendees</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-6">
        Registered Attendees
    </h1>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-3">ID</th>
                <th class="p-3">Name</th>
                <th class="p-3">Phone</th>
                <th class="p-3">Role</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($attendees as $attendee)

            <tr class="border-t">
                <td class="p-3">{{ $attendee->attendee_id }}</td>
                <td class="p-3">{{ $attendee->full_name }}</td>
                <td class="p-3">{{ $attendee->phone }}</td>
                <td class="p-3">{{ $attendee->role }}</td>

                <td class="p-3">

                    <a href="{{ url('/admin/event/print/'.$attendee->id) }}"
                       target="_blank"
                       class="bg-black text-white px-3 py-1 rounded">

                        Print Badge

                    </a>

                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

</div>

</body>
</html>