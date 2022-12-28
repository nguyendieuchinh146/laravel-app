<!-- app/views/layouts/master.blade.php -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('../resources/themes/admin/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/themes/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/themes/admin/css/prism.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('../resources/css/bootstrap/bootstrap.min.css') }}">--}}
{{--    <script src="{{ asset('../resources/css/bootstrap/bootstrap.bundle.min.js') }}"></script>--}}
</head>
<body>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    {{--Styles css common--}}
    <link rel="stylesheet" href="{{ asset('../resources/themes/admin/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/themes/admin/css/dark_style.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/themes/admin/css/prism.css') }}">
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body class="dark-theme">
@include('partial.sidebar')
<div class="wrapper d-flex flex-column min-vh-100 bg-light dark:bg-transparent">
    @include('partial.header')
    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    @include('partial.footer')
</div>

{{--Scripts js common--}}
<script src="{{ asset('../resources/themes/admin/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('../resources/themes/admin/js/simplebar.min.js') }}"></script>
{{--<script src="{{ asset('../resources/themes/admin/js/chart.min.js') }}"></script>--}}
{{--<script src="{{ asset('../resources/themes/admin/js/coreui-chartjs.js') }}"></script>--}}
{{--<script src="{{ asset('../resources/themes/admin/js/coreui-utils.js') }}"></script>--}}
{{--<script src="{{ asset('../resources/themes/admin/js/main.js') }}"></script>--}}
<script>

    if (document.body.classList.contains('dark-theme')) {
        var element = document.getElementById('btn-dark-theme');
        if (typeof(element) != 'undefined' && element != null) {
            document.getElementById('btn-dark-theme').checked = true;
        }
    } else {
        var element = document.getElementById('btn-light-theme');
        if (typeof(element) != 'undefined' && element != null) {
            document.getElementById('btn-light-theme').checked = true;
        }
    }

    function handleThemeChange(src) {
        var event = document.createEvent('Event');
        event.initEvent('themeChange', true, true);

        if (src.value === 'light') {
            document.body.classList.remove('dark-theme');
        }
        if (src.value === 'dark') {
            document.body.classList.add('dark-theme');
        }
        document.body.dispatchEvent(event);
    }
</script>
{{--Scripts link to file or js custom--}}
@yield('scripts')
</body>
</html>
