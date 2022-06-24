<?php

namespace App\Contracts;


use App\Models\Vehicle;

interface ManagesVehicles
{
    function save(array $data, ?Vehicle $vehicle = null): Vehicle|null;
}
