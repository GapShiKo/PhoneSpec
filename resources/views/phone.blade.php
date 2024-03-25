<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{$phone->name}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .phone-title {
            overflow-wrap: break-word;
        }
    </style>
</head>
<body>
@include('layouts/navigation')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:flex sm:items-center sm:justify-between border-b border-gray-200">
            <div class="sm:flex sm:items-center">
                <img src="{{"../images/".$phone->thumbnail}}" alt="" class="w-96 h-96 mr-4">
                <div>
                    <h3 class="phone-title text-5xl font-medium leading-6  text-gray-900">{{$phone->name}}</h3>
                </div>
            </div>
        </div>
        <div class="px-4 py-5 sm:px-6">
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="ext-sm font-medium text-gray-500">Release date:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{$phone->date}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Memory configs</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{$phone->memory}}</dd>
                    </div>
                    <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">System-On-Chip</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{$phone->SoC}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Cameras</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{$phone->cameras}}</dd>
                    </div>
                    <!-- Другие характеристики телефона -->
                </dl>
            </div>
        </div>
        <div class="px-4 py-5 sm:flex sm:items-center sm:justify-between border-b border-gray-200">
            @if(app('App\Http\Controllers\AdminController')->isAdmin(Auth::user()))
                <a href="{{ route('edit', $phone) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('delete', $phone->id) }}" class="btn btn-primary">Delete</a>
            @endif
        </div>
    </div>
</div>
</body>
</html>
