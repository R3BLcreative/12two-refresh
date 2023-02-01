<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ContentTypeMeta extends Model {
	use HasFactory;

	public function contentTypeMeta() {
		return $this->belongsTo(ContentType::class);
	}

	protected function columns(): Attribute {
		return Attribute::make(
			get: fn ($value) => json_decode($value),
		);
	}

	protected function fields(): Attribute {
		return Attribute::make(
			get: fn ($value) => json_decode($value),
		);
	}
}
