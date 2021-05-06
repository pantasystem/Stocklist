<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Item;
use App\Box;
use App\Home;
use App\Stock;

class ItemRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public $home;
    
    public function setUp(): void {
        parent::setUp();

        $this->home = factory(Home::class, 1)->create()->first();
        

    }

    public function testBoxesリレーションメソッドのテスト()
    {
        $item = factory(Item::class, 1)->create([
            'home_id' => $this->home->id
        ])->first();
        
        $boxes = factory(Box::class, 2)->create([
            'home_id' => $this->home->id
        ]);
        $boxes->each(function(Box $box) use($item){
            factory(Stock::class, 1)->create(['item_id' => $item->id, 'box_id' => $box->id]);
        });

        // 関係のないデータを作っておく
        factory(Box::class, 5)->create([
            'home_id' => $this->home->id
        ]);
        
        $this->assertEquals(2, $item->boxes()->get()->count());
    }
}
