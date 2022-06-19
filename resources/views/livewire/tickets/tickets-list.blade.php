<div>
    <label class="page-title">{{__('Available Tickets')}}</label>
    {{--<div class="flex flex-row space-x-4">
        <div class="flex items-center">
            <label class="text-xs font-semibold" for="rpp">{{__('Records per page')}}</label>
            <select id="rpp" wire:model="rpp" class="form-select">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <input type="text" class="form-input flex-1" wire:model="search" placeholder="{{__('Search tickets')}}">
    </div>
    @if($tickets->count())
        <table class="table">
            <thead>
            <tr>
                <th>{{__('Photo')}}</th>
                <th wire:click="sort('p.name')" class="cursor-pointer">{{__('Full Name')}}<span class="mt-1 float-right fa fa-sort{{$sort=='p.name'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('c.name')" class="cursor-pointer">{{__('Country')}}<span class="mt-1 float-right fa fa-sort{{$sort=='c.name'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('phone')" class="cursor-pointer">{{__('Phone')}}<span class="mt-1 float-right fa fa-sort{{$sort=='phone'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('r.name')" class="cursor-pointer">{{__('Role')}}<span class="mt-1 float-right fa fa-sort{{$sort=='r.name'?'-alpha-'.$direction:''}}"></span></th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td><img src="{{$ticket->profile_photo_url}}" class="w-24 h-24 rounded-full mx-auto" alt="{{$ticket->person->fullname}}"></td>
                    <td data-label="{{__('Full Name')}}">{{$ticket->person->fullname}}</td>
                    <td data-label="{{__('Country')}}">{{$ticket->person->country->name}}</td>
                    <td data-label="{{__('Phone')}}">{{$ticket->phone}}</td>
                    <td data-label="{{__('Role')}}">{{__('roles.'.$ticket->role->name.'.name')}}</td>
                    <td data-label="{{__('Actions')}}"><x-button type="button" class="btn btn-white" data-toggle="modal" data-target="#modal" wire:click="openForm({{$ticket->id}})" title="{{__('Edit Questions')}}"><span class="fa fa-edit"></span></x-button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($tickets->hasPages())
            {{$tickets->links()}}
        @endif
        @livewire('my-favorite-things')
        @section('script')
            <script src="{{mix('/js/modals.js')}}"></script>
            <script>
                window.addEventListener('refresh', () => {
                    Swal.fire('{{__('Very Good!')}}','{{__('Data saved successfully.')}}','success')
                })
            </script>
        @endsection
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
    @endif--}}
</div>
