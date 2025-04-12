@props(['pageTitle' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex">
        <!-- Form -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-gray-100 px-6">
            <!-- Logo / Brand Name -->
            <div class="text-center mb-6">
                <a href="/" class="text-4xl font-extrabold text-indigo-600 hover:text-indigo-800 transition duration-200">
                    TalentHub
                </a>
            </div>

            <!-- Form Card -->
            <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
                @if (isset($pageTitle))
                    <h2 class="text-xl font-semibold text-center text-gray-700 mb-2">{{ $pageTitle }}</h2>
                 @endif
                {{ $slot }}
            </div>
        </div>

        <!-- Image -->
        <div class="hidden md:block w-1/2">
            <img src="{{ asset('images/login_image.jpg') }}" alt="Right Side" class="object-cover w-full h-full">
        </div>
    </div>
</body>

</html>
