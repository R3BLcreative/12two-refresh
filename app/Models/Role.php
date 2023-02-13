<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Role extends SpatieRole {
	public function meta() {
		return $this->hasOne(RoleMeta::class);
	}

	protected function name(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::slug($value),
		);
	}
}
