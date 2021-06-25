<?php

namespace App\Observers;

use App\Stock;
use App\StockExpire;

class StockObserver
{
    /**
     * Handle the stock "created" event.
     *
     * @param  \App\Stock  $stock
     * @return void
     */
    public function created(Stock $stock)
    {
        //
    }

    /**
     * Handle the stock "updated" event.
     *
     * @param  \App\Stock  $stock
     * @return void
     */
    public function updated(Stock $stock)
    {
        //

        // $table->bigIncrements('id');
        // $table->timestamps();
        // $table->unsignedBigInteger('stock_id')->nullable();
        // $table->unsignedBigInteger('item_id')->nullable();
        // $table->unsignedBigInteger('box_id')->nullable();
        // $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('set null');
        // $table->foreign('item_id')->references('id')->on('items')->onDelete('set null');
        // $table->foreign('box_id')->references('id')->on('boxes')->onDelete('set null');
        // $table->integer('count');

        $stock->StockHistories()->create([
            'stock_id' => $stock->id,
            'item_id' => $stock->item_id,
            'box_id' => $stock->box_id,
            'count' => $stock->count
        ]);
    }

    /**
     * Handle the stock "deleted" event.
     *
     * @param  \App\Stock  $stock
     * @return void
     */
    public function deleted(Stock $stock)
    {
        //
    }

    /**
     * Handle the stock "restored" event.
     *
     * @param  \App\Stock  $stock
     * @return void
     */
    public function restored(Stock $stock)
    {
        //
    }

    /**
     * Handle the stock "force deleted" event.
     *
     * @param  \App\Stock  $stock
     * @return void
     */
    public function forceDeleted(Stock $stock)
    {
        //
    }
}
