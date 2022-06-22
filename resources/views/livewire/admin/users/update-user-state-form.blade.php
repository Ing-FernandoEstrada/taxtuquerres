<x-modal id="modalUserStateForm" class="{{$open?'show':'hidden'}}">
    <x-slot name="header"><label class="modal-title">{{__("Update User State")}}</label></x-slot>
    <p class="font-semibold italic text-center">{{$user->getRawOriginal("identification")." - ".$user->fullname}}</p>
    <div class="form-group{{$errors->has('state')?' has-error':''}}">
        <label class="form-label" for="address">{{__('State')}}</label>
       <div class="form-check">
           <input type="radio" class="form-radio" id="active" wire:model="state" value="A">
           <label class="form-check-label" for="active">{{__('states.A.name')}}</label>
       </div>
        <div class="form-check">
            <input type="radio" class="form-radio" id="inactive" wire:model="state" value="I">
            <label class="form-check-label" for="inactive">{{__('states.I.name')}}</label>
        </div>
        @error('state')<label class="feedback-message">{{$message}}</label>@enderror
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="update"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:loading.remove wire:target="update">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="update" wire:click.prevent="update">{{__('Update')}}</x-button>
    </x-slot>
</x-modal>

