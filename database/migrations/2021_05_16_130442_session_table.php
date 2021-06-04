<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('session', function (Blueprint $table) {
            //$this->down();
            $table->string('id',36)->primary();
            $table->string('session',10);
            $table->string('is_current',1)->default('0');                       
            $table->enum('status', ['Active', 'Inactive'])->default('Active');        
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
        chema::dropIfExists('session');
    }
}
