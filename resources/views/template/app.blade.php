<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SEMED - Escola tá On - @yield('title')</title>

        <!-- Fonts -->

        <!-- Styles -->
        @vite('resources/css/app.css', 'resources/js/app.js')
        @yield('style')

        <!-- Script -->
        @yield('script')

    </head>
    <body class="">
      <nav class="d">
        @yield('menu')
      </nav>
      <section>
        @yield('meio')
      </section>
      <footer>
        @yield('footer')
      </footer>
    </body>
</html>
