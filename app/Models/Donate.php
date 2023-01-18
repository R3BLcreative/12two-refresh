<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donate extends Model {
	use HasFactory;

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'billing_address',
		'billing_address2',
		'billing_city',
		'billing_state',
		'billing_zip',
		'amount',
		'status',
	];
}
