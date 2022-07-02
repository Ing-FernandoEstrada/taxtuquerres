<div>
    <label class="page-title">{{__('Users')}}</label>
    <div class="flex justify-end">
        <x-button type="button" class="btn btn-green" data-toggle="modal" data-target="#modalUserForm" wire:click="openForm"><span class="fa fa-user-plus mr-1"></span>{{__('New user')}}</x-button>
    </div>
    <div class="flex flex-row space-x-4">
        <select id="rpp" wire:model="rpp" class="form-select w-32">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" class="form-input flex-1" wire:model="search" placeholder="{{__('Search users')}}">
    </div>
    @if($users->count())
    <table class="table">
        <thead>
        <tr>
            <th class="lg:w-32">{{__('Photo')}}</th>
            <th wire:click="sort('p.identification')" class="cursor-pointer">{{__('Identification')}}<span class="mt-1 float-right fa fa-sort{{$sort=='p.identification'?'-alpha-'.$direction:''}}"></span></th>
            <th wire:click="sort('names')" class="cursor-pointer">{{__('Full Name')}}<span class="mt-1 float-right fa fa-sort{{$sort=='names'?'-alpha-'.$direction:''}}"></span></th>
            <th wire:click="sort('email')" class="cursor-pointer">{{__('E-Mail Address')}}<span class="mt-1 float-right fa fa-sort{{$sort=='email'?'-alpha-'.$direction:''}}"></span></th>
            <th wire:click="sort('phone')" class="cursor-pointer">{{__('Phone')}}<span class="mt-1 float-right fa fa-sort{{$sort=='phone'?'-alpha-'.$direction:''}}"></span></th>
            <th wire:click="sort('r.name')" class="cursor-pointer">{{__('Role')}}<span class="mt-1 float-right fa fa-sort{{$sort=='r.name'?'-alpha-'.$direction:''}}"></span></th>
            <th wire:click="sort('state')" class="cursor-pointer">{{__('State')}}<span class="mt-1 float-right fa fa-sort{{$sort=='state'?'-alpha-'.$direction:''}}"></span></th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="lg:w-32"><img src="{{$user->profile_photo_url}}" class="w-24 h-24 rounded-full mx-auto" alt="{{$user->fullname}}"></td>
                <td data-label="{{__('Identification')}}">{{$user->document.' - '.$user->identification}}</td>
                <td data-label="{{__('Full Name')}}">{{$user->fullname}}</td>
                <td data-label="{{__('E-Mail Address')}}">{{$user->email}}</td>
                <td data-label="{{__('Phone')}}">{{$user->phone}}</td>
                <td data-label="{{__('Role')}}">{{__('roles.'.$user->role->name.'.name')}}</td>
                <td data-label="{{__('State')}}">{{__('states.'.$user->state.'.name')}}</td>
                <td data-label="{{__('Actions')}}">
                    <x-button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalUserForm" wire:click="openForm({{$user->id}})" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                    <x-button tag="a" href="{{route('users.show',compact('user'))}}" class="btn btn-white" title="{{__('Show details')}}"><span class="fa fa-eye"></span></x-button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        @if($users->hasPages())
            {{$users->links()}}
        @endif
        @livewire('admin.users.create-user-form')
        @section('script')<script src="{{mix('/js/modals.js')}}"></script>@endsection
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
    @endif
    @if(session()->has('logout'))<script>setTimeout(()=>{document.getElementById('logout').submit()},1000)</script>@endif
</div>
