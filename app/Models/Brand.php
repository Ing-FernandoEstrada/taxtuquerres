<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * 
 * @property int $id
 * @property string $name
 * @property string|null $image
 * 
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class Brand extends Model
{
	protected $table = 'brands';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'image'
	];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::class);
	}
}
