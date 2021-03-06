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
            //this->down();
            $table->string('id',36)->primary();
            $table->string('user_id', 36);
            $table->string('course_id', 36);
            $table->string('experiment_id', 36);
            $table->string('session_id', 36);
            $table->string('weekly_work_id', 36);
            $table->string('result_json', 3000)->nullable();
            $table->string('time_started', 25);
            $table->string('time_submited', 25)->nullable();
            $table->string('time_left', 25);
            $table->enum('completion_status', ['Not Started', 'Started', 'Completed'])->default('Started');
            $table->enum('restart', ['Allow', 'Deny'])->default('Allow');
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
