<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Contracts\ManagesTickets;
use App\Models\Ticket;
use Livewire\Component;

class CreateTicketForm extends Component
{
    public bool $open = false;
    public array $data = ['name' => ''];
    public ?Ticket $ticket = null;
    public string $title = 'Create New Ticket';
    public string $shortTitle = 'Create';
    protected $listeners = ['open'];

    public function mount():void {
        if (!is_null($this->ticket)) {
            $this->data = $this->ticket->withoutRelations()->toArray();
            $this->title = 'Update ticket information';
            $this->shortTitle = 'Update';
        }
        $this->title = __($this->title);
        $this->shortTitle = __($this->shortTitle);
    }
    public function getCategoriesProperty()
    {
        return Ticket::optionsHTML();
    }

    public function open($ticket = null):void {
        if(is_numeric($ticket)) $this->ticket = Ticket::find($ticket);
        $this->open = true;
        $this->mount();
    }

    public function save(ManagesTickets $manager):void {
        $ticket = $manager->save($this->data, $this->ticket);
        if($ticket)
        {
            $this->emitTo('admin.tickets.tickets-list',"render");
            $this->emit('save');
            $this->reset();
        }
        else $this->emit('error');
    }
    public function render()
    {
        return view('livewire.admin.categories.create-ticket-form');
    }
}
