<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleMeta extends Model {
	use HasFactory;

	protected $fillable = [
		'role_id',
		'title',
		'desc',
	];

	protected $casts = [
		'role_id' => 'integer',
		'protected' => 'boolean',
	];
}
