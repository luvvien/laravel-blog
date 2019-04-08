@if(config('vienblog.sidebar.hot.open'))
    <div class="p-3">
        <h5 class="font-weight-bold">{{ config('vienblog.sidebar.hot.title') }}</h5>
        <ol class="list-unstyled mb-0">
            @foreach($sidebar_hots as $hot)
                <li class="d-flex justify-content-between align-items-center mb-1">
                    <a class="text-secondary overflow-slh" href="{{ route('home.blog.article', $hot['slug']) }}">
                        {!! $hot['title'] !!}
                    </a>
                    <span class="badge badge-secondary">{{ $hot['read_count'] }}</span>
                </li>
            @endforeach
        </ol>
    </div>
@endif