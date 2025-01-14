<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    @include('includes.styles')
    @stack('styles')
</head>

<body class="bg-dark">
    @yield('content')

    @include('includes.scripts')
    @stack('scripts')
</body>

</html>