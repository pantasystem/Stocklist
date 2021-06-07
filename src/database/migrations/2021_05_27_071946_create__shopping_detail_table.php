<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping-details', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->timestamps();
            $table->unsignedBigInteger('box_id')->nullable();
            $table->date('completed_at')->nullable();
            $table->unsignedBigInteger('shopping_list_id')->foreign('id')->references('id')->on('ShoppingLists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping-details');
    }
}
