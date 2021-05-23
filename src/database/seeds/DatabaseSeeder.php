<?php

use Illuminate\Database\Seeder;
use App\Home;
use App\Room;
use App\Box;
use App\Item;
use App\User;
use App\Stock;
use App\StockExpire;
use App\Disposable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTemplateSeeder::class);
        $homes = factory(Home::class, 3)->create();
        $homes->each(function(Home $home){
            $users = factory(User::class, 4)->create([
                'home_id' => $home->id
            ]);
            $users->each(function(User $user) {
                $user->tokens()->create([
                    'name' => 'dev',
                    'token' => hash('sha256', 'test-' . $user->id),
                    'abilities' => ['*'],
                ]);
            });
        });
        /*$homes->each(function(Home $home){
            factory(Room::class, 5)->create([
                'home_id' => $home->id
            ]);
        });*/

        /*Room::get()->each(function(Room $room){
            factory(Box::class, 3)->create([
                'home_id' => $room->home_id,
                'room_id' => $room->id
            ]);
        });*/

        /*Box::whereRaw('MOD(id, 2) = 0')->get()->each(function(Box $box) {
            factory(Box::class, 3)->create([
                'home_id' => $box->home_id,
                'room_id' => $box->room_id,
                'box_id' => $box->id,
            ]);
        });*/
        $homes->each(function(Home $home){
            factory(Box::class, 15)->create([
                'home_id' => $home->id
            ]);
        });
    

        Box::get()->each(function(Box $box) {
            if($box->id % 2 == 0) {
                factory(Item::class, 10)->create([
                    'home_id' => $box->home_id,
                ])->each(function(Item $item) use ($box) {
                    factory(Stock::class)->create([
                        'box_id' => $box->id,
                        'item_id' => $item->id
                    ]);
                });
            }else{
                factory(Item::class, 5)->create([
                    'home_id' => $box->home_id,
                ])->each(function(Item $item) use ($box) {
                    factory(Stock::class)->create([
                        'box_id' => $box->id,
                        'item_id' => $item->id
                    ]);
                });
            }
        });

        /**
         * ２つ以上の場所(Box)に所属するItem
         */
        Box::whereRaw('MOD(id, 3) = 0')->get()->each(function(Box $box){
            $item = factory(Item::class, 1)->create(['home_id' => $box->home_id])->first();
            $boxes = factory(Box::class, 2)->create([
                'box_id' => $box->id,
                'home_id' => $box->home_id,
                'room_id' => $box->room_id
            ]);
            $boxes->each(function(Box $box) use($item) {
                factory(Stock::class)->create([
                    'box_id' => $box->id,
                    'item_id' => $item->id
                ]);
            });
        });

        // 消費期限をつける
        $itemIds = Item::whereRaw('MOD(id, 5) <> 0')->get(['id'])->pluck('id');
        Stock::whereIn('item_id', $itemIds)->with('item')->get()->each(function(Stock $stock) {
            
            $disposable = $stock->item->disposable()->firstOrCreate(
                ['item_id' => $stock->item_id],
                ['item_id' => $stock->item_id]
            );
            $stockExpire = factory(StockExpire::class)->make([
                'stock_id' => $stock->id,
                'item_id' => $disposable->item_id,
            ]);
            $disposable->expires()->updateOrCreate(
                [
                    'stock_id' => $stock->id,
                    'item_id' => $disposable->item_id,
                ],
                $stockExpire->toArray()
            );
        });

        // StockにもBoxにも関連しないItem
        $homes->each(function(Home $home) {
            $home->items()->saveMany(factory(Item::class, 10)->make());
        });

    }
}
