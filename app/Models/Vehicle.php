<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\VehicleHasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Vehicle
 *
 * @property int $id
 * @property string $number
 * @property string $model
 * @property string $plate
 * @property string $quota
 * @property string $image_url
 * @property int $category_id
 * @property int $brand_id
 *
 * @property Category $category
 * @property Brand $brand
 *
 * @package App\Models
 */
class Vehicle extends Model
{
    use VehicleHasImage;

	protected $table = 'vehicles';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
        'brand_id' => 'int'
	];

    protected $appends = [
        'image_url'
    ];

	protected $fillable = [
		'number',
		'model',
		'plate',
		'quota',
		'category_id',
        'brand_id',
	];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
