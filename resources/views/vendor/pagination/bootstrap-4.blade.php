@if ($paginator->hasPages())
<nav class=" " aria-label="Navegación de página">
    <ul class="paginationpagination justify-content-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())

            {{-- <li class="page-item disabled"  aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">
                    <i class="fas fa-chevron-left " ></i>
                    Ant
                </span>
            </li> --}}
            <li class="page-item disabled" aria-label="@lang('pagination.previous')">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @else

            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="fas fa-chevron-left " ></i>
                    Ant
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li> --}}
                        <li class="page-item active">
                            <a class="page-link" href="#"> <span class="sr-only">{{ $page }}</span></a>
                        </li>
                    @else
                        {{-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> --}}
                        <li class="page-item ">
                            <a class="page-link" href="{{ $url }}"> <span class="sr-only">{{ $page }}</span></a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    Sig
                    <i class="fas fa-chevron-right ml-2"></i>
                </a>
            </li> --}}
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                  <i class="fa fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
            </li>
        @else
            {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">
                    Sig
                    <i class="fas fa-chevron-right ml-2"></i>
                </span>
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
