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
		Schema::create('categories', function (Blueprint $table) {
			$table->id();
			$table->integer('order');
			$table->string('singular');
			$table->string('plural');
			$table->string('slug')->unique();
			$table->text('desc')->nullable();
			$table->string('type')->default('content');
			$table->boolean('protected')->default(false);
			$table->boolean('required')->default(false);
			$table->timestamps();
		});

		Schema::create('content_types', function (Blueprint $table) {
			$table->id();
			$table->integer('order');
			$table->string('singular');
			$table->string('plural');
			$table->string('icon');
			$table->string('slug')->unique();
			$table->string('route');
			$table->text('desc')->nullable();
			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->boolean('protected')->default(false);
			$table->boolean('required')->default(false);
			$table->timestamps();
		});

		Schema::create('content_type_metas', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('content_type_id');
			$table->foreign('content_type_id')->references('id')->on('content_types');
			$table->json('columns')->nullable();
			$table->json('fields');
			$table->timestamps();
		});

		Schema::create('contents', function (Blueprint $table) {
			$table->id();
			$table->string('slug')->unique();
			$table->text('desc')->nullable();
			$table->unsignedBigInteger('content_type_id');
			$table->foreign('content_type_id')->references('id')->on('content_types');
			$table->json('fields')->nullable();
			$table->timestamps();
		});

		Schema::create('content_categories', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('content_id');
			$table->foreign('content_id')->references('id')->on('contents');
			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('categories');
		Schema::dropIfExists('content_types');
		Schema::dropIfExists('content_type_metas');
		Schema::dropIfExists('contents');
	}
};
