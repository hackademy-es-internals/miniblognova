<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if(isset($meta))
    {{$meta}}
    @endif
    <title>{{ isset($title) ? $title : 'hack accelletate' }}</title>
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        div.my-img > img {
            height: auto;
            max-width: 100%;
        }
        

    </style>
</head>
<body >
     <!-- nav -->
     <x-navbar />
    {{ $slot }}

    <x-footer />

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>