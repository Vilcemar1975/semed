<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SEMED Escola ta on') }}</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-azul-100" style="background-image: url('{{asset('storage/padrao/fundotop.jpg')}}') !important">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <x-application-logo class="w-20 h-20 fill-current" />
                {{-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current" />
                </a> --}}
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
            <div class="block mt-5 text-center">
                <a class="block" href="{{route('nte')}}" target="_blank">
                    <img class="m-auto" src="{{asset('logos/logo_nte_colorida.svg')}}" alt="NTE" width="45px" height="20px" class="pr-3">
                </a>
                <p class="text-[50%] mt-1">DESENVOLVIDO PELO NTE - NUCLEO DE TECNOLOGIA EDUCACIONAL.</p>
            </div>
        </div>
    </body>
</html>
