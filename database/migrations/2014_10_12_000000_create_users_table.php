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
            $this->down();
            $table->string('id')->primary();
            $table->string('first_name');
            $table->string('other_names');
            $table->string('gender');
            $table->string('faculty_id',36);
		    $table->string('school_id',36);
            $table->string('department_id',36);
            $table->string('role_id');
            $table->string('email')->unique();
            $table->string('matric_number');
            $table->string('username');
            $table->string('password');
            $table->string('using_default_password');
            $table->string('user_ip_address');
            $table->string('faculty_id',36);
            $table->string('school_id',36);
            $table->string('deparment_id',36);
            $table->text('token');
            $table->enum('status', ['Active', 'Inactive']);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
