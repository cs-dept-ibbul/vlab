<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_results', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('user_id', 36);
            $table->integer('experiment_id', 36);
            $table->string('session_id', 36);
            $table->string('weekly_work_id', 36);
            $table->string('result_json', 3000);
            $table->string('time_started', 10);
            $table->string('time_submited', 10);
            $table->string('time_left', 10);
            $table->enum('completion_status', ['Not Started', 'Started', 'Completed'])->default('Not Started');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiment_results');
    }
}
