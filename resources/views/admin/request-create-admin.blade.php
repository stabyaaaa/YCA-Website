<!-- <!DOCTYPE html>
<html>
<head>
    <title>Create Admin Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .card {
            max-width: 420px;
            margin: 80px auto;
            background: #fff;
            padding: 24px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #1e40af;
        }
        .success {
            color: green;
            margin-bottom: 15px;
            text-align: center;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="card">

    <h2>Request to Create Admin</h2>

    {{-- Success --}}
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.request.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <br>

        <div>
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <button type="submit">
            Submit Request
        </button>
    </form>

</div>

</body>
</html> -->
