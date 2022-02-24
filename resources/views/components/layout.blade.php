<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ isset($title) ? $title : 'hack accelletate' }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body >
    <x-navbar />
    @auth
    <x-showUserDetails title="User details:" />
    @endauth
    {{ $slot }}

    <x-footer />

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>