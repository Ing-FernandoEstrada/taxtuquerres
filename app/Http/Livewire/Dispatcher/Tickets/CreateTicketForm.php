<?php

namespace App\Http\Livewire\Dispatcher\Tickets;

use App\Contracts\ManagesTickets;
use App\Models\{City, Hour, Ticket, Vehicle};
use Illuminate\View\View;
use Livewire\Component;

class CreateTicketForm extends Component
{
    public bool $open = false;
    public array $data = ['number' => '', 'departure_city' => '', 'arrival_city' => '', 'departure_date' => '', 'departure_time' => '', 'trip_duration_number' => '', 'trip_duration_unit', 'vehicle' => ''];
    public ?Ticket $ticket = null;
    public string $title = 'Create New Ticket';
    public string $shortTitle = 'Create';
    protected $listeners = ['open','modal.closed' => 'close'];

    public function mount():void {
        if (!is_null($this->ticket)) {
            $this->data = $this->ticket->withoutRelations()->toArray();
            $departure_time = $this->data['departure_time'];
            $trip_duration = $this->data['trip_duration'];
            if($trip_duration>59) {
                $trip_duration_number = $trip_duration/60;
                $trip_duration_unit = 2;
            } else {
                $trip_duration_number = $trip_duration;
                $trip_duration_unit = 1;
            }
            $this->data['trip_duration_number'] = $trip_duration_number;
            $this->data['trip_duration_unit'] = $trip_duration_unit;
            $this->data['departure_date'] = date('Y-m-d',strtotime($departure_time));
            $this->data['departure_time'] = date('H:i:s',strtotime($departure_time));
            unset($this->data['vehicle_id']);
            unset($this->data['departure_city_id']);
            unset($this->data['arrival_city_id']);
            unset($this->data['trip_duration']);
            $this->data['vehicle'] = $this->ticket->vehicle_id;
            $this->data['departure_city'] = $this->ticket->departure_city_id;
            $this->data['arrival_city'] = $this->ticket->arrival_city_id;
            $this->title = 'Update ticket information';
            $this->shortTitle = 'Update';
        } else {
            $this->data['number'] = Ticket::nextNumber();
            $this->data['departure_date'] = now()->format('Y-m-d');
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

    public function getHoursProperty():string {
        return Hour::optionsHTML();
    }

    public function getTimeUnitsProperty():string {
        $units = Hour::$timeUnits;
        $html = '<option value="">'.__('Unit').'</option>';
        foreach ($units as $unit) {
            $html .= '<option value="'.$unit['id'].'">'.__($unit['unit']).'</option>';
        }
        return $html;
    }

    public function getVehiclesProperty():string {
        return Vehicle::optionsHTML();
    }

    public function save(ManagesTickets $manager):void {
        $ticket = $manager->save($this->data, $this->ticket);
        if($ticket) {
            $this->emitTo('dispatcher.tickets.tickets-list',"render");
            $this->emit('saved');
            $this->close();
        } else $this->emit('error');
    }

    public function close() {
        $this->reset();
    }

    public function render(): View {
        return view('livewire.dispatcher.tickets.create-ticket-form');
    }
}
