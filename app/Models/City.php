<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class City
 *
 * @property int $id
 * @property string $name
 * @property int|null $state_id
 *
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int'
	];

	protected $fillable = [
		'name',
		'state_id'
	];

	public function tickets(): HasMany
    {
		return $this->hasMany(Ticket::class, 'start_city_id');
	}

    public static function array(string $field = 'id'):array {
        $cities = self::all();
        $array = [];
        foreach ($cities as $city) {
            $array[] = $city->$field;
        }
        return $array;
    }

    public static function optionsHTML():string {
        $array = self::all();
        $html = '<option value="">'.__('Select an option').'</option>';
        foreach ($array as $obj) {
            $html .= '<option value="'.$obj->id.'">'.$obj->name.'</option>';
        } return $html;
    }
}
