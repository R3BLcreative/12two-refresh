<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('role_metas', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('role_id');
			$table->foreign('role_id')->references('id')->on('roles');
			$table->string('title')->unique();
			$table->text('desc')->nullable();
			$table->boolean('protected')->default(false);
			$table->timestamps();
		});

		Schema::create('permission_metas', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('permission_id');
			$table->foreign('permission_id')->references('id')->on('permissions');
			$table->string('title')->unique();
			$table->text('desc')->nullable();
			$table->boolean('protected')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('roles_meta');
		Schema::dropIfExists('permissions_meta');
	}
};
