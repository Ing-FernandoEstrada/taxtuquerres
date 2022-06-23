<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicle
 *
 * @property int $id
 * @property string $number
 * @property string $model
 * @property string $plate
 * @property string $quota
 * @property int $category_id
 * @property int $brand_id
 *
 *
 * @property Category $category
 * @property Brand $brand
 *
 * @package App\Models
 */
class Vehicle extends Model
{
	protected $table = 'vehicles';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
        'brand_id' => 'int'

	];

	protected $fillable = [
		'number',
		'brand_id',
		'model',
		'plate',
		'quota',
		'category_id'
	];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
