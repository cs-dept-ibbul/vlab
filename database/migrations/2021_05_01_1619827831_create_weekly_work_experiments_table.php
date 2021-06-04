<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyWorkExperimentsTable extends Migration
{
    public function up()
    {
        Schema::create('weekly_work_experiments', function (Blueprint $table) {

            $table->string('id', 36)->primary();
            $table->string('experiment_id', 36);
            $table->string('weekly_work_id', 36);
            $table->json('setdata')->default(Null);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weekly_work_experiments');
    }
}
