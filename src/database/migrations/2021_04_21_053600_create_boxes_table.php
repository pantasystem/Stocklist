<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsingedBigInteger('home_id');
            $table->foreign('home_id')->references('id')->on('homes');

            $table->unsignedBigInteger('box_id')->nullable()->index();
            $table->unsignedBigInteger('room_id')->nullable()->index();
            $table->foreign('box_id')->references('id')->on('boxes');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->string('name')->index();
            $table->text('description');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxes');
    }
}
