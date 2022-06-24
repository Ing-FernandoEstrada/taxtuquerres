<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesVehicles;
use App\Models\Vehicle;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VehicleManager implements ManagesVehicles
{

    function save(array $data, ?UploadedFile $image = null, ?Vehicle $vehicle = null): Vehicle|null
    {
        $ruleNumber = $rulePlate = 'unique:vehicles'; // Regla para validar que sean unicos en la base de datos.
        if ($vehicle) {

            if ($data['plate'] == $vehicle->plate) $rulePlate = '';
            else $rulePlate .= ',plate';

            if ($data['number'] == $vehicle->number) $ruleNumber = '';
            else $ruleNumber .= ',number';

        } else {
            // Aquí se especifica a qué campo se hace referencia
            $ruleNumber .= ',number';
            $rulePlate .= ',plate';
        }
        Validator::make($data,$this->rules($ruleNumber,$rulePlate))->validate();
        $data['category_id'] = $data['category'];
        $data['brand_id'] = $data['brand'];

        if ($vehicle) $vehicle->update($data);
        else $vehicle = Vehicle::create($data);

        if($image && $vehicle) $vehicle->updateImage($image);

        return $vehicle;
    }

    private function rules(string $ruleNumber = '', string $rulePlate = ''): array{
        return [
            'number' => ['required','numeric', $ruleNumber],
            'model' => ['required','numeric'],
            'plate' => ['required','string',$rulePlate],
            'quota' => ['required','numeric'],
            'category' => ['required','numeric'],
            'brand' => ['required','numeric'],
            'image' => ['nullable','mimes:jpg,png,jpeg','max:2048'],
        ];
    }
}
