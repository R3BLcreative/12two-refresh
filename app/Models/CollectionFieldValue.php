<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CollectionFieldValue extends Model {
	use HasFactory;

	protected $fillable = [
		'collection_type_id',
		'collection_type_field_id',
		'value',
	];

	protected $casts = [
		'collection_type_id' => 'integer',
		'collection_type_field_id' => 'integer',
	];

	public function type() {
		return $this->belongsTo(CollectionType::class);
	}

	public function field() {
		return $this->belongsTo(CollectionTypeField::class);
	}
}
