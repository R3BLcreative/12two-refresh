<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentTypeCat extends Model {
	use HasFactory;

	public function contentTypes() {
		return $this->hasMany(ContentType::class, 'cat_id');
	}
}
