<div class="col-md-8 blog-main">
    <div class="border-bottom mb-3"></div>
    <div class="row">
        @foreach($data as $article)
            <div class="col-12 pb-3 px-4 mb-2">
                <a class="h5 text-bold text-dark text-decoration-none" href="{{ route('home.blog.article', $article['slug']) }}">
                    @if($article['is_top'] == 1)
                        <span class="badge badge-danger align-top">置顶</span>
                    @endif
                    <span class="badge badge-info align-top">{!! $article['category']['cate_name'] !!}</span>
                    {!! $article['title'] !!}
                </a>
                <p class="pt-1 mb-0 text-muted text-break">
                    {!! $article['description'] !!}
                </p>
                <small class="text-small text-muted">阅读: {{ $article['read_count'] }}次 &nbsp; 发布时间: {{ vn_time($article['created_at']) }}</small>
            </div>
        @endforeach
    </div>
    <div class="pb-4">
        <a class="btn btn-sm btn-outline-secondary btn-border-circle mr-2 my-2{{ ($first_page_url and ($current_page != 1)) ? '' : ' disabled' }}"
           href="{{ $first_page_url }}">首页</a>

        <a class="btn btn-sm btn-outline-secondary btn-border-circle mr-2 my-2{{ $prev_page_url ? '' : ' disabled' }}"
           href="{{ $prev_page_url }}">上一页</a>

        @for($i = 1; $i <= $last_page; $i++)
            <a class="btn btn-sm btn-outline-secondary btn-border-circle mr-2 my-2{{ $current_page == $i ? ' active' : '' }}"
               href="{{ URL::current() }}?page={{ $i }}">{{ $i }}</a>
        @endfor

        <a class="btn btn-sm btn-outline-secondary btn-border-circle mr-2 my-2{{ $next_page_url ? '' : ' disabled' }}"
           href="{{ $next_page_url }}">下一页</a>

        <a class="btn btn-sm btn-outline-secondary btn-border-circle mr-2 my-2{{ ($last_page_url and ($current_page != $last_page)) ? '' : ' disabled' }}"
           href="{{ $last_page_url }}">末页</a>

    </div>

</div><!-- /.blog-main -->