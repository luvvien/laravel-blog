@extends('home.layouts.app')

@section('content')

    @include('home.layouts.header')

    <main role="main" class="container min-h">
        <div class="pl-3">

            <h1>站点导航</h1>
            <div class="card-columns mt-4">
                @foreach($links as $link)
                    <a href="{{$link['url']}}" class="card">
                        @if($link['img'])
                            <img class="card-img-top" src="{{$link['img']}}" alt="{{$link['title']}}">
                        @endif
                        <div class="card-body p-3">
                            <h5 class="card-title mb-0">{{$link['title']}}</h5>
                            <small class="text-muted">{{$link['description']}}</small>
                        </div>
                    </a>
                @endforeach
            </div>

        </div><!-- /.row -->

    </main><!-- /.container -->

    @include('home.layouts.footer')
@endsection