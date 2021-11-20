<!DOCTYPE html>
<html lang="en">
    @include('includes.resume-inc.resume-header')

    <body id="page-top">
        
        @include('includes.resume-inc.resume-navbar')
        @yield('content')
        
        @include('includes.resume-inc.resume-js')
        @yield('custom-js')

    </body>
</html>