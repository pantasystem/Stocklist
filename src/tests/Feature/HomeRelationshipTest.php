<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Home;
use App\Stock;
use App\Item;

class HomeRelationshipTest extends TestCase
{
    
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    public function testストックを取得できるか()
    {
        $home = Home::first();
        $stocks =$home->stocks()->with('item')->get(); 
        $stocks->each(function($stock) use ($home) {
            $this->assertEquals($home->id, $stock->item->home_id);
        });

        $itemIds = $home->items()->select(['id'])->pluck('id')->toArray();
        $expectCount = Stock::whereIn('item_id', $itemIds)->get()->count();

        $this->assertEquals($expectCount, $stocks->count());
    }

}
