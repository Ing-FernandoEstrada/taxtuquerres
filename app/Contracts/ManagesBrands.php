<?php

namespace App\Contracts;

use App\Models\Brand;

interface ManagesBrands
{
    function save(array $data, string $urlImage, ?Brand $brand = null): Brand|null;
    function delete(Brand $brand):bool;
}
