<?php

namespace App\Http\Livewire\Admin\Categories;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CategoriesList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $direction = 'desc';
    public string $sort = 'id';
    public string $rpp = '10';
    protected $listeners = ['render'];
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

    public function render(): Factory|View|Application
    {
        $categories = Category::select("c.*")->from("categories as c")
            ->join("categories as c", "c.id", "=", "category_id")
            ->join("brands as b", "b.id", "=", "brand_id")
            ->where('number', 'like', "%$this->search%")
            ->orWhere('b.name', 'like', "%$this->search%")
            ->orWhere('c.name', 'like', "%$this->search%")
            ->orWhere('model', 'like', "%$this->search%")
            ->orWhere('plate', 'like', "%$this->search%")
            ->orWhere('quota', 'like', "%$this->search%")
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);

        return view('livewire.admin.categories.categories-list');
    }
}

