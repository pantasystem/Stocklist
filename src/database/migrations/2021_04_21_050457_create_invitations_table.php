<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->string('token', 255)->unique();
            $table->unsignedBigInteger('home_id')->index();;
            $table->BigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->index();;

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
            // $table->string('name')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
