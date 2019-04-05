@if($guess_you_like_articles)
    <h5 class="font-weight-bold pb-2">猜你喜欢</h5>
    <div class="list-group mb-5">
        @foreach($guess_you_like_articles as $article)
            <a href="{{ route('home.blog.article', $article['slug']) }}"
               class="p-2 border-top list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 overflow-slh">{!! $article['title'] !!}</h6>
                    <small class="min-width-max-content">阅读 {{ $article['read_count'] }}</small>
                </div>
                <p class="mb-1 text-secondary overflow-slh">{!! $article['description'] !!}</p>
            </a>
        @endforeach
    </div>
@endif