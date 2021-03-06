<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '') 欢迎来到凑学</title>
    <meta name="description" content="@yield('description', '凑学')" />
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('styles')


</head>
<body>
<div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')
    <div class="container">
        @yield('content')
    </div>
    @include('layouts._footer')
</div>

<!-- JS -->
<script src="{{ mix('js/app.js') }}"></script>

{{--<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>--}}

@yield('scripts')
@yield('scriptsAfterJs')



</body>
</html>
