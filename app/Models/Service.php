<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

    protected function name(): Attribute {
        return new Attribute(get: fn($value) => mb_convert_case($value,MB_CASE_TITLE),set: fn($value) => mb_convert_case($value,MB_CASE_LOWER));
    }
}
