@if ($paginator->hasPages())
<nav class="d-flex justify-content-between p-2 bg-light" aria-label="Page navigation">

    <ul class="paginationpagination justify-content-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li> --}}
            <li class="page-item disabled" aria-label="@lang('pagination.previous')">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }} sassasasas</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                        <li class="page-item active">
                            <a class="page-link" href="#"> <span class="sr-only">{{ $page }}</span></a>
                        </li>
                    @else
                        {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                        <li class="page-item ">
                            <a class="page-link" href="{{ $url }}"> <span class="sr-only">{{ $page }}</span></a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li> --}}
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                  <i class="fa fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
            </li>
        @else
            {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li> --}}
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>@lang('pagination.previous')
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
@endif
