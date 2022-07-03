<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\BrandHasImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Brand
 *
 * @property int $id
 * @property string $name
 * @property string $image_url
 *
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class Brand extends Model
{

    use BrandHasImage;
	protected $table = 'brands';
	public $timestamps = false;

	protected $fillable = [
		'name',
	];

    protected $appends = ["image_url"];

	public function vehicles():HasMany {
		return $this->hasMany(Vehicle::class);
	}

    public function free():bool {
        return !$this->vehicles()->count();
    }

    public static function optionsHTML():string {
        $array = self::all();
        $html = '<option value="">'.__('Select an option').'</option>';
        foreach ($array as $obj) {
            $html .= '<option value="'.$obj->id.'">'.$obj->name.'</option>';
        } return $html;
    }
}
