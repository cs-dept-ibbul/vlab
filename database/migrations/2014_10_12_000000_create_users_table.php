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
            $table->increments('id');
            $table->string('first_name');
            $table->string('other_names');
            $table->string('gender');
            $table->string('role_id');
            $table->string('email')->unique();
            $table->string('matric_number');
            $table->string('password');
            $table->string('user_ip_address');
            $table->text('token');
            $table->enum('status', ['Active', 'Inactive']);
            $table->string('date_added');
            $table->string('date_modified');
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
