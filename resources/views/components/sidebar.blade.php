<div class="sidebar" :class="showSide?'left-0':''">
    <div class="side-header">
        <x-button tag="a" href="{{asset('/')}}"><img src="{{asset('/storage/img/logo.png')}}" alt="{{config('app.name')}}" class="w-full"/></x-button>
    </div>
    <div class="side-section">
        <label class="side-section-title">{{__('Administrative Management')}}</label>
        @if(request()->routeIs('users.*'))<x-button type="button" class="side-item active"><span class="fa fa-users mr-3"></span>{{__('Users')}}</x-button>
        @else <x-button tag="a" href="{{route('users.index')}}" class="side-item"><span class="fa fa-users mr-3"></span>{{__('Users')}}</x-button>@endif


    </div>
    <div class="side-section">
        <label class="side-section-title">{{__('Company')}}</label>
        @if(request()->routeIs('vehicles.*'))<x-button type="button" class="side-item active"><span class="fa fa-car mr-3"></span>{{__('Vehicles')}}</x-button>
        @else <x-button tag="a" href="{{route('vehicles.index')}}" class="side-item"><span class="fa fa-car mr-3"></span>{{__('Vehicles')}}</x-button>@endif

    </div>

</div>
