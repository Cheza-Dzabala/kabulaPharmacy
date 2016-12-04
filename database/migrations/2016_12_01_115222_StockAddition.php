<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockAddition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('stock', function ($table) {
            $table->dropColumn('batchNumber');
            $table->dropColumn('quantity');
            $table->dropColumn('markup');
            $table->dropColumn('purchaseCost');
            $table->integer('currentLevel');
        });

        Schema::table('stockDetails', function ($table) {
            $table->integer('quantity');
            $table->integer('batchNumber');
            $table->integer('markup');
            $table->integer('purchaseCost');
            $table->string('expiry_date');
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
        Schema::table('stock', function ($table) {
            $table->string('batchNumber');
            $table->string('quantity');
            $table->string('markup');
            $table->string('purchaseCost');
            $table->dropColumn('currentLevel');
        });

        Schema::table('stockDetails', function ($table) {
            $table->dropColumn('quantity');
            $table->dropColumn('batchNumber');
            $table->dropColumn('markup');
            $table->dropColumn('purchaseCost');
            $table->dropColumn('expiry_date');
        });
    }
}
