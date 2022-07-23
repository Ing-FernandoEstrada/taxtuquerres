<?php

namespace App\Contracts;

use App\Models\Ticket;

interface ManagesTickets
{
    function saveNovelty(Ticket $ticket, array $data):bool;
    function save(array $data, ?Ticket $ticket = null): Ticket|null;
    function delete(Ticket $ticket):bool;
}
