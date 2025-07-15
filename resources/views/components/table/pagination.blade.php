@if ($records->hasPages())
    @php
        $current = $records->currentPage();
        $last = $records->lastPage();
    @endphp

    <nav class="custom-pagination-wrapper d-flex justify-content-end mt-4">
        <ul class="pagination gap-1">

            {{-- Previous --}}
            @if ($current == 1)
                <li class="page-item disabled"><span class="page-link">&laquo; Prev</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $records->previousPageUrl() }}">&laquo; Prev</a></li>
            @endif

            {{-- Page 1 --}}
            <li class="page-item {{ $current == 1 ? 'active' : '' }}">
                <a class="page-link" href="{{ $records->url(1) }}">1</a>
            </li>

            {{-- Page 2 --}}
            @if ($last >= 2)
                <li class="page-item {{ $current == 2 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $records->url(2) }}">2</a>
                </li>
            @endif

            {{-- Left Dots --}}
            @if ($current > 4)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Middle Pages --}}
            @for ($i = max(3, $current - 1); $i <= min($last - 2, $current + 1); $i++)
                @if ($i > 2 && $i < $last - 1)
                    <li class="page-item {{ $current == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $records->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Right Dots --}}
            @if ($current < $last - 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Last 2 pages --}}
            @if ($last >= 2)
                <li class="page-item {{ $current == $last - 1 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $records->url($last - 1) }}">{{ $last - 1 }}</a>
                </li>
                <li class="page-item {{ $current == $last ? 'active' : '' }}">
                    <a class="page-link" href="{{ $records->url($last) }}">{{ $last }}</a>
                </li>
            @endif

            {{-- Next --}}
            @if ($records->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $records->nextPageUrl() }}">Next &raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>
            @endif

        </ul>
    </nav>
@endif
