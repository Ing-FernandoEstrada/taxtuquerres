<?php

namespace App\Contracts;

use App\Models\Headquarter;

interface ManagesHeadquarters
{
    function save(array $data, ?Headquarter $headquarter = null): Headquarter|null;

    function delete(Headquarter $headquarter): bool;
}
