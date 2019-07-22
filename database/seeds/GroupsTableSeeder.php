<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'product_id' => "1",
            'group_product_id' => "1",
            'group_name' => "Random"
        ]);

        DB::table('groups')->insert([
            'product_id' => "1",
            'group_product_id' => "1",
            'group_name' => "Misc"
        ]);

        DB::table('groups')->insert([
            'product_id' => "1",
            'group_product_id' => "3",
            'group_name' => "Food"
        ]);

        DB::table('groups')->insert([
            'product_id' => "1",
            'group_product_id' => "4",
            'group_name' => "Camera"
        ]);

        DB::table('groups')->insert([
            'product_id' => "1",
            'group_product_id' => "5",
            'group_name' => "Numbers"
        ]);

        DB::table('groups')->insert([
            'product_id' => "1",
            'group_product_id' => "6",
            'group_name' => "Test"
        ]);
    }
}
