<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Ticket;
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
    public string $sort = 'id';
    public string $rpp = '10';
    public array $data = ["name"=>'',"category"=>''];
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

    public function openForm(?int $id=null)
    {
        if (is_numeric($id))$this->emitTo("admin.tickets.create-ticket-form","open",$id);
        else
        {
            $this->emitTo("admin.tickets.create-ticket-form","open",$id);
        }

    }

    public function render(): Factory|View|Application
    {
        $tickets = Ticket::select("t.*")->from("tickets as t")
            ->join("vehicles as v","v.id","=","vehicle_id")
            ->where('number', 'like', "%$this->search%")
            ->orWhere('v.name','like',"%$this->search%")
            ->orWhere('start_destiny','like',"%$this->search%")
            ->orWhere('end_destiny','like',"%$this->search%")
            ->orWhere('start_date_time','like',"%$this->search%")
            ->orWhere('end_date_time','like',"%$this->search%")

            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);

        return view('livewire.admin.tickets.tickets-list',compact("tickets"));
    }
}
