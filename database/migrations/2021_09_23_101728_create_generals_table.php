<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullabel();
            $table->string('name_en')->nullabel();
            $table->string('email')->nullabel();
            $table->string('phone')->nullabel();
            $table->string('facebbok')->nullabel();
            $table->string('twitter')->nullabel();
            $table->string('snapchat')->nullabel();
            $table->string('tictok')->nullabel();
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
        Schema::dropIfExists('generals');
    }
}
