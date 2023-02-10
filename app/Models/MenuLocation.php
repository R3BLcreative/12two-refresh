<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MenuLocation extends Model {
	use HasFactory;

	protected $fillable = [
		'title',
		'slug',
		'menu_id',
	];

	protected $casts = [
		'menu_id' => 'integer',
	];

	public function menu() {
		return $this->belongsTo(Menu::class);
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
