<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Connection extends Model {
	use HasFactory;

	protected $fillable = [
		'name',
		'email',
		'topic',
	];

	protected function name(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::title($value),
		);
	}

	protected function email(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::lower($value),
		);
	}
}
