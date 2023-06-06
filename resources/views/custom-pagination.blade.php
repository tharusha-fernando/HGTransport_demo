@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <span>{{ __('pagination.previous') }}</span>
                </li>
            @else
                <li>
                    <button wire:click="previousPage" rel="prev">{{ __('pagination.previous') }}</button>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="nextPage" rel="next">{{ __('pagination.next') }}</button>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span>{{ __('pagination.next') }}</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
