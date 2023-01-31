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
		Schema::create('content_types', function (Blueprint $table) {
			$table->id();
			$table->integer('order');
			$table->string('singular');
			$table->string('plural');
			$table->string('icon');
			$table->string('slug')->unique();
			$table->string('route');
			$table->text('desc')->nullable();
			$table->unsignedBigInteger('cat_id');
			$table->foreign('cat_id')->references('id')->on('content_type_cats');
			$table->boolean('protected')->default(false);
			$table->boolean('required')->default(false);
			$table->json('columns')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('content_types');
	}
};
