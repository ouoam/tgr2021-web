<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::factory()->count(10)->make();
        foreach ($items as $item) {
            $item->save();
        }
    }
}
