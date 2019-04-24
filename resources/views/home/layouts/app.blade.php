<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('title')
        <title>@if(isset($meta)){{ $meta['title'] }}@else{{ config("vienblog.blog.name") }}@endif</title>
    @show
    @section('description')
        <meta name="description"
              content="@if(isset($meta)){{ $meta['description'] }}@else{{ config("vienblog.blog.description") }}@endif">
    @show
    @section('keywords')
        <meta name="keywords"
              content="@if(isset($meta)){{ $meta['keywords'] }}@else{{'vienblog,vienblog.com,blog,markdown,laravel,laravel blog,markdown blog'}}@endif">
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--@if(env("APP_DEBUG") == false)--}}
    {{--@include("layouts.ga")--}}
    {{--@endif--}}

<!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

<!-- Styles -->
    {{--<link rel="stylesheet"--}}
    {{--href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/3.0.1/github-markdown.min.css">--}}
    {{--    <link href="{{ asset('css/base.css') }}" rel="stylesheet">--}}
    @section('css')
        <link href="{{ mix('/css/web.css') }}" rel="stylesheet" type="text/css"/>
    @show
    @section('css_ext')@show
    @section('ads')
        @if(env('APP_DEBUG') == false and config('vienblog.ad') == true)
            @include('ads.adsense')
        @endif
    @show

</head>
<body>

@yield('content')

@section('counter')
    @if(env('APP_DEBUG') == false and config('vienblog.counter') == true)
        @include('counters.counter')
    @endif
@show

</body>
@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/web.js') }}"></script>
    <script src="{{ asset('js/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollstop.min.js') }}"></script>
    <script>
        $("img.lazyload").lazyload({
            threshold: 600,
            effect: "fadeIn",
            failure_limit: 20,
            skip_invisible: false
        });
    </script>
@show
@section('js_ext')
@show
@if(env('APP_DEBUG') == false and config('vienblog.baidu.auto_push') == true)
    <script>
        (function () {
            var bp = document.createElement('script');
            var curProtocol = window.location.protocol.split(':')[0];
            if (curProtocol === 'https') {
                bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
            }
            else {
                bp.src = 'http://push.zhanzhang.baidu.com/push.js';
            }
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(bp, s);
        })();
    </script>
@endif
</html>
