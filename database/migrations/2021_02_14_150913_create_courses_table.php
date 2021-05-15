<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('school_id');
            $table->string('faculty_id');
            $table->string('session_id');
            $table->string('enrollment_code');
            $table->string('title');
            $table->string('code');
            $table->string('video_url')->nullable();
            $table->string('description');
            $table->enum('status', ['Active', 'Inactive']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_courses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('school_id');
            $table->string('faculty_id');
            $table->string('course_id');
            $table->string('user_id');
            $table->string('session_id');
            $table->enum('status', ['Active', 'Inactive']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('course_experiment', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('course_id');
            $table->string('experiment_id');
            $table->enum('status', ['Active', 'Inactive']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('course_resources', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('course_id');
            $table->string('resourceUrl')->nullable();
            $table->string('caption')->nullable();
            $table->enum('status', ['Active', 'Inactive']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('course_instructor', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('course_id');
            $table->string('instructor_id');
            $table->enum('status', ['Active', 'Inactive']);
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
        Schema::dropIfExists('courses');
    }
}
