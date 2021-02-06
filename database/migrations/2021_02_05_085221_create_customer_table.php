<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('customer', function (Blueprint $table) {
				$table->id();
				$table->string('name', 255)->nullable();
				$table->string('address', 500)->nullable();
				$table->string('email', 255)->nullable()->default(0.00);
				$table->timestamp('created_at')->useCurrent();
				$table->timestamp('updated_at')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('customer');
	}
}
