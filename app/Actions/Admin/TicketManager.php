<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesTickets;
use App\Jobs\UpdateTicketsNovelty;
use App\Models\{City, Novelty, Ticket, Vehicle};
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TicketManager implements ManagesTickets
{
    function saveNovelty(Ticket $ticket, array $data): bool
    {
        Validator::make($data,$this->noveltyRules())->validate();
        $data['date'] = $data['date'].' '.$data['hour'];
        $data['date'] = date('Y-m-d H:i:s',strtotime($data['date']));
        $ticketNovelty = json_decode($ticket->novelty);
        $ticketNovelty[] = ["novelty" => Novelty::$novelties[$data['novelty']], "date" => $data['date']];
        if ($data['novelty']==0)$ticket->real_arrival_time = $data['date']; // Viaje finalizado
        $ticket->novelty = json_encode($ticketNovelty);
        return $ticket->save();
    }

    function delete(Ticket $ticket):bool{
        return $ticket->delete();
    }

    function save(array $data, ?Ticket $ticket = null): Ticket|null
    {
        Validator::make($data,$this->rules())->validate();
        $data['vehicle_id'] = $data['vehicle'];
        $data['departure_city_id'] = $data['departure_city'];
        $data['arrival_city_id'] = $data['arrival_city'];
        $data['departure_time'] = $data['departure_date'].' '.$data['departure_time'];
        if ($data['trip_duration_number']>6&&$data['trip_duration_unit']==2) throw ValidationException::withMessages(['trip_duration_number' => __('Number must be less than :number',['number' => 7])]);
        if ($data['trip_duration_number']<30&&$data['trip_duration_unit']==1) throw ValidationException::withMessages(['trip_duration_number' => __('Number must be greater than :number',['number' => 30])]);
        if ($data['trip_duration_number']<7&&$data['trip_duration_unit']==2) $data['trip_duration'] = $data['trip_duration_number']*60;
        if ($data['trip_duration_number']>29&&$data['trip_duration_unit']==1) $data['trip_duration'] = $data['trip_duration_number'];
        unset($data['vehicle'],$data['departure_city'],$data['arrival_city'],$data['departure_date'],$data['trip_duration_number'],$data['trip_duration_unit']);
        if ($ticket) $ticket->update($data);
        else {
            $data['novelty'] = '[{"novelty":"Creado","date":"'.now()->format('Y-m-d H:i:s').'"}]';
            $ticket = Ticket::create($data);
            if ($ticket) {
                //$milliseconds = date_diff(date_create(now()),date_create($ticket->departure_time))->format('v');
                UpdateTicketsNovelty::dispatch($ticket)->delay(Carbon::parse($ticket->departure_time));
            }
        }
        return $ticket;
    }

    private function rules(): array{
        return [
            'arrival_city' => ['required',Rule::in(City::array())],
            'departure_city' => ['required',Rule::in(City::array())],
            'departure_date' => ['required','date'],
            'departure_time' => ['required'],
            'trip_duration_number' => ['required','min:1'],
            'trip_duration_unit' => ['required'],
            'vehicle' => ['required',Rule::in(Vehicle::array())],
        ];
    }

    private function noveltyRules(): array {
        return [
            'date' => ['required', 'date'],
            'hour' => ['required'],
            'novelty' => ['required']
        ];
    }
}
