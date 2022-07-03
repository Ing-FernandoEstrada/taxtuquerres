<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesCategories;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryManager implements ManagesCategories
{
    function delete(Category $category):bool{
        return $category->delete();
    }

    function save(array $data, ?Category $category = null): Category|null
    {
        $ruleName  = 'unique:categories'; // Regla para validar que sean unicos en la base de datos.
        if ($category) {
            if ($data['name'] == $category->name) $ruleName = '';
            else $ruleName .= ',name';
        } else $ruleName .= ',name';// Aquí se especifica a qué campo se hace referencia
        Validator::make($data,$this->rules($ruleName))->validate();
        if ($category) $category->update($data);
        else $category = Category::create($data);
        return $category;
    }

    private function rules(string $ruleName = ''): array{
        return ['name' => ['required', 'string', 'min:3', 'max:255',$ruleName]];
    }
}
