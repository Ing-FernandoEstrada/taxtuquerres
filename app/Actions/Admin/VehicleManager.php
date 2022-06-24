<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesVehicles;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VehicleManager implements ManagesVehicles
{

    function save(array $data, ?Vehicle $vehicle = null): Vehicle|null
    {
        Validator::make($data,$this->rules())->validate();
        if ($vehicle) {
            if ($vehicle->number != $data['number']) {
                $count = Vehicle::where('number',$data['number'])->count();
                if($count>0) throw ValidationException::withMessages(['number' => __('Already vehicle registered with this number.')]);
            }
            if ($vehicle->plate != $data['plate']) {
                $count = Vehicle::where('plate',$data['plate'])->count();
                if($count>0) throw ValidationException::withMessages(['plate' => __('Already vehicle registered with this plate.')]);
            }

            $vehicle->update($data);
        } else {
            $password = Hash::make($data['document'].$data['number']);
            $data['state'] = 'A';
            $data['password'] = $password;
            $vehicle = Vehicle::create($data);
        }
        if(isset($data["image"])){
            $vehicle->updateImage($data["image"]);
        }
        return $vehicle;
    }
    private function rules(): array{
    return [
        'number' => ['required','numeric'],
        'model' => ['required','numeric'],
        'plate' => ['required','string'],
        'quota' => ['required','numeric'],
        'category' => ['required','numeric'],
        'brand' => ['required','numeric'],
        'image' => ['nullable','mimes:jpg,png,jpeg','max:2048'],
    ];
    }
}
