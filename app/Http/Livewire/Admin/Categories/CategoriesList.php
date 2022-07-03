<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Contracts\ManagesCategories;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $direction = 'desc';
    public string $sort = 'id';
    public string $rpp = '10';
    public array $data = ["name"=>'',"category"=>''];
    public ?Category $category = null;
    protected $listeners = ['render','delete'];
    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'rpp' => ['except' => '10'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sort(string $sort): void
    {
        if ($sort == $this->sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else $this->sort = $sort;
    }

    public function openForm(?int $id=null){
        if (is_numeric($id))$this->emitTo("admin.categories.create-category-form","open",$id);
        else $this->emitTo("admin.categories.create-category-form","open");
    }

    public function confirmDelete(Category $category){
        $this->category = $category;
        $this->dispatchBrowserEvent('confirmDelete',["record"=>$category->name]);
    }

    public function delete(ManagesCategories $manager) {
        if ($manager->delete($this->category)) {
            $this->emit('deleted');
            $this->render();
        } else $this->emit('error');
    }

    public function render(): View {
        $categories = Category::select("c.*")->from("categories as c")
            ->where('name', 'like', "%$this->search%")
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.admin.categories.categories-list',compact("categories"));
    }
}

