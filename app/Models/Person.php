<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Person
 *
 * @property int $id
 * @property int $document_id
 * @property string $identification
 * @property string $names
 * @property string $surnames
 * @property Carbon $birthday
 *
 * @property User $user
 * @property Document $document
 *
 * @package App\Models
 */
class Person extends Model
{
	protected $table = 'people';
	public $timestamps = false;

	protected $fillable = [
		'identification',
		'names',
		'surnames',
		'birthday'
	];

    protected $casts = [
        'birthday' => 'date'
    ];

	public function user():HasOne
	{
		return $this->hasOne(User::class);
	}

    public function document():BelongsTo {
        return $this->belongsTo(Document::class);
    }

    protected function fullname(): Attribute {
        return new Attribute(get:fn() => $this->names.' '.$this->surnames);
    }
}
