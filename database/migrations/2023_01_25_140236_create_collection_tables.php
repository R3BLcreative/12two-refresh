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
			$table->string('label');
			$table->string('slug')->unique();
			$table->string('type')->default('collection');
			$table->boolean('force_single')->default(false);
			$table->boolean('protected')->default(false);
			$table->string('permission')->nullable();
			$table->timestamps();
		});

		Schema::create('collection_types', function (Blueprint $table) {
			$table->id();
			$table->integer('order');
			$table->string('label');
			$table->string('icon');
			$table->string('slug')->unique();
			$table->text('desc')->nullable();
			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->boolean('force_single')->default(false);
			$table->boolean('protected')->default(false);
			$table->string('permission')->nullable();
			$table->timestamps();
		});

		Schema::create('collection_type_metas', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('collection_type_id');
			$table->foreign('collection_type_id')->references('id')->on('collection_types');
			$table->json('columns')->nullable();
			$table->json('fields')->nullable();
			$table->timestamps();
		});

		Schema::create('collections', function (Blueprint $table) {
			$table->id();
			$table->string('slug')->unique();
			$table->unsignedBigInteger('collection_type_id');
			$table->foreign('collection_type_id')->references('id')->on('collection_types');
			$table->json('fields')->nullable();
			$table->timestamps();
		});

		Schema::create('collection_categories', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('collection_id');
			$table->foreign('collection_id')->references('id')->on('collections');
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
		Schema::dropIfExists('collection_types');
		Schema::dropIfExists('collection_type_metas');
		Schema::dropIfExists('collections');
	}
};
