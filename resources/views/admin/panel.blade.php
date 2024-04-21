<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ app('ini-translator')->trans('usersl') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts/navigation')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <h1 class="px-4 py-1 font-bold text-2xl">{{ app('ini-translator')->trans('users') }}</h1>
        <div class="px-4 py-2 sm:px-1">
            @foreach($users as $user)
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <div class="flex items-center"> <!-- Changed here -->
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ app('ini-translator')->trans('name') }}: {{$user->name}};</dd>
                                <dd class="mt-1 pl-1 text-sm text-gray-900 sm:col-span-2">{{ app('ini-translator')->trans('email') }}: {{$user->email}}</dd>
                            </div>
{{--                            <x-dropdown align="right" width="48">--}}
{{--                                <x-slot name="trigger">--}}
{{--                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">--}}
{{--                                        <div>{{ Auth::user()->name }}</div>--}}

{{--                                        <div class="ms-1">--}}
{{--                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
{{--                                    </button>--}}
{{--                                </x-slot>--}}

{{--                                <x-slot name="content">--}}
{{--                                    <x-dropdown-link :href="route('profile.edit')">--}}
{{--                                        {{ __('Make admin') }}--}}
{{--                                    </x-dropdown-link>--}}
{{--                                    <x-dropdown-link :href="route('admin')">--}}
{{--                                        {{ __('Delete user') }}--}}
{{--                                    </x-dropdown-link>--}}
{{--                                </x-slot>--}}
{{--                            </x-dropdown>--}}
                        </div>
                    </dl>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
