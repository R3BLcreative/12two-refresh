<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CollectionTypeField extends Model {
	use HasFactory;

	protected $fillable = [
		'label',
		'slug',
		'type',
		'class',
		'options',
		'collection_type_id',
	];

	protected $casts = [
		'collection_type_id' => 'integer',
	];

	public function collectionType() {
		return $this->belongsTo(CollectionType::class);
	}

	public function values() {
		return $this->hasMany(CollectionFieldValue::class);
	}

	protected function slug(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::slug($value),
		);
	}

	protected function options(): Attribute {
		return Attribute::make(
			get: fn ($value) => json_decode($value),
			set: fn ($value) => json_encode($value),
		);
	}
}
