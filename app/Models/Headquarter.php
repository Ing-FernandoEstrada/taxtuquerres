<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Headquarter
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string $phone
 * @property int $city_id
 *
 * @property City $city
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Headquarter extends Model
{
	protected $table = 'headquarters';
	public $timestamps = false;

	protected $casts = [
		'city_id' => 'int'
	];

	protected $fillable = [
		'name',
		'address',
		'phone',
		'city_id'
	];

	public function city():BelongsTo
	{
		return $this->belongsTo(City::class);
	}

	public function users():HasMany
	{
		return $this->hasMany(User::class, 'headquarter_id');
	}
}
