<!DOCTYPE html>
<html lang="en">
    @include('includes.header')

    <body>
        @include('includes.navbar')
        @yield('content')

        @include('includes.footer')
        
        @include('includes.js')
        @yield('custom-js')

    </body>
</html>