<!DOCTYPE html>
<html>
<head>
    <script>
        window.onload = function () {
            window.print();
            setTimeout(() => window.close(), 1000);
        };
    </script>

    <style>
        body { text-align:center; font-family: Arial; padding:20px; }
        .badge { border:1px solid #000; padding:20px; width:300px; margin:auto; }
    </style>
</head>

<body>

<div class="badge">
    <h2>{{ $attendee->full_name }}</h2>
    <p>{{ $attendee->attendee_id }}</p>
    <p>{{ $attendee->role }}</p>
</div>
<!-- QR CODE FIX -->
<div class="flex flex-col items-center">

    <div>
        {!! QrCode::format('svg')->size(180)->generate($attendee->qr_code) !!}
    </div>

    <p class="mt-2 font-semibold text-sm">
        {{ $attendee->attendee_id }}
    </p>

</div>

</body>
</html>