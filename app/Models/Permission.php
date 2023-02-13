<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Permission extends SpatiePermission {
	public function meta() {
		return $this->hasOne(PermissionMeta::class);
	}

	protected function name(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::slug($value),
		);
	}
}
