<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stands</title>
    @vite('resources/scss/app.scss')
    <script></script>
</head>

<body class="bg-white dark:bg-gray-900 dark:text-white">

    <x-main-nav/>
    <div class="pt-24">
        {{ $slot }}
    </div>
    @vite('resources/ts/app.ts')
</body>

</html>
