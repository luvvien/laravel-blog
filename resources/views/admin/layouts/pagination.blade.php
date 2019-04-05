<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item{{ $prev_page_url ? '' : ' disabled' }}" href="{{ $prev_page_url }}">
            <a class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for($i = 1; $i <= $last_page; $i++)
            <li class="page-item"><a class="page-link{{ $current_page == $i ? ' text-white bg-secondary' : ' text-secondary' }}" href="{{ URL::current() }}?page={{ $i }}">{{ $i }}</a></li>
        @endfor
        {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
        {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
        <li class="page-item{{ $next_page_url ? '' : ' disabled' }}" href="{{ $next_page_url }}">
            <a class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>