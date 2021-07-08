<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>

    @include('layouts.styles')
    @yield('content_styles')
    <meta name="msapplication-TileColor" content="#151515">
    <meta name="theme-color" content="#151515">
</head>

<body>
    <div class="container">
       @include('layouts.navbar')

       @yield('content')

       @include('layouts.footer')
    </div>

    @include("layouts.scripts")

    @yield('content_scripts')
</body>

</html>