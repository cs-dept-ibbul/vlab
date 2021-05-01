<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyWorkTable extends Migration
{
	public function up()
	{
		Schema::create('weekly_works', function (Blueprint $table) {

			$table->string('id', 36)->primary();
			$table->string('title', 50);
			$table->string('school_id', 36);
			$table->string('faculty_id', 36);
			$table->string('experiment_id', 36);
			$table->string('session_id', 36)->nullable()->default('NULL');
			$table->string('date_open', 225)->nullable()->default('NULL');
			$table->string('date_close', 225)->nullable()->default('NULL');
			$table->string('access_code', 225)->nullable()->default('NULL');
			$table->enum('limitation', ['0', '1'])->default('0');
			$table->enum('status', ['Active', 'Inactive'])->default('Active');
			$table->rememberToken();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('weekly_work');
	}
}
