<?php

use Illuminate\Database\Seeder;

class Items extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Formal Shirt',
            'type' => 1,
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

        DB::table('items')->insert([
            'name' => 'OnePlus 6T',
            'type' => 2,
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

        DB::table('item_type')->insert([
            'type' => 'Mobile',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

        DB::table('item_type')->insert([
            'type' => 'Cloth',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);


        DB::table('item_price')->insert([
            'us_price' => 22.5,
            'item_id' => 1,
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

        DB::table('item_price')->insert([
            'us_price' => 80,
            'item_id' => 2,
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

    }


}
