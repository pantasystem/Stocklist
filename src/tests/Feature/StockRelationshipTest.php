<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Home;
use App\Item;



class StockRelationshipTest extends TestCase
{
    
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    public function testHomeリレーションメソッドは正常に機能しているか()
    {
        $home = Home::first();
        $stock = $home->stocks()->first()->item()->first();
        $this->assertEquals($home->id, $stock->home()->first()->id);
    }
}
