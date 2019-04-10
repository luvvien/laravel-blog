@section('title')
    <title>{!! $article['title'] !!}</title>
@show
@section('description')
    <meta name="description" content="{!! $article['description'] !!}">
@show
@section('keywords')
    <meta name="keywords" content="{!! $article['keywords'] !!}">
@show

@section('css_ext')
    <link rel="stylesheet" href="{{ asset('js/share.js/css/share.min.css') }}">
@show

<div class="col-md-8 blog-main">
    <div class="border-bottom mb-3">
        <a href="https://vienblog.com"></a>
    </div>

    <div class="blog-post mb-3">
        <h1 class="blog-post-title">{!! $article['title'] !!}</h1>

        <p class="blog-post-meta mb-0">
            {{ vn_time($article['created_at']) }} |
            <a class="bg-gray-light"
               href="{{ route('home.blog.category.show', $article['category']['cate_name']) }}">
                {{ $article['category']['cate_name'] }}
            </a>
        </p>

        <p class="blog-post-meta mt-0">
            {{--            <a href="#" class="badge badge-dark">{{ $article['category']['cate_name'] }}</a>--}}
            @foreach($article['tags'] as $tag)
                <a href="{{ route('home.blog.tag.show', $tag['tag_name']) }}"
                   class="badge badge-secondary">{{ $tag['tag_name'] }}</a>
            @endforeach
        </p>

        <div class="markdown-body">
            {!! $article['markdown'] !!}
        </div>
    </div><!-- /.blog-post -->

    {{--<nav class="blog-pagination">--}}
    {{--<a class="btn btn-outline-primary" href="#">Older</a>--}}
    {{--<a class="btn btn-outline-secondary" href="#">Newer</a>--}}
    {{--</nav>--}}

    {{--<div id="share" class="social-share my-4"></div>--}}
    @include('home.layouts.share')

    @include('home.blog.article.components.recommend')

</div><!-- /.blog-main -->