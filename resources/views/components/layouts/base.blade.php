<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stands</title>
    @vite('resources/scss/app.scss')
    <script></script>
</head>

<body class="bg-white dark:bg-gray-900 dark:text-white">

    <x-main-nav />
    @auth

    <div class="pt-24">
        @else

        <div class="">
    @endauth
        {{ $slot }}
    </div>
    @if (Route::has('login'))
        <div class="text-right px-6 py-2 text-xs">
            @auth
            @else
                <a href="{{ route('login') }}"
                    class=" text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    @vite('resources/ts/app.ts')
</body>

</html>
