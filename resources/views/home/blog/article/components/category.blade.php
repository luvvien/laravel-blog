@if(config('vienblog.sidebar.category.open'))
    <div class="p-3">
        <h5 class="font-weight-bold">{{ config('vienblog.sidebar.category.title') }}</h5>
        <div>
            @foreach($sidebar_categories as $category)
                <a class="mt-1 btn btn-sm btn-outline-dark text-gray-light" href="{{ route('home.blog.category.show', $category['cate_name']) }}">
                    {!! $category['cate_name'] !!}
                </a>
            @endforeach
        </div>
    </div>
@endif