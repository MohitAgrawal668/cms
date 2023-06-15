@if ($paginator->hasPages())
    <div class="themelazer-pagination">
        <div class="themelazer-pagination-wrapper">
           {{-- Pagination Elements --}}
           @foreach ($elements as $element)
           {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="disabled" aria-disabled="true"><span>{{ $element }}</span></span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-numbers current">{{$page}}</span>
                        @else
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
           @endforeach
        </div>
     </div>
@endif
