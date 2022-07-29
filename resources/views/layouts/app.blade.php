@auth()
<x-template>
    @livewire('navigation-menu')
    <div class="pt-16 flex flex-row h-screen">
        <x-sidebar/>
        <div class="flex-1 bg-white/50 h-100 p-4 overflow-y-auto">
            {{$slot}}
        </div>
    </div>
</x-template>
@endauth
@guest()
    <x-guest-layout>
        {{$slot}}
    </x-guest-layout>
@endguest
