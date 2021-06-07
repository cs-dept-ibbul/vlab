<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //$this->down();
            $table->string('id',36);
            $table->string('salute',11)->nullable();
            $table->string('first_name');
            $table->string('other_names');
            $table->string('gender')->nullable();
            $table->string('role_id');
            $table->string('email',200)->unique()->nullable();
            $table->string('matric_number')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('using_default_password')->nullable();
            $table->string('user_ip_address')->nullable();
            $table->string('faculty_id',36);
            $table->string('school_id',36);
            $table->string('department_id',36);
            $table->string('session_id',36);
            $table->text('token')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
