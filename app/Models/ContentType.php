<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentType extends Model {
	use HasFactory;

	public function content() {
		return $this->hasMany(Content::class);
	}
}