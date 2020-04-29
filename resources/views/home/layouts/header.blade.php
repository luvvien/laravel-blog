<div class="container">
    <nav class="navbar navbar-expand-md fixed-top theme-header-navbar">
        <div class="container">
            <a class="navbar-brand pl-2 theme-header-navbar-link" href="/">{{ config('vienblog.blog.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <a href="https://vienblog.com"></a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link theme-header-navbar-link" href="/">首页<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link theme-header-navbar-link" href="{{ route('home.blog.link.friend') }}">友情链接</a>
                    </li>
                </ul>
                {{--<form class="form-inline mt-2 mt-md-0">--}}
                {{--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>--}}
                {{--</form>--}}
                @guest()
                    <a class="btn btn-sm btn-outline-light btn-border-circle mr-2 my-2" href="{{ route('login') }}">Sign
                        in</a>
                    <a class="btn btn-sm btn-outline-light btn-border-circle my-2" href="{{ route('register') }}">Sign
                        up</a>
                @else
                    <a class="btn btn-sm btn-outline-light btn-border-circle mr-2 my-2 active"
                       href="#">Hi, {{ Auth::user()->name }}</a>
                    <a class="btn btn-sm btn-outline-light btn-border-circle my-2" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Sign out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <div class="nav-scroller mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach(config('vienblog.header.links') as $link)
                <a class="p-2 theme-under-header-links-text" href="{{ $link['url'] }}">{{ $link['title'] }}</a>
            @endforeach
        </nav>
    </div>
</div>