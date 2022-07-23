<?php

namespace App\Http\Livewire\Dispatcher;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class VehiclesInCirculation extends Component
{
	use WithPagination;

    public string $search = '';
    public string $direction = 'desc';
    public string $sort = 't.number';
    public string $rpp = '10';
    protected $listeners = ['render'];
    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 't.number'],
        'direction' => ['except' => 'desc'],
        'rpp' => ['except' => '10'],
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function sort(string $sort): void
    {
        if ($sort == $this->sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else $this->sort = $sort;
    }

    public function openVehicleDetails(int $vehicle) {
        $this->emitTo("vehicles.vehicle-details","open",$vehicle);
    }

    public function openNoveltyForm(int $ticket_id): void {
        if ($ticket_id) $this->emitTo('dispatcher.create-trip-novelty-form','open',$ticket_id);
    }

    public function render(): View
    {
        $tickets = Ticket::select("t.*")->from("tickets as t")
            ->join("cities as arrival_city","arrival_city.id","=","arrival_city_id")
            ->join("cities as departure_city","departure_city.id","=","departure_city_id")
            ->join("vehicles as v","v.id","=","vehicle_id")
            ->join("invoice_details as ind","t.id","=","ind.ticket_id")
            ->whereNull('t.real_arrival_time')
            ->where('t.novelty','like',"%salida exitosa%")
            ->where(function ($query) {
                $query->where('t.number', 'like', "%$this->search%")
                    ->orWhere('t.number', 'like', "%$this->search%")
                    ->orWhere('v.plate', 'like', "%$this->search%")
                    ->orWhere('arrival_city.name', 'like', "%$this->search%")
                    ->orWhere('departure_city.name', 'like', "%$this->search%");
            })
            ->groupBy('t.id')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.dispatcher.vehicles-in-circulation',compact("tickets"));
    }
}
