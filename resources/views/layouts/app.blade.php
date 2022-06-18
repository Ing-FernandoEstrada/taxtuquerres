<x-template>
    <div class="flex relative min-h-screen">
        <x-sidebar/>
        <div class="flex-1 p-6 overflow-y-auto overflow-x-hidden">{{$slot}}</div>
    </div>
</x-template>
