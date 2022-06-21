<?php

namespace App\Contracts;

use App\Models\User;

interface ManagesUsers
{
    function save(array $data, ?User $user = null): User|null;
}
