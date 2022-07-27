<x-modal dialogclass="sm:w-96" id="createCategoryForm" class="{{$open?'show':'hidden'}}">
    <x-slot name="header"><label class="modal-title">{{$title}}</label></x-slot>
    <div class="flex flex-col">
        <div class="form-group{{$errors->has('name')?' has-error':''}}">
            <label class="form-label" for="name">{{__("Name")}}</label>
            <input wire:model.defer="data.name" id="name" class="form-input w-full" type="text"/>
            @error('name') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
        <div class="form-group{{$errors->has('address')?' has-error':''}}">
            <label class="form-label" for="address">{{__("Address")}}</label>
            <input wire:model.defer="data.address" id="address" class="form-input w-full" type="text"/>
            @error('address') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
        <div class="form-group{{$errors->has('phone')?' has-error':''}}">
            <label class="form-label" for="phone">{{__("Phone")}}</label>
            <input wire:model.defer="data.phone" id="phone" class="form-input w-full" type="text" inputmode="numeric"/>
            @error('phone') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
        <div class="form-group{{$errors->has('city')?' has-error':''}}">
            <label class="form-label" for="city">{{__("Location City")}}</label>
            <select wire:model.defer="data.city" id="city" class="form-select w-full">{!! $this->cities !!}</select>
            @error('city') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:loading.remove wire:target="save">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="save" wire:click.prevent="save">{{$shortTitle}}</x-button>
    </x-slot>
</x-modal>
