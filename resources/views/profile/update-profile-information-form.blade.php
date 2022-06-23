<x-card class="w-full" submit="updateProfileInformation">
    <div class="flex flex-col items-center space-x-4">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <img :src="photoUrl" alt="{{$user->name}}" class="rounded-full w-52 h-52">
        <button type="button" class="btn btn-white my-2" @click="$refs.file.click()"><span class="fa fa-camera mr-3"></span>{{__('Select a photo')}}</button>
        <input class="hidden" type="file" x-ref="file" wire:model.defer="file" accept="image/*">
        @endif
        <x-alert icon="spain fa-spinner" class="alert-blue" message="{{__('Loading...')}}" wire:loading.inline-flex="wire:loading.inline-flex" wire:target="file"/>
        <div class="flex flex-col items-center mt-6">
            <p class="font-bold text-2xl italic">{{$user->fullname}}</p>
            <p class="font-semibold text-lg italic">{{$user->email}}</p>
            <p class="font-bold text-lg italic">{{__('roles.'.$user->role->name.'.name')}}</p>
        </div>
        <button type="button" class="btn btn-outline-indigo" wire:click="$emitTo('profile.update-profile-information-form','open')">{{__('Update Information')}}</button>
    </div>
</x-card>
