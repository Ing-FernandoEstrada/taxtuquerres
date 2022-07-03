<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Contracts\ManagesBrands;
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
    public string $sort = 'b.name';
    public string $rpp = '10';
    public ?Brand $brand = null;
    protected $listeners = ["delete",'render'];
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
        if($sort == $this->sort) {
            $this->direction = $this->direction=='desc'?'asc':'desc';
        } else $this->sort = $sort;
    }
    public function confirmDelete(Brand $brand){
        $this->brand = $brand;
        $this->dispatchBrowserEvent('confirmDelete',["record" => $brand->name]);
    }

    public function delete(ManagesBrands $manager){
        if ($manager->delete($this->brand)) $this->emit("deleted");
        else $this->emit("error");
    }

    public function render(): View {
        $brands = Brand::select("b.*")->from("brands as b")
            ->where('b.name','like',"%$this->search%")
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.admin.brands.brands-list',compact('brands'));
    }
}
