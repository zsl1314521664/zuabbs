<!doctype html>
<html lang="{{ app()->getLocale() }}">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','ZUABBS')-{{ setting('site_name','在郑航校园生活服务平台') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', '在郑航校园生活服务平台'))" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')
        <div class="container">
            @include('shared._messages')
            @yield('content')
        </div>
        @include('layouts._footer')
    </div>
{{--    sudo-su插件   --}}
    @if (app()->isLocal())
        @include('sudosu::user-selector')
    @endif
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>