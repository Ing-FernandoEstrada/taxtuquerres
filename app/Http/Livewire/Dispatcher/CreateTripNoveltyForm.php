<?php

namespace App\Http\Livewire\Dispatcher;

use App\Contracts\ManagesTickets;
use App\Models\Novelty;
use App\Models\Ticket;
use Illuminate\View\View;
use Livewire\Component;

class CreateTripNoveltyForm extends Component
{
    public bool $open = false;
    public array $data = ['novelty' => '', 'date' => '', 'hour' => ''];
    public ?Ticket $ticket = null;
    protected $listeners = ['open'];

    public function getNoveltiesProperty(): string {
        return Novelty::optionsHTML();
    }

    public function open(Ticket $ticket): void {
        $this->ticket = $ticket;
        $this->open = true;
    }

    public function save(ManagesTickets $manager): void {
        if($manager->saveNovelty($this->ticket,$this->data)) {
            $this->emitTo('dispatcher.vehicles-in-circulation','render');
            $this->emit('saved');
            $this->reset();
        } else $this->emit('error');
    }

    public function render():View {
        return view('livewire.dispatcher.create-trip-novelty-form');
    }
}
