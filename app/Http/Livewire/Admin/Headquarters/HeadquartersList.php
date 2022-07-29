<?php

namespace App\Http\Livewire\Admin\Headquarters;

use App\Contracts\ManagesHeadquarters;
use App\Models\Headquarter;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class HeadquartersList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $direction = 'desc';
    public string $sort = 'h.id';
    public string $rpp = '10';
    public array $data = ["name"=>'',"headquarter"=>''];
    public ?Headquarter $headquarter = null;
    protected $listeners = ['render','delete'];
    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 'h.id'],
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
        if (is_numeric($id))$this->emitTo("admin.headquarters.create-headquarter-form","open",$id);
        else $this->emitTo("admin.headquarters.create-headquarter-form","open");
    }

    public function confirmDelete(Headquarter $headquarter){
        $this->headquarter = $headquarter;
        $this->dispatchBrowserEvent('confirmDelete',["record"=>$headquarter->name]);
    }

    public function delete(ManagesHeadquarters $manager) {
        if ($manager->delete($this->headquarter)) {
            $this->emit('deleted');
            $this->render();
        } else $this->emit('error');
    }

    public function render():View
    {
        $headquarters = Headquarter::select('h.*')->from('headquarters as h')
            ->join('cities as c','c.id','=','h.city_id')
            ->where('h.name','like',"%$this->search%")
            ->orWhere('h.address','like',"%$this->search%")
            ->orWhere('h.phone','like',"%$this->search%")
            ->orderBy($this->sort,$this->direction)
            ->paginate($this->rpp);
        return view('livewire.admin.headquarters.headquarters-list',compact('headquarters'));
    }
}
