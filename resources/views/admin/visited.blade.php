<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ app('ini-translator')->trans('visited') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navigation')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <h1 class="px-4 py-1 font-bold text-2xl">{{ app('ini-translator')->trans('visited') }}</h1>
        <div class="px-4 py-2 sm:px-1">
            <ul id="visitedPagesList"></ul>
            <script>
                var visitedPages = JSON.parse(sessionStorage.getItem('visited_pages')) || [];
                var list = document.getElementById('visitedPagesList');
                visitedPages.forEach(function (page) {
                    var listItem = document.createElement('li');
                    listItem.textContent = page;
                    list.appendChild(listItem);
                });
            </script>
            {{--            @foreach($visitedPages as $page)--}}
            {{--            <div class="border-t border-gray-200">--}}
            {{--                <dl>--}}
            {{--                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">--}}
            {{--                        <div class="flex items-center"> <!-- Changed here -->--}}
            {{--                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{$page}}</dd>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </dl>--}}
            {{--            </div>--}}
            {{--            @endforeach--}}
        </div>
    </div>
</div>
</body>
</html>
