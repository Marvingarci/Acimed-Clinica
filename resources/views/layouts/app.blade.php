<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    @livewireStyles
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
</head>

{{-- estilos del calendario --}}
<style>
    body {
        font-family: 'Exo', sans-serif;
    }

    .header-col {
        background: #E3E9E5;
        color: #536170;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    .header-calendar {
        background: #0cacea;
        color: white;
        height: 50px;

    }

    .box-day {
        border: 1px solid #E3E9E5;
        height: 79px;
    }

    .box-dayoff {
        border: 1px solid #E3E9E5;
        height: 79px;
        background-color: #ccd1ce;
    }

    .col {
        text-align: right;
    }

</style>

<body class="flex-col bg-gray-200">
    <div>
        <!-- NavBar -->
        <x-nav-bar />
        <div class="flex">
            <!-- Side Bar -->
            <x-side-bar />
            <div class="w-full flex-col  justify-center">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
