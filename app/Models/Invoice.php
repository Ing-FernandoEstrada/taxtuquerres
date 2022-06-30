<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property string $number
 * @property Carbon $date
 * @property int $user_id
 * 
 * @property User $user
 * @property Collection|InvoiceDetail[] $invoice_details
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'number',
		'date',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function invoice_details()
	{
		return $this->hasMany(InvoiceDetail::class);
	}
}
