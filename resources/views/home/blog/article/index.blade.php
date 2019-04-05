@extends('home.layouts.app')

@section('content')

    @include('home.layouts.header')

    <main role="main" class="container">
        <div class="row">

            @include('home.blog.article.components.content')
            @include('home.blog.article.components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->

    @include('home.layouts.footer')
@endsection