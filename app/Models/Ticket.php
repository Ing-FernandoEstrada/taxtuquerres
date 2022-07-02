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
 * @property Carbon $departure_date_time
 * @property Carbon|null $arrival_date_time
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
		'vehicle_id' => 'int'
	];

	protected $dates = [
		'start_date_time',
		'end_date_time'
	];

	protected $fillable = [
		'number',
		'start_destiny',
		'end_destiny',
		'start_date_time',
		'end_date_time',
		'vehicle_id'
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
}
