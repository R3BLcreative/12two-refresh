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
		Schema::create('menus', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('slug')->unique();
			$table->timestamps();
		});

		Schema::create('menu_items', function (Blueprint $table) {
			$table->id();
			$table->string('label');
			$table->string('slug')->unique();
			$table->boolean('target')->default(false);
			$table->unsignedBigInteger('parent_id')->nullable();
			$table->foreign('parent_id')->references('id')->on('menu_items');
			$table->unsignedBigInteger('menu_id');
			$table->foreign('menu_id')->references('id')->on('menus');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('menus');
		Schema::dropIfExists('menu_items');
	}
};
