<div>
    <label class="page-title">{{__('headquarters')}}</label>
    <div class="flex justify-end mb-4">
        <x-button type="button" class="btn btn-red" data-toggle="modal" data-target="#createHeadquarterForm" wire:click="openForm" title="{{__('New Headquarter')}}"><span class="fa fa-plus"></span>{{__("New Headquarter")}}</x-button>
    </div>
    <div class="flex flex-row space-x-4">
        <select id="rpp" wire:model="rpp" class="form-select w-32">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" class="form-input flex-1" wire:model="search" placeholder="{{__('Search headquarters')}}">
    </div>
    @if($headquarters->count())
        <table class="table">
            <thead>
            <tr>
                <th wire:click="sort('name')" class="cursor-pointer">{{__('Name')}}<span class="mt-1 float-right fa fa-sort{{$sort=='id'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('address')" class="cursor-pointer">{{__('address')}}<span class="mt-1 float-right fa fa-sort{{$sort=='address'?'-alpha-'.$direction:''}}"></span></th>
                <th wire:click="sort('phone')" class="cursor-pointer">{{__('phone')}}<span class="mt-1 float-right fa fa-sort{{$sort=='phone'?'-numeric-'.$direction:''}}"></span></th>
                <th wire:click="sort('c.name')" class="cursor-pointer">{{__('Location City')}}<span class="mt-1 float-right fa fa-sort{{$sort=='c.name'?'-alpha-'.$direction:''}}"></span></th>

                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($headquarters as $headquarter)
                <tr>
                    <td data-label="{{__('Name')}}">{{$headquarter->name}}</td>
                    <td data-label="{{__('Address')}}">{{$headquarter->address}}</td>
                    <td data-label="{{__('Phone')}}">{{$headquarter->phone}}</td>
                    <td data-label="{{__('Locatiom City')}}">{{$headquarter->city}}</td>


                    <td data-label="{{__('Actions')}}">
                        <x-button type="button" class="btn btn-white" data-toggle="modal" data-target="#createHeadquarterForm" wire:click="openForm({{$category->id}})" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                        @if($category->free())<x-button type="button" class="btn btn-red" wire:click="confirmDelete({{$category->id}})" title="{{__('Delete')}}"><span class="fa fa-trash"></span></x-button>@endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($headquarters->hasPages())
            {{$headquarters->links()}}
        @endif

        @section('script')<script src="{{mix('/js/modals.js')}}"></script>@endsection
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
    @endif
    @livewire('admin.headquarters.create-category-form')
</div>
