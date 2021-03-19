@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.previous')</span>
            </li> --}}
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>@lang('pagination.previous')
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @else
            {{-- <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            </li> --}}
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>@lang('pagination.previous')
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li> --}}
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                  <i class="fa fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
            </li>
        @else
            {{-- <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li> --}}
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fa fa-angle-left"></i>@lang('pagination.previous')
                  <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif
    </ul>
@endif

