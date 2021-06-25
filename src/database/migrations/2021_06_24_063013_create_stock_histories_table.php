<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('box_id')->nullable();
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('set null');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('set null');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('set null');
            $table->integer('count');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_histories');
    }
}
