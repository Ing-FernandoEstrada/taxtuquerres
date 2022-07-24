<nav class="navigation">
    <x-button tag="a" href="{{asset('/')}}" class="navigation-brand">
        <span class="text-2xl">{{config('app.name')}}</span>
    </x-button>
    <div class="navigation-items">
        @guest()
            @if(request()->routeIs('help')) <x-button type="button" class="navigation-item active" title="{{__('Help')}}"><span class="fa fa-question-circle mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Help')}}</span></x-button>
            @else <x-button tag="a" href="{{route('help')}}" class="navigation-item" title="{{__('Help')}}"><span class="fa fa-question-circle mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Help')}}</span></x-button>@endif
            <x-button type="button" class="navigation-item" data-toggle="modal" data-target="#modalLogin"><span class="fa fa-sign-in mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Login')}}</span></x-button>
        @endguest

        @auth()
            @if(request()->routeIs('buy-ticket')) <x-button type="button" class="navigation-item active" title="{{__('Buy Ticket')}}"><span class="fa fa-ticket mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Buy Ticket')}}</span></x-button>
            @else <x-button tag="a" href="{{route('buy-ticket')}}" class="navigation-item" title="{{__('Buy Ticket')}}"><span class="fa fa-ticket mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Buy Ticket')}}</span></x-button>@endif
            @if(request()->routeIs('dashboard')) <x-button type="button" class="navigation-item active"><span class="fa fa-home mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Home')}}</span></x-button>
            @else <x-button tag="a" href="{{route('dashboard')}}" class="navigation-item" title="{{__('Home')}}"><span class="fa fa-home mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Home')}}</span></x-button>@endif
            <form id="logout" method="post" action="{{route('logout')}}">@csrf <x-button type="submit" class="navigation-item" title="{{__('Logout')}}"><span class="fa fa-sign-out mt-1 sm:mr-1"></span><span class="hidden sm:block">{{__('Logout')}}</span></x-button></form>
        @endauth
    </div>
</nav>
