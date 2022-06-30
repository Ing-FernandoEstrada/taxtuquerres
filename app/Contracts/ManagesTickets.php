<?php

namespace App\Contracts;

use App\Models\Ticket;

interface ManagesTickets
{
    function save(array $data, ?Ticket $ticket = null): Ticket|null;
    function delete(Ticket $ticket):bool;
}
