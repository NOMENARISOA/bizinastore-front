<style>
    .mx-1{
        background-color: #4286f5;
        color: white;
    }
    .mx-1:hover{
        background-color: #FFBB02;
        color: white;
    }
    .paginate-active{
        background-color: #FFBB02;
        color: white;
        padding-top: 0.4rem;
        padding-left: 0.9em;
        padding-right: 1em;
        padding-bottom: 0px;
        border-radius: 50%;
        min-height:40px;
        min-width: 40px;
        max-height:40px;
        max-width: 40px;
        text-align: center;
        margin-left: 2%;
    }
    .paginate-active:hover{
        background-color: #FFBB02;
        border:2px solid rgb(255, 255, 255);
        color: #FFF;
    }
    .paginate-no-active{
        background-color: #FFF;
        color: rgba(0, 0, 0, 0.4);;
        padding-top: 0.4rem;
        padding-left: 0.9em;
        padding-right: 1em;
        padding-bottom: 0px;
        border-radius: 50%;
        min-height:40px;
        min-width: 40px;
        max-height:40px;
        max-width: 40px;
        text-align: center;
        border:1px solid rgba(0, 0, 0, 0.2);
        margin-left: 2%;
    }
    .paginate-no-active:hover{
        background-color: #FFBB02;
        color: white;
        border: none;
    }

</style>
@if ($paginator->hasPages())
    @if ( ! $paginator->onFirstPage())
    {{-- First Page Link --}}
    {{-- <a
    class="paginate-no-active" style="padding-left: 0.7rem !important;padding-top: 0.3rem"
    wire:click="gotoPage(1)"
    >
    <<
    </a> --}}
    @if($paginator->currentPage() > 2)
    {{-- Previous Page Link --}}
    <a
        class="paginate-no-active"
        wire:click="previousPage"
    >
    <
    </a>
    @endif
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
    <!-- Array Of Links -->
    @if (is_array($element))
        @foreach ($element as $page => $url)
            <!--  Use three dots when current page is greater than 3.  -->
            {{-- @if ($paginator->currentPage() > 3 && $page === 2)
                <div class="paginate-no-active" style="padding-top: 0.1em">
                    <span class="font-bold">...</span>
                </div>
            @endif --}}

            <!--  Show active page two pages before and after it.  -->
            @if ($page == $paginator->currentPage())
                <span class="paginate-active">{{ $page }}</span>
            @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                <a class="paginate-no-active" wire:click="gotoPage({{$page}})">{{ $page }}</a>
            @endif

            <!--  Use three dots when current page is away from end.  -->
            {{-- @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                <div class="paginate-no-active"style="padding-top: 0.1em" >
                    <span class="font-bold">...</span>
                </div>
            @endif --}}
        @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    @if($paginator->lastPage() - $paginator->currentPage() >= 2)
        <a class="paginate-no-active" wire:click="nextPage" rel="next"> > </a>
    @endif
    {{-- <a
        class="paginate-no-active" style="padding-left: 0.7rem"
        wire:click="gotoPage({{ $paginator->lastPage() }})"
    >
    >>
    </a> --}}
    @endif
@endif
