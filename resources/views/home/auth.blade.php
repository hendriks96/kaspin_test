<!DOCTYPE html>
<html lang="en">
    @include('includes.header-admin')

    <body class>
        @include('includes.navbar')
      
        @yield('content')
        @include('includes.js-admin')

    </body>
</html>