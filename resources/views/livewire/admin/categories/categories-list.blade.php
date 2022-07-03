<div>
    <label class="page-title">{{__('categories')}}</label>
    <div class="flex justify-end mb-4">
        <x-button type="button" class="btn btn-green" data-toggle="modal" data-target="#createCategoryForm" wire:click="openForm" title="{{__('New Category')}}"><span class="fa fa-plus"></span>{{__("New Category")}}</x-button>
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
                <th wire:click="sort('id')" class="cursor-pointer">{{__('ID')}}<span class="mt-1 float-right fa fa-sort{{$sort=='id'?'-numeric-'.$direction:''}}"></span></th>
                <th wire:click="sort('name')" class="cursor-pointer">{{__('Name')}}<span class="mt-1 float-right fa fa-sort{{$sort=='name'?'-alpha-'.$direction:''}}"></span></th>
                <th>{{__('Vehicle Counting')}}</th>

                <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td data-label="{{__('Id')}}">{{$category->id}}</td>
                    <td data-label="{{__('Name')}}">{{$category->name}}</td>
                    <td data-label="{{__('Vehicle Counting')}}">{{$category->vehicles()->count()}}</td>
                    <td data-label="{{__('Actions')}}">
                        <x-button type="button" class="btn btn-white" data-toggle="modal" data-target="#createCategoryForm" wire:click="openForm({{$category->id}})" title="{{__('Edit')}}"><span class="fa fa-edit"></span></x-button>
                        @if($category->free())<x-button type="button" class="btn btn-red" wire:click="confirmDelete({{$category->id}})" title="{{__('Delete')}}"><span class="fa fa-trash"></span></x-button>@endif
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
    @livewire('admin.categories.create-category-form')
</div>
