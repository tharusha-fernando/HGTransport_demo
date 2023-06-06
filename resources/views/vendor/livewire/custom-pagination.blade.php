@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
    @if ($paginator->onFirstPage())
    <a class="page-link" href="#" aria-label="Previous">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only">Previous</span>
      </a>
    @else
    <a class="page-link" href="#" aria-label="Previous">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only"><button  wire:click="previousPage">Previous</button></span>
      </a>
    @endif
      <!--a class="page-link" href="#" aria-label="Previous">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only">Previous</span>
      </a-->
    </li>

    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
    @if ($paginator->hasMorePages())
    <a class="page-link" href="#" aria-label="Next">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only">Next</span>
      </a>
    @else
    <a class="page-link" href="#" aria-label="Next">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only"><button wire:click="nextPage">Next</button></span>
      </a>
    @endif

      <!--a class="page-link" href="#" aria-label="Next">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only">Next</span>
      </a-->
    </li>
  </ul>
</nav>
@endif



<!--div>
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
</div-->
