<?php

namespace App\Http\Livewire\Vehicles;

use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class VehiclesList extends Component
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

    public function updatingSearch() {
        $this->resetPage();
    }

    public function sort(string $sort):void{
        if($sort==$this->sort) {
            $this->direction = $this->direction=='desc'?'asc':'desc';
        } else $this->sort = $sort;
    }

    public function openForm(?int $uid = null) {
        if (is_numeric($uid)) $this->emitTo('vehicles.vehicles-list','open',$uid);
        else $this->emitTo('vehicles.vehicles-list','open');
    }

    public function render(): Factory|View|Application
    {
            $vehicles = Vehicle::select("v.*")->from("vehicles as v")
                ->join("categories as c","c.id","=","category_id")
                ->join("brands as b","b.id","=","brand_id")
                ->where('number','like',"%$this->search%")
            ->orWhere('b.name','like',"%$this->search%")
            ->orWhere('c.name','like',"%$this->search%")
            ->orWhere('model','like',"%$this->search%")
            ->orWhere('plate','like',"%$this->search%")
                ->orWhere('quota','like',"%$this->search%")

            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.vehicles.vehicles-list',compact('vehicles'));
    }
}

