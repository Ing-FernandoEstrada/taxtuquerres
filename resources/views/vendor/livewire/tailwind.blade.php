@if($paginator->hasPages())
    @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
    <div class="pagination">
        <p class="pagination-message">{{__('pagination.message',['first' => $paginator->firstItem(),'last' => $paginator->lastItem(),'total' => $paginator->total()])}}</p>
        <div class="pagination-content-sm">
            @if(!$paginator->onFirstPage())<x-button type="button" wire:click="previousPage('{{$paginator->getPageName()}}')" wire:loading.attr="disabled" dusk="previousPage{{$paginator->getPageName()=='page'?'':'.'.$paginator->getPageName()}}.before" class="relative btn btn-white"><span class="fa fa-chevron-left pagination-icon mr-2"></span>{{__('pagination.previous')}}</x-button>@endif
            @if($paginator->hasMorePages())<x-button type="button" wire:click="nextPage('{{$paginator->getPageName()}}')" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName()=='page'?'':'.'.$paginator->getPageName()}}.before" class="relative ml-3 btn btn-white">{{__('pagination.next')}}<span class="fa fa-chevron-right pagination-icon ml-2"></span></x-button>@endif
        </div>
        <div class="pagination-content">
            <nav class="pagination-items" aria-label="{{__('pagination.title')}}">
                @if(!$paginator->onFirstPage())
                    <x-button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" dusk="previousPage{{ $paginator->getPageName()=='page'?'':'.'.$paginator->getPageName()}}.after" rel="prev" class="pagination-item rounded-l-md">
                        <span class="fa fa-chevron-left pagination-icon"></span>
                    </x-button>
                @endif
                @foreach($elements as $element)
                    @if(is_string($element))
                        <span class="pagination-summary">{{$element}}</span>
                    @elseif(is_array($element))
                        @foreach ($element as $page => $url)
                            <span wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page{{ $page }}"></span>
                            @if($page!=$paginator->currentPage()) <x-button type="button" wire:click="gotoPage({{ $page }},'{{ $paginator->getPageName() }}')" class="pagination-item">{{$page}}</x-button>
                            @else <span class="pagination-item active {{$page==1?' rounded-l-md':''}}{{$page==$paginator->lastPage()?' rounded-r-md':''}}">{{$page}}</span>@endif
                        @endforeach
                    @endif
                @endforeach
                @if($paginator->hasMorePages())
                    <x-button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" dusk="nextPage{{ $paginator->getPageName()=='page'?'':'.'.$paginator->getPageName()}}.after" rel="next" class="pagination-item rounded-r-md">
                        <span class="fa fa-chevron-right pagination-icon"></span>
                    </x-button>
                @endif
            </nav>
        </div>
    </div>
@endif
