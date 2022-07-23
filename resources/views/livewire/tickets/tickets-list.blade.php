<div>
    <label class="page-title">{{__('Tickets for sale')}}</label>
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
                <th class="cursor-pointer">{{__('Departure')}}</th>
                <th colspan="2" class="cursor-pointer">{{__('Arrival')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td class="text-center">
                        <img src="{{$ticket->vehicle->image_url}}" class="w-24 h-24 mx-auto" alt="{{$ticket->vehicle->number}}">
                        <x-button type="button" data-toggle="modal" data-target="#modalVehicleDetails" wire:click="openVehicleDetails({{$ticket->vehicle_id}})" class="link">{{$ticket->vehicle->number}}</x-button>
                    </td>
                    <td data-label="{{__('Departure')}}">{{$ticket->departure_city->name.' - '.$ticket->departure_time}}</td>
                    <td data-label="{{__('Arrival')}}">{{$ticket->arrival_city->name}}</td>
                    <td data-label="{{__('Actions')}}">
                        {{--<x-button type="button"  class="btn btn-white" data-toggle="modal" data-target="#modalBuyTicketForm" wire:click="openForm({{$ticket->id}})" title="{{__('Buy')}}"><span class="fa fa-shopping-cart"></span></x-button>
                        @if($ticket->free())

                            <x-button type="button" class="btn btn-red" wire:click="confirmDelete({{$ticket->id}})" title="{{__('Delete')}}"><span class="fa fa-trash"></span></x-button>
                        @else
                            <label class="font-semibold text-red-500 italic">{{__('No action')}}</label>
                        @endif--}}
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
    @section('script')
        <script src="{{mix('/js/modals.js')}}"></script>
    @endsection
</div>
