<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SEMED Escola ta on') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased ">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>

                @if (isset($headersub))
                    <div class="pt-6 pb-2">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-azul-100">
                                    {{$headersub}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 gap-2 pt-6 pb-2">

                    @if (isset($menuleft))

                        <div class="p-2 w-[100%] lg:w-[20%] bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="flex text-azul-100">
                                <i class="fa-regular fa-circle-user p-1 text-[24pt]"></i>
                                <div class="block">
                                    <p class="text-[12pt] font-semibold overflow-hidden">{{ Auth::user()->name }}</p>
                                    <p class="text-[8pt] uppercase overflow-hidden">Cargo do usuário</p>
                                </div>
                            </div>
                            <hr>
                            <div class="block">
                                {{-- @include('components.menu.menu_dashboard',['dados' => $dados['menudashbord']]) --}}
                                {{$menuleft}}
                            </div>
                        </div>

                    @endif

                    <div class="p-2 w-[100%] lg:w-[80%] bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        {{ $slot }}
                    </div>

                </div>
            </main>
        </div>
        <div class="flex justify-center gap-3 mx-2 bo">
            <a class="block" href="{{route('nte')}}" target="_blank">
                <img class="m-auto" src="{{asset('logos/logo_nte_colorida.svg')}}" alt="NTE" width="20px" height="20px" class="pr-3">
            </a>
            <p class="text-[60%] mt-1">DESENVOLVIDO PELO NTE - NUCLEO DE TECNOLOGIA EDUCACIONAL.</p>
        </div>
    </body>
</html>
