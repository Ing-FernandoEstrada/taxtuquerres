<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

	public function vehicles():HasMany
	{
		return $this->hasMany(Vehicle::class);
	}

    public function free(): bool {
        return !$this->vehicles()->count();
    }

    public static function optionsHTML():string {
        $array = self::all();
        $html = '<option value="">'.__('Select an option').'</option>';
        foreach ($array as $obj) {
            $html .= '<option value="'.$obj->id.'">'.$obj->name.'</option>';
        } return $html;
    }
    public static function array(string $field = 'id'):array {
        $categories = self::all();
        $array = [];
        foreach ($categories as $category) {
            $array[] = $category->$field;
        } return $array;
    }
}
