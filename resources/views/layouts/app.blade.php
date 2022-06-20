@auth()
<x-template>
    <div class="flex flex-row h-screen">
        <x-sidebar/>
        <div class="flex flex-1 flex-col">
            @livewire('navigation-menu')
            <div class="bg-white/50 h-100 p-4 overflow-y-auto">
                {{$slot}}
            </div>
        </div>
    </div>
</x-template>
@endauth
@guest()
    <x-guest-layout>
        {{$slot}}
    </x-guest-layout>
@endguest
