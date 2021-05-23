<?php

namespace App\Observers;

use App\Home;
use App\CategoryTemplate;
use App\Category;

class HomeObserver
{
    /**
     * Handle the home "created" event.
     *
     * @param  \App\Home  $home
     * @return void
     */
    public function created(Home $home)
    {
        $categories = CategoryTemplate::get()->map(function($template){
            new Category(
                ['path' => $template->path ]
            )
        });
        $home->categories()->saveMany($categories);
    }

    /**
     * Handle the home "updated" event.
     *
     * @param  \App\Home  $home
     * @return void
     */
    public function updated(Home $home)
    {
        //
    }

    /**
     * Handle the home "deleted" event.
     *
     * @param  \App\Home  $home
     * @return void
     */
    public function deleted(Home $home)
    {
        //
    }

    /**
     * Handle the home "restored" event.
     *
     * @param  \App\Home  $home
     * @return void
     */
    public function restored(Home $home)
    {
        //
    }

    /**
     * Handle the home "force deleted" event.
     *
     * @param  \App\Home  $home
     * @return void
     */
    public function forceDeleted(Home $home)
    {
        //
    }
}
