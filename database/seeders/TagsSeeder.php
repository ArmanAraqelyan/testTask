<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Tags::truncate();
        Schema::enableForeignKeyConstraints();

        $itemNames = ["одежда", "обувь", "стиль", "повседневное", "черное", "белое"];

        foreach ($itemNames as $itemName) {
            Tags::create(['name' => $itemName]);
        }
    }
}
