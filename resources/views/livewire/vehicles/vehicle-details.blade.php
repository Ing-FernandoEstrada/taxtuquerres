<x-modal class="{{$open?'show':'hidden'}}" id="modalVehicleDetails">
    <x-slot name="header">
        <label class="modal-title">{{__('Vehicle Details')}}</label>
    </x-slot>
    <div>
        @if($vehicle)
        <div>
            <img src="{{asset($url)}}" alt="{{$vehicle->plate}}" class="mx-auto w-full h-auto sm:w-80"/>
        </div>
        <div class="mx-auto max-w-sm flex flex-col">
            <div class="flex flex-row space-x-4">
                <p class="w-32 font-bold border-2 border-gray-500">{{__('Number')}}:</p>
                <p class="flex-1 border-2 border-red-500">{{$vehicle->number}}</p>
            </div>
            <div class="flex flex-row space-x-4">
                <p class="w-32 font-bold border-2 border-t-0 border-gray-500">{{__('Plate')}}:</p>
                <p class="flex-1 border-2 border-t-0 border-red-500">{{$vehicle->plate}}</p>
            </div>
            <div class="flex flex-row space-x-4">
                <p class="w-32 font-bold border-2 border-t-0 border-gray-500">{{__('Quota')}}:</p>
                <p class="flex-1 border-2 border-t-0 border-red-500">{{$vehicle->quota}}</p>
            </div>
            <div class="flex flex-row space-x-4">
                <p class="w-32 font-bold border-2 border-t-0 border-gray-500">{{__('Brand')}}:</p>
                <p class="flex-1 border-2 border-t-0 border-red-500">{{$vehicle->brand->name}}</p>
            </div>
            <div class="flex flex-row space-x-4">
                <p class="w-32 font-bold border-2 border-t-0 border-gray-500">{{__('Category')}}:</p>
                <p class="flex-1 border-2 border-t-0 border-red-500">{{$vehicle->category->name}}</p>
            </div>
        </div>
        @endif
    </div>
</x-modal>
