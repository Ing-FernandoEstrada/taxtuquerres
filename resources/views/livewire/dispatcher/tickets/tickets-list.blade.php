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
                <th wire:click="sort('number')" class="cursor-pointer">{{__('Ticket')}}<span class="mt-1 float-right fa fa-sort{{$sort=='number'?'-alpha-'.$direction:''}}"></span></th>
                <th class="cursor-pointer">{{__('Departure')}}</th>
                <th class="cursor-pointer">{{__('Arrival')}}</th>
                <th wire:click="sort('trip_duration')" class="cursor-pointer">{{__('Trip Duration')}}<span class="mt-1 float-right fa fa-sort{{$sort=='trip_duration'?'-alpha-'.$direction:''}}"></span></th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td class="text-center">
                        <x-button type="button" data-toggle="modal" data-target="#modalVehicleDetails" wire:click="openVehicleDetails({{$ticket->vehicle_id}})" class="link">{{$ticket->vehicle->number}}</x-button>
                    </td>
                    <td data-label="{{__('Ticket')}}">{{$ticket->number}}</td>
                    <td data-label="{{__('Departure')}}">{{$ticket->departure_city->name.' - '.$ticket->departure_time}}</td>
                    <td data-label="{{__('Arrival')}}">{{"{$ticket->arrival_city->name} - ".$ticket->real_arrival_time??'Sin definir'}}</td>
                    <td data-label="{{__('Trip Duration')}}">{{$ticket->tripDuration()}}</td>
                    <td data-label="{{__('Actions')}}">
                        @if($ticket->free())
                            <x-button type="button"  class="btn btn-white" data-toggle="modal" data-target="#modalCreateTicketsForm" wire:click="openForm({{$ticket->id}})" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                            <x-button type="button" class="btn btn-red" wire:click="confirmDelete({{$ticket->id}})" title="{{__('Delete')}}"><span class="fa fa-trash"></span></x-button>
                            @else
                            <label class="font-semibold text-red-500 italic">{{__('No action')}}</label>
                        @endif
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
    @push('modals')
    @livewire('dispatcher.tickets.create-ticket-form')
    @livewire('vehicles.vehicle-details')
    @endpush
    @section('style')<link rel="stylesheet" href="{{mix('/css/pikaday.css')}}">@endsection
    @section('script')
        <script src="{{mix('/js/modals.js')}}"></script>
        <script src="{{mix('/moment/moment.js')}}"></script>
        <script src="{{mix('/moment/locale/es.js')}}"></script>
        <script src="{{mix('/js/pikaday.js')}}"></script>
        <script defer>
            var element =  document.querySelector('.pikaday');
            var picker = new Pikaday({field: element, format:'YYYY-MM-DD', onSelect:(date) => {console.log(date);element.value = picker.toString();} });
            picker.setMinDate(new Date());
        </script>
    @endsection
</div>

