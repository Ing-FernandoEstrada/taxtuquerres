<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IDType
 *
 * @property string $id
 * @property string $code
 * @property string $name
 *
 * @package App\Models
 */
class Document extends Model
{
	protected $table = 'documents';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'code',
		'name'
	];

    protected function name(): Attribute {
        return new Attribute(get: fn($value) => ucwords($value));
    }

    public static function optionsHTML():string {
        $array = self::all();
        $html = '<option value="">'.__('Select an option').'</option>';
        foreach ($array as $obj) {
            $html .= '<option value="'.$obj->id.'">'.$obj->name.'</option>';
        } return $html;
    }

    public static function array(string $field = 'id'):array {
        $documents = self::all();
        $array = [];
        foreach ($documents as $document) {
            $array[] = $document->$field;
        } return $array;
    }
}
