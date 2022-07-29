<nav class="navigation">
    <x-button tag="a" href="{{asset('/')}}" class="navigation-brand">
        <img src="{{asset('storage/img/escudo.jpeg')}}" alt="{{config('app.name')}}" class="w-12 h-12"/>
    </x-button>
    <div class="navigation-items">
        @guest()
            @if(request()->routeIs('help')) <x-button type="button" class="navigation-item active" title="{{__('Help')}}"><span class="fa fa-question-circle mt-1 md:mr-1"></span><span class="hidden md:block">{{__('Help')}}</span></x-button>
            @else <x-button tag="a" href="{{route('help')}}" class="navigation-item" title="{{__('Help')}}"><span class="fa fa-question-circle mt-1 md:mr-1"></span><span class="hidden md:block">{{__('Help')}}</span></x-button>@endif
            @if(request()->routeIs('login')) <x-button type="button" class="navigation-item active" title="{{__('Login')}}"><span class="fa fa-sign-in mt-1 md:mr-1"></span><span class="hidden md:block">{{__('Login')}}</span></x-button>
            @else <x-button tag="a" href="{{route('login')}}" class="navigation-item"><span class="fa fa-sign-in mt-1 md:mr-1"></span><span class="hidden md:block">{{__('Login')}}</span></x-button>@endif
        @endguest

        @auth()
            @if(request()->routeIs('buy-ticket')) <x-button type="button" class="navigation-item active" title="{{__('Buy Ticket')}}"><span class="fa fa-ticket mt-1 mr-1"></span>{{__('Buy Ticket')}}</x-button>
            @else <x-button tag="a" href="{{route('buy-ticket')}}" class="navigation-item" title="{{__('Buy Ticket')}}"><span class="fa fa-ticket mt-1 mr-1"></span>{{__('Buy Ticket')}}</x-button>@endif
            @if(request()->routeIs('dashboard')) <x-button type="button" class="navigation-item active"><span class="fa fa-home mt-1 md:mr-1"></span><span class="hidden md:block">{{__('Home')}}</span></x-button>
            @else <x-button tag="a" href="{{route('dashboard')}}" class="navigation-item" title="{{__('Home')}}"><span class="fa fa-home mt-1 md:mr-1"></span><span class="hidden md:block">{{__('Home')}}</span></x-button>@endif
            <form id="logout" method="post" action="{{route('logout')}}">@csrf <x-button type="submit" class="navigation-item" title="{{__('Logout')}}"><span class="fa fa-sign-out mt-1 md:mr-1"></span><span class="hidden md:block">{{__('Logout')}}</span></x-button></form>
        @endauth
    </div>
</nav>
