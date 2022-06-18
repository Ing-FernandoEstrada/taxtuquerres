<div class="sidebar" :class="showSide?'left-0':''">
    <div class="side-header">
        <x-button tag="a" href="{{route('main')}}"><img src="{{asset('/storage/img/logo.png')}}" alt="{{config('app.name')}}" class="w-full"/></x-button>
    </div>
    <div class="side-section">
        <label class="side-section-title">{{__('Administrative Management')}}</label>
        @if(request()->routeIs('users.*'))<x-button type="button" class="side-item active"><span class="fa fa-users mr-3"></span>{{__('Users')}}</x-button>
        @else <x-button tag="a" href="{{route('users.index')}}" class="side-item"><span class="fa fa-users mr-3"></span>{{__('Users')}}</x-button>@endif
    </div>
    <div class="side-section">
        <label class="side-section-title">{{__('Education Management')}}</label>
        {{--@if(request()->routeIs('products.*')) <x-button type="button" class="side-item active"><span class="fa fa-cubes mr-3"></span>{{__('Products Inventory')}}</x-button>
        @else <x-button tag="a" href="{{route('products.index')}}" class="side-item"><span class="fa fa-cubes mr-3"></span>{{__('Products Inventory')}}</x-button>@endif
        @if(request()->routeIs('shopping.*')) <x-button type="button" class="side-item active"><span class="fa fa-cart-arrow-down mr-3"></span>{{__('Shopping')}}</x-button>
        @else <x-button tag="a" href="{{route('shopping.index')}}" class="side-item"><span class="fa fa-cart-arrow-down mr-3"></span>{{__('Shopping')}}</x-button>@endif
        @if(request()->routeIs('sales.*')) <x-button type="button" class="side-item active"><span class="fa fa-ship mr-3"></span>{{__('Sales')}}</x-button>
        @else <x-button tag="a" href="{{route('sales.index')}}" class="side-item"><span class="fa fa-ship mr-3"></span>{{__('Sales')}}</x-button>@endif
        <x-button tag="a" href="#" class="side-item"><span class="fa fa-handshake-o mr-3"></span>{{__('Loans')}}</x-button>
        <x-button tag="a" href="#" class="side-item"><span class="fa fa-money mr-3"></span>{{__('Profits')}}</x-button>
        @if(request()->routeIs('accounts.*')) <x-button type="button" class="side-item active"><span class="fa fa-credit-card mr-3"></span>{{__('Bank Accounts')}}</x-button>
        @else <x-button tag="a" href="{{route('accounts.index')}}" class="side-item"><span class="fa fa-credit-card mr-3"></span>{{__('Bank Accounts')}}</x-button>@endif
        <x-button tag="a" href="#" class="side-item"><span class="fa fa-book mr-3"></span>{{__('Diary Book')}}</x-button>--}}
    </div>
</div>
