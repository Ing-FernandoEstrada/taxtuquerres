<?php

namespace App\Contracts;


use App\Models\Vehicle;
use Illuminate\Http\UploadedFile;

interface ManagesVehicles
{
    function save(array $data, UploadedFile $image, ?Vehicle $vehicle = null): Vehicle|null;
}
