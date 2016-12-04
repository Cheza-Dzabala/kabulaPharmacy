<?php

use Illuminate\Database\Seeder;

class DefaulRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'super-admin',
            'display_name' => 'Super Admin',
            'description' => 'Overall System Access'
        ]);
    }
}
