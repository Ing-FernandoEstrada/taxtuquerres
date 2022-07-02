<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Ticket;
use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $direction = 'desc';
    public string $sort = 't.id';
    public string $rpp = '10';
    protected $listeners = ['render','delete'];
    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 't.id'],
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

    public function openForm(?int $id=null) {
        if (is_numeric($id))$this->emitTo("admin.tickets.create-ticket-form","open",$id);
        else $this->emitTo("admin.tickets.create-ticket-form","open");
    }

    public function openVehicleDetails(Vehicle $vehicle) {
        $this->emitTo("admin.vehicles.vehicle-details","open",$vehicle);
    }

    public function render(): Factory|View|Application
    {
        $tickets = Ticket::select("t.*")->from("tickets as t")
            //->join("cities as c","c.id","=","arrival_city_id")
            ->join("vehicles as v","v.id","=","vehicle_id")
            ->where('t.number', 'like', "%$this->search%")
            ->orWhere('t.departure_time','like',"%$this->search%")
            ->orWhere('t.arrival_time','like',"%$this->search%")
            //->orWhere('t.departure_date_time','like',"%$this->search%")
            //->orWhere('t.end_date_time','like',"%$this->search%")
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.admin.tickets.tickets-list',compact("tickets"));
    }
}
