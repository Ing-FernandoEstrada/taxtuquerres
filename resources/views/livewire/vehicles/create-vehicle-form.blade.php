<div class="w-full" x-data="{}">
    <x-button type="button" class="btn btn-white" @click="window.history.back()">{{__("Back to vehicles list")}}</x-button>
    <x-card class="bg-white mx-auto">
        <div class="grid grid-cols-1 xl:grid-col-12 gap-4">
            <div class="p-4 flex flex-col justify-center items-center xl:col-span-4">
                <img class="rounded-full w-36 h-36" src="{{$imageUrl}}" alt="{{__('Vehicle Image')}}">
                <x-button type="button" class="btn btn-white" @click="$refs.file.click()"><span class="fa fa-camera mr-2"></span>{{__('Select a photo')}}</x-button>
                <input type="file" x-ref="file" class="hidden" wire:model.defer="image" accept="image/*">
                @error('image')<label class="feedback-message">{{$message}}</label>@enderror
            </div>
            <div class="flex flex-col space-y-4 justify-center items-center xl:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                    <div class="form-group{{$errors->has('category')?' has-error':''}}">
                        <label class="form-label" for="category">{{__('Category')}}</label>
                        <select id="category" class="form-select" wire:model.defer="data.category" required>{!! $this->categories !!}</select>
                        @error('category')<label class="feedback-message">{{$message}}</label>@enderror
                    </div>
                    <div class="form-group{{$errors->has('brand')?' has-error':''}}">
                        <label class="form-label" for="brand">{{__('Brand')}}</label>
                        <select id="brand" class="form-select" wire:model.defer="data.brand" required>{!! $this->brands !!}</select>
                        @error('brand')<label class="feedback-message">{{$message}}</label>@enderror
                    </div>
                    <div class="form-group{{$errors->has('number')?' has-error':''}}">
                        <label class="form-label" for="number">{{__('Number')}}</label>
                        <input type="text" id="number" inputmode="numeric" class="form-input" wire:model.defer="data.number" autocomplete="off" required>
                        @error('number')<label class="feedback-message">{{$message}}</label>@enderror
                    </div>
                    <div class="form-group{{$errors->has('model')?' has-error':''}}">
                        <label class="form-label" for="model">{{__('Model')}}</label>
                        <input type="text" inputmode="numeric" id="model" class="form-input" wire:model.defer="data.model" autocomplete="off" required>
                        @error('model')<label class="feedback-message">{{$message}}</label>@enderror
                    </div>
                    <div class="form-group{{$errors->has('plate')?' has-error':''}}">
                        <label class="form-label" for="plate">{{__('Plate')}}</label>
                        <input type="text" id="plate" class="form-input" wire:model.defer="data.plate" autocomplete="off" required>
                        @error('plate')<label class="feedback-message">{{$message}}</label>@enderror
                    </div>
                    <div class="form-group{{$errors->has('quota')?' has-error':''}}">
                        <label class="form-label" for="quota">{{__('Quota')}}</label>
                        <input type="text" inputmode="numeric" id="quota" class="form-input" wire:model.defer="data.quota" autocomplete="off" required>
                        @error('quota')<label class="feedback-message">{{$message}}</label>@enderror
                    </div>
                </div>
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
