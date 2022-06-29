<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $direction = 'asc';
    public string $sort = 'name';
    public string $rpp = '10';
    protected $listeners = ['render'];
    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 'name'],
        'direction' => ['except' => 'desc'],
        'rpp' => ['except' => '10'],
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function sort(string $sort):void{
        if($sort==$this->sort) {
            $this->direction = $this->direction=='desc'?'asc':'desc';
        } else $this->sort = $sort;
    }

    public function render(): Factory|View|Application
    {
        $brands = Brand::select("b.*")->from("brands as b")
            ->where('b.name','like',"%$this->search%")

            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.admin.brands.brands-list',compact('brands'));
    }
}
