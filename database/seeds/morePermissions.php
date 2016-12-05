<?php

use Illuminate\Database\Seeder;

class morePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            'name' => 'manage-products',
            'display_name' => 'Manage Product Lists',
            'description' => 'Manage All products. (Create, Edit)',
        ]);
    }
}
