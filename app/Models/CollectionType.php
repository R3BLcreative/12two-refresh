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
		'allow_form_builder',
	];

	protected $casts = [
		'order' => 'integer',
		'category_id' => 'integer',
		'force_single' => 'boolean',
		'allow_form_builder' => 'boolean',
		'protected' => 'boolean',
	];

	public function collection() {
		return $this->hasMany(Collection::class);
	}

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function columns() {
		return $this->hasOne(CollectionTypeColumn::class)
			->withDefault(function ($column) {
				$adminConfig = json_decode(json_encode(config('admin.tables')));

				if (property_exists($adminConfig, $this->slug)) {
					// Get config for base collections
					$config = $adminConfig->{$this->slug}->columns;
				} else {
					// Get default config
					$config = $adminConfig->default->columns;
				}

				foreach ($config as $key => $value) {
					$column->{$key} = $value;
				}
			});
	}

	public function fields() {
		return $this->hasOne(CollectionTypeField::class)
			->withDefault(function ($field) {
				$adminConfig = json_decode(json_encode(config('admin.tables')));

				if (property_exists($adminConfig, $this->slug)) {
					// Get config for base collections
					$config = $adminConfig->{$this->slug}->fields;
				} else {
					// Get default config
					$config = $adminConfig->default->fields;
				}

				$field->items = $config;
			});
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
