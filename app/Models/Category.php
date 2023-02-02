<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model {
	use HasFactory;

	protected $fillable = [
		'order',
		'label',
		'slug',
		'type',
		'force_single',
	];

	protected $casts = [
		'order' => 'integer',
		'force_single' => 'boolean',
	];

	public function collectionTypes() {
		return $this->hasMany(CollectionType::class);
	}

	protected function label(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::title($value),
		);
	}

	protected function slug(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::slug($value),
		);
	}
}
