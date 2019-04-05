<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(isset($meta)){{ $meta['title'] }}@else Vien Blog Admin @endif</title>
    <meta name="description" content="@if(isset($meta)){{ $meta['description'] }}@endif">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--@if(env("APP_DEBUG") == false)--}}
    {{--@include("layouts.ga")--}}
    {{--@endif--}}

    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    @section('css')
        <link href="{{ mix('/css/admin.css') }}" rel="stylesheet" type="text/css"/>
    @show
    @section('css_ext')
    @show

</head>
<body>
@include('admin.layouts.header')

{{--<main class="py-4">--}}
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.menu')
            @yield('content')
        </div>
    </div>
{{--</main>--}}
</body>
@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/admin.js') }}"></script>
    {{--<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>--}}
    {{--<script>--}}
        {{--feather.replace()--}}
    {{--</script>--}}
@show

@section('js_ext')
@show
</html>
