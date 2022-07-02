<nav class="navigation">
    <x-button tag="a" href="{{asset('/')}}" class="navigation-brand">
        <img src="{{asset('/storage/img/logo.png')}}" class="h-16 w-auto" alt="{{config('app.name')}}"/>
    </x-button>
    <div class="navigation-items">
        @guest()
            @if(request()->routeIs('help')) <x-button type="button" class="navigation-item active btn btn-green rounded-full" title="{{__('Help')}}"><span class="fa fa-question-circle sm:mr-1"></span><span class="hidden sm:block">{{__('Help')}}</span></x-button>
            @else <x-button tag="a" href="{{route('help')}}" class="navigation-item btn btn-green rounded-full" title="{{__('Help')}}"><span class="fa fa-question-circle sm:mr-1"></span><span class="hidden sm:block">{{__('Help')}}</span></x-button>@endif

            @if(request()->routeIs('tickets.index')) <x-button type="button" class="navigation-item active btn btn-green rounded-full" title="{{__('Tickets')}}"><span class="fa fa-ticket sm:mr-1"></span><span class="hidden sm:block">{{__('Tickets')}}</span></x-button>
            @else <x-button tag="a" href="{{route('tickets.index')}}" class="navigation-item btn btn-green rounded-full" title="{{__('Tickets')}}"><span class="fa fa-ticket sm:mr-1"></span><span class="hidden sm:block">{{__('Tickets')}}</span></x-button>@endif

            <x-button type="button" class="btn btn-green rounded-full" data-toggle="modal" data-target="#modalLogin"><span class="fa fa-sign-in sm:mr-1"></span><span class="hidden sm:block">{{__('Login')}}</span></x-button>
        @endguest

        @auth()

            @if(request()->routeIs('dashboard')) <x-button type="button" class="navigation-item active btn btn-green rounded-full"><span class="fa fa-home sm:mr-1"></span><span class="hidden sm:block">{{__('Home')}}</span></x-button>
            @else <x-button tag="a" href="{{route('dashboard')}}" class="navigation-item btn btn-green rounded-full" title="{{__('Home')}}"><span class="fa fa-home sm:mr-1"></span><span class="hidden sm:block">{{__('Home')}}</span></x-button>@endif
            <form id="logout" method="post" action="{{route('logout')}}">@csrf <x-button type="submit" class=" btn btn-white rounded-full" title="{{__('Logout')}}"><span class="fa fa-sign-out sm:mr-1"></span><span class="hidden sm:block">{{__('Logout')}}</span></x-button></form>
        @endauth
    </div>
</nav>
