<x-modal id="modalUserForm" class="{{$open?'show':'hidden'}}">
    <x-slot name="header"><label class="modal-title">{{$title}}</label></x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <div class="form-group{{$errors->has('type')?' has-error':''}}">
            <label class="form-label" for="type">{{__('User Type')}}</label>
            <select id="type" class="form-select" wire:model.defer="data.type" required>{!! $this->types !!}</select>
            @error('type')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('identification')?' has-error':''}}">
            <label class="form-label" for="identification">{{__('Identification')}}</label>
            <input type="text" id="identification" class="form-input" wire:model.defer="data.identification" autocomplete="off" required>
            @error('identification')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
    </div>
    <div class="form-group{{$errors->has('name')?' has-error':''}}">
        <label class="form-label" for="name">{{__('Full Name')}}</label>
        <input type="text" id="name" class="form-input" wire:model.defer="data.name" autocomplete="off" required>
        @error('name')<label class="feedback-message">{{$message}}</label>@enderror
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <div class="form-group{{$errors->has('shortname')?' has-error':''}}">
            <label class="form-label" for="shortname">{{__('Shortname')}}</label>
            <input type="text" id="shortname" class="form-input" wire:model.defer="data.shortname" autocomplete="off" required>
            @error('shortname')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('birthday')?' has-error':''}}" x-data x-init="flatpickr($refs.birthday,{enableTime:false})">
            <label class="form-label" for="birthday">{{__('Birthday')}}</label>
            <input type="text" id="birthday" x-ref="birthday" class="form-input" wire:model.defer="data.birthday" autocomplete="off" required>
            @error('birthday')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('email')?' has-error':''}}">
            <label class="form-label" for="email">{{__('E-Mail Address')}}</label>
            <input type="text" id="email" class="form-input" wire:model.defer="data.email" autocomplete="off" required>
            @error('email')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('phone')?' has-error':''}}">
            <label class="form-label" for="phone">{{__('Mobile Phone')}}</label>
            <input type="text" id="phone" class="form-input" wire:model.defer="data.phone" autocomplete="off" required>
            @error('phone')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('address')?' has-error':''}}">
            <label class="form-label" for="address">{{__('Address')}}</label>
            <input type="text" id="address" class="form-input" wire:model.defer="data.address" autocomplete="off" required>
            @error('address')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('role')?' has-error':''}}">
            <label class="form-label" for="role">{{__('Role')}}</label>
            <select id="role" class="form-select" wire:model.defer="data.role" required>{!! $this->roles !!}</select>
            @error('role')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:loading.remove wire:target="save">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="save" wire:click.prevent="save">{{$shortTitle}}</x-button>
    </x-slot>
</x-modal>
