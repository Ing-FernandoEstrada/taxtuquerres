<div>
    <label class="page-title">{{__('Brands')}}</label>
    <div class="flex justify-end mb-4">
        <x-button tag="a" href="{{route('brands.create')}}" class="btn btn-green"><span class="fa fa-plus mr-1"></span>{{__('New Brand')}}</x-button>
    </div>
    <div class="flex flex-row space-x-4">
        <select id="rpp" wire:model="rpp" class="form-select w-32">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" class="form-input flex-1" wire:model="search" placeholder="{{__('Search brands')}}">
    </div>
    @if($brands->count())
        <table class="table">
            <thead>
            <tr>
                <th>{{__('Image')}}</th>
                <th wire:click="sort('id')" class="cursor-pointer">{{__('Id')}}<span class="mt-1 float-right fa fa-sort{{$sort=='id'?'-numeric-'.$direction:''}}"></span></th>
                <th wire:click="sort('name')" class="cursor-pointer">{{__('Name')}}<span class="mt-1 float-right fa fa-sort{{$sort=='name'?'-alpha-'.$direction:''}}"></span></th>
                <th>{{__('Vehicle Counting')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td><img src="{{$brand->image_url}}" class="w-32 h-32 mx-auto rounded-full" alt="{{$brand->name}}"></td>
                    <td data-label="{{__('Id')}}">{{$brand->id}}</td>
                    <td data-label="{{__('Name')}}">{{$brand->name}}</td>
                    <td data-label="{{__('Vehicle Counting')}}">{{$brand->vehicles()->count()}}</td>
                    <td data-label="{{__('Actions')}}">
                        <x-button tag="a" href="{{route('brands.create',compact('brand'))}}" class="btn btn-white" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                        @if($brand->free())<x-button type="button" class="btn btn-red" wire:click="confirmDelete({{$brand->id}})" title="{{__('Delete')}}"><span class="fa fa-trash"></span></x-button>@endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($brands->hasPages())
            {{$brands->links()}}
        @endif

        @section('script')<script src="{{mix('/js/modals.js')}}"></script>@endsection
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
    @endif
</div>
