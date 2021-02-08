<?php

namespace Database\Seeders;

use App\Models\Items;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ItemTagLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE item_tag_link");

        $itemTagLinks = [
            ['item_id' => 1, 'tag_id' => 2],
            ['item_id' => 1, 'tag_id' => 3],
            ['item_id' => 1, 'tag_id' => 5],
            ['item_id' => 2, 'tag_id' => 1],
            ['item_id' => 2, 'tag_id' => 4],
            ['item_id' => 3, 'tag_id' => 1],
            ['item_id' => 3, 'tag_id' => 4],
            ['item_id' => 3, 'tag_id' => 6],
            ['item_id' => 4, 'tag_id' => 1],
            ['item_id' => 4, 'tag_id' => 6],
        ];

        DB::table('item_tag_link')
            ->insert($itemTagLinks);
    }
}
