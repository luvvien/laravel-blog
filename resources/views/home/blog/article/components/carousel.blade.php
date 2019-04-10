@if(config('vienblog.sidebar.carousel.open'))
    <div id="index_carousel" class="carousel slide mb-3" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i = 0;$i < count(config('vienblog.sidebar.carousel.banners'));$i++)
                <li data-target="#index_carousel" data-slide-to="{{ $i }}" @if($i==0)class="active"@endif></li>
            @endfor
        </ol>
        <div class="carousel-inner border-light border">
            @foreach(config('vienblog.sidebar.carousel.banners') as $key => $banner)
                <div class="carousel-item{{ $key == 0 ? " active" : ""}}">
                    <a href="{{ $banner['url'] }}" target="_blank" rel="nofollow">
                        <img class="d-block w-100" src="{{ $banner['image'] }}" alt="{{ $banner['description'] }}">
                    </a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#index_carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#index_carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endif