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
        $stock->StockExpires()->saveMany($StockExpires);
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
