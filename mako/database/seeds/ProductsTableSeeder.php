<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => "Pare",
            'product_code' => "231791273",
            'product_price' => "100000",
            'product_detail' => "hello",
            'product_createdBy' => "Pare",
            'product_brand' => "PareTM",
            'product_group' => "human",
            'product_warranty' => "yes",
            'product_model' => "Pare1",
            'product_images' => "empty.png",
            'group_id' => "1"

        ]);
        DB::table('products')->insert([
            'product_name' => "Tekken",
            'product_code' => "123131",
            'product_price' => "555",
            'product_detail' => "fighting game",
            'product_createdBy' => "me",
            'product_brand' => "Bandai",
            'product_group' => "Namco",
            'product_warranty' => "nah",
            'product_model' => "6",
            'product_images' => "empty.png",
            'group_id' => "1"

        ]);
        DB::table('products')->insert([
            'product_name' => "Rice",
            'product_code' => "1231231",
            'product_price' => "199",
            'product_detail' => "white",
            'product_createdBy' => "farmers",
            'product_brand' => "rice",
            'product_group' => "food",
            'product_warranty' => "no",
            'product_model' => "lol",
            'product_images' => "empty.png",
            'group_id' => "2"

        ]);
        DB::table('products')->insert([
            'product_name' => "Uniqlo Shirt",
            'product_code' => "4214512",
            'product_price' => "700",
            'product_detail' => "reeeee",
            'product_createdBy' => "UNQ",
            'product_brand' => "Uniq",
            'product_group' => "pog",
            'product_warranty' => "hi",
            'product_model' => "hm",
            'product_images' => "empty.png",
            'group_id' => "2"
        ]);
        DB::table('products')->insert([
            'product_name' => "Banana",
            'product_code' => "9320193",
            'product_price' => "10",
            'product_detail' => "yellow",
            'product_createdBy' => "farm",
            'product_brand' => "bananaTM",
            'product_group' => "food",
            'product_warranty' => "yes",
            'product_model' => "Pare1",
            'product_images' => "empty.png",
            'group_id' => "3"
        ]);

        DB::table('products')->insert([
            'product_name' => "GoPro",
            'product_code' => "312312",
            'product_price' => "19999",
            'product_detail' => "silver",
            'product_createdBy' => "Me",
            'product_brand' => "pro",
            'product_group' => "cam",
            'product_warranty' => "eternity",
            'product_model' => "action",
            'product_images' => "empty.png",
            'group_id' => "4"
        ]);

        DB::table('products')->insert([
            'product_name' => "GoPro2",
            'product_code' => "1414213",
            'product_price' => "50000",
            'product_detail' => "white",
            'product_createdBy' => "them",
            'product_brand' => "pro",
            'product_group' => "action",
            'product_warranty' => "no",
            'product_model' => "nice",
            'product_images' => "empty.png",
            'group_id' => "4"
        ]);

        DB::table('products')->insert([
            'product_name' => "1",
            'product_code' => "53414231",
            'product_price' => "555",
            'product_detail' => "1",
            'product_createdBy' => "1",
            'product_brand' => "1",
            'product_group' => "1",
            'product_warranty' => "1",
            'product_model' => "1",
            'product_images' => "empty.png",
            'group_id' => "1"
        ]);

        DB::table('products')->insert([
            'product_name' => "2",
            'product_code' => "2342342",
            'product_price' => "222",
            'product_detail' => "2",
            'product_createdBy' => "2",
            'product_brand' => "2",
            'product_group' => "2",
            'product_warranty' => "2",
            'product_model' => "2",
            'product_images' => "empty.png",
            'group_id' => "5"
        ]);

        DB::table('products')->insert([
            'product_name' => "4",
            'product_code' => "4",
            'product_price' => "400",
            'product_detail' => "4",
            'product_createdBy' => "4",
            'product_brand' => "4",
            'product_group' => "4",
            'product_warranty' => "4",
            'product_model' => "4",
            'product_images' => "empty.png",
            'group_id' => "5"
        ]);

        DB::table('products')->insert([
            'product_name' => "8",
            'product_code' => "8",
            'product_price' => "8000",
            'product_detail' => "8",
            'product_createdBy' => "8",
            'product_brand' => "8",
            'product_group' => "8",
            'product_warranty' => "8",
            'product_model' => "8",
            'product_images' => "empty.png",
            'group_id' => "6"
        ]);

        DB::table('products')->insert([
            'product_name' => "9",
            'product_code' => "9",
            'product_price' => "999",
            'product_detail' => "9",
            'product_createdBy' => "9",
            'product_brand' => "9",
            'product_group' => "9",
            'product_warranty' => "9",
            'product_model' => "9",
            'product_images' => "empty.png",
            'group_id' => "6"
        ]);
    }
}
