@if(config('vienblog.sidebar.tag.open'))
    <div class="p-3">
        <h5 class="font-weight-bold">{{ config('vienblog.sidebar.tag.title') }}</h5>
        <div>
            @foreach($sidebar_tags as $tag)
                <a href="{{ route('home.blog.tag.show', $tag['tag_name']) }}" class="badge badge-pill
            <?php $rand = rand(0, 6)?>
            @if($rand == 0)badge-primary
            @elseif($rand == 1)badge-dark
            @elseif($rand == 2)badge-success
            @elseif($rand == 3)badge-danger
            @elseif($rand == 4)badge-warning
            @elseif($rand == 5)badge-info
            @elseif($rand == 6)badge-secondary
            @endif">{{ $tag['tag_name'] }}</a>
            @endforeach
        </div>
    </div>
@endif