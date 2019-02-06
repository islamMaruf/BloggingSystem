<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->text('about');
            $table->string('userName');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('postal');
            $table->string('profilePhoto')->default('default.png');
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
        Schema::dropIfExists('information');
    }
}
