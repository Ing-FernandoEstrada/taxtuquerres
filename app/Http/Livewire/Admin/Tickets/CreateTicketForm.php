<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Contracts\ManagesTickets;
use App\Models\City;
use App\Models\Ticket;
use Livewire\Component;

class CreateTicketForm extends Component
{
    public bool $open = false;
    public array $data = ['number' => '', 'departure_city' => '', 'arrival_city' => '', 'departure_time' => '', 'arrival_time' => '', 'vehicle' => ''];
    public ?Ticket $ticket = null;
    public string $title = 'Create New Ticket';
    public string $shortTitle = 'Create';
    protected $listeners = ['open'];

    public function mount():void {
        if (!is_null($this->ticket)) {
            $this->data = $this->ticket->withoutRelations()->toArray();
            unset($this->data['vehicle_id']);
            unset($this->data['departure_city_id']);
            unset($this->data['arrival_city_id']);
            $this->data['vehicle'] = $this->ticket->vehicle_id;
            $this->data['departure_city'] = $this->ticket->departure_city_id;
            $this->data['arrival_city'] = $this->ticket->arrival_city_id;
            $this->title = 'Update ticket information';
            $this->shortTitle = 'Update';
        }
        $this->title = __($this->title);
        $this->shortTitle = __($this->shortTitle);
    }

    public function open($ticket = null):void {
        if(is_numeric($ticket)) $this->ticket = Ticket::find($ticket);
        $this->open = true;
        $this->mount();
    }

    public function getCitiesProperty():string {
        return City::optionsHTML();
    }

    public function save(ManagesTickets $manager):void {
        $ticket = $manager->save($this->data, $this->ticket);
        if($ticket) {
            $this->emitTo('admin.tickets.tickets-list',"render");
            $this->emit('save');
            $this->reset();
        } else $this->emit('error');
    }

    public function render() {
        return view('livewire.admin.tickets.create-ticket-form');
    }
}
