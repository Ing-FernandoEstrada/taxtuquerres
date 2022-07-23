<?php

namespace App\Http\Livewire\Dispatcher\Tickets;

use App\Contracts\ManagesTickets;
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
    public ?Ticket $ticket = null;
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
        if (is_numeric($id))$this->emitTo("dispatcher.tickets.create-ticket-form","open",$id);
        else $this->emitTo("dispatcher.tickets.create-ticket-form","open");
    }

    public function confirmDelete(Ticket $ticket) {
        $this->ticket = $ticket;
        $this->dispatchBrowserEvent('confirmDelete',["record" => __('Ticket :number',['number' => $ticket->number])]);
    }

    public function delete(ManagesTickets $manager){
        if ($manager->delete($this->ticket)) $this->emit("deleted");
        else $this->emit("error");
    }

    public function openVehicleDetails(int $vehicle) {
        $this->emitTo("vehicles.vehicle-details","open",$vehicle);
    }

    public function render(): Factory|View|Application
    {
        $tickets = Ticket::select("t.*")->from("tickets as t")
            ->join("cities as arrival_city","arrival_city.id","=","arrival_city_id")
            ->join("cities as departure_city","departure_city.id","=","departure_city_id")
            ->join("vehicles as v","v.id","=","vehicle_id")
            ->where('t.number', 'like', "%$this->search%")
            ->orWhere('t.departure_time','like',"%$this->search%")
            ->orWhere('v.number','like',"%$this->search%")
            ->orWhere('v.plate','like',"%$this->search%")
            ->orWhere('arrival_city.name','like',"%$this->search%")
            ->orWhere('departure_city.name','like',"%$this->search%")
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.dispatcher.tickets.tickets-list',compact("tickets"));
    }
}
