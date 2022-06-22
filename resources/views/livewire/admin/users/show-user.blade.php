<div class="w-full">
    <x-button type="button" class="btn btn-white" @click="window.history.back()">{{__("Back to users list")}}</x-button>
    <x-card class="bg-white mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="p-4 flex justify-center items-center">
                <img src="{{$user->profile_photo_url}}" class="rounded-full w-36 h-36" alt="{{$user->fullname}}">
            </div>
            <div class="flex flex-col space-y-4 justify-center items-center">
                <p>{{$user->fullname}}</p>
                <p>{{$user->birthday}}</p>
                <p>{{$user->email}}</p>
                <p>{{$user->phone}}</p>
                <p>{{$user->address}}</p>
                <p>{{__('states.'.$user->state.'.name')}}</p>
            </div>
        </div>

    </x-card>

    <div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-8">

        <x-card class="bg-white">
            <img src="{{asset('/storage/img/user-state.png')}}" class="w-12 h-12" alt="{{__('')}}">

            <label class="card-title">{{__('Update User State')}}</label>
            <p class="text-sm italic">{{__('')}}</p>
            <x-button type="button" class="btn btn-red" data-toggle="modal" data-target="#modalUserStateForm" wire:click.prevent="openUserStateForm">{{__('Update')}}</x-button>
        </x-card>
        <x-card class="bg-white">
            <img src="{{asset('/storage/img/update-password.png')}}" class="w-12 h-12" alt="{{__('')}}">
            <label class="card-title">{{__('Update User Password')}}</label>
            <p class="text-sm italic">{{__('')}}</p>
            <x-button type="button" class="btn btn-red">{{__('Update')}}</x-button>
        </x-card>
        <x-card class="bg-white">
            <img src="{{asset('/storage/img/buy-ticket.png')}}" class="w-12 h-12" alt="{{__('')}}">
            <label class="card-title">{{__('Buy a ticket')}}</label>
            <p class="text-sm italic">{{__('')}}</p>
            <x-button type="button" class="btn btn-red">{{__('Buy')}}</x-button>
        </x-card>
        <x-card class="bg-white">
            <img src="{{asset('/storage/img/travel-history.png')}}" class="w-12 h-12" alt="{{__('')}}">
            <label class="card-title">{{__('Travel History')}}</label>
            <p class="text-sm italic">{{__('')}}</p>
            <x-button type="button" class="btn btn-red">{{__('Show list')}}</x-button>
        </x-card>
    </div>
    @livewire('admin.users.update-user-state-form',["user"=>$user])
    @section("script")
        <script src="{{mix("/js/modals.js")}}"></script>
    @endsection
</div>
