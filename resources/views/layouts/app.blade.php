<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'webfonts.css'])
    @livewireStyles
</head>

<body class="bg-cover bg-fixed bg-center bg-no-repeat" style="background-image: url('{{ Vite::asset('resources/images/homescreen.jpg') }}')">
    {{ $slot }}
 
    @livewireScripts
</body>
</html>