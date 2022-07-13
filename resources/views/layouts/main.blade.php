<!doctype html>
<html class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="flex-column">
    @include('layouts.navbar')
    @php
        $a = \App\Models\Images::inRandomOrder()->first();
    @endphp
    <div class="bg-[url('{{$a->background_image}}')]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>
</html>
