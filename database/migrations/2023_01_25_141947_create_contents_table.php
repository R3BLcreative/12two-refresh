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
		Schema::create('contents', function (Blueprint $table) {
			$table->id();
			$table->string('label');
			$table->string('slug')->unique();
			$table->text('desc')->nullable();
			$table->unsignedBigInteger('content_type_id');
			$table->foreign('content_type_id')->references('id')->on('content_types');
			$table->json('props')->nullable();
			$table->json('meta')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('contents');
	}
};
