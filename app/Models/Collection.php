<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Collection extends Model {
	use HasFactory;

	protected $fillable = [
		'slug',
		'collection_type_id',
		'fields',
	];

	protected $casts = [
		'collection_type_id' => 'integer',
	];

	public function collectionType() {
		return $this->belongsTo(CollectionType::class);
	}

	protected function slug(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::slug($value),
		);
	}

	protected function fields(): Attribute {
		return Attribute::make(
			get: fn ($value) => json_decode($value),
			set: fn ($value) => json_encode($value),
		);
	}
}
