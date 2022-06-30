<div class="sidebar" :class="showSide?'left-0':''">
    <div class="side-header">
        <x-button tag="a" href="{{asset('/')}}"><img src="{{asset('/storage/img/logo.png')}}" alt="{{config('app.name')}}" class="w-full"/></x-button>
    </div>
    @role('admin')
    <div class="side-section">
        <label class="side-section-title">{{__('Administrative Management')}}</label>
        @if(request()->routeIs('users.*'))<x-button type="button" class="side-item active"><span class="fa fa-users mr-3"></span>{{__('Users')}}</x-button>
        @else <x-button tag="a" href="{{route('users.index')}}" class="side-item"><span class="fa fa-users mr-3"></span>{{__('Users')}}</x-button>@endif


    </div>
    @endrole
    <div class="side-section">
        <label class="side-section-title">{{__('Company')}}</label>
        @role('admin')
        @if(request()->routeIs('vehicles.*'))<x-button type="button" class="side-item active"><span class="fa fa-car mr-3"></span>{{__('Vehicles')}}</x-button>
        @else <x-button tag="a" href="{{route('vehicles.index')}}" class="side-item"><span class="fa fa-car mr-3"></span>{{__('Vehicles')}}</x-button>@endif
        @if(request()->routeIs('brands.*'))<x-button type="button" class="side-item active"><span class="fa fa-drupal mr-3"></span>{{__('Brands')}}</x-button>
        @else <x-button tag="a" href="{{route('brands.index')}}" class="side-item"><span class="fa fa-drupal mr-3"></span>{{__('Brands')}}</x-button>@endif
        @if(request()->routeIs('categories.*'))<x-button type="button" class="side-item active"><span class="fa fa-products mr-3"></span>{{__('Categories')}}</x-button>
        @else <x-button tag="a" href="{{route('categories.index')}}" class="side-item"><span class="fa fa-products mr-3"></span>{{__('Categories')}}</x-button>@endif
        @if(request()->routeIs('tickets.*'))<x-button type="button" class="side-item active"><span class="fa fa-products mr-3"></span>{{__('Tickets')}}</x-button>
        @else <x-button tag="a" href="{{route('tickets.index')}}" class="side-item"><span class="fa fa-products mr-3"></span>{{__('Tickets')}}</x-button>@endif
        @endrole

        @role('dispatcher')
        @if(request()->routeIs('tickets.*'))<x-button type="button" class="side-item active"><span class="fa fa-ticket mr-3"></span>{{__('Tickets')}}</x-button>
        @else <x-button tag="a" href="{{route('tickets.index')}}" class="side-item"><span class="fa fa-ticket mr-3"></span>{{__('Tickets')}}</x-button>@endif
        @endrole
    </div>

</div>
