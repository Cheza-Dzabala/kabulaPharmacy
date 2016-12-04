<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
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
            'name' => 'manage-stock',
            'display_name' => 'Manage Stock',
            'description' => 'Manage Stock Manage All Stock. (Create, Edit)',
        ]);

        DB::table('permissions')->insert([
            'name' => 'manage-roles-permissions',
            'display_name' => 'Manage Roles & Permissions',
            'description' => 'Create New Roles and assign permission to users',
        ]);

        DB::table('permissions')->insert([
            'name' => 'manage-orders',
            'display_name' => 'Manage Orders',
            'description' => 'Manage All Orders. (Create, Edit)',
        ]);

        DB::table('permissions')->insert([
            'name' => 'manage-suppliers',
            'display_name' => 'Manage Suppliers',
            'description' => 'Manage All Suppliers. (Create, Edit)',
        ]);

        DB::table('permissions')->insert([
            'name' => 'reports',
            'display_name' => 'Access Reports',
            'description' => 'Access the reporting module. (View, Generate, Print)'
        ]);

        DB::table('permissions')->insert([
            'name' => 'manage-user',
            'display_name' => 'Manage USer',
            'description' => 'Allows Users To Manage Users In The  Application. (Create, Edit, Block, Delete)'
        ]);

        DB::table('permissions')->insert([
            'name' => 'manage-pos',
            'display_name' => 'Manage Pos',
            'description' => 'Allows Users To Use The system P.O.S. (Process Transactions)'
        ]);



    }
}
