<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionMeta extends Model {
	use HasFactory;

	protected $fillable = [
		'permission_id',
		'title',
		'desc',
	];

	protected $casts = [
		'permission_id' => 'integer',
		'protected' => 'boolean',
	];
}
