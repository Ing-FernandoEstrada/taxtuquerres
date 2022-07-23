<?php

namespace App\Http\Livewire\Tickets;

use App\Models\Ticket;
use Illuminate\View\View;
use Livewire\{Component,WithPagination};

class TicketsList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $date = '';
    public string $direction = 'asc';
    public string $rpp = '20';
    public string $sort = 'departure_time';
    protected $queryString = [
        'search' => ['except' => ''],
        'date' => ['except' => ''],
        'direction' => ['except' => 'asc'],
        'rpp' => ['except' => '20'],
        'sort' => ['except' => 'date'],
    ];

    protected $listeners = ['render'];

    public function updatingSearch(): void {
        $this->resetPage();
    }

    public function updatingDate(): void {
        $this->resetPage();
    }

    public function sort(string $sort) {
        if ($sort=='date') $this->reset(['sort']);
        else if ($sort == $this->sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else $this->sort = $sort;
    }

    public function openVehicleDetails(int $id): void {
        $this->emitTo('vehicles.vehicle-details','open',$id);
    }

    public function render(): View
    {
        $tickets = Ticket::select('t.*')->from('tickets as t')
            ->join("cities as arrival_city","arrival_city.id","=","arrival_city_id")
            ->join("cities as departure_city","departure_city.id","=","departure_city_id")
            ->join("vehicles as v","v.id","=","vehicle_id")
            //->select('t.id as tid')
            /*->where(function ($query) {
                $query->select('ind.*')->from('invoice_details as ind')->whereColumn('ind.ticket_id', 'tid')->count();
            },'<','v.quota')*/
            ->where(function ($query) {
                $query->where('t.departure_time','like',"%$this->date%")
                    ->orWhere('arrival_city.name','like',"%$this->search%")
                    ->orWhere('departure_city.name','like',"%$this->search%");
            })
            ->orderBy($this->sort, $this->direction)->paginate();
            //->orderBy($this->sort, $this->direction)->toSql();
        //echo $tickets;die();
            //->paginate($this->rpp);
        return view('livewire.tickets.tickets-list',compact('tickets'));
    }
}
