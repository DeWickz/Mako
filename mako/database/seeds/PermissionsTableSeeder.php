<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => "view_product",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "view_order",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "edit_product",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "delete_product",
            'guard_name' => "web"
        ]);
        DB::table('permissions')->insert([
            'name' => "add_product",
            'guard_name' => "web"
        ]);
    }
}
