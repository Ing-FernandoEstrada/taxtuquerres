<?php

namespace App\Contracts;

use App\Models\User;

interface ManagesUsers
{
    function save(array $data, ?User $user = null): User|null;
    function updateState(User $user,string $state):bool;
    function updatePassword(array $data, User $user):bool;
}
