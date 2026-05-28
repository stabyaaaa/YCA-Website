<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Badge Print</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @page {
            size: 90mm 130mm;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            width: 90mm;
            height: 130mm;
            overflow: hidden;
            font-family: Arial, sans-serif;

            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    </style>
</head>

<body>

@php
    $qr = base64_encode(
        QrCode::format('png')
            ->size(220)
            ->errorCorrection('H')
            ->generate($attendee->qr_code)
    );
@endphp

<div class="w-full h-full bg-white flex flex-col items-center justify-between p-4">

    <!-- HEADER -->
    <div class="text-center mt-2">

        <h1 class="text-xl font-bold">
            WEPOWER 2026
        </h1>

        <p class="text-xs text-gray-600">
            Event Attendee Badge
        </p>

    </div>

    <!-- USER INFO -->
    <div class="text-center">

        <h2 class="text-xl font-bold uppercase">
            {{ $attendee->full_name }}
        </h2>

        <p class="text-sm mt-1">
            {{ $attendee->organization }}
        </p>

        <p class="text-xs text-gray-500">
            {{ $attendee->role }}
        </p>

    </div>

    <!-- QR CODE -->
    <div class="flex flex-col items-center">

        <img
            src="data:image/png;base64,{{ $qr }}"
            style="width:180px;height:180px;"
        />

        <p class="mt-2 font-semibold text-sm">
            {{ $attendee->attendee_id }}
        </p>

    </div>

</div>

<!-- AUTO PRINT -->
<script>
window.onload = function () {

    setTimeout(() => {
        window.focus();
        window.print();
    }, 800);

    window.onafterprint = function () {
        window.close();
    };

};
</script>

</body>
</html>