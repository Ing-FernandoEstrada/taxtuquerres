<nav class="navigation">
    <x-button tag="a" href="{{asset('/')}}" class="navigation-brand">
        <img src="{{asset('/storage/img/logo.png')}}" class="h-16 w-auto" alt="{{config('app.name')}}"/>
    </x-button>
    <div class="navigation-items">
        <x-button tag="a" href="{{route('dashboard')}}" class="navigation-item" title="{{__('Home')}}"><span class="fa fa-home"></span></x-button>
        <x-button tag="a" href="{{route('dashboard')}}" class="navigation-item" title="{{__('Home')}}"><span class="fa fa-home"></span></x-button>
        <x-button tag="a" href="{{route('dashboard')}}" class="navigation-item" title="{{__('Home')}}"><span class="fa fa-home"></span></x-button>
    </div>
</nav>
