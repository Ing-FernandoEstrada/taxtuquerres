<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InvoiceDetail
 * 
 * @property int $id
 * @property string $price
 * @property int $ticket_id
 * @property int $user_id
 * @property int $invoice_id
 * 
 * @property Invoice $invoice
 * @property Ticket $ticket
 * @property User $user
 *
 * @package App\Models
 */
class InvoiceDetail extends Model
{
	protected $table = 'invoice_details';
	public $timestamps = false;

	protected $casts = [
		'ticket_id' => 'int',
		'user_id' => 'int',
		'invoice_id' => 'int'
	];

	protected $fillable = [
		'price',
		'ticket_id',
		'user_id',
		'invoice_id'
	];

	public function invoice()
	{
		return $this->belongsTo(Invoice::class);
	}

	public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
