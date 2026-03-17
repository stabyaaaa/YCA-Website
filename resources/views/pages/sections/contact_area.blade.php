@php
$fields = $section->fields->pluck('field_value','field_key');

$address = $fields['address'] ?? '';
$email = $fields['email'] ?? '';
$phone = $fields['phone'] ?? '';
$map = $fields['map_embed'] ?? '';
@endphp

<section class="py-16">

<div class="max-w-5xl mx-auto px-6">

    <!-- Title -->
    <div class="text-center mb-10">
        <h2 class="text-3xl font-semibold text-gray-900">
            Contact Us
        </h2>
        <p class="text-gray-600 mt-2">
            We would love to hear from you. Reach out using the information below.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-10">

        <!-- Contact Info -->
        <div class="space-y-4">

            @if($address)
            <div class="p-4 border rounded">
                <strong>Address:</strong>
                <p class="text-gray-600 mt-1">{{ $address }}</p>
            </div>
            @endif

            @if($email)
            <div class="p-4 border rounded">
                <strong>Email:</strong>
                <p class="text-gray-600 mt-1">{{ $email }}</p>
            </div>
            @endif

            @if($phone)
            <div class="p-4 border rounded">
                <strong>Phone:</strong>
                <p class="text-gray-600 mt-1">{{ $phone }}</p>
            </div>
            @endif

        </div>

        <!-- Map -->
        @if($map)
        <div class="border rounded overflow-hidden">
            {!! $map !!}
        </div>
        @endif

    </div>

</div>

</section>