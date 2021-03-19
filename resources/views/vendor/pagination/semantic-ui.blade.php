@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
        sasassssas
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a> --}}
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-label="@lang('pagination.previous')">
                  <i class="fa fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @else
            <a class="icon item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- <a class="item active" href="{{ $url }}" aria-current="page">{{ $page }}</a> --}}
                        <li class="page-item active">
                            <a class="page-link" href="{{ $url }}"> <span class="sr-only">{{ $page }}</span></a>
                        </li>
                    @else

                            <a class="page-link" href="{{ $url }}"> <span class="sr-only">{{ $page }}</span></a>

                        {{-- <a class="item" href="{{ $url }}">{{ $page }}</a> --}}
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- <a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a> --}}
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                  <i class="fa fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
            </li>
        @else
            {{-- <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a> --}}
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>@lang('pagination.previous')
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif
    </div>
@endif

