<x-modal id="modalCreateTicketsForm" class="{{$open?'show':'hidden'}}">
    <x-slot name="header"><label class="modal-title">{{$title}}</label></x-slot>
    <div class="grid grid-cols-1 xl:grid-col-12 gap-4">
        <div class="form-group{{$errors->has('departure_city')?' has-error':''}}">
            <label class="form-label" for="departure_city">{{__('Departure City')}}</label>
            <select id="departure_city" class="form-select" wire:model.defer="data.departure_city" required>{{$this->cities}}</select>
            @error('departure_city')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('arrival_time')?' has-error':''}}">
            <label class="form-label" for="arrival_city">{{__('Arrival City')}}</label>
            <select id="arrival_city" class="form-select" wire:model.defer="data.arrival_city" required>{{$this->cities}}</select>
            @error('arrival_city')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('departure_time')?' has-error':''}}">
            <label class="form-label" for="departure_time">{{__('Departure Time')}}</label>
            <div class="flex flex-row space-x-4">
                <input type="date" id="departure_time" class="form-input" wire:model.defer="data.departure_time" autocomplete="off" required>
                <select>
                    <option>04:00:00.</option>
                    <option>05:00:00.</option>
                    <option>06:00:00.</option>
                    <option>07:00:00.</option>
                    <option>08:00:00.</option>
                    <option>09:00:00.</option>
                    <option>10:00:00.</option>
                    <option>11:00:00.</option>
                    <option>12:00:00.</option>
                    <option>13:00:00.</option>
                    <option>14:00:00.</option>
                    <option>15:00:00.</option>
                    <option>16:00:00.</option>
                    <option>17:00:00.</option>
                    <option>18:00:00.</option>
                    <option>19:00:00.</option>
                    <option>20:00:00.</option>
                </select>
            </div>

            @error('departure_time')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('arrival_time')?' has-error':''}}">
            <label class="form-label" for="arrival_time">{{__('Arrival Time')}}</label>
            <select>
                <option>30 - 45 minutos.</option>
                <option>1 - 2 horas.</option>
                <option>2 - 3 horas.</option>
                <option>3 - 4 horas.</option>
                <option>4 - 5 horas.</option>
                <option>6 o más horas.</option>
            </select>
            @error('arrival_time')<label class="feedback-message">{{$message}}</label>@enderror
        </div>





    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
        <x-button type="button" class="btn btn-white" onclick="window.history.back()" wire:loading.remove wire:target="save">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="save" wire:click.prevent="save">{{$shortTitle}}</x-button>
    </x-slot>
</x-modal>
