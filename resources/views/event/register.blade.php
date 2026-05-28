<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Event Registration</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

<div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-black">
            Event Registration
        </h1>

        <p class="text-gray-500 mt-2">
            Register attendee and print badge instantly.
        </p>

    </div>

    <div
        id="messageBox"
        class="hidden mb-5 p-4 rounded-xl text-white font-semibold"
    ></div>

    <form id="registrationForm" class="space-y-4">

        @csrf

        <input
            type="text"
            name="full_name"
            placeholder="Full Name"
            class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
            required
        >

        <input
            type="text"
            name="organization"
            placeholder="Organization"
            class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
        >

        <input
            type="text"
            name="phone"
            placeholder="Phone Number"
            class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Email Address"
            class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
        >

        <input
            type="text"
            name="role"
            placeholder="Role / Position"
            class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
        >

        <button
            id="submitBtn"
            type="submit"
            class="w-full bg-black text-white p-4 rounded-xl font-bold hover:bg-gray-800 transition"
        >
            Register & Print Badge
        </button>

    </form>

</div>
<script>

const form = document.getElementById('registrationForm');
const submitBtn = document.getElementById('submitBtn');
const messageBox = document.getElementById('messageBox');

const base = "{{ url('') }}";

function showMessage(message, type='success') {
    messageBox.classList.remove('hidden');
    messageBox.innerHTML = message;

    messageBox.className =
        type === 'success'
        ? 'mb-5 p-4 rounded-xl bg-green-500 text-white font-semibold'
        : 'mb-5 p-4 rounded-xl bg-red-500 text-white font-semibold';
}

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Registering...';

    messageBox.classList.add('hidden');

    try {

        const formData = new FormData(form);

        const response = await fetch(base + '/event/register', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();

        if (data.success) {

            showMessage('Registered successfully!');

            // ❌ NO PRINT
            // ❌ NO BADGE OPEN

            form.reset();

        } else {
            showMessage(data.message || 'Registration failed.', 'error');
        }

    } catch (error) {
        console.error(error);
        showMessage('Server error occurred.', 'error');
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Register';
    }
});

</script>

</body>
</html>