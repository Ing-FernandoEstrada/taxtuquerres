<?php

namespace App\Actions\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryManager implements \App\Contracts\ManagesCategories
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

        } else {
            // Aquí se especifica a qué campo se hace referencia
            $ruleName .= ',name';

        }
        Validator::make($data,$this->rules($ruleName))->validate();

        $data["category_id"]=$data["category"];



        if ($category) $category->update($data);
        else $category = Category::create($data);
        return $category;
    }

    private function rules(string $ruleName = ''): array{
        return [
            'name' => ['required', 'string', 'min:3', 'max:255',$ruleName],
            'category' => ['nullable', 'numeric', Rule::in(Category::array())],

        ];
    }
}
