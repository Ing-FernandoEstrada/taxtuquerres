<div>
    <label class="page-title">{{__('Tickets')}}</label>
    <div class="flex justify-end mb-4">
        <x-button type="button" class="btn btn-red" data-toggle="modal" data-target="#modalCreateTicketsForm" wire:click="openForm"><span class="fa fa-plus mr-1"></span>{{__('New Ticket')}}</x-button>
    </div>
    <div class="flex flex-row space-x-4">
        <select id="rpp" wire:model="rpp" class="form-select w-32">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" class="form-input flex-1" wire:model="search" placeholder="{{__('Search tickets')}}">
    </div>
    @if($tickets->count())
        <table class="table">
            <thead>
            <tr>
                <th>{{__('Vehicle')}}</th>
                <th wire:click="sort('number')" class="cursor-pointer">{{__('Ticket Number')}}<span class="mt-1 float-right fa fa-sort{{$sort=='number'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('start_destiny')" class="cursor-pointer">{{__('Start')}}<span class="mt-1 float-right fa fa-sort{{$sort=='start_destiny'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('start_date_time')" class="cursor-pointer">{{__('Departure Time')}}<span class="mt-1 float-right fa fa-sort{{$sort=='start_date_time'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('end_destiny')" class="cursor-pointer">{{__('Arrival')}}<span class="mt-1 float-right fa fa-sort{{$sort=='end_destiny'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('end_date_time')" class="cursor-pointer">{{__('Arrival Time')}}<span class="mt-1 float-right fa fa-sort{{$sort=='end_date_time'?'-alpha-'.$direction:''}}"></span></th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>
                        <img src="{{$ticket->vehicle->image_url}}" class="w-32 h-32 mx-auto rounded-full" alt="{{$ticket->vehicle->number}}">
                        <p>{{$ticket->vehicle->number}}</p>
                        <x-button type="button" data-toggle="modal" data-target="#modalVehicleDetails" wire:click="openVehicleDetails" class="btn btn-sm btn-white">{{__('Show Details')}}</x-button>
                    </td>
                    <td data-label="{{__('Ticket Number')}}">{{$ticket->number}}</td>
                    <td data-label="{{__('Start')}}">{{$ticket->start_destiny}}</td>
                    <td data-label="{{__('Departure Time')}}">{{$ticket->start_date_time}}</td>
                    <td data-label="{{__('Arrival')}}">{{$ticket->end_destiny}}</td>
                    <td data-label="{{__('Arrival Time')}}">{{$ticket->end_date_time}}</td>
                    <td data-label="{{__('Actions')}}">
                        <x-button type="button"  class="btn btn-white" data-toggle="modal" data-target="#modalCreateTicketsForm" wire:click="openForm({{$ticket->id}})" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                        @if($ticket->free())<x-button type="button" class="btn btn-red" wire:click="confirmDelete({{$ticket->id}})" title="{{__('Delete')}}"><span class="fa fa-trash"></span></x-button>@endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($tickets->hasPages())
            {{$tickets->links()}}
        @endif
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
    @endif
    @livewire('admin.tickets.create-ticket-form')
    @section('script')<script src="{{mix('/js/modals.js')}}"></script>@endsection
</div>

