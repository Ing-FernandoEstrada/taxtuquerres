<x-template>
    @livewire('navigation-menu')
    <div class="p-4 min-h-screen">
        {{$slot}}
    </div>
    <x-footer/>
</x-template>
