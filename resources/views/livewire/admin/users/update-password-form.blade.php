<x-modal dialogclass="sm:w-96" id="updatePasswordForm" class="{{$open?"show":"hidden"}}">
    <x-slot name="header">
        <label class="modal-title">
            {{$title}}
        </label>
    </x-slot>
    <div class="flex flex-col">
        <div class="form-group{{$errors->has("password")?" has-error":""}}">
            <label class="form-label" for="password">
                {{__("Current Password")}}
            </label>
            <div class="flex" x-data="{passVisible:false}">
                <input name="password" :type="passVisible?'text':'password'" wire:model.defer="data.current_password" id="current_password" class="form-input"placeholder="{{__('Enter your current password')}}"/>
                <x-button type="button" @click.prevent="passVisible=!passVisible" class="password-sw-btn -ml-7 mt-3"><span :class="passVisible?'fa fa-eye-slash':'fa fa-eye'"></span></x-button>
                </div>
            @error("current_password")
            <label class="feedback-message">
                {{$message}}
            </label>
            @enderror

        </div>
    </div>
</x-modal>
