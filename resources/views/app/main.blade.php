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

<body class="bg-light">
    @include('includes.sidebar')

    @include('includes.navbar')

    <main class="container-lg mt-3 min-vh-100">
        @include('includes.header')
        @yield('content')
    </main>

    @include('includes.footer')

    @include('includes.scripts')
    @stack('scripts')
</body>

</html>