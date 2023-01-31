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
		Schema::create('content_type_cats', function (Blueprint $table) {
			$table->id();
			$table->integer('order');
			$table->string('singular');
			$table->string('plural');
			$table->string('slug')->unique();
			$table->text('desc')->nullable();
			$table->boolean('protected')->default(false);
			$table->boolean('required')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('content_type_cats');
	}
};
