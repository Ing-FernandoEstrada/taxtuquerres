<div>
    <label class="page-title">{{__('Vehicles in circulation')}}</label>
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
                <th wire:click="sort('departure_city.name')" class="cursor-pointer">{{__('Departure City')}}<span class="mt-1 float-right fa fa-sort{{$sort=='departure_city.name'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('arrival_city.name')" class="cursor-pointer">{{__('Arrival City')}}<span class="mt-1 float-right fa fa-sort{{$sort=='arrival_city.name'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('departure_time')" class="cursor-pointer">{{__('Departure Time')}}<span class="mt-1 float-right fa fa-sort{{$sort=='departure_time'?'-alpha-'.$direction:''}}"></span></th>
                <th>{{__('Last novelty')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>
                        <x-button type="button" data-toggle="modal" data-target="#modalVehicleDetails" wire:click="openVehicleDetails({{$ticket->vehicle_id}})" class="link flex mx-auto">{{$ticket->vehicle->number}}</x-button>
                    </td>
                    <td data-label="{{__('Ticket Number')}}">{{$ticket->number}}</td>
                    <td data-label="{{__('Departure City')}}">{{$ticket->departure_city->name}}</td>
                    <td data-label="{{__('Arrival City')}}">{{$ticket->arrival_city->name}}</td>
                    <td data-label="{{__('Departure Time')}}">{{$ticket->departure_time}}</td>
                    <td data-label="{{__('Last novelty')}}">{{$ticket->lastNovelty()?$ticket->lastNovelty()->novelty:null}}</td>
                    <td>
                        <x-button type="button" class="btn btn-white" data-toggle="modal" data-target="#tripNoveltyForm" wire:click="openNoveltyForm({{$ticket->id}})">{{__('Register Novelty')}}</x-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($tickets->hasPages())
            {{$tickets->links()}}
        @endif
        @push('modals')
            @livewire('vehicles.vehicle-details')
            @livewire('dispatcher.create-trip-novelty-form')
        @endpush
        @section('script')
            <script src="{{mix('/js/modals.js')}}"></script>
            <script src="{{mix('/js/pikaday.js')}}"></script>
            <script>
                //var picker = new Pikaday({field:document.getElementById('date'),format:'YYYY-MM-DD', onSelect:(date) => {element.value = picker.toString();}});
                //picker.setMinDate(new Date());
            </script>
            <script>
                Echo.private(`tickets.${id}`).listen('VehicleDepartureUpdated', (e) => {
                    console.log(e.ticket);
                    @this.emitSelf('dispatcher.vehicles-in-circulation','render');
                });
            </script>
        @endsection
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
@endif
</div>
