<x-modal id="modalUserForm" class="{{$open?'show':'hidden'}}">
    <x-slot name="header"><label class="modal-title">{{$title}}</label></x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <div class="form-group{{$errors->has('document')?' has-error':''}}">
            <label class="form-label" for="document">{{__('Document Type')}}</label>
            <select id="document" class="form-select" wire:model.defer="data.document" required>{!! $this->documents !!}</select>
            @error('document')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('identification')?' has-error':''}}">
            <label class="form-label" for="identification">{{__('Identification')}}</label>
            <input type="text" id="identification" class="form-input" wire:model.defer="data.identification" autocomplete="off" required>
            @error('identification')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('names')?' has-error':''}}">
            <label class="form-label" for="names">{{__('Names')}}</label>
            <input type="text" id="names" class="form-input" wire:model.defer="data.names" autocomplete="off" required>
            @error('names')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('surnames')?' has-error':''}}">
            <label class="form-label" for="surnames">{{__('Surnames')}}</label>
            <input type="text" id="surnames" class="form-input" wire:model.defer="data.surnames" autocomplete="off" required>
            @error('surnames')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('birthday')?' has-error':''}}">
            <label class="form-label" for="birthday">{{__('Birthday')}}</label>
            <input type="date" id="birthday" class="form-input" wire:model.defer="data.birthday" autocomplete="off" required>
            @error('birthday')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('phone')?' has-error':''}}">
            <label class="form-label" for="phone">{{__('Phone')}}</label>
            <input type="text" id="phone" class="form-input" inputmode="numeric" wire:model.defer="data.phone" autocomplete="off" required>
            @error('phone')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('email')?' has-error':''}}">
            <label class="form-label" for="email">{{__('E-Mail Address')}}</label>
            <input type="email" id="email" class="form-input" wire:model.defer="data.email" autocomplete="off" required>
            @error('email')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
        <div class="form-group{{$errors->has('role')?' has-error':''}}">
            <label class="form-label" for="role">{{__('Role')}}</label>
            <select id="role" class="form-select" wire:model.defer="data.role" required>{!! $this->roles !!}</select>
            @error('role')<label class="feedback-message">{{$message}}</label>@enderror
        </div>
    </div>
    <div class="form-group{{$errors->has('address')?' has-error':''}}">
        <label class="form-label" for="address">{{__('Address')}}</label>
        <input type="text" id="address" class="form-input" wire:model.defer="data.address" autocomplete="off" required>
        @error('address')<label class="feedback-message">{{$message}}</label>@enderror
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:loading.remove wire:target="save">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="save" wire:click.prevent="save">{{$shortTitle}}</x-button>
    </x-slot>
</x-modal>
