<?php

use Illuminate\Database\Seeder;
use App\Home;
use App\Room;
use App\Box;
use App\Item;
use App\User;

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
        $homes = factory(Home::class, 3)->create();
        $homes->each(function(Home $home){
            $users = factory(User::class, 4)->create([
                'home_id' => $home->id
            ]);
        });
        $homes->each(function(Home $home){
            factory(Room::class, 5)->create([
                'home_id' => $home->id
            ]);
        });

        Room::get()->each(function(Room $room){
            factory(Box::class, 3)->create([
                'home_id' => $room->home_id,
                'room_id' => $room->id
            ]);
        });

        Box::whereRaw('MOD(id, 2) = 0')->get()->each(function(Box $box) {
            factory(Box::class, 3)->create([
                'home_id' => $box->home_id,
                'room_id' => $box->room_id,
                'box_id' => $box->id,
            ]);
        });

        Box::get()->each(function(Box $box) {
            if($box->id % 2 == 0) {
                factory(Item::class, 20)->create([
                    'home_id' => $box->home_id,
                    'box_id' => $box->id,
                ]);
            }else{
                factory(Item::class, 5)->create([
                    'home_id' => $box->home_id,
                    'box_id' => $box->id,
                ]);
            }
            
        });



    }
}
