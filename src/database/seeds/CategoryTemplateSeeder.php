<?php

use Illuminate\Database\Seeder;
use App\CategoryTemplate;
use Illuminate\Support\Collection;

class CategoryTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "文房具",
            "衣料品",
            "食品",
            "電化製品",
            "消耗品",
            "医薬品",
            "おもちゃ"
        ];
        collect($categories)->each(function($path) {
            CategoryTemplate::create(['path' => $path]);
        });
        
    }
}
