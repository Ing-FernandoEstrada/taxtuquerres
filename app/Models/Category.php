<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 *
 * @property int $id
 * @property string $name
 *
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function vehicles(): HasMany
	{
		return $this->hasMany(Vehicle::class);
	}
}
