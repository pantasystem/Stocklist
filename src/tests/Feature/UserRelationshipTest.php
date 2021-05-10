<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Owner;
use App\Item;

class UserRelationshipTest extends TestCase
{
    
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    public function testOwnItemsから取得することができるのか()
    {
        $user = User::first();

        $home = $user->home()->first();
        $item = factory(Item::class)->create([
            'home_id' => $home->id
        ]);
        $item->owners()->attach($user);
        
        $ownItems = $user->ownItems()->get();
        $this->assertTrue($ownItems->contains('id', $item->id));
        
    }
}
