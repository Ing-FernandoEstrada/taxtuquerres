<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Ticket
 *
 * @property int $id
 * @property string $number
 * @property int $departure_city_id
 * @property int $arrival_city_id
 * @property string $departure_time
 * @property string $trip_duration
 * @property string $real_arrival_time
 * @property string $novelty
 * @property int $vehicle_id
 *
 * @property City $departure_city
 * @property City $arrival_city
 * @property Vehicle $vehicle
 * @property Collection|InvoiceDetail[] $invoice_details
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'tickets';
	public $timestamps = false;

	protected $casts = [
		'vehicle_id' => 'int',
		'arrival_city_id' => 'int',
		'departure_city_id' => 'int',
	];

	protected $fillable = [
		'number',
        'arrival_city_id',
        'departure_city_id',
		'departure_time',
		'trip_duration',
		'real_arrival_time',
        'novelty',
		'vehicle_id',
	];

	public function vehicle(): BelongsTo
    {
		return $this->belongsTo(Vehicle::class);
	}

    public function departure_city(): BelongsTo
    {
        return $this->belongsTo(City::class,'departure_city_id');
    }

    public function arrival_city(): BelongsTo
    {
        return $this->belongsTo(City::class,'arrival_city_id');
    }

	public function invoice_details(): HasMany
    {
		return $this->hasMany(InvoiceDetail::class);
	}

    public function free(): bool {
        return !$this->invoice_details()->count();
    }

    public function tripDuration():string|null {
        return $this->trip_duration;
    }

    public function lastNovelty():object|null {
        $data = json_decode($this->novelty);
        $index = (count($data)-1);
        return $index>=0?$data[$index]:null;
    }

    public static function nextNumber():string {
        $ticket = self::orderBy('number','desc')->first();
        return $ticket?$ticket->number+=1:1;
    }
}
