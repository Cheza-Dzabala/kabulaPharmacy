<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaxProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('taxProfiles', function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('taxablePercentage')->default('0');
            $table->string('description');
            $table->string('createdBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('taxProfiles');
    }
}
