<div class="w-full" x-data="{}">
    <x-button type="button" class="btn btn-white" @click="window.history.back()">{{__("Back to vehicles list")}}</x-button>
    <x-card class="bg-white mx-auto">
        <div class="grid grid-cols-1 xl:grid-col-12 gap-4">
            <div class="p-4 flex flex-col justify-center items-center xl:col-span-4">
                <img class="rounded-full w-36 h-36" src="{{$imageUrl}}" alt="{{__('Brand Image')}}">
                <x-button type="button" class="btn btn-white" @click="$refs.file.click()"><span class="fa fa-camera mr-2"></span>{{__('Select a photo')}}</x-button>
                <input type="file" x-ref="file" class="hidden" wire:model.defer="image" accept="image/*">
                @error('image')<label class="feedback-message">{{$message}}</label>@enderror
            </div>
            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                <label class="form-label" for="name">{{__('Name')}}</label>
                <input type="text" id="name" inputmode="numeric" class="form-input" wire:model.defer="data.name" autocomplete="off" required>
                @error('name')<label class="feedback-message">{{$message}}</label>@enderror
            </div>
        </div>
        <x-slot name="footer">
            <x-alert icon="spinner fa-spin" class="alert-solid alert-blue" message="{{__('Processing...')}}" wire:loading.inline-flex wire:target="save"/>
            <x-button type="button" class="btn btn-white" onclick="window.history.back()" wire:loading.remove wire:target="save">{{__('Cancel')}}</x-button>
            <x-button type="button" class="btn btn-indigo" wire:loading.remove wire:target="save" wire:click.prevent="save">{{$shortTitle}}</x-button>
        </x-slot>
    </x-card>
    @push('modals')@livewire('modal-cropper')@endpush
    @section('style')<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.css')}}"/>@endsection
</div>
