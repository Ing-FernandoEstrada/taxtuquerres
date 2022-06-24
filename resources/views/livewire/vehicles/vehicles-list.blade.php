<div>
    <label class="page-title">{{__('Vehicles')}}</label>
    <div class="flex justify-end">
        <x-button tag="a" href="{{route('vehicles.create')}}" class="btn btn-red"><span class="fa fa-user-plus mr-1"></span>{{__('New Vehicle')}}</x-button>
    </div>
    <div class="flex flex-row space-x-4">
        <select id="rpp" wire:model="rpp" class="form-select w-32">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" class="form-input flex-1" wire:model="search" placeholder="{{__('Search vehicles')}}">
    </div>
    @if($vehicles->count())
        <table class="table">
            <thead>
            <tr>
                <th>{{__('Photo')}}</th>
                <th wire:click="sort('number')" class="cursor-pointer">{{__('Number')}}<span class="mt-1 float-right fa fa-sort{{$sort=='Number'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('brand')" class="cursor-pointer">{{__('Brand')}}<span class="mt-1 float-right fa fa-sort{{$sort=='Brand'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('model')" class="cursor-pointer">{{__('Model')}}<span class="mt-1 float-right fa fa-sort{{$sort=='Model'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('plate')" class="cursor-pointer">{{__('Plate')}}<span class="mt-1 float-right fa fa-sort{{$sort=='Plate'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('quota')" class="cursor-pointer">{{__('Quota')}}<span class="mt-1 float-right fa fa-sort{{$sort=='Quota'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('category_id')" class="cursor-pointer">{{__('Category')}}<span class="mt-1 float-right fa fa-sort{{$sort=='Category_id'?'-alpha-'.$direction:''}}"></span></th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td><img src="{{$vehicle->image_url}}" class="w-32 h-32 rounded-full" alt="{{$vehicle->plate}}"></td>
                    <td data-label="{{__('Number')}}">{{$vehicle->number}}</td>
                    <td data-label="{{__('Brand')}}">{{$vehicle->brand->name}}</td>
                    <td data-label="{{__('Model')}}">{{$vehicle->model}}</td>
                    <td data-label="{{__('Plate')}}">{{$vehicle->plate}}</td>
                    <td data-label="{{__('Quota')}}">{{$vehicle->quota}}</td>
                    <td data-label="{{__('Category')}}">{{$vehicle->category->name}}</td>
                    <td data-label="{{__('Actions')}}">
                        <x-button tag="a" href="{{route('vehicles.create',compact('vehicle'))}}" class="btn btn-white" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                   </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($vehicles->hasPages())
            {{$vehicles->links()}}
        @endif

        @section('script')<script src="{{mix('/js/modals.js')}}"></script>@endsection
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
    @endif
</div>
