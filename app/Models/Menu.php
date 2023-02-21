<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Menu extends Model {
	use HasFactory;

	protected $fillable = [
		'title',
		'slug',
		'menu',
	];

	public function items() {
		return $this->hasMany(MenuItem::class)->orderBy('order', 'asc');
	}

	protected function title(): Attribute {
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
