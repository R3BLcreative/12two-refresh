<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MenuItem extends Model {
	use HasFactory;

	protected $fillable = [
		'order',
		'label',
		'link',
		'target',
		'type',
		'parent_id',
		'menu_id',
	];

	protected $casts = [
		'order' => 'integer',
		'target' => 'boolean',
		'menu_id' => 'integer',
	];

	public function menu() {
		return $this->belongsTo(Menu::class);
	}

	protected function label(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::title($value),
		);
	}
}
