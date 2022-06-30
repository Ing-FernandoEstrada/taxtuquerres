<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property int $id
 * @property string $number
 * @property string $start_destiny
 * @property string $end_destiny
 * @property Carbon $start_date_time
 * @property Carbon|null $end_date_time
 * @property int $vehicle_id
 * 
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

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class);
	}

	public function invoice_details()
	{
		return $this->hasMany(InvoiceDetail::class);
	}
}
