<x-modal class="{{$open?'show':'hidden'}}" id="tripNoveltyForm">
    <x-slot name="header">
        <label class="modal-title">{{__('Trip Novelty')}}</label>
    </x-slot>
    @if($ticket)
        <div class="bg-emerald-100 rounded p-4 mb-4 text-sm italic text-emerald-700">
            <p class="font-bold">{{__('Ticket :number',['number' => $ticket->number])}}</p>
            <p><span class="font-bold">{{__('Departure City')}}: </span>{{"{$ticket->departure_city->name} - $ticket->departure_time"}}</p>
            <p><span class="font-bold">{{__('Arrival City')}}: </span>{{$ticket->arrival_city->name}}</p>
            <p class="font-semibold">{{__('Vehicle :number (:plate)',['number' => $ticket->vehicle->number, 'plate' => $ticket->vehicle->plate])}}</p>
        </div>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="form-group{{$errors->has('date')?' has-error':''}}">
            <label class="form-label" for="date">{{__('Date')}}</label>
            <input type="date" class="form-input" wire:model.defer="data.date" id="date" autocomplete="off">
            @error('date') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
        <div class="form-group{{$errors->has('hour')?' has-error':''}}">
            <label class="form-label" for="hour">{{__('Hour')}}</label>
            <input type="time" class="form-input" wire:model.defer="data.hour" id="hour" autocomplete="off">
            @error('hour') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
    </div>
    <div class="form-group{{$errors->has('novelty')?' has-error':''}}">
        <label class="form-label" for="novelty">{{__('Novelty')}}</label>
        <select class="form-select" wire:model.defer="data.novelty" id="novelty">{!! $this->novelties !!}</select>
        @error('novelty') <label class="feedback-message">{{$message}}</label> @enderror
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:target="save" wire:loadin.remove>{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:click="save" wire:target="save" wire:loadin.remove>{{__('Register')}}</x-button>
    </x-slot>
</x-modal>
