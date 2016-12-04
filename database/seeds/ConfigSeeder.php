<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('config')->insert([
            'name' => 'order_notes',
            'value' => 'Please Find Below Our Order.',
            'updateBy' => 'Default'
        ]);

    }
}
