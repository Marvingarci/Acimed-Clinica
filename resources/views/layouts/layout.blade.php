<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body class="flex-col bg-gray-200">
    <div>
        <!-- NavBar -->
        <x-nav-bar />
        <div class="flex">
            <!-- Side Bar -->
            <x-side-bar />
            <div class="w-full flex-col  justify-center">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
