<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CollectionType extends Model {
	use HasFactory;

	protected $fillable = [
		'order',
		'label',
		'icon',
		'slug',
		'desc',
		'category_id',
		'force_single',
	];

	protected $casts = [
		'order' => 'integer',
		'category_id' => 'integer',
		'force_single' => 'boolean',
	];

	public function collection() {
		return $this->hasMany(Collection::class);
	}

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function collectionTypeMeta() {
		return $this->hasOne(CollectionTypeMeta::class);
	}

	protected function label(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::title($value),
		);
	}

	protected function icon(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::lower($value),
		);
	}

	protected function slug(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::slug($value),
		);
	}
}
