<div>
    <label class="page-title">{{__('categories')}}</label>
    <div class="flex justify-end mb-4">
        <x-button tag="a" href="{{route('categories.create')}}" class="btn btn-red"><span class="fa fa-user-plus mr-1"></span>{{__('New Category')}}</x-button>
    </div>
    <div class="flex flex-row space-x-4">
        <select id="rpp" wire:model="rpp" class="form-select w-32">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" class="form-input flex-1" wire:model="search" placeholder="{{__('Search categories')}}">
    </div>
    @if($categories->count())
        <table class="table">
            <thead>
            <tr>
                <th>{{__('Photo')}}</th>
                <th wire:click="sort('name')" class="cursor-pointer">{{__('name')}}<span class="mt-1 float-right fa fa-sort{{$sort=='name'?'-alpha-'.$direction:''}}"></span></th>

                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td><img src="{{$category->image_url}}" class="w-32 h-32 mx-auto rounded-full" alt="{{$category->plate}}"></td>
                    <td data-label="{{__('Name')}}">{{$category->name}}</td>
                    <td data-label="{{__('Actions')}}">
                        <x-button tag="a" href="{{route('categories.create',compact('category'))}}" class="btn btn-white" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($categories->hasPages())
            {{$categories->links()}}
        @endif

        @section('script')<script src="{{mix('/js/modals.js')}}"></script>@endsection
    @else
        <label class="font-bold">{{__('No records found!')}}</label>
    @endif
</div>
