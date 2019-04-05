<nav class="col-md-2 d-none d-md-block bg-light sidebar h-100">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    {{--<span data-feather="home"></span>--}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blog.article.list') }}">
                    {{--<span data-feather="file-text"></span>--}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    文章管理
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.links.friend.list') }}">
                    {{--<span data-feather="file-text"></span>--}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                    友链管理
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.edit', Auth::guard('admin')->user()->id) }}">
                    {{--<span data-feather="users"></span>--}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    管理员信息
                </a>
            </li>
        </ul>

        {{--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
            {{--<span>最近编辑</span>--}}
            {{--<a class="d-flex align-items-center text-muted" href="#">--}}
                {{--<span data-feather="plus-circle"></span>--}}
            {{--</a>--}}
        {{--</h6>--}}
        {{--<ul class="nav flex-column mb-2">--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<span data-feather="file-text"></span>--}}
                    {{--Current month--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    </div>
</nav>