<x-card class="flex flex-col ">
    <x-slot name="header"><label class="modal-title">{{$title}}</label></x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <div class="form-group{{$errors->has('number')?' has-error':''}}">
            <label class="form-label" for="number">{{__('Document Type')}}</label>
            <select id="number" class="form-select" wire:model.defer="data.number" required>{!! $this->numbers !!}</select>
            @error('number')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('brand')?' has-error':''}}">
            <label class="form-label" for="brand">{{__('Identification')}}</label>
            <input type="text" id="brand" class="form-input" wire:model.defer="data.brand" autocomplete="off" required>
            @error('brand')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('model')?' has-error':''}}">
            <label class="form-label" for="model">{{__('Names')}}</label>
            <input type="text" id="model" class="form-input" wire:model.defer="data.model" autocomplete="off" required>
            @error('model')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('plate')?' has-error':''}}">
            <label class="form-label" for="plate">{{__('Surmodel')}}</label>
            <input type="text" id="plate" class="form-input" wire:model.defer="data.plate" autocomplete="off" required>
            @error('plate')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('quota')?' has-error':''}}">
            <label class="form-label" for="quota">{{__('Birthday')}}</label>
            <input type="date" id="quota" class="form-input" wire:model.defer="data.quota" autocomplete="off" required>
            @error('quota')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('category')?' has-error':''}}">
            <label class="form-label" for="category">{{__('Phone')}}</label>
            <input type="text" id="category" class="form-input" inputmode="numeric" wire:model.defer="data.category" autocomplete="off" required>
            @error('category')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:loading.remove wire:target="save">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="save" wire:click.prevent="save">{{$shortTitle}}</x-button>
    </x-slot>
</x-card>
