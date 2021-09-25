<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubActicitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_acticities', function (Blueprint $table) {
            $table->id();
            $table->string('first');
            $table->string('secand');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('contest_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); 
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade'); 
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
        Schema::dropIfExists('sub_acticities');
    }
}
