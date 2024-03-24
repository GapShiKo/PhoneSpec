<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>PhoneSpec</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .container #calendar .fc-event {
            color: white;
        }</style>
</head>
<body>
@include('layouts/navigation')
<div class="container max-w-screen-lg mt-5">
    <div id='calendar'></div>
</div>
<script>
    $(document).ready(function () {
        const calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            displayEventTime: false,
            events: [
                @foreach($phones as $phone)
                {
                    title: '{{ $phone->name }}',
                    start: '{{ date("Y-m-d", strtotime($phone->date)) }}T00:00:00',
                    end: '{{ date("Y-m-d", strtotime($phone->date)) }}T23:59:59',
                    url: '{{ route("show", $phone->id) }}' // Добавляем ссылку на страницу описания телефона
                },
                @endforeach
            ],
            eventClick: function(calEvent, jsEvent, view) {
                if (calEvent.url) {
                    window.open(calEvent.url, "_blank"); // Открываем ссылку в новой вкладке
                    return false; // Предотвращаем стандартное поведение события
                }
            }
        });
    });
</script>
</body>
</html>

