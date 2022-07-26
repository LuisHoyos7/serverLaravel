<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_apis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name',50);
            $table->string('last_name',50);
            $table->integer('identification_type');
            $table->integer('identification_number');
            $table->date('birth_date');
            $table->string('password');
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
        Schema::dropIfExists('user_apis');
    }
}
