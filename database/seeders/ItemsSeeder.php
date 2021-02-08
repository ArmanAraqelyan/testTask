<?php

namespace Database\Seeders;

use App\Models\Items;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Items::truncate();
        Schema::enableForeignKeyConstraints();

        $itemNames = ["Кроссовки Nike", "Джинсы Levi's", "Куртка NORMANN", "Футболка Adidas"];

        foreach ($itemNames as $itemName) {
            Items::create(['name' => $itemName, 'show_count' => 0]);
        }
    }
}
