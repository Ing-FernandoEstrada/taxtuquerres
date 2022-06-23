<x-modal dialogclass="sm:w-96" id="updatePasswordForm" class="{{$open?'show':'hidden'}}">
    <x-slot name="header">
        <label class="modal-title">{{__('Update Password')}}</label>
    </x-slot>
    <div class="flex flex-col">
        {{--<div class="form-group{{$errors->has("current_password")?" has-error":""}}">
            <label class="form-label" for="current_password">{{__("Current Password")}}</label>
            <div class="flex" x-data="{passVisible:false}">
                <input :type="passVisible?'text':'password'" wire:model.defer="data.current_password" id="current_password" class="form-input" placeholder="{{__('Enter your current password')}}"/>
                <x-button type="button" @click.prevent="passVisible=!passVisible" class="password-sw-btn -ml-7 mt-3"><span :class="passVisible?'fa fa-eye-slash':'fa fa-eye'"></span></x-button>
            </div>
            @error("current_password")<label class="feedback-message">{{$message}}</label>@enderror
        </div>--}}
        <div class="form-group{{$errors->has('password')?' has-error':''}}">
            <label class="form-label" for="password">{{__("New Password")}}</label>
            <div class="flex" x-data="{passVisible:false}">
                <input :type="passVisible?'text':'password'" wire:model.defer="data.password" id="password" class="form-input w-full" placeholder="{{__('Enter a new strong password')}}"/>
                <x-button type="button" @click.prevent="passVisible=!passVisible" class="password-sw-btn -ml-7 mt-3"><span :class="passVisible?'fa fa-eye-slash':'fa fa-eye'"></span></x-button>
            </div>
            @error('password') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
        <div class="form-group{{$errors->has('password_confirmation')?' has-error':''}}">
            <label class="form-label" for="password_confirmation">{{__('Confirm Password')}}</label>
            <div class="flex" x-data="{passVisible:false}">
                <input :type="passVisible?'text':'password'" wire:model.defer="data.password_confirmation" id="password_confirmation" class="form-input w-full" placeholder="{{__('Confirm new password')}}"/>
                <x-button type="button" @click.prevent="passVisible=!passVisible" class="password-sw-btn -ml-7 mt-3"><span :class="passVisible?'fa fa-eye-slash':'fa fa-eye'"></span></x-button>
            </div>
            @error('password_confirmation') <label class="feedback-message">{{$message}}</label> @enderror
        </div>
    </div>
    <x-slot name="footer">
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="update"/>
        <x-button type="button" class="btn btn-white" data-dismiss="modal" wire:loading.remove wire:target="update">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="update" wire:click.prevent="update">{{__('Update')}}</x-button>
    </x-slot>
</x-modal>
