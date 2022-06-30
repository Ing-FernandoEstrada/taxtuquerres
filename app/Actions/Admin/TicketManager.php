<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesTickets;
use App\Models\Ticket;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;

class TicketManager implements ManagesTickets
{
    function delete(Ticket $ticket):bool{
        return $ticket->delete();
    }
    function save(array $data, ?Ticket $ticket = null): Ticket|null
    {
        $ruleName  = 'unique:tickets'; // Regla para validar que sean unicos en la base de datos.
        if ($ticket) {

            if ($data['name'] == $ticket->name) $ruleName = '';
            else $ruleName .= ',name';

        } else {
            // Aquí se especifica a qué campo se hace referencia
            $ruleName .= ',name';

        }
        Validator::make($data,$this->rules($ruleName))->validate();



        if ($ticket) $ticket->update($data);
        else $ticket = Ticket::create($data);

        return $ticket;
    }

    private function rules(string $ruleName = ''): array{
        return [
            'name' => ['required', 'string', 'min:3', 'max:255',$ruleName],
        ];
    }
}
