<x-modal id="modalCreateTicketsForm" class="{{$open?'show':'hidden'}}">
    <x-slot name="header"><label class="modal-title">{{$title}}</label></x-slot>
    <div class="flex flex-col">
        <div class="form-group{{$errors->has('departure_city')?' has-error':''}}">
            <label class="form-label" for="departure_city">{{__('Departure City')}}</label>
            <select id="departure_city" class="form-select" wire:model.defer="data.departure_city" required>{!! $this->cities !!}</select>
            @error('departure_city')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('arrival_city')?' has-error':''}}">
            <label class="form-label" for="arrival_city">{{__('Arrival City')}}</label>
            <select id="arrival_city" class="form-select" wire:model.defer="data.arrival_city" required>{!! $this->cities !!}</select>
            @error('arrival_city')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('departure_time')||$errors->has('departure_date')?' has-error':''}}">
            <label class="form-label" for="departure_date">{{__('Departure Time')}}</label>
            <div class="flex flex-row space-x-4">
                <input type="text" id="departure_date" class="form-input flex-1 pikaday" wire:model.defer="data.departure_date" autocomplete="off" required>
                <select class="form-select" wire:model.defer="data.departure_time">{!! $this->hours !!}</select>
            </div>
            @error('departure_time')<label class="feedback-message">{{$message}}</label>@enderror
            @error('departure_date')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('trip_duration_number')||$errors->has('trip_duration_unit')?' has-error':''}}">
            <label class="form-label" for="trip_duration_number">{{__('Trip Duration')}}</label>
            <div class="flex flex-row space-x-4">
                <input type="text" id="trip_duration_number" inputmode="numeric" class="form-input flex-1" wire:model.defer="data.trip_duration_number" autocomplete="off" required>
                <select id="trip_duration_unit" class="form-select" wire:model.defer="data.trip_duration_unit">{!! $this->timeUnits !!}</select>
            </div>
            @error('trip_duration_number')<label class="feedback-message">{{$message}}</label>@enderror
            @error('trip_duration_unit')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('vehicle')?' has-error':''}}">
            <label class="form-label" for="vehicle">{{__('Vehicle')}}</label>
            <select id="vehicle" class="form-select" wire:model.defer="data.vehicle" required>{!! $this->vehicles !!}</select>
            @error('vehicle')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:loading.remove wire:target="save">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="save" wire:click.prevent="save">{{$shortTitle}}</x-button>
    </x-slot>
</x-modal>
