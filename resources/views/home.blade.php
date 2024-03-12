<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Phone Spec</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($phones as $phone)
        <div class="w-580 h-480 px-4 py-8 max-w-xl">
            <div class="bg-white shadow-2xl">
                <div>
                    <img src={{$phone->thumbnail}} alt="">
                </div>
                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="font-bold text-2xl text-gray-800">{{$phone->name}}</h2>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">Release date: {{$phone->date}}</p>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">Memory configs: {{$phone->memory}}</p>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">System-On-Chip: {{$phone->SoC}}</p>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">Cameras: {{$phone->cameras}}</p>
                 </div>
             </div>
        </div>
    @endforeach
    </div>
</div>
</body>
</html>
