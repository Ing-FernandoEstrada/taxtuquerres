<?php

namespace App\Contracts;

use App\Models\Category;

interface ManagesCategories
{
    function save(array $data, ?Category $category = null): Category|null;
}
