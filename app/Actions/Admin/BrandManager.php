<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesBrands;
use App\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BrandManager implements ManagesBrands
{
    function delete(Brand $brand):bool{
        return $brand->delete();
    }
    function save(array $data, ?string $urlImage = null, ?Brand $brand = null): Brand|null
    {
        $ruleName  = 'unique:brands'; // Regla para validar que sean unicos en la base de datos.
        if ($brand) {

            if ($data['name'] == $brand->name) $ruleName = '';
            else $ruleName .= ',name';

        } else {
            // Aquí se especifica a qué campo se hace referencia
            $ruleName .= ',name';

        }
        Validator::make($data,$this->rules($ruleName))->validate();



        if ($brand) $brand->update($data);
        else $brand = Brand::create($data);

        if($urlImage && $brand) {
            $originalName = pathinfo($urlImage,PATHINFO_FILENAME);
            $brand->updateImage(new UploadedFile($urlImage,$originalName));
        }
        return $brand;
    }

    private function rules(string $ruleName = ''): array{
        return [
            'name' => ['required', 'string', 'min:3', 'max:255',$ruleName],
            'image' => ['nullable','mimes:jpg,png,jpeg','max:2048'],

        ];
    }
}
