@if(config('vienblog.sidebar.popular.open'))
    <div class="p-3">
        <h5 class="font-weight-bold theme-first-text">{{ config('vienblog.sidebar.popular.title') }}</h5>
        <ol class="list-unstyled mb-0">
            @foreach($sidebar_populars as $hot)
                <li class="d-flex justify-content-between align-items-center mb-1">
                    <a class="theme-second-text overflow-slh" href="{{ route('home.blog.article', $hot['slug']) }}">
                        {!! $hot['title'] !!}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
@endif