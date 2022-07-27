<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesHeadquarters;
use App\Models\{City, Headquarter};
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HeadquarterManager implements ManagesHeadquarters
{


    function delete(Headquarter $headquarter):bool{
        return $headquarter->delete();
    }

    function save(array $data, ?Headquarter $headquarter = null): Headquarter|null
    {
        Validator::make($data,$this->rules())->validate();
        $data['city_id'] = $data['city'];
        if ($headquarter) $headquarter->update($data);
        else {
            $headquarter = Headquarter::create($data);
        }
        return $headquarter;
    }

    private function rules(): array{
        return [
            'city' => ['required',Rule::in(City::array())],
            'name' => ['required', 'string', 'max:150', 'min:10'],
            'address' => ['required','string'],
            'phone' => ['required', 'phone:AUTO,CO'],
        ];
    }
}
