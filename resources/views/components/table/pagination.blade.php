@if ($records->hasPages())
    <nav class="d-flex justify-content-end mt-4">
        <ul class="pagination">

            {{-- Previous --}}
            <li class="page-item {{ $records->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $records->previousPageUrl() ?? '#' }}" tabindex="-1">&laquo;</a>
            </li>

            @php
                $current = $records->currentPage();
                $last = $records->lastPage();
            @endphp

            {{-- Always show page 1 --}}
            <li class="page-item {{ $current == 1 ? 'active' : '' }}">
                <a class="page-link" href="{{ $records->url(1) }}">1</a>
            </li>

            {{-- Show page 2 if current > 3 --}}
            @if ($current > 3)
                <li class="page-item">
                    <a class="page-link" href="{{ $records->url(2) }}">2</a>
                </li>
            @endif

            {{-- Dots if needed --}}
            @if ($current > 4)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Pages around current --}}
            @for ($i = max(3, $current - 1); $i <= min($last - 2, $current + 1); $i++)
                <li class="page-item {{ $current == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $records->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Dots if needed --}}
            @if ($current < $last - 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Last two pages --}}
            @if ($last > 1)
                @if ($current < $last - 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $records->url($last - 1) }}">{{ $last - 1 }}</a>
                    </li>
                @endif
                <li class="page-item {{ $current == $last ? 'active' : '' }}">
                    <a class="page-link" href="{{ $records->url($last) }}">{{ $last }}</a>
                </li>
            @endif

            {{-- Next --}}
            <li class="page-item {{ !$records->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $records->nextPageUrl() ?? '#' }}">&raquo;</a>
            </li>
        </ul>
    </nav>
@endif
