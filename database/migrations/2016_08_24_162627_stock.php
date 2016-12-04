<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stock', function (Blueprint $table){
            $table->increments('id');
            $table->string('genericName');
            $table->string('brandName');
            $table->string('strength');
            $table->string('batchNumber');
            $table->string('departmentId');
            $table->string('purchaseCost');
            $table->string('markup');
            $table->string('taxProfile1');
            $table->string('taxProfile2');
            $table->string('quantity');
            $table->string('reorderLevel');
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
        Schema::drop('stock');
    }
}
