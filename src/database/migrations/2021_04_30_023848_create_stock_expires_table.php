<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockExpiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_expires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('item_id')->index();
            $table->unsignedBigInteger('stock_id')->index();

            $table->foreign('item_id')->references('item_id')->on('disposables');
            $table->foreign('stock_id')->references('id')->on('stocks');
            $table->date('expiration_date')->nullable()->index();
            $table->unique(['stock_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_expires');
    }
}
