<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Content extends Model {
	use HasFactory;

	public function contentType() {
		return $this->belongsTo(ContentType::class);
	}

	protected function fields(): Attribute {
		return Attribute::make(
			get: fn ($value) => json_decode($value),
		);
	}
}
