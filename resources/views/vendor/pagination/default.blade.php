@if ($paginator->hasPages())
    <div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">
        <span class="butons">
        {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- Array Of Links --}}
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active"><span>{{ $page }}</span></a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
            @endforeach
        </span>

    </div>
@endif