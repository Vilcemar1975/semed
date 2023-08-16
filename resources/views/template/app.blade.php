<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SEMED - Escola tá On - @yield('title')</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> --}}

        <!-- Styles -->
        @vite('resources/js/app.js')
        @livewireStyles
        @yield('style')

        <!-- Script -->
        @yield('script')

    </head>
    <body id="body_app" class="" style="background-image: url('{{asset('storage/padrao/fundotop.jpg')}}')">
      <nav class="">
        @yield('menu')
      </nav>
      <div class="space-menu"></div>
      <section>
        <div class="flex flex-col lg:flex-row">
            <div id="container-left" class="basis-1/4">
                @yield('container-left')
            </div>
            <div id="container-slider" class="basis-1/2 block">
                <div id="container-slider">
                    @yield('container-slider')
                </div>
                <div id="container-slider-bottom">
                    @yield('container-slider-bottom')
                </div>
            </div>
            <div id="container-right" class="basis-1/4">
                @yield('container-right')
            </div>
        </div>
        <div id="container-fixa" class="block">
            @yield('container-fixa')
        </div>
      </section>
      <footer>
        @yield('footer')
      </footer>
      @livewireScripts
      @yield('scriptbottom')

    </body>
</html>
