<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SEMED - Escola tá On - @yield('title')</title>

        <!-- Fonts -->

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
      <section>
        @yield('meio')
      </section>
      <footer>
        @yield('footer')
      </footer>
      @livewireScripts
      @yield('scriptbottom')

    </body>
</html>
